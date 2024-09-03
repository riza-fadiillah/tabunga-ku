<?php

namespace App\Http\Controllers;

use App\Models\Savings;
use Illuminate\Http\Request;

class SavingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $savings = Savings::all();
        return view('admin.savings.index', compact('savings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $savings = savings::all(); 
        return view('admin.savings.create', compact('savings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required',        
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
        ]);

        Savings::create([
            'class_id' => $request->input('class_id'),
            'name' => $request->input('name'),
            'role' => $request->input('role'),
        ]);
        

        return redirect()->route('savings.index')->with('success', 'Savings created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Savings $saving)
    {
        return view('admin.savings.show', compact('saving'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $saving = Savings::findOrFail($id);
        return view('admin.savings.edit', compact('saving'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Savings $saving)
    {
        $request->validate([
            'class_id' => 'nullable|exists:classes,id',
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
        ]);
        $saving->update([
            'class_id' => $request->input('class_id'),
            'name' => $request->input('name'),
            'role' => $request->input('role'),
        ]);

        return redirect()->route('savings.index')->with('success', 'Savings updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Savings $saving)
    {
        $saving->delete();
        return redirect()->route('savings.index')->with('success', 'Savings deleted successfully.');
    }
}
