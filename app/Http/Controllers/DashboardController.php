<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Majors;
use App\Models\savings;
use App\Models\User;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index(){
    $totalsiswa = Siswa::count();
    $totaluser = User::count();
    $totalmajors = Majors::count();
    $totalclasses = Classes::count();
    $totalsavings = savings::count();

    return view('dashboard', compact('totalsiswa','totaluser','totalmajors','totalclasses','totalsavings'));
}
}
