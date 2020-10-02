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
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header card-header-primary card-header-icon">
                                        <div class="card-icon">
                                            <i class="material-icons">assignment</i>
                                        </div>
                                        <h4 class="card-title">Qaralamalar</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="toolbar">
                                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                                        </div>
                                        <div class="material-datatables">
                                            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th>Başlıq</th>
                                                    <th>Yazar</th>
                                                    <th>Oxunma</th>
                                                    <th>Tarix</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th>Başlıq</th>
                                                    <th>Yazar</th>
                                                    <th>Oxunma</th>
                                                    <th class="disabled-sorting">Tarix</th>
                                                    <th class="disabled-sorting text-right">Actions</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                @foreach($drafts as $draft)
                                                    <tr>
                                                        <td>{!!$draft['title']!!}</td>
                                                        <td>{{$draft['author']}}</td>
                                                        <td>{{$draft['read']}}</td>
                                                        <td>{{$draft['created_at']->translatedFormat('j F, Y H:i')}}</td>
                                                        <td class="text-right">

                                                            <a href="/control/editdrafts/{{$draft['id']}}" id="{{$draft['id']}}" class="btn btn-link btn-warning btn-just-icon edit"><i class="material-icons">dvr</i></a>
                                                            <a href="#" id="{{$draft['id']}}" class="btn btn-link btn-danger btn-just-icon remove"><i class="material-icons">close</i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- end content-->
                                </div>
                                <!--  end card  -->
                            </div>
                            <!-- end col-md-12 -->
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
            @include('system.components.footer')
        </div>
    </div>


@endsection


@push('Js')
    <script src="{{asset('/system/assets/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "order": [[ 3, "desc" ]],
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Axtar",
                }
            });

            var table = $('#datatables').DataTable();

            // Edit record

            // Delete a record
            table.on('click', '.remove', function(e) {
                var id = this.id;
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
                            url:'/control/deletedraft',
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
            });

        });
    </script>
@endpush

