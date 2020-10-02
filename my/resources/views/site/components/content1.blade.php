<div class="col-lg-8 col-md-12">
    <!-- Featured posts -->
    <div class="featured-post mb-50">
        <h4 class="widget-title mb-30">Editorun seçimi</h4>
        <div class="featured-slider-1 border-radius-10">
            <div class="featured-slider-1-items">
                @foreach($slider as $slide)
                <div class="slider-single p-10">
                    <div class="img-hover-slide border-radius-15 mb-30 position-relative overflow-hidden">
                        <span class="top-right-icon bg-dark"><i class="mdi mdi-camera-alt"></i></span>
                        @if(\Illuminate\Support\Facades\Auth::user())
                            <div class="d-flex justify-content-between imghover">
                                <a href="/control/editnews/{{$news['id']}}">Düzəliş et</a>
                                <span id="{{$slide['id']}}" class="remove text-white">Sil</span>
                            </div>
                        @endif
                        <a href="/{{Illuminate\Support\Str::slug($slide['cat_name'])}}/{{$slide['slug']}}">
                            <picture>
                                <source srcset="{{asset('/news/images/'.$slide['image'])}}.webp" type="image/webp">
                                <source srcset="{{asset('/news/images/'.$slide['image'])}}" type="image/jpeg">
                                <img src="{{asset('/news/images/'.$slide['image'])}}.webp" alt="{{$slide['title']}}">
                            </picture>
                        </a>
                    </div>
                    <div class="pr-10 pl-10">
                        <div class="entry-meta mb-30">
                            <a class="entry-meta meta-0" href="/{{Illuminate\Support\Str::slug($slide['cat_name'])}}"><span class="post-in background2 {{Illuminate\Support\Str::slug($slide['cat_name'])}} font-x-small">{{$slide['cat_name']}}</span></a>
                            <div class="float-right font-small">
                                <span><span class="mr-10 text-muted"><i class="fa fa-eye" aria-hidden="true"></i></span>{{$slide['read']}}</span>

                            </div>
                        </div>
                        <h4 class="post-title mb-20"><a href="/{{Illuminate\Support\Str::slug($slide['cat_name'])}}/{{$slide['slug']}}">{!! $slide['title'] !!}</a></h4>
                        <div class="mb-20 overflow-hidden">
                            <div class="entry-meta meta-2 float-left">
                                <a class="float-left mr-10 author-img" href="/" tabindex="0"><img src="{{asset('/site/images/proicon2.png')}}" alt=""></a>
                                <a href="/" tabindex="0"><span class="author-name text-grey mt-15">Propress</span></a>
                            </div>
                            <div class="float-right">
                                <a href="/{{Illuminate\Support\Str::slug($slide['cat_name'])}}/{{$slide['slug']}}" class="read-more"><span class="mr-10"><i class="fa fa-thumbtack" aria-hidden="true"></i></span>Editorun seçimi</a>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </div>
    <!--Videos-->

    <div class="latest-post mynews">
        <div class="widget-header position-relative mb-30">
            <div class="row">
                <div class="col-7">
                    <h4 class="widget-title mb-0 "><span>Son Xəbərlər</span></h4>
                </div>

                <div class="col-5 text-right">
                    <h6 class="font-medium pr-15">
                        <a class="text-muted font-small" href="#">Hamısını gör</a>
                    </h6>
                </div>
            </div>
        </div>
      @include('site.components.lastposts')
    </div>
    <div class="row">
        <div class="col-12 text-center mt-50 mb-50">
            <a href="#">
                <img class="border-radius-10 d-inline" src="{{asset('site/images/imgs-ads.jpg')}}" alt="post-slider">
            </a>
        </div>
    </div>
</div>
