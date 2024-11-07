<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Majors;
use Illuminate\Http\Request;

class MajorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Majors::all();
        return view('admin.majors.index', compact('majors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('admin.majors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Majors::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('majors.index')->with('success', 'Jurusan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $major = Majors::findOrFail($id);
        return view('admin.majors.show', compact('major'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $major = Majors::findOrFail($id);
        return view('admin.majors.edit', compact('major'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $major = Majors::findOrFail($id);
        $major->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    
        return redirect()->route('majors.index')->with('success', 'Jurusan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $major = Majors::findOrFail($id);
        $major->delete();
    
        return redirect()->route('majors.index')->with('success', 'Jurusan berhasil dihapus');
    }
}
