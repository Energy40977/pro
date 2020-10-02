@extends('layouts.site.app')
@push('meta')

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
    <link rel="stylesheet" href="{{asset('system/assets/css/ckeditor.css')}}">
@endpush

@section('content')


    <div class="main-wrap">

        @include('site.components.header')
        <main class="position-relative">
            <div class="container" id="prebody">


            </div>
        </main><!-- Footer Start-->

    </div> <!-- Main Wrap End-->

@endsection

@push('Js')


@endpush
