<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

use App\Models\Cron;
use App\Models\News;

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
        
         Log::info('Okey'); 
         $sch = Cron::where('created_at', '<=', Carbon::now())->first();

        if(!empty($sch)){
            $news = News::create([
                'title' => $sch['title'],
                'content' => $sch['content'],
                'tags' =>  $sch['tags'],
                'author' => $sch['author'],
                'read' => 0,
                'image' => $sch['image'],
                'cat_id' => $sch['cat_id'],
                'cat_name' => $sch['cat_name'],
                'slug' => $sch['slug'],
                'status' => 1,
                'draft' => 0,
                'slider' => 0,
                'created_at' => $sch['created_at']
            ]);
            $cats = explode(',', $sch['cat_id']);
            foreach ($cats as $elave){
                if($elave == 'slider'){
                    News::where('id', $news->id)->update(['slider' => 1]);
                }
            }
            $sch->delete();
        }
        $schedule->command('currency:update')
            ->dailyAt('00:00');
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
