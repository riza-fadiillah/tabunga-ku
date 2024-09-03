<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $siswa = Siswa::all();

        // Kirim data siswa ke view
        return view('admin.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|in:XII',
            'jurusan' => 'required|string|max:50',
        ],
    [
        'kelas.in' => 'Ini khusus kelas XII'
    ]);
    
        Siswa::create([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ]);
    
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
        return view('admin.siswa.show', compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('admin.siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        // Validasi data dari request
        $validateData = $request->validate([
            'nama' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50',
        ]);
    
        // Update data siswa dengan data yang telah divalidasi
        $siswa->update($validateData);
    
        // Redirect ke halaman detail siswa setelah update
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
            //code...
            $siswa->delete();
            DB::commit();

            return redirect()->route('siswa.index');
        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            return redirect()->route('siswa.index')->with('error', 'Something`s wrong, try a few more moments');
        }
    }
}
