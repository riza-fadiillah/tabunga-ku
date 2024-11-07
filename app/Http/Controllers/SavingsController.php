<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // Pastikan mengimpor Controller
use App\Models\Savings;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();
        $savings = Savings::all(); 
        return view('admin.savings.index', compact('savings'));
    }

    /**
     * Show the form for creating a new resource.
     * Menampilkan form untuk menambahkan tabungan baru.
     */
    public function create()
    {
        $users = User::all();
        $siswa = Siswa::all();
    
        return view('admin.savings.create', compact('users', 'siswa')); 
    }

    /**
     * Store a newly created resource in storage.
     * Menyimpan data tabungan baru ke database.
     */
    public function store(Request $request)
    {
 
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'siswa_id' => 'required|exists:siswa,id', 
            'deebit' => 'required|numeric|min:0',
            'date' => 'required|date',
            'note' => 'nullable|string',
        ]);

        $lastSaving = Savings::where('siswa_id', $request->siswa_id)->latest()->first();
        $newSaldo = $lastSaving ? $lastSaving->saldo + $request->deebit : $request->deebit;

        Savings::create([
            'user_id' => $request->user_id,
            'siswa_id' => $request->siswa_id,
            'deebit' => $request->deebit,
            'saldo' => $newSaldo,
            'date' => $request->date,
            'note' => $request->note,
        ]);

        return redirect()->route('savings.index')->with('success', 'Tabungan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     * Menampilkan detail tabungan berdasarkan ID.
     */
    public function show($id)
    {
        $saving = Savings::findOrFail($id);
        return view('admin.savings.show', compact('saving'));
    }

    /**
     * Show the form for editing the specified resource.
     * Menampilkan form edit untuk tabungan tertentu berdasarkan ID.
     */
    public function edit($id)
    {
        $saving = Savings::findOrFail($id);
        return view('admin.savings.edit', compact('saving'));
    }

    /**
     * Update the specified resource in storage.
     * Mengupdate data tabungan yang ada berdasarkan ID.
     */
    public function update(Request $request, Savings $saving)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'deebit' => 'required|numeric|min:0',
            'saldo' => 'required|numeric|min:0',
        ]);

        $saving->update([
            'user_id' => $request->input('user_id'),
            'date' => $request->input('date'),
            'deebit' => $request->input('deebit'),
            'saldo' => $request->input('saldo'),
        ]);

        return redirect()->route('savings.index')->with('success', 'Tabungan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     * Menghapus data tabungan berdasarkan ID.
     */
    public function destroy(Savings $saving)
    {
        $saving->delete();
        return redirect()->route('savings.index')->with('success', 'Tabungan berhasil dihapus.');
    }
}
