@extends('layouts.system.app')
@push('Css')

    <style>
        .modal-dialog-full-width {
            width: 100% !important;
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            max-width:none !important;
        }
        input[type="checkbox"][id^="myCheckbox"] {
            display: none;
        }


        .x1{
            list-style-type: none;
        }
        .x2{
            display: inline-block;
        }
        input[type=file]{
            display: inline;
        }

        #image_preview{
            padding: 10px;
        }
        #image_preview img{
            width: 200px;
            padding: 5px;
        }
        .card-wizard .input-group .form-group{
            width: 100% !important;
        }
    </style>


@endpush
@section('content')
    <div class="wrapper ">
        @include('system.components.sidebar')
        <div class="main-panel">
            <!-- Navbar -->
            @include('system.components.header')
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wizard-container">
                                <div class="card card-wizard" data-color="rose" id="wizardProfile">
                                    <form method="post" action="#" id="news" name="news" enctype="multipart/form-data" target="newStuff">

                                        @csrf
                                        <input type="hidden" name="id" value="{{$news['id']}}">
                                        <input type="hidden" name="edit" value="{{$news['id']}}">
                                        <div class="card-header text-center">
                                            <h3 class="card-title">
                                                Xəbər hazırla
                                            </h3>
                                            <h5 class="card-description"></h5>
                                        </div>
                                        <div class="wizard-navigation">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#account" data-toggle="tab" role="tab">
                                                        Xəbər
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#about" data-toggle="tab" role="tab">
                                                        ŞƏKİL
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#datav" data-toggle="tab" role="tab">
                                                        Əlavə
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="account">

                                                    <div class="row justify-content-center">
                                                        <div class="col-lg-10 mt-3">
                                                            <h4 class="text-center">Başlıq</h4>
                                                            <div class="input-group form-control-lg">
                                                                <div class="form-group bmd-form-group">
                                                                    <label for="editor2"></label><textarea  id="editor2" cols="80" rows="50">{{$news['title']}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-10 mt-3">
                                                            <h4 class="text-center">Xəbər</h4>
                                                            <div class="input-group form-control-lg">
                                                                <div class="form-group bmd-form-group">
                                                                    <label for="editor"></label><textarea  id="editor" cols="80" rows="50">{{$news['content']}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="about">
                                                    <h5 class="info-text"> Hündürlüyü enindən böyük olan şəkilləri istifadə etməyin.</h5>
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-12">
                                                            <div class="fileinput fileinput-new text-center" data-provides="fileinput" style="width:100%">
                                                                <div class="fileinput-new thumbnail">
                                                                    <img src="{{asset('news/images/'.$news['image'])}}"  alt="...">
                                                                </div>
                                                                <div id="imgprv" class="fileinput-preview fileinput-exists thumbnail"></div>
                                                                <div>
                                                        <span class="btn btn-rose btn-round btn-file">
                                                            <span class="fileinput-new">SEÇ</span>
                                                            <span class="fileinput-exists">DƏYİŞ</span>
                                                            <input type="file" id="image" name="image">
                                                        </span>
                                                                    <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Sil</a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="col-md-9">
                                                                <div class="form-check">
                                                                    <label class="form-check-label" onclick="secildi()">
                                                                        <input class="form-check-input" id="logosec" name="watermark" type="checkbox" value=""> Şəkilə watermark əlavə et
                                                                        <span class="form-check-sign">
                                                                  <span class="check"></span>
                                                                </span>
                                                                    </label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="datav">

                                                    <div class="row justify-content-center">
                                                        <div class="col-12">

                                                            <div class="input-group form-control-lg">
                                                                <div class="form-group bmd-form-group mt-3">
                                                                    <label for="kats">Kateqoriya seçin</label>

                                                                    <select class="selectpicker form-control" name="category" data-size="15" data-style="btn btn-primary" id="kats" title="Kateqoriya" tabindex="-98">
                                                                        <?php $cats = \App\Models\Category::all(); ?>
                                                                        @foreach($cats as $cat)
                                                                            <option value="{{$cat['id']}}" <?php if($cat['id'] == $news['cat_id']){echo 'selected';} ?>>{{$cat['cat_name']}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12">

                                                            <div class="input-group form-control-lg">
                                                                <div class="form-group bmd-form-group mt-50">
                                                                    <label for="elavekat">Əlavə kateqoriyalar (istəyə bağlı)</label>
                                                                    <select class="selectpicker" data-style="select-with-transition" id="elavekat" name="elavekat[]" multiple title="Əlavə Kateqoriyalar" data-size="7" >

                                                                        <?php $cats = \App\Models\Category::all(); ?>
                                                                        <?php $bcat = explode(',', $news['cat_id']); unset($bcat[0]) ?>
                                                                        <option value="slider" <?php if(in_array("slider" ,$bcat)){echo 'selected';} ?>>Slider</option>
                                                                        @foreach($cats as $cat)
                                                                            <option value="{{$cat['id']}}" <?php if(in_array($cat['id'] ,$bcat)){echo 'selected';} ?>>{{$cat['cat_name']}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 mt-12">
                                                            <div class="input-group form-control-lg">
                                                                <div class="form-group bmd-form-group">
                                                                    <label for="elavekat">Əlavə etiketləri daxil edin (İstəyə bağlı)</label>
                                                                    <input type="text" class="tagsinput" id="tags" name="tags" placeholder="Daxil edin" value="{{$news['tags']}}" data-role="tagsinput" data-color="primary">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                    </form>
                                    <div class="form-check" style="position: relative; top:25px;">
                                        <label class="form-check-label" onclick="secildi()">
                                            <input class="form-check-input" id="logosecc" type="checkbox" <?php if(count($gallery) > 0){echo "checked";} ?> value=""> Galereya əlavə et
                                            <span class="form-check-sign">
                                                                  <span class="check"></span>
                                                                </span>
                                        </label>
                                    </div>
                                    <div class="logovur mt-50" id="logovur" style="<?php if(count($gallery) == 0){echo "display:none;";} ?> position:relative;top:25px">
                                        <form action="{{ route('images.upload') }}" method="post" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="news_id" value="{{$news['id']}}">
                                            <div class="row">
                                                <div class="col-sm-10">
                                                    <input type="file" id="uploadFile" class="form-control mr-auto" name="uploadFile[]" multiple/>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="submit" class="btn btn-success"  name='submitImage' value="Yüklə"/>
                                                </div>
                                            </div>
                                        </form>
                                        <div id="image_preview"></div>
                                        <div class="card" id="galereya" style="<?php if(count($gallery) == 0){echo "display:none;";} ?>">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-shopping" id="gal">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center"></th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @include('system.news.gallery')
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12" style="position: relative; top:25px;">
                                        <div class="row x1">
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox"  value="facebook">
                                                <div class="icon">
                                                    <i class="fa fa-facebook"></i>
                                                </div>
                                            </div>

                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox"  value="twitter">
                                                <div class="icon">
                                                    <i class="fa fa-twitter"></i>
                                                </div>

                                            </div>
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox"  value="whatsapp">
                                                <div class="icon">
                                                    <i class="fa fa-whatsapp"></i>
                                                </div>

                                            </div>
                                            <div class="choice" data-toggle="wizard-checkbox">
                                                <input type="checkbox" value="telegram">
                                                <div class="icon">
                                                    <i class="fa fa-telegram"></i>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <div class="mr-auto">
                                    <input type="button" class="btn btn-previous btn-fill btn-default btn-wd disabled" name="previous" value="Əvvələ">
                                </div>

                                <div class="ml-auto">
                                    <input type="button" class="btn btn-next btn-fill btn-rose btn-wd" name="next" value="Sonrakı">
                                    <button type="submit" id="yayimla" class="btn btn-finish btn-fill btn-rose btn-wd" ><img src="{{asset('/system/assets/img/ss.gif')}}" id="bdx" style="display:none;" alt="" width="16px"><span id="bbx">Yayımla</span><div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 72.6563px; top: 28px; background-color: rgb(255, 255, 255); transform: scale(14.6621);"></div></div></button>

                                </div>

                                <div class="clearfix"></div>
                            </div>
                            <div class="card-footer">
                                <div class="ml-auto">
                                    <button type="submit" id="preview" class="btn btn-fill btn-primary">Ön İzləmə<div class="ripple-container"></div></button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- end col-md-12 -->
            </div>
            <!-- end row -->
        </div>
    </div>


    </div>

@endsection
@push('Js')
    <script src="{{asset('system/assets/js/plugins/locale/az.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
    <script src="{{asset('system/assets/js/ckeditor/build/ckeditor.js')}}"></script>
    <script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
    <script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>
    <script>
        function secildi() {

            if (document.getElementById('logosecc').checked){
                $("#logovur").show();
            }else{
                $("#logovur").hide();
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            // Initialise the wizard
            demo.initMaterialWizard();
            setTimeout(function() {
                $('.card.card-wizard').addClass('active');
            }, 600);
        });
    </script>
    <script type="text/javascript">

        $("#uploadFile").change(function(){

            $('#image_preview').html("");

            var total_file=document.getElementById("uploadFile").files.length;

            for(var i=0;i<total_file;i++)

            {
                $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
            }

        });

        $('form').ajaxForm(function(response)
        {
            toastr["success"]("", "Şəkil Yükləndi")
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
            $("#gal").load(location.href+" #gal>*","");


        });

    </script>
    <script>
        function Deletegal(id){
            var pid = id;

            $.ajax({
                method:'post',
                url: '{{Route('delgal')}}',
                data: {_token: '{{@csrf_token()}}', id:pid},
                success:function(response){
                    toastr["success"]("", "Şəkil Silindi")
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
                    $("#gal").load(location.href+" #gal>*","");
                }
            })
        }
    </script>
    <script>
        var myEditor;

        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                ckfinder: {
                    uploadUrl: "{{route('upload', ['_token' => @csrf_token()])}}",

                },

                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'underline',
                        'link',
                        'bulletedList',
                        'numberedList',
                        'fontSize',
                        '|',

                        'imageUpload',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'undo',
                        'redo',
                        'CKFinder'
                    ]
                },
                language: 'az',
                image: {
                    toolbar: [ 'imageTextAlternative', '|', 'imageStyle:alignLeft', 'imageStyle:full', 'imageStyle:alignRight' ],
                    styles: [
                        'full',
                        'alignLeft',
                        'alignRight'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells',
                        'tableCellProperties',
                        'tableProperties'
                    ]
                },
                licenseKey: 'EC2C-Y492-D2AA-BDRA-54HZ-HQE5-UMWJ',
                removeProviders: [ 'youtube', 'twitter' ]
            } )
            .then( editor => {
                console.log( 'Editor was initialized', editor );
                myEditor = editor;
            } )
            .catch( handleError );

        function handleError( error ) {
            console.error( 'Oops, something gone wrong!' );
            console.error( 'Please, report the following error in the https://github.com/ckeditor/ckeditor5 with the build id and the error stack trace:' );
            console.warn( 'Build id: ee8pt75bjq9h-j92fsm4dkgfc' );
            console.error( error );
        }
    </script>
    <script>
        var myEditor2;

        ClassicEditor
            .create( document.querySelector( '#editor2' ), {
                toolbar: {
                    items: [
                        'fontColor',
                        'fontBackgroundColor',
                        'highlight',
                        'bold'
                    ]
                },
                language: 'az',
                licenseKey: 'EC2C-Y492-D2AA-BDRA-54HZ-HQE5-UMWJ',
            } )
            .then( editor => {
                console.log( 'Editor was initialized', editor );
                myEditor2 = editor;
            } )
            .catch( handleError );

        function handleError( error ) {
            console.error( 'Oops, something gone wrong!' );
            console.error( 'Please, report the following error in the https://github.com/ckeditor/ckeditor5 with the build id and the error stack trace:' );
            console.warn( 'Build id: ee8pt75bjq9h-j92fsm4dkgfc' );
            console.error( error );
        }
    </script>
    <script>
        $("#yayimla").click(function(){
            var socials = jQuery(".x1 input[type=checkbox]:checked").map(function(idx, ele) {
                return ele.value.indexOf('500') > -1 ? '4' : ele.value;
            }).get();

            var content = myEditor.getData();
            var title = myEditor2.getData();
            var form = document.forms.namedItem("news");
            var formData = new FormData(form);
            formData.append('content', content);
            formData.append('title', title);
            formData.append('social', socials);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                method:'post',
                url:'/control/editschedules',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $("#bbx").hide();
                    $("#bdx").show();
                },
                success:function(){
                    toastr["success"]("", "Xəbər Yayımlandı")
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
                    window.location.href = "/control";

                },error:function(){
                    $("#bbx").show();
                    $("#bdx").hide();
                    toastr["error"]("", "Xəta baş verdi")
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
                }
            });
        })
    </script>
    <script>
        $("#preview").click(function(){
            var content = myEditor.getData()
            var title = myEditor2.getData();
            var form = document.forms.namedItem("news");
            var formData = new FormData(form);
            formData.append('content', content);
            formData.append('title', title);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                method:'post',
                url:'/control/preview',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success:function(data){
                    var link = "http://127.0.0.1:8000/preview/1/1";
                    var win = window.open(link,'newStuff');
                    win.document.write(data);
                },error:function(){
                    toastr["error"]("", "Xəta baş verdi")
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
                }
            });
        })
    </script>
    <script>
        $("#draft").click(function(){
            var content = myEditor.getData()
            var form = document.forms.namedItem("news");
            var formData = new FormData(form);
            formData.append('content', content);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                method:'post',
                url:'/control/todraft',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,

                beforeSend: function() {
                    $("#bbd").hide();
                    $("#bdd").show();
                },
                success:function(){
                    toastr["success"]("", "Qaralama yadda saxlanıldı")
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
                    window.location.href = "/control";

                },error:function(){
                    $("#bbd").show();
                    $("#bdd").hide();
                    toastr["error"]("", "Xəta baş verdi")
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
                }
            });
        })
    </script>
    <script>

        $('.datetimepicker').datetimepicker({
            format :"YYYY-MM-DD HH:mm:ss",
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',

            },

        });
    </script>
@endpush
