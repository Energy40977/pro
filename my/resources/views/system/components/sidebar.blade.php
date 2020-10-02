<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{asset('system/assets/img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="#" class="simple-text logo-normal">
            ProPress
        </a></div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active  ">
                <a class="nav-link" href="/control">
                    <i class="material-icons">dashboard</i>
                    <p>Ana səhifə</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/control/category">
                    <i class="material-icons">layers</i>
                    <p>Kateqoriyalar</p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link collapsed" data-toggle="collapse" href="#componentsExamples" aria-expanded="false">
                    <i class="material-icons">explore</i>
                    <p> Xəbərlər
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="componentsExamples" style="">
                    <ul class="nav">

                        <li class="nav-item ">
                            <a class="nav-link" href="/control/news">
                                <span class="sidebar-mini"> XS </span>
                                <span class="sidebar-normal"> Xəbər Siyahısı </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" data-toggle="modal" data-target="#noticeModal" href="/control/create-news">
                                <span class="sidebar-mini"> YX </span>
                                <span class="sidebar-normal"> Yeni Xəbər </span>

                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/control/drafts">
                    <i class="material-icons">layers</i>
                    <p>Qaralamalar</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="/control/schedules">
                    <i class="material-icons">alarm</i>
                    <p>Zamanlanmış xəbərlər</p>
                </a>
            </li>
            <li class="nav-item ">
{{--                <a class="nav-link" href="/control/banners">--}}
                <a class="nav-link" href="#">
                    <i class="material-icons">library_books</i>
                    <p>Bannerlər</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link collapsed" data-toggle="collapse" href="#componentsExamples2" aria-expanded="false">
                    <i class="material-icons">share</i>
                    <p> Sosial Şəbəkələr
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="componentsExamples2" style="">
                    <ul class="nav">

                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> F </span>
                                <span class="sidebar-normal"> Facebook </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> İ </span>
                                <span class="sidebar-normal"> İnstagram </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link collapsed" data-toggle="collapse" href="#componentsExamples3" aria-expanded="false">
                    <i class="material-icons">build</i>
                    <p> Tənzimləmələr
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="componentsExamples3" style="">
                    <ul class="nav">

                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> ST </span>
                                <span class="sidebar-normal"> Sayt Tənzimləmələri </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> G </span>
                                <span class="sidebar-normal"> Güvənlik </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="modal fade" id="noticeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Xəbər növünü seçin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <button type="button" class="btn btn-info ml-auto mr-auto" data-toggle="modal" data-target="#noticeModal22" data-dismiss="modal">LİNKDƏN ÇƏK<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 72.6563px; top: 28px; background-color: rgb(255, 255, 255); transform: scale(14.6621);"></div></div></button>
                    <a  href="/control/create-news" class="btn btn-primary ml-auto mr-auto" >YENİSİNİ YAZ<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 72.6563px; top: 28px; background-color: rgb(255, 255, 255); transform: scale(14.6621);"></div></div></a>

                </div>
            </div>
            <div class="modal-footer justify-content-center">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="noticeModal22" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-notice">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Linki daxil edin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">close</i>
                </button>
            </div>
            <div class="modal-body">
                <form id="urlinsert">
                    @csrf
                    <div class="form-group bmd-form-group">
                        <label for="exampleEmail" class="bmd-label-floating">Url adresini daxil edin</label>
                        <input type="url" name="url" class="form-control" id="exampleEmail">
                    </div>
                    <div class="form-group bmd-form-group mt-3">
                        <select class="selectpicker form-control" name="category" data-size="15" data-style="btn btn-primary " title="Kateqoriya" tabindex="-98">
                            @include('system.components.altcat')
                        </select>
                    </div>
                </form>
                <div class="row ml-auto mr-auto">

                    <button type="button" id="urlcek" class="btn btn-danger ml-auto mr-auto" ><img src="{{asset('/system/assets/img/ss.gif')}}" id="bd" style="display:none;" alt="" width="16px"><span id="bb">Yayımla</span><div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 72.6563px; top: 28px; background-color: rgb(255, 255, 255); transform: scale(14.6621);"></div></div></button>
                </div>

            </div>
            <div class="modal-footer justify-content-center">
            </div>
        </div>
    </div>
</div>

