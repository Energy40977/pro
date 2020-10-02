<?php

namespace App\Console\Commands;

use App\Models\News;
use App\Models\Schedule;
use Carbon\Carbon;
use Facebook\Facebook;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;

class Schedules extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedules:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sch = Schedule::where('created_at', '<=', Carbon::now())->first();
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
            foreach ($sch['cat_id'] as $elave){
                if($elave == 'slider'){
                    News::where('id', $news->id)->update(['slider' => 1]);
                }
            }
            
            $sch->delete();
        }
    }
}
