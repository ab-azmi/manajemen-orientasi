<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Tugas;
use Illuminate\Console\Command;

class CheckTugasStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tugas:minute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Memeriksa jika tugas sudah melewati due date, maka tugas ditutup';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tugas = Tugas::all();

        foreach($tugas as $t){
            $due = Carbon::parse($t->due_date)->format('Y-m-d H:i');
            $now = Carbon::now()->format('Y');
            if($due <= $now){
                $t->update(['status' => 1]);
            }else{
                $t->update(['status' => 0]);
            }
        }
    }
}
