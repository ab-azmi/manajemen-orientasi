<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Absensi;
use App\Models\SesiAbsensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    
    public function index()
    {
        $absens = SesiAbsensi::latest()->paginate();
        
        return view('absensi.index', compact('absens'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $sesi = SesiAbsensi::where('status', 1)->first();
        if($sesi){
            if ($request->confirm == Auth::user()->email) {
                Absensi::create([
                    'time_absen' => Carbon::now()->format('H:i'),
                    'confirm' => 1,
                    'user_id' => Auth::id(),
                    'sesi_absensi_id' => $sesi->id
                ]);
                return back()->with('success', 'Absensi berhasil dilakukan');
            }else{
                return back()->with('error', 'Tulis email anda untuk mengonfirmasi absensi');
            }
        }else{
            return back()->with('error', 'Tidak ada sesi absensi aktif saat ini');
        }
        
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

    public function toggleStatus(SesiAbsensi $sesi){
        $sesis = SesiAbsensi::whereNotIn('id', [$sesi->id])->where('status', 1)->get();
        if($sesis->first() != null){
            return back()->with('error', 'Nonaktifkan semua, sebelum mengaktifkan!');
        }
        
        if($sesi->status == 1){
            $sesi->update(['status' => 0]);
            return back()->with('success', 'Berhasil dinonaktifkan');
        }else{
            $sesi->update(['status' => 1]);
            return back()->with('success', 'Berhasil diaktifkan');
        }
        
    }
}
