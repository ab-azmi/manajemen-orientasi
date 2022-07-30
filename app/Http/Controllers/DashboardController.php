<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\SesiAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $sesi_aktif = SesiAbsensi::where('status', 1);
        if ($sesi_aktif->first()) {
            $absen = Absensi::where('user_id', Auth::id())->where('sesi_absensi_id', $sesi_aktif->first()->id)->first();
        }else{
            $absen = null;
        }
        
        return view('dashboard', compact('sesi_aktif', 'absen'));

    }
}
