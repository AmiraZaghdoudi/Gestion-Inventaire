<!DOCTYPE html>

<html lang="en">
<?php ini_set("memory_limit", -1); ?>


    <!-- begin::Head -->

<head>
    <meta charset="utf-8"/>
    <title><?php echo 'Gestion inventaire' ?> | System</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--begin::Web font -->

    <link href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.10.4/themes/flick/jquery-ui.css" rel="stylesheet"
          type="text/css"/>
    <script src="{{ asset('vendors/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('assets/jquery-ui/jquery-ui.js') }}"></script>

    <!--end::Web font -->
    <!-- begin:: Global Mandatory Vendors -->
    <link href="{{ asset('vendors/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css"/>

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: amira -->
    <link href="{{ asset('vendors\bootstrap\dist\css\bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendors\bootstrap\dist\css\bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <!--end:: amira -->

    <!--begin:: Global Optional Vendors -->
    <link href="{{ asset('vendors/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('vendors/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('vendors/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('vendors/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendors/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendors/vendors/flaticon/css/flaticon.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendors/vendors/metronic/css/styles.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('vendors/vendors/fontawesome5/css/all.min.css') }}" rel="stylesheet" type="text/css"/>

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles -->

    <link href="{{ asset('assets/demo/demo5/base/style.bundle.css') }}" rel="stylesheet" type="text/css"/>

    <!--end::Global Theme Styles -->

    <!--begin::Page Vendors Styles -->
    <link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
          type="text/css"/>
    <!--end::Page Vendors Styles -->


    {{--</head>

<head>--}}
    <!-- Google Tag Manager -->

    <!-- End Google Tag Manager -->
    <meta charset="utf-8"/>


    <!--begin::Fonts-->

    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    {{--<link href="{{ asset('theme/html/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundledf5a.css?v=7.2.6') }}"
    rel="stylesheet" type="text/css"/>--}}
    <!--end::Page Vendors Styles-->


    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('theme/html/demo1/dist/assets/plugins/global/plugins.bundledf5a.css?v=7.2.6') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundledf5a.css?v=7.2.6') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('theme/html/demo1/dist/assets/css/style.bundledf5a.css?v=7.2.6') }}" rel="stylesheet"
          type="text/css"/>
    <!--end::Global Theme Styles-->


    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('theme/html/demo1/dist/assets/css/themes/layout/header/base/lightdf5a.css?v=7.2.6') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('theme/html/demo1/dist/assets/css/themes/layout/header/menu/lightdf5a.css?v=7.2.6') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('theme/html/demo1/dist/assets/css/themes/layout/brand/lightdf5a.css?v=7.2.6') }}"
          rel="stylesheet" type="text/css"/>
    <link href="{{ asset('theme/html/demo1/dist/assets/css/themes/layout/aside/lightdf5a.css?v=7.2.6') }}"
          rel="stylesheet" type="text/css"/>
    <!--end::Layout Themes-->


</head>
<style>
    .containerImg img {
        transition: transform 0.25s ease;
        cursor: zoom-in;

        display: block;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
        z-index: 9999999 !important;

    }

    input[type=checkbox]:checked ~ label > img {
        transform: scale(2);
        cursor: zoom-out;
        z-index: 9999999 !important;

    }

    .containerImg {
        margin: auto !important;
        display: block !important;
        text-align: center !important;
    }

    .m-table.m-table--head-bg-danger thead th {
        background: #041981;
        color: #fff;
        border-bottom: 0;
        border-top: 0;
    }

    .aside-menu .menu-nav > .menu-item > .menu-link .menu-text {
        font-weight: 600;
        font-size: 1.15rem;
        text-transform: initial;
    }

    .header-fixed.subheader-fixed.subheader-enabled .wrapper {
        padding-top: 80px !important;
    }

    .m-badge.m-badge--danger {
        background-color: #f60808;
        color: #fff;
    }

    .m-badge.m-badge--primary {
        background-color: #041981;
        color: #fff;
    }

    .m-badge.m-badge--success {
        background-color: #2d6d34;
        color: #fff;
    }

    .table {
        font-size: 14px;
    }

    th,
    td {
        text-align: center !important;
    }

    .text-danger {
        color: #f60808 !important;
    }

    .m-topbar .m-topbar__nav.m-nav > .m-nav__item.m-topbar__user-profile > .m-nav__link .m-topbar__username {
        display: table-cell;
        vertical-align: middle;
        text-transform: inherit;
        font-size: 1rem;
        font-weight: 500;
        text-align: left;
        color: #f60808 !important;
        padding-right: 10px;
    }
</style>

<!--begin::Body-->

<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!-- Google Tag Manager (noscript) -->

