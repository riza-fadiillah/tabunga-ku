<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Majors;
use App\Models\User;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::with('major','user')->get();
        return view('admin.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $majors = Majors::get();
        $users = User::get(); 
      
        return view('admin.classes.create', compact('majors', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'major_id' => 'required|integer|exists:majors,id',
            'user_id' => 'nullable|integer|exists:users,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Menyimpan data
        Classes::create([
            'major_id' => $request->input('major_id'),
            'user_id' => $request->input('user_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('classes.index')->with('success', 'Kelas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $class = Classes::findOrFail($id);
        return view('admin.classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $majors = Majors::get();
        $users = User::get(); 
        $classes = Classes::findOrFail($id);
        return view('admin.classes.edit', compact('classes', 'majors', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'major_id' => 'required|integer|exists:majors,id',
            'user_id' => 'nullable|integer|exists:users,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
          

        $classes = Classes::findOrFail($id);
        $classes->update($request->all());

        return redirect()->route('classes.index')->with('success', 'Class updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $classes = Classes::findOrFail($id);
        $classes->delete();

        return redirect()->route('classes.index')->with('success', 'Class deleted successfully');
    }
}
