<?php

namespace App\Http\Controllers;

use App\Models\Classes; // Impor model Classes
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::all();
        return view('admin.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'major_id' => 'required|integer',
            'user_id' => 'nullable|integer',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Menyimpan data kelas ke dalam database
        Classes::create($request->all());

        return redirect()->route('classes.index')->with('success', 'Kelas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $classes, $id)
    {
        $class = Classes::findOrFail($id); // Ambil data kelas berdasarkan ID
        return view('admin.classes.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $classes = Classes::findOrFail($id);
        return view('admin.classes.edit', compact('classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'major_id' => 'required|integer',
            'user_id' => 'nullable|integer',
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
