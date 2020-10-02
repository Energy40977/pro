<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

function title($title){
    $myarray = ['<p>', '<h1>', '<h2>', '<h3>', '<h4>','<h5>','<h6>', '</p>', '</h1>', '</h2>', '</h3>', '</h4>','</h5>','</h6>'];
    $title= str_replace($myarray,'', $title);
    $title= preg_replace('#<a.*?>([^>]*)</a>#i', '$1', $title);
    return $title;
}

function slug($string){
    $result = Str::slug($string);
    return $result;
}
function random($string){
    $result = Str::random($string);
    return $result;
}

function preview($imagelocation, $title, $content, $cat_name){

    return '<html class="no-js" lang="en">
 <head>
  <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Ön izləmə</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="32x32" href="https://propress.az/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://propress.az/favicon/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://propress.az//favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://propress.az//favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://propress.az//favicon/favicon-16x16.png">
    <link rel="manifest" href="https://propress.az/favicon/site.webmanifest">
    <link rel="mask-icon" href="https://propress.az/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="/site/css/css-style.css">
    <link rel="stylesheet" href="/site/css/css-widgets.css">
    <link rel="stylesheet" href="/site/css/css-color.css">
    <link rel="stylesheet" href="/site/css/css-responsive.css">
    <style>
    .alt{
    position:relative;
    top:10px;
    }
    </style>
</head>
<body>

    <div class="main-wrap">

        <header class="main-header header-style-2 mb-40">
        <div class="header-bottom header-sticky background-white text-center">
        <div class="scroll-progress gradient-bg-1"></div>
        <div class="mobile_menu d-lg-none d-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3">
                    <div class="header-logo d-none d-lg-block">
                        <a href="/">
                            <img class="logo-img d-inline" src="/site/images/propresslogo.svg" alt=""></a>
                    </div>
                    <div class="logo-tablet d-md-inline d-lg-none d-none">
                        <a href="/">
                            <img class="logo-img d-inline" src="/site/images/propresslogo.svg" alt=""></a>
                    </div>
                    <div class="logo-mobile d-block d-md-none">
                        <a href="/">
                            <img class="logo-img d-inline" src="/site/images/proicon.svg" alt=""></a>
                    </div>
                </div>

                <div class="col-lg-10 col-md-9 main-header-navigation">
                    <div class="cd-main-header animate-search">
                        <!-- Main-menu -->
                        <div class="main-nav text-left float-lg-left float-md-right">

                            <ul class="mobi-menu d-none menu-3-columns" id="navigation">

                                <li class="menu-item-has-children">
                                    <a href="#">Gündəm</a>
                                    <ul class="sub-menu text-muted font-small">
                                        <li><a href="#">Dünya</a></li>
                                        <li><a href="#">Yerli</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Siyasət</a>
                                    <ul class="sub-menu text-muted font-small">
                                        <li><a href="#">Xarici siyasət</a></li>
                                        <li><a href="#">Azərbaycan</a></li>
                                    </ul>
                                </li>
                                <li class="cat-item cat-item-4"><a href="#">Kriminal</a></li>
                                <li class="cat-item cat-item-5"><a href="#">İqtisadi</a></li>
                                <li class="cat-item cat-item-6"><a href="#">Səhiyyə</a></li>
                                <li class="menu-item-has-children">
                                    <a href="# ">Mədəniyyət</a>
                                    <ul class="sub-menu text-muted font-small">
                                        <li><a href="#">Təhsil</a></li>
                                        <li><a href="#">Turizm</a></li>
                                        <li><a href="#">Mətbəx</a></li>
                                        <li><a href="#">Şou-Biznes</a></li>
                                    </ul>
                                </li>
                                <li class="cat-item cat-item-2"><a href="#">Texnologiya</a></li>
                                <li class="cat-item cat-item-2"><a href="#">İdman</a></li>

                            </ul>
                            <nav>
                                <ul class="main-menu d-none d-lg-inline">
                                    <li class="menu-item-has-children">
                                        <a href="#">Gündəm</a>
                                        <ul class="sub-menu text-muted font-small">
                                            <li><a href="#">Dünya</a></li>
                                            <li><a href="#">Yerli</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="/siyaset">Siyasət</a>
                                        <ul class="sub-menu text-muted font-small">
                                            <li><a href="#">Xarici Siyasət</a></li>
                                            <li><a href="#">Azərbaycan</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">Kriminal</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">İqtisadi</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="#">Səhiyyə</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="/medeniyyet">Mədəniyyət</a>
                                        <ul class="sub-menu text-muted font-small">
                                            <li><a href="#">Təhsil</a></li>
                                            <li><a href="#">Turizm</a></li>
                                            <li><a href="#">Mətbəx</a></li>
                                            <li><a href="#">Şou-Biznes</a></li>
                                        </ul>
                                    </li>

                                    <li class="menu-item">
                                        <a href="#">Texnologiya</a>
                                    </li>

                                    <li class="menu-item">
                                        <a href="#">İdman</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="off-canvas-toggle-cover" id="toogle">
                            <div class="off-canvas-toggle hidden d-inline-block ml-15" id="off-canvas-toggle">
                                <i class="ti-view-grid"></i>
                            </div>
                        </div>
                        <a href="#search" id="th-btnsearch"   class="th-btnsearch cd-search-trigger cd-text-replace"><span><i class="ti-search "></i></span></a>
                        <a href="javascript:void(0);" class="cd-nav-trigger cd-text-replace"><span><i class="ti-search"></i></span></a>

                        <!-- Search -->
                        <!-- Off canvas -->
                    </div>
                </div>

            </div>


        </div>
    </div>
</header>
       <main class="position-relative"><div class="container">

                <div class="row mb-50">
                    <div class="col-lg-8 col-md-12">


                        <div class="entry-header  mb-30 mt-50">
                            <h1 class="post-title mb-30">
                                '.$title.'
                            </h1>
                            <div class="entry-meta meta-1 font-x-small color-grey text-uppercase">
                                <span class="post-by"><a href="/">Propress </a></span>
                                <span class="post-on"><i class="fa fa-clock" aria-hidden="true"></i> '.Carbon::now()->translatedFormat('j F, Y H:i').'</span>
                                <span class="time-reading"><i class="fa fa-eye" aria-hidden="true"></i> 0</span>
                                <span class="entry-meta meta-0 font-small mb-30"><a href="#"><span class="post-cat bg-success color-white">'.$cat_name.'</span></a></span>

                            </div>
                        </div>
                        <img src="'.$imagelocation.'">
                        <div class="single-social-share single-sidebar-share mt-30 ml-15">
                            <ul><li><a class="social-icon facebook-icon text-xs-center" target="_blank" href="#"><i class="ti-facebook alt"></i></a></li>
                                <li><a class="social-icon twitter-icon text-xs-center" target="_blank" href="#"><i class="ti-twitter-alt alt"></i></a></li>
                                <li><a class="social-icon pinterest-icon text-xs-center" target="_blank" href="#"><i class="ti-pinterest alt"></i></a></li>
                                <li><a class="social-icon instagram-icon text-xs-center" target="_blank" href="#"><i class="ti-instagram alt"></i></a></li>
                                <li><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="#"><i class="ti-linkedin alt"></i></a></li>
                                <li><a class="social-icon email-icon text-xs-center" target="_blank" href="#"><i class="ti-email alt"></i></a></li>
                            </ul>
                        </div>
                        <div class="entry-main-content font-large">
                            '.$content.'
                        </div>
                        <div class="overflow-hidden mt-75">
                            <div class="single-social-share text-center">
                                <ul class="d-inline-block list-inline">

                                    <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center" target="_blank" href="#"><i class="ti-facebook alt"></i></a></li>
                                    <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center" target="_blank" href="#"><i class="ti-twitter-alt alt"></i></a></li>
                                    <li class="list-inline-item"><a class="social-icon pinterest-icon text-xs-center" target="_blank" href="#"><i class="ti-pinterest alt"></i></a></li>
                                    <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center" target="_blank" href="#"><i class="ti-instagram alt"></i></a></li>
                                    <li class="list-inline-item"><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="#"><i class="ti-linkedin alt"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!--author box-->

                        <div class="related-posts">
                            <h3 class="mb-30">Oxşar Xəbərlər</h3>
                            <div class="row">
                                <article class="col-lg-4"><div class="background-white border-radius-10 p-10 mb-30">
                                        <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                            <a href="single.html">
                                                <img class="border-radius-15" src="/site/images/blank_post.jpg" alt=""></a>
                                        </div>
                                        <div class="pl-10 pr-10">
                                            <div class="entry-meta mb-15 mt-10">
                                                <a class="entry-meta meta-2" href="#"><span class="post-in text-primary font-x-small">Gündəm</span></a>
                                            </div>
                                            <h5 class="post-title mb-15">
                                                <span class="post-format-icon">
                                                    <ion-icon name="image-outline" role="img" class="md hydrated" aria-label="image outline"></ion-icon></span>
                                                <a href="single.html">Oxşar eyni kateqoriyalı xəbər</a></h5>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                                                <span class="post-by"> <a href="author.html">Propress</a></span>
                                                <span class="post-on">00-00-0000 00-00</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="col-lg-4"><div class="background-white border-radius-10 p-10 mb-30">
                                        <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                            <a href="single.html">
                                                <img class="border-radius-15" src="/site/images/blank_post.jpg" alt=""></a>
                                        </div>
                                        <div class="pl-10 pr-10">
                                            <div class="entry-meta mb-15 mt-10">
                                                <a class="entry-meta meta-2" href="#"><span class="post-in text-primary font-x-small">Gündəm</span></a>
                                            </div>
                                            <h5 class="post-title mb-15">
                                                <span class="post-format-icon">
                                                    <ion-icon name="image-outline" role="img" class="md hydrated" aria-label="image outline"></ion-icon></span>
                                                <a href="single.html">Oxşar eyni kateqoriyalı xəbər</a></h5>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                                                <span class="post-by"> <a href="author.html">Propress</a></span>
                                                <span class="post-on">00-00-0000 00-00</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="col-lg-4"><div class="background-white border-radius-10 p-10 mb-30">
                                        <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                            <a href="single.html">
                                                <img class="border-radius-15" src="/site/images/blank_post.jpg" alt=""></a>
                                        </div>
                                        <div class="pl-10 pr-10">
                                            <div class="entry-meta mb-15 mt-10">
                                                <a class="entry-meta meta-2" href="#"><span class="post-in text-primary font-x-small">Gündəm</span></a>
                                            </div>
                                            <h5 class="post-title mb-15">
                                                <span class="post-format-icon">
                                                    <ion-icon name="image-outline" role="img" class="md hydrated" aria-label="image outline"></ion-icon></span>
                                                <a href="single.html">Oxşar eyni kateqoriyalı xəbər</a></h5>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                                                <span class="post-by"> <a href="author.html">Propress</a></span>
                                                <span class="post-on">00-00-0000 00-00</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                </div>
                        </div>


                    </div>
                    <!--End col-lg-8-->
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
            <p class="text-center"><img src="http://127.0.0.1:8000/site/images/flags/azn.svg" width="30px;" alt=""> Azərbaycan Manatı</p>
                       <table class="table">
                <tr>
                    <td class="text-left"><img src="http://127.0.0.1:8000/site/images/flags/usd.svg" width="30px;" alt=""> USD</td>
                    <td class="text-right">1.69</td>
                </tr>
                <tr>
                    <td><img src="http://127.0.0.1:8000/site/images/flags/eur.svg" width="30px;" alt=""> EUR</td>
                    <td class="text-right">1.92</td>
                </tr>
                <tr>
                    <td><img src="http://127.0.0.1:8000/site/images/flags/gbp.svg" width="30px;" alt=""> GBP</td>
                    <td class="text-right">2.13</td>
                </tr>
                <tr>
                    <td><img src="http://127.0.0.1:8000/site/images/flags/try.svg" width="30px;" alt=""> TRY</td>
                    <td class="text-right">0.25</td>
                </tr>
                <tr>
                    <td><img src="http://127.0.0.1:8000/site/images/flags/rub.svg" width="30px;" alt=""> RUB</td>
                    <td class="text-right">0.02</td>
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
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#" role="tab" aria-controls="profile" aria-selected="false">Bu həftə</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#" role="tab" aria-controls="contact" aria-selected="false">Bu ay</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="post-aside-style-2 mt-25">
                    <ul class="list-post">
                            <li class="mb-30 wow fadeIn animated">
                                <div class="d-flex">
                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                        <a class="color-white" href="/iqtisadi/teststsd-fsdfs-dfs-dfs-dfsdfsfdsdf">
                                            <img src="/site/images/blank_post.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="#">Ən çox oxunan xəbər</a></h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                            <span class="post-by"><a href="/">Propress</a></span>
                                            <span class="post-on">00-00-0000 00:00</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-30 wow fadeIn animated">
                                <div class="d-flex">
                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                        <a class="color-white" href="/iqtisadi/teststsd-fsdfs-dfs-dfs-dfsdfsfdsdf">
                                            <img src="/site/images/blank_post.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="#">Ən çox oxunan xəbər</a></h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                            <span class="post-by"><a href="/">Propress</a></span>
                                            <span class="post-on">00-00-0000 00:00</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-30 wow fadeIn animated">
                                <div class="d-flex">
                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                        <a class="color-white" href="/iqtisadi/teststsd-fsdfs-dfs-dfs-dfsdfsfdsdf">
                                            <img src="/site/images/blank_post.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="#">Ən çox oxunan xəbər</a></h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                            <span class="post-by"><a href="/">Propress</a></span>
                                            <span class="post-on">00-00-0000 00:00</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-30 wow fadeIn animated">
                                <div class="d-flex">
                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                        <a class="color-white" href="/iqtisadi/teststsd-fsdfs-dfs-dfs-dfsdfsfdsdf">
                                            <img src="/site/images/blank_post.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="#">Ən çox oxunan xəbər</a></h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                            <span class="post-by"><a href="/">Propress</a></span>
                                            <span class="post-on">00-00-0000 00:00</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="mb-30 wow fadeIn animated">
                                <div class="d-flex">
                                    <div class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                        <a class="color-white" href="/iqtisadi/teststsd-fsdfs-dfs-dfs-dfsdfsfdsdf">
                                            <img src="/site/images/blank_post.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="#">Ən çox oxunan xəbər</a></h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase">
                                            <span class="post-by"><a href="/">Propress</a></span>
                                            <span class="post-on">00-00-0000 00:00</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                     </ul>
                </div>
            </div>
        </div>

    </div>

    <div class="sidebar-widget mb-50">
        <div class="widget-header mb-30">
            <h5 class="widget-title"><span>Şou Biznes</span></h5>
        </div>
        <div class="post-aside-style-3">
              <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn animated">
                <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                    <a href="#">
                        <img src="/site/images/blank_post.jpg" class="border-radius-15">
                    </a>
                </div>
                <div class="pl-10 pr-10">
                    <h5 class="post-title mb-15"><a href="/sou-biznes/ermenistan-itkilerini-etiraf-etmeye-davam-edir-daha-iki-neferin-adi-aciqlanib">Ermənistan itkilərini etiraf etməyə davam edir, daha iki nəfərin adı açıqlanıb</a></h5>
                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                        <span class="post-in"><a href="/sou-biznes">ŞOU-BİZNES</a></span>
                        <span class="post-by"><a href="/">Propress</a></span>
                        <span class="post-on">00-00-0000 00:00</span>
                    </div>
                </div>
            </article>
            <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn animated">
                <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                    <a href="#">
                        <img src="/site/images/blank_post.jpg" class="border-radius-15">
                    </a>
                </div>
                <div class="pl-10 pr-10">
                    <h5 class="post-title mb-15"><a href="/sou-biznes/ermenistan-itkilerini-etiraf-etmeye-davam-edir-daha-iki-neferin-adi-aciqlanib">Ermənistan itkilərini etiraf etməyə davam edir, daha iki nəfərin adı açıqlanıb</a></h5>
                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                        <span class="post-in"><a href="/sou-biznes">ŞOU-BİZNES</a></span>
                        <span class="post-by"><a href="/">Propress</a></span>
                        <span class="post-on">00-00-0000 00:00</span>
                    </div>
                </div>
            </article>
            <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn animated">
                <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                    <a href="#">
                        <img src="/site/images/blank_post.jpg" class="border-radius-15">
                    </a>
                </div>
                <div class="pl-10 pr-10">
                    <h5 class="post-title mb-15"><a href="/sou-biznes/ermenistan-itkilerini-etiraf-etmeye-davam-edir-daha-iki-neferin-adi-aciqlanib">Ermənistan itkilərini etiraf etməyə davam edir, daha iki nəfərin adı açıqlanıb</a></h5>
                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                        <span class="post-in"><a href="/sou-biznes">ŞOU-BİZNES</a></span>
                        <span class="post-by"><a href="/">Propress</a></span>
                        <span class="post-on">00-00-0000 00:00</span>
                    </div>
                </div>
            </article>
            <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn animated">
                <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                    <a href="#">
                        <img src="/site/images/blank_post.jpg" class="border-radius-15">
                    </a>
                </div>
                <div class="pl-10 pr-10">
                    <h5 class="post-title mb-15"><a href="/sou-biznes/ermenistan-itkilerini-etiraf-etmeye-davam-edir-daha-iki-neferin-adi-aciqlanib">Ermənistan itkilərini etiraf etməyə davam edir, daha iki nəfərin adı açıqlanıb</a></h5>
                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                        <span class="post-in"><a href="/sou-biznes">ŞOU-BİZNES</a></span>
                        <span class="post-by"><a href="/">Propress</a></span>
                        <span class="post-on">00-00-0000 00:00</span>
                    </div>
                </div>
            </article>
            <article class="bg-white border-radius-15 mb-30 p-10 wow fadeIn animated">
                <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                    <a href="#">
                        <img src="/site/images/blank_post.jpg" class="border-radius-15">
                    </a>
                </div>
                <div class="pl-10 pr-10">
                    <h5 class="post-title mb-15"><a href="/sou-biznes/ermenistan-itkilerini-etiraf-etmeye-davam-edir-daha-iki-neferin-adi-aciqlanib">Ermənistan itkilərini etiraf etməyə davam edir, daha iki nəfərin adı açıqlanıb</a></h5>
                    <div class="entry-meta meta-1 font-x-small color-grey float-left text-uppercase mb-10">
                        <span class="post-in"><a href="/sou-biznes">ŞOU-BİZNES</a></span>
                        <span class="post-by"><a href="/">Propress</a></span>
                        <span class="post-on">00-00-0000 00:00</span>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <div class="sidebar-widget p-20 border-radius-15 bg-white widget-latest-comments wow fadeIn animated">
        <div class="widget-header mb-30">

        </div>
        <div class="post-block-list post-module-6">
            <img src="http://127.0.0.1:8000/site/images/banner-2.jpg" alt="">
        </div>
    </div>
</div>

                </div>
                    <!--End col-lg-4-->
                </div>
                <!--End row-->


            </div>
        </main>
        <footer>
         <div class="footer-area pt-50 bg-white">
        <div class="container">
            <div class="row pb-30">
                <div class="col">

                </div>
                <div class="col">

                </div>
                <div class="col">

                </div>
                <div class="col">

                </div>
                <div class="col">

                </div>
                <div class="col d-none d-lg-block">

                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottom aera -->
    <div class="footer-bottom-area bg-white text-muted">
        <div class="container">
            <div class="footer-border pt-20 pb-20">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-12">
                        <div class="footer-copy-right">
                            <p class="font-small text-muted">© 2020, ProPress Bütün hüquqlar qorunur</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End-->
        </footer></div> <!-- Main Wrap End-->
    <div class="dark-mark"></div>

<script src="/site/js/vendor-modernizr-3.5.0.min.js"></script>
<script src="/site/js/vendor-jquery-1.12.4.min.js"></script>
<script src="/site/js/vendor-popper.min.js"></script>
<script src="/site/js/vendor-bootstrap.min.js"></script>
<script src="/site/js/vendor-jquery.slicknav.js"></script>
<script src="/site/js/vendor-owl.carousel.min.js"></script>
<script src="/site/js/vendor-slick.min.js"></script>
<script src="/site/js/vendor-wow.min.js"></script>
<script src="/site/js/vendor-animated.headline.js"></script>
<script src="/site/js/vendor-jquery.magnific-popup.js"></script>
<script src="/site/js/vendor-jquery.ticker.js"></script>
<script src="/site/js/vendor-jquery.scrollUp.min.js"></script>
<script src="/site/js/vendor-jquery.nice-select.min.js"></script>
<script src="/site/js/vendor-jquery.sticky.js"></script>
<script src="/site/js/vendor-perfect-scrollbar.js"></script>
<script src="/site/js/vendor-waypoints.min.js"></script>
<script src="/site/js/vendor-jquery.counterup.min.js"></script>
<script src="/site/js/vendor-jquery.theia.sticky.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.1.2/ionicons.min.js"></script>
<script src="/site/js/advance-search.js"></script>
<script src="/site/js/venobox.min.js"></script>
<!-- UltraNews JS -->
<script src="/site/js/js-main.js"></script>
</body>
</html>

';
}
