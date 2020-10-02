@extends('layouts.site.app')
@push('meta')
    <meta name="title" content="{{strip_tags($news['title'])}}">
    <meta name="description" content="{{strip_tags($news['content'])}}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://propress.az/{{Illuminate\Support\Str::slug($news['cat_name'])}}/{{$news['slug']}}">
    <meta property="og:title" content="{{strip_tags($news['title'])}}">
    <meta property="og:description" content="{{strip_tags($news['content'])}}">
    <meta property="og:image" content="https://propress.az/news/images/{{$news['image']}}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://propress.az/{{Illuminate\Support\Str::slug($news['cat_name'])}}/{{$news['slug']}}">
    <meta property="twitter:title" content="{{strip_tags($news['title'])}}">
    <meta property="twitter:description" content="{{strip_tags($news['content'])}}">
    <meta property="twitter:image" content="https://propress.az/news/images/{{$news['image']}}">

@endpush
@push('Css')
    <link rel="stylesheet" href="{{asset('site/css/venobox.min.css')}}">

    <style>
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }

        #myCarousel .carousel-indicators {
            position: static;
            margin-top:20px;
        }

        #myCarousel .carousel-indicators > li {
            width:100px;
        }

        #myCarousel .carousel-indicators li img {
            display: block;
            opacity: 0.5;
        }

        #myCarousel .carousel-indicators li.active img {
            opacity: 1;
        }

        #myCarousel .carousel-indicators li:hover img {
            opacity: 0.75;
        }
        .image-style-align-right {
            float: right;
            margin-left: var(--ck-image-style-spacing);
        }
        .image-style-align-left {
            float: left;
            margin-right: var(--ck-image-style-spacing);
        }

    </style>

    <div id="fb-root"></div>
    <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>

@endpush

