<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Primary Meta Tags -->
    <title>ProPress - Peşəkar Xəbər Yayımı</title>
    @stack('meta')
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
 
    <!-- UltraNews CSS  -->
    <link rel="stylesheet" href="{{asset('site/css/css-style.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/css-widgets.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/css-color.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/css-responsive.css')}}">

    <style>
        #style-4::-webkit-scrollbar-track
        {

            background-color: #F5F5F5;
        }

        #style-4::-webkit-scrollbar
        {
            width: 5px;
            background: linear-gradient(to right,rgba(226,70,92,1) 0%,rgba(254,65,65,1) 50%,rgba(255,185,87,1) 100%);
        }

        #style-4::-webkit-scrollbar-thumb
        {
            background: linear-gradient(to right,rgba(226,70,92,1) 0%,rgba(254,65,65,1) 50%,rgba(255,185,87,1) 100%);

        }
        .demo img{
            width:300px;
        }
        @media (min-width: 576px) {
            .demo img{
                width:300px;
            }
        }

        @media(min-width: 768px){
            .demo img{
                display: none;
            }
        }

        @media(min-width: 992px){
            .demo img{
                width:300px;
            }
        }
        @media (min-width: 1200px) {
            .demo img{
                width:400px;
            }
        }
        .mybtn{background: none;border:none;}
        .mybtn:hover{background: none;border:none; color:red}
        .imghover{
            position: absolute;
            width:100%;
            background: rgba(210, 22, 22, 0.56);
            padding: 5px 10px 5px 5px;
            z-index: 999;
        }
        .imghover a{
            color:white;

            text-decoration: none !important;
        }
        .customlist{
            border-top:1px dashed #ddd;
            padding-top: 10px;
        }
        .mycat{
            border:1px solid #000000;
            padding:2px 2px 2px 2px;
            color:black;
            font-size:10px;
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-171705445-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-171705445-1');
    </script>

</head>

<body>
{{--<!-- Preloader Start -->--}}
{{--<div id="preloader-active">--}}
{{--    <div class="preloader d-flex align-items-center justify-content-center">--}}
{{--        <div class="preloader-inner position-relative">--}}
{{--            <div class="text-center">--}}
{{--                <img class="jump mb-50" src="{{asset('site/images/imgs-loading.svg')}}" alt="">--}}
{{--                <h6>Yüklənir</h6>--}}
{{--                <div class="loader">--}}
{{--                    <div class="bar bar1"></div>--}}
{{--                    <div class="bar bar2"></div>--}}
{{--                    <div class="bar bar3"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@stack('Css')


@yield('content')
<script src="{{asset('site/js/vendor-modernizr-3.5.0.min.js')}}"></script>
<script src="{{asset('site/js/vendor-jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('site/js/vendor-popper.min.js')}}"></script>
<script src="{{asset('site/js/vendor-bootstrap.min.js')}}"></script>
<script src="{{asset('site/js/vendor-jquery.slicknav.js')}}"></script>
<script src="{{asset('site/js/vendor-owl.carousel.min.js')}}"></script>
<script src="{{asset('site/js/vendor-slick.min.js')}}"></script>
<script src="{{asset('site/js/vendor-wow.min.js')}}"></script>
<script src="{{asset('site/js/vendor-animated.headline.js')}}"></script>
<script src="{{asset('site/js/vendor-jquery.magnific-popup.js')}}"></script>
<script src="{{asset('site/js/vendor-jquery.ticker.js')}}"></script>
<script src="{{asset('site/js/vendor-jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('site/js/vendor-jquery.nice-select.min.js')}}"></script>
<script src="{{asset('site/js/vendor-jquery.sticky.js')}}"></script>
<script src="{{asset('site/js/vendor-perfect-scrollbar.js')}}"></script>
<script src="{{asset('site/js/vendor-waypoints.min.js')}}"></script>
<script src="{{asset('site/js/vendor-jquery.counterup.min.js')}}"></script>
<script src="{{asset('site/js/vendor-jquery.theia.sticky.js')}}"></script>
<script src="{{asset('site/js/advance-search.js')}}"></script>
<script src="{{asset('site/js/venobox.min.js')}}"></script>



<!-- UltraNews JS -->
<script src="{{asset('site/js/js-main.js')}}"></script>
<script>
    $( document ).ready(function() {
        $('#off-canvas-toggle').on('click', function() {
            $('body').toggleClass("canvas-opened");
        });

        $('.dark-mark').on('click', function() {
            $('body').removeClass("canvas-opened");
        });
        $('.off-canvas-close').on('click', function() {
            $('body').removeClass("canvas-opened");
        });
    });

</script>
<script>
    $("#th-btnsearch").click(function(){
        $("#mobilelogo").hide();
        $("#cttog").hide();
        $(".slicknav_icon").hide();

    })
</script>
<script>
    $('#searchform').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
</script>
<script nomodule="">
    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script>
<script type="text/javascript"
    	src="//news.mediametrics.ru/cgi-bin/b.fcgi?ac=b&m=js&n=4&id=DivID" 
    	charset="UTF-8">
</script>
@stack('Js')
</body>

</html>


