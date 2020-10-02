@extends('layouts.system.app')
@push('Css')

@endpush

@section('content')
    <div class="wrapper ">
        @include('system.components.sidebar')
        <div class="main-panel">
            @include('system.components.header')
            <div class="content">
                <div class="content">
                    <div class="card">
                        <div class="card-header card-header-rose card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">assignment</i>
                            </div>
                            <h4 class="card-title">Bannerlər</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Name</th>
                                        <th>Şirkət</th>
                                        <th>Başlanğıc</th>
                                        <th>Bitiş</th>
                                        <th class="text-right">Qiymət</th>
                                        <th class="text-right">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>Alex Mike</td>
                                        <td>Design</td>
                                        <td>2010</td>
                                        <td>2010</td>
                                        <td class="text-right">€ 92,144</td>
                                        <td class="td-actions text-right">
                                            <button type="button" rel="tooltip" class="btn btn-info btn-link" data-original-title="" title="">
                                                <i class="material-icons">person</i>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-success btn-link" data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" rel="tooltip" class="btn btn-danger btn-link" data-original-title="" title="">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </td>
                                    </tr>


                                    </tbody>
                                </table>
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