@section('content')


    <div class="main-wrap">


        @include('site.components.lenta')
        @include('site.components.header')
        <main class="position-relative">
            <div class="container">
                <div class="row mb-50">
                    <div class="col-lg-8 col-md-12">

                        <div class="entry-header  mb-30 mt-50">

                            <h1 class="post-title mb-30">
                                {!! $news['title'] !!}
                            </h1>
                            <div class="entry-meta meta-1 font-x-small color-grey text-uppercase">
                                <span class="post-by"><a href="/">{{$news['author']}} </a></span>
                                <span class="post-on"><i class="fa fa-clock" aria-hidden="true"></i> {{$news['created_at']->translatedFormat('j F, Y H:i')}}T</span>
                                <span class="time-reading"><i class="fa fa-eye" aria-hidden="true"></i> {{$news['read']}}</span>
                                <span class="entry-meta meta-0 font-small mb-30"><a href="/{{$catn['slug']}}"><span class="post-cat bg-success color-white">{{$catn['cat_name']}}</span></a></span>

                            </div>

                        </div>
                         @if(\Illuminate\Support\Facades\Auth::user())
                            <div class="d-flex justify-content-between imghover">
                                <a href="/control/editnews/{{$news['id']}}">Düzəliş et</a>
                                <span id="{{$news['id']}}" class="remove text-white">Sil</span>
                            </div>
                        @endif

                        <figure class="single-thumnail mb-30">
                            <div class="featured-slider-1 border-radius-10">
                                <div class="featured-slider-1-items">
                                    <div class="slider-single">
                                        <a class="venobox" data-gall="" href="{{asset('/news/images/'.$news['image'])}}"  data-lightbox="">
                                            <picture>
                                                <source srcset="{{asset('/news/images/'.$news['image'])}}.webp" type="image/webp">
                                                <source srcset="{{asset('/news/images/'.$news['image'])}}" type="image/jpeg">
                                                <img src="{{asset('/news/images/'.$news['image'])}}.webp"   alt="{{$news['title']}}">
                                            </picture>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </figure>

                        <div class="single-social-share single-sidebar-share mt-30 ml-15">
                            <ul>
                                @foreach($share as $sha => $ss)
                                    <li>
                                        <a class="social-icon {{$sha}}-icon text-xs-center" target="_blank" href="{{$ss}}">
                                            @if($sha == 'whatsapp')
                                                <img src="{{asset('/site/images/whatsapp.svg')}}" width="16px" alt="whatsapp">
                                            @elseif($sha == 'telegramMe')
                                                <img src="{{asset('/site/images/telegram.svg')}}" width="16px" alt="whatsapp">
                                            @else
                                                <i class="ti-{{$sha}}"></i>
                                            @endif
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="entry-main-content font-large mt-20">
                            {!! $newsa !!}
                        </div>
                            @if(count($gallery) > 0)
                             <div class="entry-main-content font-large mt-20">
                                <div class="col-md-12" id="middiv" style="background-color: rgba(255, 255, 255, 0.1)">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel" align="center">
                                        <!-- Wrapper for slides -->

                                        <div class="carousel-inner">
                                            <?php $c = 0; ?>
                                            @foreach($gallery as $gal)

                                                <div class="carousel-item <?php if($c == 0){echo 'active';} ?>">
                                                    <a class="venobox" data-gall="myGallery" href="{{$gal['image']}}"  data-lightbox="gallery">
                                                        <img src="{{$gal['image']}}" alt="Los Angeles">
                                                    </a>
                                                </div>
                                                <?php $c++; ?>
                                            @endforeach
                                        </div>

                                        <!-- Left and right controls -->
                                        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </a>

                                        <!-- Indicators -->
                                        <ol class="carousel-indicators list-inline">
                                            <?php $c = 0; ?>
                                            @foreach($gallery as $gal)
                                                <li class="list-inline-item <?php if($c == 0){echo 'active';} ?>">
                                                    <a id="carousel-selector-{{$c}}" class="selected" data-slide-to="{{$c}}" data-target="#myCarousel">
                                                        <img src="{{$gal['image']}}" class="img-fluid">
                                                    </a>
                                                </li>
                                                <?php $c++; ?>
                                            @endforeach


                                        </ol>
                                    </div>
                                </div>
                                 </div>
                            @endif

                        <div class="overflow-hidden mt-75">
                            <div class="single-social-share text-center">
                                <ul class="d-inline-block list-inline">
                                    <li class="list-inline-item"><span class="font-small text-muted"><i class="ti-sharethis mr-5"></i>  Bu xəbəri sosial şəbəkələrdə paylaş:   </span></li>
                                    {!! $share !!}
                                </ul>
                            </div>
                        </div>
                        <!--author box-->
                                        <div class="author-bio border-radius-10 bg-white p-30 mb-40">
                                            <div class="author-image mb-30">
                                                <a href="author.html"><img src="{{asset('site/images/proicon2.png')}}" alt="" class="avatar"></a></div>
                                            <div class="author-info">
                                                <h5 class="text-muted" style="text-transform:capitalize; !important!">
                                                    <span class="mr-15 mb-15 text-danger">Xəbərin müəllifi</span>

                                               </h5>
                                                <h3><span class="vcard author">
                                                    <span class="fn"><a href="author.html" title="Posts by Robert" rel="author">ProPress</a></span>
                                                    </span>
                                                    </h3>
                                                <div class="author-description">   </div>
                                                <div class="author-social">

                                                    <ul class="author-social-icons">
                                                        <li class="author-social-link-facebook"><a href="https://www.facebook.com/propress.az/" target="_blank"><i class="ti-facebook"></i></a></li>
                                                        <li class="author-social-link-twitter"><a href="https://twitter.com/ProPress_az" target="_blank"><i class="ti-twitter-alt"></i></a></li>
                                                        <li class="author-social-link-instagram"><a href="https://www.instagram.com/propress_media/" target="_blank"><i class="ti-instagram"></i></a></li>

                                                    </ul></div>
                                            </div>
                                        </div>
                    <!--related posts-->
                        <div class="related-posts">

                            <h3 class="mb-30">Oxşar xəbərlər</h3>
                            <div class="row">
                                @foreach($relateds as $rela)
                                    <article class="col-lg-4"><div class="background-white border-radius-10 p-10 mb-30">
                                            <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">

                                                <a href="/{{Illuminate\Support\Str::slug($rela['cat_name'])}}/{{$rela['slug']}}">
                                                    <picture>
                                                        <source srcset="{{asset('/news/images/'.$rela['image'])}}.webp" type="image/webp">
                                                        <source srcset="{{asset('/news/images/'.$rela['image'])}}" type="image/jpeg">
                                                        <img src="{{asset('/news/images/'.$rela['image'])}}.webp" class="img img-fluid" alt="{{$rela['title']}}">
                                                    </picture>
                                                </a>
                                            </div>
                                            <div class="pl-10 pr-10">
                                                <div class="entry-meta mb-15 mt-10">
                                                    <a class="entry-meta meta-2" href="/{{Illuminate\Support\Str::slug($rela['cat_name'])}}"><span class="post-in text-primary font-x-small">{{$rela['cat_name']}}</span></a>
                                                </div>
                                                <h5 class="post-title mb-15">
                                                <span class="post-format-icon">
                                                    <ion-icon name="image-outline" role="img" class="md hydrated" aria-label="image outline"></ion-icon></span>
                                                    <a href="/{{Illuminate\Support\Str::slug($rela['cat_name'])}}/{{$rela['slug']}}">{!! $rela['title'] !!}</a></h5>
                                                <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                                                    <span class="post-by">By <a href="/">{{$rela['author']}}</a></span>
                                                    <span class="post-on">{{$rela['created_at']->translatedFormat('j F, Y H:i')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>
                        </div>
                        <!--Comments-->

                    </div>
                    <!--End col-lg-8-->
                @include('site.components.rightsidebar1')
                <!--End col-lg-4-->
                </div>
                <!--End row-->
                <div class="row">
                    <div class="col-12 text-center mb-50">
                        <a href="#">
                            <img class="border-radius-10 d-inline" src="/site/images/imgs-ads-3.png" alt=""></a>
                    </div>
                </div>
               <div class="row mb-50 mt-15">
                          <div id="DivID"></div>
                        </div>
            </div>
        </main><!-- Footer Start-->
        @include('site.components.footer')
    </div> <!-- Main Wrap End-->

@endsection

@push('Js')
    <script src="{{ asset('js/share.js') }}"></script>
    <script>
        $('.venobox').venobox({
            arrowsColor : '#B6B6B6',
            autoplay : false,
            bgcolor: '#fff',
            border: '0',
            closeBackground : '#161617',
            closeColor : "#d2d2d2",
            framewidth: '',
            frameheight: '',
            gallItems: false,
            infinigall: false,
            htmlClose : '&times;',
            htmlNext : '<span>Next</span>',
            htmlPrev : '<span>Prev</span>',
            numeratio: false,
            numerationBackground : '#161617',
            numerationColor : '#d2d2d2',
            numerationPosition : 'top',
            overlayClose: true,
            overlayColor : 'rgba(23,23,23,0.85)',

            // available: 'rotating-plane' | 'double-bounce' | 'wave' | 'wandering-cubes' | 'spinner-pulse' | 'chasing-dots' | 'three-bounce' | 'circle' | 'cube-<a href="https://www.jqueryscript.net/tags.php?/grid/">grid</a>' | 'fading-circle' | 'folding-cube'
            spinner : 'rotating-plane',
            spinColor : '#d2d2d2',
            titleattr: 'title',
            titleBackground: '#161617',
            titleColor: '#d2d2d2',
            titlePosition : 'top'

        });
    </script>
    <script>
        $('#owl2').owlCarousel({
            loop:true,
            startPosition: 1,
            nav: true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                },
                600:{
                    items:3,
                    nav:true
                },
                1000:{
                    items:5,
                    nav:true
                }
            }
        });
    </script>

@if(\Illuminate\Support\Facades\Auth::user())
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>
            $(".remove").click(function(){

                Swal.fire({
                    title: 'Əminsiniz?',
                    text: "Xəbər silinəcək",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sil',
                    cancelButtonText: "Bağla",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method:'post',
                            url:'/control/deletenews',
                            data:{_token:'{{@csrf_token()}}', id:id},
                            success:function () {

                            }
                        });
                        Swal.fire(
                            'Silindi!',
                            '',
                            'success'
                        )
                        window.location.href = "/";
                    }
                })

            });
        </script>
    @endif
@endpush
