<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $company = \App\Company::all();
        $schedule->call(function () use($company) {
            
            foreach ($company as $c) {
                if($c->subscription_end == Carbon::now()->toDateString()){
                    DB::table('companies')
                    ->where('id',$c->id)
                    ->update([
                        'subscription'=> 0,
                        'subscription_end' => null,
                        'subscription_start' => null,
                    ]);
                    $data = [
                        "subscription" => 0,
                    ];
                    try {
                        Mail::to($c->admin->email)->send(new \App\Mail\MailSubscriptionUpdate($data));
                    } catch (\Throwable $th) {
                        
                    }
                }elseif ($c->subscription_end == Carbon::now()->subDays(7)->toDateString()) {
                    $data = [
                        "endDate" => $c->subscription_end,
                    ];
                    Mail::to($c->admin->email)->send(new \App\Mail\MailReminderSubscription($data));
                }
            }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
