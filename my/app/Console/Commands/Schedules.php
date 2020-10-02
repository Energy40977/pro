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
            if(!empty($sch['socials'])){
                $url = 'https://propress.az/'.str_slug($sch['cat_name']).'/'.$sch['slug'];
                $socials = explode(',', $sch['socials']);
                foreach ($socials as $social){
                    if($social == 'facebook'){
                        $fb= new Facebook([
                            'app_id'                => '368610434110966',
                            'app_secret'            => '528e7fe0a628930e20d3bd3d9225f5be',
                            'default_graph_version' =>'v7.0'
                        ]);

                        try {
                            $facebook = $fb->post(
                                '/106913621055499/feed',
                                array(
                                    'link' => 'https://propress.az/'.$url,
                                    'access_token' => 'EAAFPP838VfYBAFq2ggQVZAhBlVvvXyCCOtKuu0cvJx6igGZCwKD93f7NQtddg5iZBGK1wPSS0xZCn8zint13zxOMIXEuwPeTn5hG91omgHxxW4CNyRVmGLBFvzLha3kQATdsZAf1BcyEb4FaPFfqIKR2FR8ZBy9zKY1vU6Tr0wHo2TkPuQggCriFNn88DCPo0ZD',

                                )
                            );
                        } catch (Facebook\Exceptions\FacebookResponseException $e) {
                            echo 'Graph returned an error: ' . $e->getMessage();
                            exit;
                        } catch (Facebook\Exceptions\FacebookSDKException $e) {
                            echo 'Facebook SDK returned an error: ' . $e->getMessage();
                            exit;
                        }
                    }elseif($social == 'instagram'){

                    }elseif($social == 'twitter'){
                        Twitter::postTweet(['status' => $url, 'format' => 'json']);
                    }elseif($social == 'whatsapp'){

                    }elseif($social == 'telegram'){

                    }
                }
            }
            $sch->delete();
        }
    }
}
