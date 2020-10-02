<style>

</style>
<header class="main-header header-style-2 mb-40">
    <div class="header-bottom header-sticky background-white text-center">
        <div class="scroll-progress gradient-bg-1"></div>
        <div class="mobile_menu d-lg-none d-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3">
                    <div class="header-logo d-none d-lg-block">
                        <a href="/">
                            <img class="logo-img d-inline" src="{{asset('site/images/propresslogo.svg')}}" alt=""></a>
                    </div>
                    <div class="logo-tablet d-md-inline d-lg-none d-none">
                        <a href="/">
                            <img class="logo-img d-inline" src="{{asset('site/images/propresslogo.svg')}}" alt=""></a>
                    </div>
                    <div class="logo-mobile  d-md-none" id="mobilelogo" >
                        <a href="/">
                            <img class="logo-img d-inline" src="{{asset('site/images/propresslogo.svg')}}" alt=""></a>
                    </div>
                </div>

                <div class="col-lg-10 col-md-9 main-header-navigation">
                    <div class="cd-main-header animate-search">
                    <!-- Main-menu -->
                        <div class="main-nav text-left float-lg-left float-md-right">

                            <ul class="mobi-menu d-none menu-3-columns" id="navigation">

                                <li class="menu-item-has-children">
                                    <a href="/gundem">Gündəm</a>
                                    <ul class="sub-menu text-muted font-small">
                                        <li><a href="/dunya">Dünya</a></li>
                                        <li><a href="/yerli">Yerli</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="/siyaset">Siyasət</a>
                                    <ul class="sub-menu text-muted font-small">
                                        <li><a href="/xarici-siyaset">Xarici siyasət</a></li>
                                        <li><a href="/azerbaycan">Azərbaycan</a></li>
                                    </ul>
                                </li>
                                <li class="cat-item cat-item-4"><a href="/kriminal">Kriminal</a></li>
                                <li class="cat-item cat-item-5"><a href="/iqtisadi">İqtisadi</a></li>
                                <li class="cat-item cat-item-6"><a href="/sehiyye">Səhiyyə</a></li>
                                <li class="menu-item-has-children">
                                    <a href="/medeniyyet ">Mədəniyyət</a>
                                    <ul class="sub-menu text-muted font-small">
                                        <li><a href="/tehsil">Təhsil</a></li>
                                        <li><a href="/turizm">Turizm</a></li>
                                        <li><a href="/metbex">Mətbəx</a></li>
                                        <li><a href="/sou-biznes">Şou-Biznes</a></li>
                                    </ul>
                                </li>
                                <li class="cat-item cat-item-2"><a href="/texnologiya">Texnologiya</a></li>
                                <li class="cat-item cat-item-2"><a href="/idman">İdman</a></li>

                            </ul>
                            <nav>
                                <ul class="main-menu d-none d-lg-inline">
                                    <li class="menu-item-has-children">
                                        <a href="/gundem">Gündəm</a>
                                        <ul class="sub-menu text-muted font-small">
                                            <li><a href="/dunya">Dünya</a></li>
                                            <li><a href="/yerli">Yerli</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="/siyaset">Siyasət</a>
                                        <ul class="sub-menu text-muted font-small">
                                            <li><a href="/xarici-siyaset">Xarici Siyasət</a></li>
                                            <li><a href="/azerbaycan">Azərbaycan</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/kriminal">Kriminal</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/iqtisadi">İqtisadi</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/sehiyye">Səhiyyə</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="/medeniyyet">Mədəniyyət</a>
                                        <ul class="sub-menu text-muted font-small">
                                            <li><a href="/tehsil">Təhsil</a></li>
                                            <li><a href="/turizm">Turizm</a></li>
                                            <li><a href="/metbex">Mətbəx</a></li>
                                            <li><a href="/sou-biznes">Şou-Biznes</a></li>
                                        </ul>
                                    </li>

                                    <li class="menu-item">
                                        <a href="/texnologiya">Texnologiya</a>
                                    </li>

                                    <li class="menu-item">
                                        <a href="/idman">İdman</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="off-canvas-toggle-cover" id="toogle" style="display: inline-block !important;">
                            <div class="off-canvas-toggle d-inline-block ml-15" id="off-canvas-toggle" style="display: block !important;">
                                <i class="ti-view-grid" id="cttog"></i>
                            </div>
                        </div>
                        <a href="#search" id="th-btnsearch"   class="th-btnsearch cd-search-trigger cd-text-replace"><span><i class="ti-search "></i></span></a>
                        <a href="javascript:void(0);" class="cd-nav-trigger cd-text-replace"><span><i class="ti-search"></i></span></a>

                    <!-- Search -->
                    <!-- Off canvas -->
                    </div>
                </div>

            </div>


        </div>
    </div>
    <div id="search" class="cd-main-search">
        <form id="searchform">
            @csrf
            <input type="search" name="search" id="ssearch" placeholder="Burada Axtar...">
        </form>
        <div class="cd-search-suggestions">
            @include('site.components.search')
        </div>
        <a href="javascript:void(0);" class="close cd-text-replace "><i class="ti-close"></i></a>
    </div>
</header>


