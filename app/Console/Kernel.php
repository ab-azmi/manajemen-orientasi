<?php

namespace App\Console;

use App\Console\Commands\CheckTugasStatus;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        CheckTugasStatus::class
    ];
    
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('tugas:minute')->everyMinute();
        $schedule->command('absensi:minute')->everyMinute();
    }

    
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
