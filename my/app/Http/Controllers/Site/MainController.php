<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Schedule;
use Carbon\Carbon;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;
use Jorenvh\Share\Share;


class MainController extends Controller
{
    public function index(Request $request){


        Carbon::setLocale('az');
        $cats = Category::all();
        $news = News::orderBy('created_at', 'DESC')->simplePaginate(3);
        $slider = News::where('slider', 1)->orderBy('created_at', 'DESC')->limit(4)->get();

        if ($request->ajax()) {
            sleep(1);
            return view('site.components.lastposts', compact('news','slider'));
        }
        return view ('site.index', compact('news','slider'));
    }
    public function category(Request $request){

        Carbon::setLocale('az');
        $cat = Category::where('slug', $request['cat_id'])->first();
        if(isset($cat)){
            $searchdata = News::where('cat_id', 'like', "%{$cat['id']}%")->orderBy('id', 'desc')->paginate(10);
            $post = News::where('cat_id', $cat['id'])->count();
            if ($request->ajax()) {
                return view('site.components.categorylast', compact('searchdata', 'cat', 'post'));
            }

            return view ('site.category', compact('searchdata','cat','post'));
        }else{
            return redirect()->route('a404');
        }

    }
    public function single($cat, $slug){
        Carbon::setLocale('az');
        $catn = Category::where('slug', $cat)->first();
        $news = News::where('slug', $slug)->first();

        if(isset($news)){
            $news->update(['read' => $news['read']+1]);
            $newsa = $news['content'];
            $gallery = Gallery::where('news_id', $news['id'])->get();
            $share = \Share::page('https://www.propress.az/'.slug($news['cat_name']).'/'.$news['slug'])->facebook()->twitter()->whatsapp()->telegram()->linkedin();

            if (strpos($newsa, 'https://www.facebook.com/') !== false) {
                if (strpos($newsa, 'video') !== false) {
                    $video_url = preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $newsa, $matchn);
                    $newsa = str_replace('<oembed url=', '<div class="fb-video" data-width="800" data-href="'.$matchn[0][0].'"data-allowfullscreen="true">', $newsa);
                    $newsa = str_replace('watch?v=', 'embed/', $newsa);
                    $newsa = str_replace('</oembed>', '</div>', $newsa);
                }
            }

            if (strpos($newsa, '<oembed') !== false) {
                $newsa = str_replace('<oembed url=', '<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item"  allowfullscreen src=', $newsa);
                $newsa = str_replace('watch?v=', 'embed/', $newsa);
                $newsa = str_replace('</oembed>', '</iframe></div>', $newsa);
            }

            $relateds = News::where('cat_id', $catn['id'])->where('id', '!=' , $news['id'])->orderBy('created_at', 'Desc')->take(3)->get();

            return view('site.single', compact('news', 'relateds', 'newsa', 'gallery', 'share', 'catn'));
        }else{
            return redirect()->route('a404');
        }

    }
    public function search(Request $request){
        $sresults = News::where('title', 'like', "%{$request['search']}%")->limit(10)->get();
        if(isset($sresults)){
            $val = $request['search'];
            return view('site.components.search', compact('sresults','val'));
        }else{
            return redirect()->route('a404');
        }

    }

    public function preview(){
        return view('site.components.preview');
    }

    public function a404(){
        return view('site.a404');
}

}
