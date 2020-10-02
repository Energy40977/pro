@extends('layouts.site.app')
@push('meta')
    <meta name="title" content="Meta Tags — Preview, Edit and Generate">
    <meta name="description" content="With Meta Tags you can edit and experiment with your content then preview how your webpage will look on Google, Facebook, Twitter and more!">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://propress.az/">
    <meta property="og:title" content="Meta Tags — Preview, Edit and Generate">
    <meta property="og:description" content="With Meta Tags you can edit and experiment with your content then preview how your webpage will look on Google, Facebook, Twitter and more!">
    <meta property="og:image" content="https://propress.az/site/images/proicon.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://propress.az/">
    <meta property="twitter:title" content="Meta Tags — Preview, Edit and Generate">
    <meta property="twitter:description" content="With Meta Tags you can edit and experiment with your content then preview how your webpage will look on Google, Facebook, Twitter and more!">
    <meta property="twitter:image" content="https://propress.az/site/images/proicon.png">

@endpush
@push('Css')
    <style>
        .pagination{
            text-align: center !important;
            padding-left: 45% !important;
        }
        @media(max-width: 550px){
            .pagination{
                text-align: center !important;
                padding-left: 40% !important;
            }
        }
    </style>
@endpush

@section('content')

    <div class="main-wrap">
        <!--Offcanvas sidebar-->
    @include('site.components.lenta')
    <!-- Main Header -->
    @include('site.components.header')

    <!-- Main Wrap Start -->
        <main class="position-relative">
            <div class="container">
                <div class="row mt-80">
                    <div class="col-12">
                        <div class="content-404 text-center mb-30">
                            <h1 class="mb-30">404</h1>
                            <p>Axtardığınız səhifə tapılmadı</p>
                            <p class="text-muted"><a href="#" id="geri"> Geri qayıt</a></p>

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
        $("#geri").click(function(){
            history.go(-1);
        })
    </script>
@endpush
