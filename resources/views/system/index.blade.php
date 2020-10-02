@extends('layouts.system.app')
@push('Css')

@endpush

@section('content')
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="wrapper ">
       @include('system.components.sidebar')
        <div class="main-panel">
            <!-- Navbar -->
        @include('system.components.header')
            <!-- End Navbar -->
            <div class="content">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card ">
                                    <div class="card-header card-header-success card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons"></i>
                                        </div>
                                        <h4 class="card-title">Ən çox oxunanlar</h4>
                                    </div>
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive table-sales">
                                                    <table class="table">
                                                        <tbody>
                                                        @foreach($chox as $cox)
                                                        <tr>
                                                            <td>
                                                                <div class="img img-responsive">
                                                                    <img width="100px" src="{{asset('/news/images/'.$cox['image'])}}"/>
                                                                </div>
                                                            </td>

                                                            <td class="text-right">
                                                               {{$cox['title']}}
                                                            </td>
                                                            <td class="text-right">
                                                                {{$cox['read']}}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header card-header-warning card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">book</i>
                                        </div>
                                        <p class="card-category">Oxunma (Günlük)</p>
                                        <h3 class="card-title">{{$dayly}}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">local_offer</i> Günlük
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header card-header-rose card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">equalizer</i>
                                        </div>
                                        <p class="card-category">Paylaşılan xəbərlər (Günlük)</p>
                                        <h3 class="card-title">{{$dayly2}}</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">local_offer</i> Günlük
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            @include('system.components.footer')
        </div>
    </div>



@endsection


@push('Js')

@endpush

<script>
    var timer;
    var seconds = 10; // how often should we refresh the DIV?

    function startActivityRefresh() {
        timer = setInterval(function() {
            qaralama();
        }, seconds*1000)
    }
</script>
