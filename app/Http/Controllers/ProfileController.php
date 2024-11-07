<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Siswa;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function show()
    {
        $user = Auth::user();
        // dd($user->siswa);
        $siswa = $user->siswa; 
        if ($siswa) {
            $siswa->load('savings');
        }

        return view('profile.show', compact('user', 'siswa'));
    }

    public function generatePdf($id)
    {
    
        $siswa = Siswa::with('user', 'classes', 'major', 'savings')->findOrFail($id);
        $pdf = PDF::loadView('profile.pdf', compact('siswa'));

       
        return $pdf->download('profil_siswa_' . $siswa->user->name . '.pdf');
    }
    /**
     * Show the form for editing the profile.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

       
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

       
        $user->name = $request->name;
        $user->email = $request->email;

        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        
        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the user's account from the system.
     */
    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();

        return redirect('/')->with('success', 'Your account has been deleted.');
    }
}
