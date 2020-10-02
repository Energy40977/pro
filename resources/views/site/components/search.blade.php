<div  id="style-4" class="text-center" style="overflow-x: auto; max-height: 350px;">

@if(isset($sresults))
@if(count($sresults) == 0)
    <h4>Axtardığınız xəbər tapılmadı</h4>
    @else
            @foreach($sresults as $result)
                <article class="p-10 background-white border-radius-10 mb-30" style="visibility: visible; animation-name: fadeIn;">
                    <div class="d-md-flex d-block">
                        <div class="post-thumb post-thumb-big d-flex mr-15 border-radius-15 img-hover-scale demo text-center">
                            <a class="color-white text-center" href="/{{Illuminate\Support\Str::slug($result['cat_name'])}}/{{$result['slug']}}">
                                <picture>
                                    <source srcset="{{asset('/news/images/'.$result['image'])}}.webp" type="image/webp">
                                    <source srcset="{{asset('/news/images/'.$result['image'])}}" type="image/jpeg">
                                    <img src="{{asset('/news/images/'.$result['image'])}}.webp" class="border-radius-15 img img-fluid" alt="{{$result['title']}}">
                                </picture>
                            </a>
                        </div>
                        <div class="post-content media-body text-left">
                            <div class="entry-meta mb-15 mt-10">
                                <a class="entry-meta meta-2" href="/{{Illuminate\Support\Str::slug($result['cat_name'])}}"><span class="post-in {{Illuminate\Support\Str::slug($result['cat_name'])}} font-x-small">{{$result['cat_name']}}</span></a>
                            </div>
                            <h5 class="post-title mb-15">
                                <a href="/{{Illuminate\Support\Str::slug($result['cat_name'])}}/{{$result['slug']}}">{!! $result['title'] !!}</a></h5>
                            <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mt-10">
                                <span class="post-by"><a href="/">{{$result['author']}}</a></span>
                                <span class="post-on">{{$result['created_at']->translatedFormat('j F, Y H:i')}}</span>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach


    @endif
@else

@endif
</div>


