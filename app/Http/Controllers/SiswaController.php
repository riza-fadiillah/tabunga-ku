<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Savings;
use App\Models\Major;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
        $siswaQuery = Siswa::with(['classes', 'major']);

    if ($request->has('kelas_jurusan') && $request->kelas_jurusan != '') {
        [$kelas, $jurusan] = explode('-', $request->kelas_jurusan);
        $siswaQuery->whereHas('classes', function($query) use ($kelas) {
            $query->where('name', $kelas);
        })->whereHas('major', function($query) use ($jurusan) {
            $query->where('name', $jurusan);
        });
    }

   
    $siswa = $siswaQuery->with(['classes', 'major'])->get();
    return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $majors = Major::all(); 
        $classes = Classes::all();
        $users = User::all(); 
        return view('admin.siswa.create', compact('majors', 'classes','users')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', 
            'password' => 'required|string',
            'class_id' => 'required|exists:classes,id',
            'major_id' => 'required|exists:majors,id',
        ]);
    
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'student', 
        ]);
    
        Siswa::create([
            'user_id' => $user->id,
            'class_id' => $request->class_id,
            'major_id' => $request->major_id,
        ]);
    
        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    
    $siswa = Siswa::findOrFail($id);

    $siswa = Siswa::with('savings.user')->findOrFail($id);
    $savings = $siswa->savings;

    // dd($savings);

    return view('admin.siswa.show', compact('siswa', 'savings'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
  {
    $majors = Major::all(); 
    $classes = Classes::all();
    $users = User::all();  

    return view('admin.siswa.edit', compact('siswa', 'majors', 'classes', 'users'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
       
        $validateData = $request->validate([
            'nama' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id', 
            'major_id' => 'required|exists:majors,id', 
        ]);
      
        $siswa->update($validateData);
    
        return redirect()->route('siswa.index', $siswa->id);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        //
        DB::beginTransaction();

        try {
            $siswa->delete();
            DB::commit();

            return redirect()->route('siswa.index');
        } catch (\Exception $e) {            
            DB::rollBack();
            return redirect()->route('siswa.index')->with('error', 'Something`s wrong, try a few more moments');
        }
    }
}
