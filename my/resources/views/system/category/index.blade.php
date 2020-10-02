@extends('layouts.system.app')
@push('Css')
    <link href="{{asset('/system/assets/css/toastr.min.css')}}" rel="stylesheet" />
    <style>
        .alert{
            padding: 5px 5px !important;
        }
    </style>
@endpush
@section('content')
    <div class="wrapper ">
        @include('system.components.sidebar')
        <div class="main-panel">
            @include('system.components.header')
            <div class="content">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-icon card-header-rose">
                                        <div class="card-icon ">
                                            <i class="material-icons">assignment</i>
                                        </div>
                                        <div class="row">
                                            <h4 class="card-title ">Kateqoriyalar</h4>
                                            <button class="btn btn-success btn-round ml-auto" data-toggle="modal" data-target="#myModal">
                                                YENİ
                                                <div class="ripple-container"></div></button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" id="catall">
                                                <tbody>
                                                @foreach($cats as $cc)
                                                    <tr>
                                                        <td>{{$cc['cat_name']}}</td>
                                                        <td>{{$cc['main_name']}}</td>
                                                        <td class="td-actions text-right">
                                                            <button type="button" id="modal{{$cc['id']}}" rel="tooltip" data-toggle="modal" data-target="#myModal{{$cc['id']}}" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                                                <i class="material-icons">edit</i>
                                                            </button>
                                                            <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm sata2" id="{{$cc['id']}}" data-original-title="Remove">
                                                                <i class="material-icons">close</i>
                                                            </button>
                                                        </td>
                                                        <div class="modal fade" id="myModal{{$cc['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Düzəliş et</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                                            <i class="material-icons">clear</i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="post" action="#" id="edit{{$cc['id']}}">
                                                                            @csrf
                                                                            <input type="hidden" name="id" value="{{$cc['id']}}">
                                                                            <div class="form-group bmd-form-group">
                                                                                <label for="exampleEmail" class="bmd-label-floating">Kateqoriya adı</label>
                                                                                <input type="text" name="cat_name" value="{{$cc['cat_name']}}" class="form-control" required id="exampleEmail">
                                                                            </div>
                                                                            <div class="form-group bmd-form-group">
                                                                               <span class="text-muted">Alt Kateqoriya</span>
                                                                                <select class="form-control"  name="main" data-size="7" id="{{$cc['id']}}" data-style="btn btn-primary" title="Alt Kateqoriya" >
                                                                                    <option value="0">Ana Kateqoriya</option>
                                                                                    @include('system.components.altcat')
                                                                                </select>

                                                                            </div>
                                                                            <div class="form-group bmd-form-group">
                                                                                <span class="bmd-form-group is-filled" style="width:100%">
                                                                                    <input type="text" name="tags" value="{{$cc['tags']}}" required placeholder="Etiketlər" width="100" class="form-control tagsinput" data-role="tagsinput" data-color="info" style="display: none;">
                                                                                </span>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" id="{{$cc['id']}}" class="btn btn-link btn-success sata">Düzəliş et</button>
                                                                        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Bağla</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
            </div>
            @include('system.components.footer')
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Yeni Kateqoriya</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" id="errors" style="display:none">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <form method="post" id="yenicat" action="#">
                        @csrf
                        <div class="form-group bmd-form-group">
                            <label for="exampleEmail" class="bmd-label-floating">Kateqoriya adı</label>
                            <input type="text" name="cat_name" class="form-control" required id="exampleEmail">
                        </div>
                        <div class="form-group bmd-form-group">
                            <select class="selectpicker form-control" required name="main" data-size="7" data-style="btn btn-primary " title="Alt Kateqoriya" tabindex="-98">
                                <option value="0">Ana Kateqoriya</option>
                                @include('system.components.altcat')
                            </select>
                        </div>
                        <div class="form-group bmd-form-group">
                        <span class="bmd-form-group is-filled" style="width:100%">
                            <input type="text" name="tags" required placeholder="Etiketlər" width="100" class="form-control tagsinput" data-role="tagsinput" data-color="info" style="display: none;">
                        </span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="yeni" class="btn btn-link btn-success">Yayımla</button>
                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Bağla</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('Js')
    <script src="{{asset('/system/assets/js/plugins/toastr.min.js')}}"></script>
    <script>
        $("#yeni").click(function(){
            var data = $("#yenicat").serialize();
            document.getElementById('errors').style.display = 'none';
            $("#errors").html('');
            $.ajax({
                url:'/control/newcat',
                data: data,
                method: 'post',
                success:function(request) {
                    $('#myModal').modal('toggle');
                    toastr["success"]("", "Kateqoriya uğurla yaradıldı")
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    location.reload();
                },
                error: function (request, status, error) {
                    json = $.parseJSON(request.responseText);
                    $.each(json.errors, function(key, value){
                        $('.alert-danger').show();
                        $('.alert-danger').append('<p>'+value+'</p>');
                    });
                    $("#result").html('');
                }
            });
        })
    </script>
    <script>
        $(".sata").click(function(){
            var data = this.id;
            var content = $("#edit"+ data).serialize();
            $.ajax({
                url:'/control/editcat',
                data: content,
                method: 'post',
                success:function(request){
                    $('#myModal'+ data).modal('toggle');
                    toastr["success"]("", "Kateqoriyaya uğurla düzəliş edildi")
                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    location.reload();
                },
                error: function (request, status, error) {
                    json = $.parseJSON(request.responseText);
                    $.each(json.errors, function(key, value){
                        $('.alert-danger').show();
                        $('.alert-danger').append('<p>'+value+'</p>');
                    });
                    $("#result").html('');
                }
            });
        })
    </script>
    <script>
        $(".sata2").click(function(){
            var id = this.id;
            Swal.fire({
                title: 'Əminsiniz?',
                text: "Kateqoriya silinəcək",
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
                        url:'/control/deletecat',
                        data:{_token:'{{@csrf_token()}}', id:id},
                        success:function () {

                        }
                    });
                    Swal.fire(
                        'Silindi!',
                        '',
                        'success'
                    )
                    location.reload();
                }
            })

        })
    </script>
@endpush
