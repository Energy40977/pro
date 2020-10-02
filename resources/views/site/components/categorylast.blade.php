<div class="loop-list-style-1 books">
    @if(count($searchdata) == 0)
        <h4>Bu kateqoriyada xəbər tapılmadı</h4>
    @else
        @foreach($searchdata as $new)
            @if ($loop->first)
                <article class="first-post p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                    <div class="img-hover-slide border-radius-15 mb-30 position-relative overflow-hidden">
                        <span class="top-right-icon bg-dark"><i class="mdi mdi-flash-on"></i></span>
                        @if(\Illuminate\Support\Facades\Auth::user())
                            <div class="d-flex justify-content-between imghover">
                                <a href="/control/editnews/{{$new['id']}}">Düzəliş et</a>
                                <span id="{{$new['id']}}" class="remove text-white">Sil</span>
                            </div>

                        @endif
                        <a href="/{{Illuminate\Support\Str::slug($new['cat_name'])}}/{{$new['slug']}}">
                            <picture>
                                <source srcset="{{asset('/news/images/'.$new['image'])}}.webp" type="image/webp">
                                <source srcset="{{asset('/news/images/'.$new['image'])}}" type="image/jpeg">
                                <img src="{{asset('/news/images/'.$new['image'])}}.webp" alt="{{$new['title']}}">
                            </picture>
                        </a>
                    </div>
                    <div class="pr-10 pl-10">
                        <div class="entry-meta mb-30">
                            <a class="entry-meta meta-0" href="/{{Illuminate\Support\Str::slug($new['cat_name'])}}">
                                <span class="post-in background2 {{Illuminate\Support\Str::slug($new['cat_name'])}} font-x-small">{{$new['cat_name']}}</span></a>
                            <div class="float-right font-small">
                                <span><span class="mr-10 text-muted"><i class="fa fa-eye" aria-hidden="true"></i></span>{{$new['read']}}</span>
                            </div>
                        </div>
                        <h4 class="post-title mb-20">
                                                    <span class="post-format-icon">
                                                        <ion-icon name="headset-outline"></ion-icon>
                                                    </span>
                            <a href="/{{Illuminate\Support\Str::slug($new['cat_name'])}}/{{$new['slug']}}">{!! $new['title'] !!}</a></h4>
                        <div class="mb-20 overflow-hidden">
                            <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                <span class="post-by"><a href="/">{{$new['author']}}</a></span>
                                <span class="post-on">{{$new['created_at']->translatedFormat('j F, Y H:i')}}</span>
                            </div>

                        </div>
                    </div>
                </article>
            @else
                <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                    <div class="d-flex">
                        <div class="post-thumb d-flex mr-15 border-radius-15 img-hover-scale">
                            <a class="color-white" href="/{{Illuminate\Support\Str::slug($new['cat_name'])}}/{{$new['slug']}}">
                                <picture>
                                    <source srcset="{{asset('/news/images/'.$new['image'])}}.webp" type="image/webp">
                                    <source srcset="{{asset('/news/images/'.$new['image'])}}" type="image/jpeg">
                                    <img src="{{asset('/news/images/'.$new['image'])}}.webp" class="border-radius-15" alt="{{$new['title']}}">
                                </picture>
                            </a>
                        </div>
                        <div class="post-content media-body">
                            <div class="entry-meta mb-15 mt-10">
                                <a class="entry-meta meta-2" href="/{{Illuminate\Support\Str::slug($new['cat_name'])}}">
                                    <span class="post-in text-danger font-x-small">{{$new['cat_name']}}</span>
                                </a>
                            </div>
                            <h5 class="post-title mb-15 text-limit-2-row">
                                                        <span class="post-format-icon">
                                                            <ion-icon name="videocam-outline"></ion-icon>
                                                        </span>
                                <a href="/{{Illuminate\Support\Str::slug($new['cat_name'])}}/{{$new['slug']}}">{!! $new['title'] !!}</a>
                            </h5>
                            <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                <span class="post-by">By <a href="/">{{$new['author']}}</a></span>
                                <span class="post-on">{{$new['created_at']->translatedFormat('j F, Y H:i')}}</span>
                                <span class="time-reading">{{$new['read']}} oxunma</span>
                            </div>
                        </div>
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::user())
                        <div class="d-flex justify-content-between imghover">
                            <a href="/control/editnews/{{$new['id']}}">Düzəliş et</a>
                            <span id="{{$new['id']}}" class="remove text-white">Sil</span>
                        </div>

                    @endif
                </article>
            @endif

        @endforeach
        <div class="pagination-area mb-30">
            {!! $searchdata->onEachSide(1)->render() !!}
        </div>
    @endif

</div>

