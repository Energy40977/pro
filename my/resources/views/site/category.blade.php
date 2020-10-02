@extends('layouts.site.app')

@push('meta')
    <meta name="title" content="Propress - {{$cat['cat_name']}}">
    <meta name="description" content="Propress - Profesional Xəbər Portalı">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://propress.az/">
    <meta property="og:title" content="Propress - {{$cat['cat_name']}}">
    <meta property="og:description" content="Propress - Profesional Xəbər Portalı">
    <meta property="og:image" content="https://propress.az/site/images/proicon.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://propress.az/">
    <meta property="twitter:title" content="Propress - {{$cat['cat_name']}}">
    <meta property="twitter:description" content="Propress - Profesional Xəbər Portalı">
    <meta property="twitter:image" content="https://propress.az/site/images/proicon.png">

@endpush

@push('Css')
@endpush

@section('content')

    <div class="main-wrap">
        <!--Offcanvas sidebar-->
    @include('site.components.lenta')
    <!-- Main Header -->
    @include('site.components.header')

    <!-- Main Wrap Start -->
        <main class="position-relative">
            <div class="archive-header text-center mb-50">
                <div class="container">
                    <h2>
                        <span class="{{$cat['slug']}}">{{$cat['cat_name']}}</span>
                        <span class="post-count">{{$post}} Xəbər</span>
                    </h2>
                    <div class="breadcrumb">
                        <a href="/" rel="nofollow">Ana səhifə</a>
                        <span></span>
                        {{$cat['cat_name']}}
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <!-- sidebar-left -->
                @include('site.components.leftsidebar')
                <!-- main content -->
                    <div class="col-lg-10 col-md-9 order-1 order-md-2">

                        <div class="row">
                            @include('site.components.catpage')
                            @include('site.components.rightsidebar1')
                            @include('site.components.content2')
                        </div>

                        <div class="row">



                        </div>
                        <div class="row mb-50 mt-15">
                            {{--                            @include('site.components.blog')--}}
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Footer Start-->
        @include('site.components.footer')
    </div> <!-- Main Wrap End-->
    <div class="dark-mark"></div>
@endsection

@push('Js')
    <script>
        function loadBooks(url) {
            $.ajax({
                url: url
            }).done(function (data) {
                $('.overlay').hide();
                $('.books').html(data);
            }).fail(function () {

            });
        }
        $(function () {
            $('body').on('click', '.pagination a', function (e) {
                e.preventDefault();
                $('.overlay').show();
                var url = $(this).attr('href');
                window.history.pushState("", "", url);

                loadBooks(url);
            });

        });
    </script>


@endpush
