<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\SesiAbsensi;
use Illuminate\Console\Command;

class CheckSesiAbsensi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'absensi:minute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menonaktifkan sesi absensi sesuai jam selesainya';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sesi = SesiAbsensi::where('status', 1)->first();
        $now = Carbon::now()->format('H:i');
        if($now >= $sesi->waktu_selesai){
            $sesi->update(['status' => 0]);
        }
    }
}