<!-- End Google Tag Manager (noscript) -->
<!--begin::Main-->
<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
    <!--begin::Logo-->
    <a href="https://preview.keenthemes.com/metronic/demo1/index.html">
        <img src="" style="margin-top:5%;width:60px;">
        <img src="" style="margin-top:5%;width:60px;"/>
    </a>
    <!--end::Logo-->
    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->
        <!--begin::Header Menu Mobile Toggle-->
        <!--<button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
        <span></span>
    </button>-->
        <!--end::Header Menu Mobile Toggle-->
        <!--begin::Topbar Mobile Toggle-->
        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-md">
                    <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/utilisateur .svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                         height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24"/>
                            <path
                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                            <path
                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                fill="#000000" fill-rule="nonzero"/>
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
        </button>
        <!--end::Topbar Mobile Toggle-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
            <!--begin::Brand-->
            <div class="brand flex-column-auto" id="kt_brand">
                <!--begin::Logo-->
                <a href="#" class="brand-logo">
                    <img src="" style="margin-top:5%;width:120px;">
                </a>
                <!--end::Logo-->
                <!--begin::Toggle-->
                <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                        <span class="svg-icon svg-icon svg-icon-xl">
                            <!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path
                                        d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)">
                                    </path>
                                    <path
                                        d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"
                                        transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)">
                                    </path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                </button>
                <!--end::Toolbar-->
            </div>
            <!--end::Brand-->
            <!--begin::Aside Menu-->
            <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                <!--begin::Menu Container-->
                <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                     data-menu-dropdown-timeout="500">
                    <!--begin::Menu Nav-->
                    <ul class="menu-nav">


                        <li class="menu-item {{  url()->current()==url('centers/index') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('centers.index') }}" class="menu-link">
                                <div class="mr-4 flex-shrink-0 text-center">
                                    <i class="icon-md fas fa-shopping-cart text-danger"></i>
                                </div>
                                <span class="menu-text">Liste des centres</span>
                            </a>
                        </li>

                        <li class="menu-item {{  url()->current()==url('products/index') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('products.index') }}" class="menu-link">
                                <div class="mr-4 flex-shrink-0 text-center">
                                    <i class="icon-md fas fa-cart-arrow-down text-danger"></i>
                                </div>
                                <span class="menu-text">Liste des produits </span>
                            </a>
                        </li>

                        <li class="menu-item {{  url()->current()==url('centers/receivedProduct') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('centers.receivedProduct')  }}" class="menu-link">
                                <div class="mr-4 flex-shrink-0 text-center">
                                    <i class="icon-md fa fa-exchange-alt text-danger"></i>
                                </div>
                                <span class="menu-text">Produits reçues</span>
                            </a>
                        </li>


                    </ul>
                    <!--end::Menu Nav-->
                </div>
                <!--end::Menu Container-->
            </div>
            <!--end::Aside Menu-->
        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->

        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header header-fixed">
                <!--begin::Container-->
                <div class="container-fluid d-flex align-items-stretch justify-content-between">
                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                        <!--begin::Header Menu-->
                        <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                            <!--begin::Header Nav-->
                            <div id="kt_header_menu"
                                 class="header-menu header-menu-mobile header-menu-layout-default">
                                <!--begin::Header Nav-->
                                <ul class="menu-nav">
                                    <li class="menu-item menu-item-submenu menu-item-rel menu-item-active"
                                        data-menu-toggle="click" aria-haspopup="true">
                                        <a href="{{ url('dashboard') }}" class="m-brand__logo-wrapper">
                                            <img alt="" src="{{ asset('img/'. env('logo_name')) }}" height="45px"/>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Header Nav-->
                            </div>
                            <!--end::Header Nav-->
                        </div>
                        <!--end::Header Menu-->
                    </div>
                    <!--end::Header Menu Wrapper-->
                    <!--begin::Topbar-->
                    <div class="topbar">
                        <div class="topbar-item">

                        </div>
                        <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                            <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                                <div class="m-stack__item m-topbar__nav-wrapper">
                                    <ul class="m-topbar__nav m-nav m-nav--inline">

                                        <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                            m-dropdown-toggle="click">

                                            <a href="#" class="m-nav__link m-dropdown__toggle">
                                                <span class="m-topbar__welcome">Hello,&nbsp;</span>
                                                <span class="m-topbar__username">

                                                        {{ Auth::user()->name }}

                                                    </span>

                                                <?php
                                                if ((request()->session()->get('connected_user_photo')) && (request()->session()->get('connected_user_photo')) != '' && (request()->session()->get('connected_user_photo')) != null) {
                                                    $image = request()->session()->get('connected_user_photo');
                                                } else {
                                                    $image = 'user.png';
                                                }
                                                ?>
                                                <span class="m-topbar__userpic">
                                                        <img src="{{ asset('users/'.$image) }}"
                                                             class="m--img-rounded m--marginless m--img-centered"
                                                             alt=""/>
                                                    </span>
                                            </a>
                                            <div class="m-dropdown__wrapper">
                                                    <span
                                                        class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                <div class="m-dropdown__inner">
                                                    <div class="m-dropdown__header m--align-center">
                                                        <div class="m-card-user m-card-user--skin-dark">
                                                            <div class="m-card-user__pic">
                                                                <img src="{{ asset('users/'.$image) }}"
                                                                     class="m--img-rounded m--marginless" alt=""/>
                                                            </div>
                                                            <div class="m-card-user__details">
                                                                    <span
                                                                        class="m-card-user__name m--font-weight-500">{{request()->session()->get('connected_user_name')}}</span>
                                                                <a href=""
                                                                   class="m-card-user__email m--font-weight-300 m-link">{{request()->session()->get('connected_user_email')}}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-dropdown__body">
                                                        <div class="m-dropdown__content">
                                                            <ul class="m-nav m-nav--skin-light">
                                                                <li class="m-nav__item">
                                                                    <a class="dropdown-item"
                                                                       href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                                        {{ __('Logout') }}
                                                                    </a>

                                                                    <form id="logout-form"
                                                                          action="{{ route('logout') }}" method="POST"
                                                                          class="d-none">
                                                                        @csrf
                                                                    </form>

                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->

            <meta name="csrf-token" content="{{ csrf_token() }}"/>


            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Subheader-->
                <div class="m-subheader ">

                    <div class="row">
                        <div class="col-md-12">
                            @if(request()->session()->has('message'))
                                <div class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                    {{ Session::get('message') }}
                                </div>

                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    </button>
                                    @foreach($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <!--end::Subheader-->
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            <!--begin::Dashboard-->


                            @yield('content')
                            <!--begin::Row-->

                            <!--end::Row-->
                            <!--begin::Row-->

                            <!--end::Row-->
                            <!--end::Dashboard-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>
                <!--end::Content-->

            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>


@include('layouts.footer')
