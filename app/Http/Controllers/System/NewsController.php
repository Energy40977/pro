<?php
namespace App\Http\Controllers\System;

use App\Models\Category;
use App\Models\Drafts;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Cron;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
USE Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image;
use KubAT\PhpSimple\HtmlDomParser;



class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $chox = News::where('author', 'Propress')->orderBy('read', 'desc')->get()->take(5);
        $dayly = \App\Models\News::whereDate('created_at', Carbon::today())->sum('read');
        $dayly2 = \App\Models\News::whereDate('created_at', Carbon::today())->count();

        return view('system.index', compact('chox', 'dayly', 'dayly2'));
    }

    public function news()
    {
        $news = News::where('author', 'Propress')->orderBy('created_at', 'DESC')->get();
        return view('system.news.news', compact('news'));
    }

    public function createnews()
    {
        return view('system.news.createnews');
    }

    public function addnews(Request $request)
    {
        $url = Carbon::parse($request['time'])->format('Y-m-d H:i');
        $now = Carbon::now()->format('Y-m-d H:i');
        $content = $request['content'];
        $content = addprotocol($content); 
        $validator = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required'
        ], [
            'title.required' => 'Başlığı daxil edin',
            'content.required' => 'Xəbəri daxil edin',
            'category.required' => 'Kateqoriyanı seçin'
        ]);

        $title = title($request['title']);
        $slug = slug(strip_tags($title));
        $catname = Category::where('id', $request['category'])->first();
        $tags = implode(',', explode(" ",str_replace('"','',strip_tags($request['title'])))).','.$request['tags'];
        if(isset($request['elavekat'])){
            $allcategories = $request['category'].','.implode(',',$request['elavekat']);
        }else{
            $allcategories = $request['category'];
        }

        $image_name = $slug.'-'.time().'.jpg';
        $destinationPath = public_path('/news/images/');
        $img = Image::make($request->file('image'));
        $img->resize(null, 2000, function ($constraint) {
            $constraint->aspectRatio();
        });
        if(isset($request['watermark'])){
            $watermark = Image::make(public_path('news/watermark.png'));
            $img->insert($watermark, 'center');
        }
        $img->save($destinationPath.$image_name);
        $img->save($destinationPath.$image_name.'.webp');

        $urll = 'https://propress.az/'.$catname['slug'].'/'.$slug;

        if(empty($request['time'])){
            $time = Carbon::now();
        }else{
            $time = $request['time'];
        }
        if(Carbon::parse($url)->isSameMinute(Carbon::now())){
            $news = News::create([
                'title' => $title,
                'content' => $content,
                'tags' =>  $tags,
                'author' => Auth::user()->name,
                'read' => 0,
                'image' => $image_name,
                'cat_id' => $allcategories,
                'cat_name' => $catname['cat_name'],
                'slug' => $slug,
                'status' => 1,
                'draft' => 0,
                'slider' => 0,
                'created_at' => $time

            ]);
            if(isset($request['elavekat'])){
                foreach ($request['elavekat'] as $elave){
                    if($elave == 'slider'){
                        News::where('id', $news->id)->update(['slider' => 1]);
                    }
                }
            }
            if($request['social'] != null){
                $socials = explode(',', $request['social']);
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
                                    'link' => $urll,
                                    'access_token' => 'EAAFPP838VfYBABdVTg9mgxDTEeJf4Gzo1rA8kIxZB2JDZCHLreXlZCZBWLThypph6fTgDTtq4NgFJ4DAT0xEh69dCVzJY3WyvNw6KXPkwqXjA9V8L0lh1ED5fCfuHsazm3B7XkJgtWcBHJGjJ6M35YbZCZATHnZCGgzFQaJ9ZAz5S68XW41KN6G4528cgj2yB4YZD',
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
                        Twitter::postTweet(['status' => $urll, 'format' => 'json']);
                    }elseif($social == 'whatsapp'){

                    }elseif($social == 'telegram'){

                    }
                }
            }
        }elseif(Carbon::parse($url)->gt(Carbon::now())){
            if(isset($request['social'])){
                $social = $request['social'];
            }else{
                $social = '';
            }
            $schedule = Cron::create([
                'title' => $title,
                'content' => $content,
                'tags' => $tags,
                'author' => Auth::user()->name,
                'read' => 0,
                'image' => $image_name,
                'cat_id' => $allcategories,
                'cat_name' => $catname['cat_name'],
                'slug' => $slug,
                'status' => 1,
                'slider' => 0,
                'socials' => $social,
                'draft' => 0,
                'created_at' => $time
            ]);
            if(isset($request['elavekat'])){
                foreach ($request['elavekat'] as $elave){
                    if($elave == 'slider'){
                        Cron::where('id', $schedule->id)->update(['slider' => 1]);
                    }
                }
            }
        }elseif(Carbon::parse($url)->lt(Carbon::now())){
            $news = News::create([
                'title' => $title,
                'content' => $content,
                'tags' => $tags,
                'author' => Auth::user()->name,
                'read' => 0,
                'image' => $image_name,
                'cat_id' => $allcategories,
                'cat_name' => $catname['cat_name'],
                'slug' => $slug,
                'status' => 1,
                'slider' => 0,
                'draft' => 0,
                'created_at' => $time
            ]);
            if($request['social'] != null){
                $socials = explode(',', $request['social']);
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
                                    'link' => $urll,
                                    'access_token' => 'EAAFPP838VfYBABdVTg9mgxDTEeJf4Gzo1rA8kIxZB2JDZCHLreXlZCZBWLThypph6fTgDTtq4NgFJ4DAT0xEh69dCVzJY3WyvNw6KXPkwqXjA9V8L0lh1ED5fCfuHsazm3B7XkJgtWcBHJGjJ6M35YbZCZATHnZCGgzFQaJ9ZAz5S68XW41KN6G4528cgj2yB4YZD',

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
                        Twitter::postTweet(['status' => $urll, 'format' => 'json']);
                    }elseif($social == 'whatsapp'){

                    }elseif($social == 'telegram'){

                    }
                }
            }
            if(isset($request['elavekat'])){
                foreach ($request['elavekat'] as $elave){
                    if($elave == 'slider'){
                        News::where('id', $news->id)->update(['slider' => 1]);
                    }
                }
            }
        }

        if(isset($news)){
            Gallery::where('demo_id', $request['demo_id'])->update(['news_id' => $news->id]);
            $vv = News::where('id', $news->id)->first();
            $created_at = $vv['created_at']->translatedFormat('j F, Y');
            $url = $catname['slug'].'/'.$slug;
            //event(new NewMessage($request['title'], $image_name, $created_at, $news->id, $url));
        }


    }

    public function preview(Request $request)
    {

        if (isset($request['edit'])) {
            if ($request['image'] == null) {
                $img = News::where('id', $request['edit'])->first();
                $imagelocation = '/news/images/'. $img['image'];
            } else {
                $files = glob('preview/*'); // get all file names
                foreach ($files as $file) { // iterate files
                    if (is_file($file))
                        unlink($file); // delete file
                }

                $image = $request->file('image');
                $image_name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/preview/');
                $image->move($destinationPath, $image_name);
                $imagelocation = '/preview/' . $image_name;
            }

        } else {
            $files = glob('preview/*'); // get all file names
            foreach ($files as $file) { // iterate files
                if (is_file($file))
                    unlink($file); // delete file
            }

            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/preview/');
            $image->move($destinationPath, $image_name);
            $imagelocation = '/preview/' . $image_name;
        }
        $category = Category::where('id', $request['category'])->first();
        $title= str_ireplace('<p>','', $request['title']);
        $title= str_ireplace('</p>','',$title);
        $tags = explode(',', $request['tags']);
        $content = $request['content'];
        $content = addprotocol($content); 
        $cat_name = $category['cat_name'];

        return preview($imagelocation,$title,$content,$cat_name);


    }

    public function editnews($id)
    {
        $news = News::where('id', $id)->first();
        $gallery = Gallery::where('news_id', $news['id'])->get();
        return view('system.news.editnews', compact('news', 'gallery'));
    }

    public function deletenews(Request $request)
    {
        $news = News::where('id', $request['id'])->first();
        Gallery::where('news_id', $news['id'])->delete();
        $news->delete();
    }

    public function draft(Request $request)
    {


        $title= title($request['title']);
        $slug = slug(strip_tags($title));
        $catname = Category::where('id', $request['category'])->first();

        if($request['title'] == null){
            $image_name = time().'.jpg';;
        }else{
            $image_name = strip_tags($slug).'-'.time().'.jpg';;
        }



        $tags = implode(',', explode(" ",strip_tags($request['title']))).','.$request['tags'];
        if(isset($request['elavekat'])){
            $allcategories = $request['category'].','.implode(',',$request['elavekat']);
        }else{
            $allcategories = $request['category'];
        }

        $destinationPath = public_path('/news/images/');
        $img = Image::make($request->file('image'));
        $img->resize(2000, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        if(isset($request['watermark'])){
            $watermark = Image::make(public_path('news/watermark.png'));
            $img->insert($watermark, 'center');
        }
        $img->save($destinationPath.$image_name);
        $img->save($destinationPath.$image_name.'.webp');

        $news = Drafts::create([
            'title' => $title,
            'content' => $request['content'],
            'tags' => $tags,
            'author' => Auth::user()->name,
            'read' => 0,
            'demo_id' => $request['demo_id'],
            'image' => $image_name,
            'cat_id' => $allcategories,
            'cat_name' => $catname['cat_name'],
            'slug' => $slug,
            'status' => 0,
            'draft' => 1
        ]);
        if($news){
            Gallery::where('demo_id', $request['demo_id'])->update(['draft_id' => $news->id]);
        }
    }

    public function drafts()
    {
        $drafts = Drafts::all();
        return view('system.news.drafts', compact('drafts'));
    }

    public function editpost(Request $request)
    {


        $validator = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required'
        ], [
            'title.required' => 'Başlığı daxil edin',
            'content.required' => 'Xəbəri daxil edin',
            'category.required' => 'Kateqoriyanı seçin',
        ]);



        $title =  title($request['title']);

        $content = $request['content'];
        $content = addprotocol($content); 
        $catname = Category::where('id', $request['category'])->first();
        $tags = $request['tags'];

        $slider = 0;
        if(isset($request['elavekat'])){
            foreach ($request['elavekat'] as $elave){
                if($elave == 'slider'){
                    $slider = 1;
                }
            }
        }

        if(isset($request['elavekat'])){
            $allcategories = $request['category'].','.implode(',',$request['elavekat']);
        }else{
            $allcategories = $request['category'];
        }
        $slug = slug(strip_tags($title));
        $data = News::where('id', $request['id'])->first();
        $image = $request->file('image');

        if ($image == null) {
            $image_name = $data['image'];
            if(isset($request['watermark'])){
                $img = Image::make(public_path('news/images/'.$image_name));
                $watermark = Image::make(public_path('news/watermark.png'));
                $water = $img->insert($watermark, 'center');
                $img->save(public_path('news/images/'.$image_name));
            }
        } else {
            $image_name = $slug.'-'.time().'.jpg';
            $destinationPath = public_path('/news/images/');
            $img = Image::make($request->file('image'));
            $img->resize(2000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if(isset($request['watermark'])){
                $watermark = Image::make(public_path('news/watermark.png'));
                $img->insert($watermark, 'center');
            }
            $img->save($destinationPath.$image_name);
            $img->save($destinationPath.$image_name.'.webp');

        }


        $news = $data->update([
            'title' => $title,
            'content' => $content,
            'tags' => $tags,
            'image' => $image_name,
            'cat_id' => $allcategories,
            'cat_name' => $catname['cat_name'],
            'slug' => $slug,
            'slider' => $slider,
            'status' => 1,
            'draft' => 0
        ]);
        $urll = 'https://propress.az/'.$catname['slug'].'/'.$slug;
        if($request['social'] != null){
            $socials = explode(',', $request['social']);
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
                                'link' => $urll,
                                'access_token' => 'EAAFPP838VfYBABdVTg9mgxDTEeJf4Gzo1rA8kIxZB2JDZCHLreXlZCZBWLThypph6fTgDTtq4NgFJ4DAT0xEh69dCVzJY3WyvNw6KXPkwqXjA9V8L0lh1ED5fCfuHsazm3B7XkJgtWcBHJGjJ6M35YbZCZATHnZCGgzFQaJ9ZAz5S68XW41KN6G4528cgj2yB4YZD',

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
                    Twitter::postTweet(['status' => $urll, 'format' => 'json']);
                }elseif($social == 'whatsapp'){

                }elseif($social == 'telegram'){

                }
            }
        }
    }

    public function editdrafts($id)
    {
        $drafts = Drafts::where('id', $id)->first();
        $gallery = Gallery::where('demo_id', $drafts['demo_id'])->get();
        return view('system.news.editdrafts', compact('drafts', 'gallery'));
    }

    public function publishdraft(Request $request)
    {

        $myarray = ['<p>', '<h1>', '<h2>', '<h3>', '<h4>','<h5>','<h6>', '</p>', '</h1>', '</h2>', '</h3>', '</h4>','</h5>','</h6>'];
        $title= str_replace($myarray,'', $request['title']);
        $title= preg_replace('#<a.*?>([^>]*)</a>#i', '$1', $title);

        $command = Drafts::where('id', $request['id'])->first();
        $validator = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required'
        ], [
            'title.required' => 'Başlığı daxil edin',
            'content.required' => 'Xəbəri daxil edin',
            'category.required' => 'Kateqoriyanı seçin',
        ]);
        $slug = slug(strip_tags($title));

        $catname = Category::where('id', $request['category'])->first();
        $tags = implode(',', explode(" ",str_replace('"','',strip_tags($request['title'])))).','.$request['tags'];
        if(isset($request['elavekat'])){
            $allcategories = $request['category'].','.implode(',',$request['elavekat']);
        }else{
            $allcategories = $request['category'];
        }
        if ($request->file('image') == null) {
            $image_name = $command['image'];
        } else {

            $image_name = $slug.'-'.time().'.jpg';;
            $destinationPath = public_path('/news/images/');
            $img = Image::make($request->file('image'));
            $img->resize(2000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if(isset($request['watermark'])){
                $watermark = Image::make(public_path('news/watermark.png'));
                $img->insert($watermark, 'center');
            }
            $img->save($destinationPath.$image_name.'.jpg');
            $img->save($destinationPath.$image_name.'.webp');

        }
        $urll = $catname['slug'].'/'.$slug;

        $news = News::create([
            'title' => $title,
            'content' => $request['content'],
            'tags' => $tags,
            'author' => Auth::user()->name,
            'read' => 0,
            'image' => $image_name,
            'cat_id' => $allcategories,
            'cat_name' => $catname['cat_name'],
            'slug' => $slug,
            'status' => 1,
            'draft' => 0
        ]);
        if($news){
            $vv = News::where('id', $news->id)->first();
            $created_at = $vv['created_at']->translatedFormat('j F, Y');
            $url = $catname['slug'].'/'.$slug;
            if(isset($request['elavekat'])){
                foreach ($request['elavekat'] as $elave){
                    if($elave == 'slider'){
                        News::where('id', $news->id)->update(['slider' => 1]);
                    }
                }
            }
            //event(new NewMessage($request['title'], $image_name, $created_at, $news->id, $url));
            Gallery::where('demo_id', $request['demo_id'])->update(['news_id' => $news->id]);
            $command->delete();
        }
        if($request['social'] != null){
            $socials = explode(',', $request['social']);
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
                                'access_token' => 'EAAFPP838VfYBABdVTg9mgxDTEeJf4Gzo1rA8kIxZB2JDZCHLreXlZCZBWLThypph6fTgDTtq4NgFJ4DAT0xEh69dCVzJY3WyvNw6KXPkwqXjA9V8L0lh1ED5fCfuHsazm3B7XkJgtWcBHJGjJ6M35YbZCZATHnZCGgzFQaJ9ZAz5S68XW41KN6G4528cgj2yB4YZD',

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
                    Twitter::postTweet(['status' => $urll, 'format' => 'json']);
                }elseif($social == 'whatsapp'){

                }elseif($social == 'telegram'){

                }
            }
        }
    }

    public function deletedraft(Request $request)
    {
        $draft = Drafts::where('id', $request['id'])->first();
        Gallery::where('demo_id', $draft['demo_id'])->delete();
        $draft->delete();
    }

    public function inserturl(Request $request)
    {
        $demo_id = random(16);
        $url = $request['url'];
        $parse = parse_url($url);
        $mainurl = $parse['host'];
        $html = file_get_contents($request['url']);
        if ($mainurl == 'apa.az') {

            $newurl = '';
            $html = strstr($html, '<div class="category-inner">');
            $html = substr($html, 0, strpos($html, '<div class="general-author">'));
            $dom = HTMLDomParser::str_get_html($html);

            foreach ($dom->find('h2') as $element) {
                $title = $element->plaintext;
            }
            foreach ($dom->find('img') as $element) {
                $image[] = $element->src;
            }

            foreach ($dom->find('div.video-block') as $element) {
                $video = $element->innertext;
            }

            $imgurl = $image[0];

            foreach ($dom->find('div.category-text') as $element) {
                $content = $element->innertext;
            }

            $ifimages = preg_match_all('/<img[^>]+>/i', $content, $result);
            $content = preg_replace('/(width|height)="\d*"\s/', "", $content);
            $content = str_replace($content, '' . $content . '', $content);


            foreach ($dom->find('div.slider-galleria') as $element) {
                $galery = $element->innertext;
            }


            if (isset($video)) {
                preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $video, $match);
                if (strpos($match[0][0], '-nocookie') !== false) {
                    $match[0] = str_replace('-nocookie', '', $match[0]);
                }

                $newv = '<figure class="media">
               <oembed url="' . $match[0][0] . '"></oembed>
              </figure>';

                $videoo = $newv;
            } else {
                $videoo = '';
            }

            $content = $content . ' ' . $videoo;

        }
        elseif ($mainurl == 'report.az') {

            $newurl = '';
            $dom = HTMLDomParser::str_get_html($html);

            foreach ($dom->find('div.selected-news >h1.news-title') as $element) {
                $title = $element->plaintext;
            }

            foreach ($dom->find('div.news-cover > div.image > img') as $element) {
                $image = $element->src;
            }

            foreach ($dom->find('div.video-container') as $element) {
                $video = $element->innertext;
            }

            foreach ($dom->find('div.editor-body > p') as $element) {
                $content[] = $element->innertext;
            }

            if (isset($video)) {
                preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $video, $match);
                $newv = '<figure class="media"><oembed url="' . $match[0][0] . '"></oembed></figure>';

                $videoo = $newv;
            } else {
                $videoo = '';
            }

            foreach ($dom->find('div.news-gallery > div.thumb > img') as $element) {
                $galery[] = $element->src;
            }

            $con = implode('</br>', $content);
            if (isset($video)) {
                $con = preg_replace('#<div class="video-container">(.*?)</div>#', '', $con);
            }
            $con = str_replace('blurred-left', 'img img-responsive', $con);
            $con = $con . '</br>' . $videoo;
            $imgurl = $image;
            $content = $con;

        }
        elseif ($mainurl == 'az.trend.az') {
            $newurl = '';
            $html = file_get_contents($request['url']);
            $dom = HTMLDomParser::str_get_html($html);

            foreach ($dom->find('div.article-header > h1.article-title') as $element) {
                $title = $element->plaintext;
            }
           
            foreach ($dom->find('img.article-image') as $element) {
                $image = $element->src;
            }
            foreach ($dom->find('div.article-text > p') as $element) {
                $content[] = $element->innertext;
            }
            foreach ($dom->find('div.article-gallery > img') as $element) {
                $galery[] = $element->src;
            }
            foreach ($dom->find('div.video-block') as $element) {
                $video = $element->innertext;
            }

            if (isset($video)) {
                preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $video, $match);

                $newv = '<div class="embed-responsive embed-responsive-16by9">
               <iframe class="embed-responsive-item" src="' . $match[0][0] . '"></iframe>
               </div>';
                $videoo = $newv;
            } else {
                $videoo = '';
            }


            $con = implode('</br>', $content);
            $con = str_replace('blurred-left', 'img img-responsive', $con);
            $con = $con . '</br>' . $videoo;
            $imgurl = $image;
            $content = $con;

        }
        elseif ($mainurl == 'fed.az') {
            $html = file_get_contents($request['url']);
            $dom = HTMLDomParser::str_get_html($html);
            $catname = Category::where('id', $request['category'])->first();
            foreach ($dom->find('<h3 class="news-head">') as $element) {
                $title = $element->plaintext;
            }
            foreach ($dom->find('div.news-image > img') as $element) {
                $image = $element->src;
            }
            foreach ($dom->find('div.news-text') as $element) {
                $content = $element->innertext;
            }

            $convertvideo = str_replace(
                ['<iframe', '</iframe>'],
                ['<div class="embed-responsive embed-responsive-16by9">' .
                    '<iframe class="i-wrapped"', '</iframe></div>'],
                $content);

            if ($convertvideo) {
                $content = $convertvideo;
            }

            foreach ($dom->find('div.galleria > img') as $element) {
                $galery[] = $element->src;
            }


            $slug = slug($title);
            $imgurl = 'https://fed.az/' . $image;
            $newurl = '';


        }
        elseif ($mainurl == 'marja.az') {

            $newurl = 'https://marja.az';
            $html = file_get_contents($request['url']);
            $dom = HTMLDomParser::str_get_html($html);
            $catname = Category::where('id', $request['category'])->first();
            foreach ($dom->find('div.news-head >h2') as $element) {
                $title = $element->plaintext;
            }

            foreach ($dom->find('div.news-photo > img') as $element) {
                $image = $element->src;
            }

            foreach ($dom->find('div[class*=col-md-12 content-news] > p') as $element) {
                $content[] = $element->innertext;
            }
            foreach ($dom->find('div.gallery > img') as $element) {
                $galery[] = $element->src;
            }

            $content = implode('</br>', $content);
            $slug = slug($title);
            $imgurl = 'https://marja.az'. $image;

        }
        elseif ($mainurl == 'qazet.az') {
            $dom = HTMLDomParser::str_get_html($html);
            $newurl = '';
            foreach ($dom->find('div.tdb_single_bg_featured_image') as $element) {
                $ima = $element->innertext;
                preg_match('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $ima, $match);
                $image = $match[0];
            }
            foreach ($dom->find('div.tdb-block-inner>h1.tdb-title-text') as $element) {
                $title = $element->plaintext;
            }
            foreach ($dom->find('div.tdb-block-inner > p') as $element) {
                $content[] = $element->innertext;
            }
            foreach ($dom->find('figure.wp-block-video') as $element) {
                $video = $element->innertext;
            }
            if (isset($video)) {
                preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $video, $match);
                $newv = '<figure class="media"><oembed url="' . $match[0][0] . '"></oembed></figure>';

                $videoo = $newv;
            } else {
                $videoo = '';
            }
            foreach ($dom->find('figure.wp-block-gallery > ul.blocks-gallery-grid > li.blocks-gallery-item > figure > a') as $element) {
                $galery[] = $element->href;
            }
            $content = implode('</br>', $content)."</br>".$videoo;
            $imgurl = $image;
        }

        $catname = Category::where('id', $request['category'])->first();
        $slug = slug($title);
        $tags = implode(',', explode(" ",str_replace('"','',strip_tags($title))));
        $filename = basename($imgurl);
        $news = Drafts::create([
            'title' => $title,
            'content' => $content,
            'tags' => $tags,
            'author' => Auth::user()->name,
            'read' => 0,
            'image' => $filename,
            'cat_id' => $catname['id'],
            'cat_name' => $catname['cat_name'],
            'slug' => $slug,
            'status' => 1,
            'demo_id' => $demo_id,
            'draft' => 0
        ]);


        if (isset($galery)) {
            if ($mainurl == 'apa.az'){
                preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $galery, $match2);
                $mm = array_values(array_unique($match2[0]));
            }elseif ($mainurl == 'report.az'){
                $mm = str_replace('_290', '', $galery);
            }else{
                $mm = array_values(array_unique($galery));
            }

            for ($i = 0; $i < count($mm); $i++) {
                Gallery::create([
                    'image' => $newurl.$mm[$i],
                    'demo_id' => $demo_id

                ]);

            }
        }


        $igne = '.webp';
        $konum = strpos($imgurl, $igne);
        if ($konum === false) {

            $destinationPath = public_path('/news/images/');
            $img = Image::make($imgurl);
            $img->resize(2000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($destinationPath.$filename);
            $img->save($destinationPath.$filename.'.webp');

        } else {
            $destinationPath = public_path('/news/images/');
            $image = imagecreatefromwebp($imgurl);
            $img =Image::make($image);
            $img->resize(2000, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($destinationPath.$filename);
            $img->save($destinationPath.$filename.'.webp');
        }
        if($news){
            $vv = Drafts::where('id', $news->id)->first();
            $created_at = $vv['created_at']->translatedFormat('j F, Y');
            $url = $catname['slug'].'/'.$slug;
            //event(new NewMessage($title, $filename, $created_at, $news->id, $url));
        }


        return $news->id;

    }

    public function imagesUploadPost(Request $request)

    {

        request()->validate(['uploadFile' => 'required',]);

        foreach ($request->file('uploadFile') as $key => $value) {

            if(isset($request['demo_id'])){
                $demo_id = $request['demo_id'];
            }else{
                $demo_id = '';
            }
            $imageName = time(). $key . '.' .$value->getClientOriginalExtension();
            $value->move(public_path('news/images'), $imageName);

            Gallery::create([
                'news_id' => $request['news_id'],
                'image' => asset('news/images/'.$imageName),
                'demo_id' => $demo_id
            ]);

        }
        if(isset($request['demo_id'])){
            $allimages = Gallery::where('demo_id', $demo_id)->get();
            return view('system.news.gallery', compact('allimages'));
        }
        return response()->json(['success'=>'Images Uploaded Successfully.']);

    }

    public function deletegal(Request $request){
        if(isset($request['data'])){
            $demo_id = $request['data'];
        }else{
            $demo_id = '';
        }
        Gallery::where('id', $request['id'])->delete();
        if(isset($request['data'])){
            $allimages = Gallery::where('demo_id', $demo_id)->get();
            return view('system.news.gallery', compact('allimages'));
        }
        return response()->json(['success'=>'Images Uploaded Successfully.']);
    }

    public function uploads(Request $request){
        $image = $request->file('upload');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/news/images');
        $image->move($destinationPath, $image_name);
        $url = asset('news/images/'.$image_name);
        return Response::json(array(

            'uploaded'  =>  true,
            'url'   =>  $url
        ), 200);
    }

    public function schedules(){
        $news = Cron::where('author', 'Propress')->orderBy('id', 'DESC')->get();
        return view('system.schedules.schedules', compact('news'));
    }

    public function editschedule($id){
        $news = Cron::where('id', $id)->first();
        $gallery = Gallery::where('news_id', $news['id'])->get();
        return view('system.schedules.editnews', compact('news', 'gallery'));
    }

    public function editschedules(Request $request){

        $validator = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required'
        ], [
            'title.required' => 'Başlığı daxil edin',
            'content.required' => 'Xəbəri daxil edin',
            'category.required' => 'Kateqoriyanı seçin',
        ]);

        $title= str_ireplace('<p>','', $request['title']);
        $title= str_ireplace('</p>','',$title);

        $content = $request['content'];
        $content = addprotocol($content); 
        $catname = Category::where('id', $request['category'])->first();
        $tags = implode(',', explode(" ",strip_tags($request['title']))).','.$request['tags'];
        if(isset($request['elavekat'])){
            $allcategories = $request['category'].','.implode(',',$request['elavekat']);
        }else{
            $allcategories = $request['category'];
        }
        $slug = slug(strip_tags($title));
        $data = Cron::where('id', $request['id'])->first();
        $image = $request->file('image');

        if ($image == null) {
            $image_name = $data['image'];
            if(isset($request['watermark'])){
                $img = Image::make(public_path('news/images/'.$image_name));
                $watermark = Image::make(public_path('news/watermark.png'));
                $water = $img->insert($watermark, 'center');
                $img->save(public_path('news/images/'.$image_name));
            }
        } else {
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/news/images/');
            $image->move($destinationPath, $image_name);
            if(isset($request['watermark'])){
                $img = Image::make($destinationPath.$image_name);
                $watermark = Image::make(public_path('news/watermark.png'));
                $water = $img->insert($watermark, 'center');
                $img->save($destinationPath.$image_name);
            }
            $destination = $destinationPath.$image_name. '.webp';
            WebPConvert::convert('news/images/' . $image_name, $destination);

        }
        if(isset($request['elavekat'])){
            foreach ($request['elavekat'] as $elave){
                if($elave == 'slider'){
                    $slider = 1;
                }else{
                    $slider = 0;
                }
            }
        }else{
            $slider = 0;
        }

        $news = $data->update([
            'title' => $title,
            'content' => $content,
            'tags' => $tags,
            'image' => $image_name,
            'cat_id' => $allcategories,
            'cat_name' => $catname['cat_name'],
            'slug' => $slug,
            'slider' => $slider,
            'status' => 1,
            'draft' => 0
        ]);
        $urll = $catname['slug'].'/'.$slug;
        if($request['social'] != null){
            $socials = explode(',', $request['social']);
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
                                'link' => 'https://propress.az/'.$urll,
                                'access_token' => 'EAAFPP838VfYBABdVTg9mgxDTEeJf4Gzo1rA8kIxZB2JDZCHLreXlZCZBWLThypph6fTgDTtq4NgFJ4DAT0xEh69dCVzJY3WyvNw6KXPkwqXjA9V8L0lh1ED5fCfuHsazm3B7XkJgtWcBHJGjJ6M35YbZCZATHnZCGgzFQaJ9ZAz5S68XW41KN6G4528cgj2yB4YZD',

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
                    Twitter::postTweet(['status' => $urll, 'format' => 'json']);
                }elseif($social == 'whatsapp'){

                }elseif($social == 'telegram'){

                }
            }
        }
    }

    public function deleteschedule(Request $request){
        $schedule = Cron::where('id', $request['id'])->first();
        Gallery::where('news_id', $schedule['id'])->delete();
        $schedule->delete();
    }

}
