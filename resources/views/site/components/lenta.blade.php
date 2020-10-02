<aside id="sidebar-wrapper" class="custom-scrollbar offcanvas-sidebar position-right">
    <button class="off-canvas-close"><i class="ti-close"></i></button>
    <div class="sidebar-inner">
        <!--lastest post-->
        <div class="sidebar-widget mb-50">
            <div class="widget-header mb-30">
                <h5 class="widget-title">Xəbər Lenti</h5>
            </div>
            <div class="post-aside-style-2">
                <ul class="list-post">
                    <?php $allnews = \App\Models\News::where('cat_name', '!=', 'ŞOU-BİZNES')->orderBy('created_at','DESC')->limit(5)->get();  ?>
                    @foreach($allnews as $nn)
                            <li class="mb-30 customlist">
                                <div class="d-flex">
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 "><a href="/{{Illuminate\Support\Str::slug($nn['cat_name'])}}/{{$nn['slug']}}">{!! $nn['title'] !!}</a></h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-left">
                                           <span class="post-on">{{$nn['created_at']->translatedFormat('j F, Y · H:i')}}</span>
                                            <span class="post-on mycat">{{$nn['cat_name']}}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                </ul>
            </div>
        </div>
        <!--Categories-->

        <!--Ads-->
        <div class="sidebar-widget widget-ads mb-30">
            <div class="widget-header tags-close mb-20">
                <h5 class="widget-title mt-5">Burada sizin reklamınız ola bilər</h5>
            </div>
            <a href="{{asset('site/images/imgs-news-1.jpg')}}" class="play-video" data-animate="zoomIn" data-duration="1.5s" data-delay="0.1s">
                <img class="border-radius-10" src="{{asset('site/images/imgs-ads-1.jpg')}}" alt="">
            </a>
        </div>
    </div>
</aside>
