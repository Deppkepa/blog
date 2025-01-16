<?php

   namespace App\Console;

   use Illuminate\Console\Scheduling\Schedule;
   use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
   use App\Console\Commands\StartPublisher

   class Kernel extends ConsoleKernel
   {
       protected $commands = [StartPublisher::class];

       protected function schedule(Schedule $schedule)
       {
           $schedule->command('app:start-publisher')->everyMinute();
       }

       protected function commands()
       {
           $this->load(__DIR__.'/Commands');
		   $this->command(StartPublisher::class)

           require base_path('routes/console.php');
       }
   }