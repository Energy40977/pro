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
                <div class="row">
                    <!--  Баннер  -->

                    <!-- sidebar-left -->
                @include('site.components.leftsidebar')
                    <!-- main content -->
                    <div class="col-lg-10 col-md-9 order-1 order-md-2">
                        <div class="row">
                          @include('site.components.content1')
                            @include('site.components.rightsidebar1')
                          @include('site.components.content2')
{{--                            @include('site.components.rightsidebar2')--}}
                        </div>

                        <div class="row">


{{--                            @include('site.components.rightsidebar2')--}}
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
    @if(\Illuminate\Support\Facades\Auth::user())
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>
            $(".remove").click(function(){
                var id = this.id;
                alert(id);
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
    <script>
        function loadBooks(url) {
            $.ajax({
                url: url
            }).done(function (data) {
                $('.overlay').hide();
                $('.books').html(data);
                var x = $('.mynews').offset().top - 100;
                $('html, body').animate({ scrollTop: x }, 'slow');
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
