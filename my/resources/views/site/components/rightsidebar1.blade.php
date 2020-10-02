<div class="col-lg-4 col-md-12 sidebar-right">
    <div class="sidebar-widget mb-30">
        <div class="widget-header position-relative mb-30">
            <div class="row">
                <div class="col-7">
                    <h4 class="widget-title mb-0"><span>Məzənnə</span></h4>
                </div>
                <div class="col-5 text-right">

                </div>
            </div>
        </div>
        <div class="post-aside-style-1 border-radius-10 p-20 bg-white">
            <p class="text-center"><img src="{{asset('/site/images/flags/azn.svg')}}" width="30px;" alt=""> Azərbaycan Manatı</p>
           <?php $mezenne = \App\Models\CurrencyData::where('id', 1)->first(); ?>
            <table class="table">
                <tr>
                    <td class="text-left"><img src="{{asset('/site/images/flags/usd.svg')}}" width="30px;" alt=""> USD</td>
                    <td class="text-right">{{number_format($mezenne['USD'], 2)}}</td>
                </tr>
                <tr>
                    <td><img src="{{asset('/site/images/flags/eur.svg')}}" width="30px;" alt=""> EUR</td>
                    <td class="text-right">{{number_format($mezenne['EUR'], 2)}}</td>
                </tr>
                <tr>
                    <td><img src="{{asset('/site/images/flags/gbp.svg')}}" width="30px;" alt=""> GBP</td>
                    <td class="text-right">{{number_format($mezenne['GBR'], 2)}}</td>
                </tr>
                <tr>
                    <td><img src="{{asset('/site/images/flags/try.svg')}}" width="30px;" alt=""> TRY</td>
                    <td class="text-right">{{number_format($mezenne['TRY'], 2)}}</td>
                </tr>
                <tr>
                    <td><img src="{{asset('/site/images/flags/rub.svg')}}" width="30px;" alt=""> RUB</td>
                    <td class="text-right">{{number_format($mezenne['RUB'], 2)}}</td>
                </tr>
            </table>
        </div>
    </div>
    <!--Post aside style 1-->
    <div class="sidebar-widget mb-30">
        <div class="widget-header position-relative mb-30">
            <div class="row">
                <div class="col-7">
                    <h4 class="widget-title mb-0"><span>Çox oxunanlar</span></h4>
                </div>
                <div class="col-5 text-right">
                    <h6 class="font-medium pr-15">
                        <a class="text-muted font-small" href="#">Hamısına bax</a>
                    </h6>
                </div>
            </div>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Bugün</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Bu həftə</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Bu ay</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="post-aside-style-2 mt-25">
                    <ul class="list-post">
                        <?php use Carbon\Carbon; $dayly = \App\Models\News::whereDate('created_at', Carbon::today())->orderBy('read', 'desc')->take(5)->get();  ?>
                        @foreach($dayly as $day)
                            <li class="mb-30 wow fadeIn animated">
                                <div class="d-flex">
                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                        <a class="color-white" href="/{{Illuminate\Support\Str::slug($day['cat_name'])}}/{{$day['slug']}}">
                                            <img src="{{asset('/news/images/'.$day['image'])}}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="/{{Illuminate\Support\Str::slug($day['cat_name'])}}/{{$day['slug']}}">{!! $day['title'] !!}</a></h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                            <span class="post-by"><a href="/">{{$day['author']}}</a></span>
                                            <span class="post-on">{{$day['created_at']->translatedFormat('j F, Y H:i')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="post-aside-style-2 mt-25">
                    <ul class="list-post">
                    <?php  $weekly = \App\Models\News::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->orderBy('read', 'desc')->take(5)->get(); ?>
                    @foreach($weekly as $week)
                            <li class="mb-30 wow fadeIn animated">
                                <div class="d-flex">
                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                        <a class="color-white" href="/{{Illuminate\Support\Str::slug($week['cat_name'])}}/{{$week['slug']}}">
                                            <img src="{{asset('/news/images/'.$week['image'])}}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="/{{Illuminate\Support\Str::slug($week['cat_name'])}}/{{$week['slug']}}">{!! $week['title'] !!}</a></h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                            <span class="post-by"><a href="/">{{$week['author']}}</a></span>
                                            <span class="post-on">{{$week['created_at']->translatedFormat('j F, Y H:i')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="post-aside-style-2 mt-25">
                    <ul class="list-post">
                        <?php $mountly = \App\Models\News::whereMonth('created_at', Carbon::now()->month)->orderBy('read', 'desc')->take(5)->get(); ?>
                        @foreach($mountly as $mount)
                            <li class="mb-30 wow fadeIn animated">
                                <div class="d-flex">
                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                        <a class="color-white" href="/{{Illuminate\Support\Str::slug($mount['cat_name'])}}/{{$mount['slug']}}">
                                            <img src="{{asset('/news/images/'.$mount['image'])}}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="/{{Illuminate\Support\Str::slug($mount['cat_name'])}}/{{$mount['slug']}}">{!! $mount['title'] !!}</a></h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                            <span class="post-by"><a href="/">{{$mount['author']}}</a></span>
                                            <span class="post-on">{{$mount['created_at']->translatedFormat('j F, Y H:i')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!--Top authors-->

    <!--Newsletter-->

    <!--Post aside style 2-->


    <div class="sidebar-widget mb-50">
        <div class="widget-header mb-30">
            <h5 class="widget-title"><span>Şou Biznes</span></h5>
        </div>
        <div class="post-aside-style-3">
         <?php $sou = \App\Models\News::where('cat_id', 10)->orderBy('created_at', 'DESC')->limit(4)->get(); ?>
          @foreach($sou as $souu)
            <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn animated">
                <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                    <a href="/{{Illuminate\Support\Str::slug($souu['cat_name'])}}/{{$souu['slug']}}">
                        <picture>
                            <source srcset="{{asset('/news/images/'.$souu['image'])}}.webp" type="image/webp">
                            <source srcset="{{asset('/news/images/'.$souu['image'])}}" type="image/jpeg">
                            <img src="{{asset('/news/images/'.$souu['image'])}}.webp" class="border-radius-15" alt="{{$souu['title']}}">
                        </picture>
                    </a>
                </div>
                <div class="pl-10 pr-10">
                    <h5 class="post-title mb-15"><a href="/{{Illuminate\Support\Str::slug($souu['cat_name'])}}/{{$souu['slug']}}">{!! $souu['title'] !!}</a></h5>
                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                        <span class="post-in"><a href="/{{Illuminate\Support\Str::slug($souu['cat_name'])}}">{{$souu['cat_name']}}</a></span>
                        <span class="post-by"><a href="/">{{$souu['author']}}</a></span>
                        <span class="post-on">{{$souu['created_at']->translatedFormat('j F, Y H:i')}}</span>
                    </div>
                </div>
            </article>
          @endforeach
        </div>
    </div>
    <div class="sidebar-widget p-20 border-radius-15 bg-white widget-latest-comments wow fadeIn animated">
        <div class="widget-header mb-30">

        </div>
        <div class="post-block-list post-module-6">
            <img src="{{asset('site/images/banner-2.jpg')}}" alt="">
        </div>
    </div>
</div>
