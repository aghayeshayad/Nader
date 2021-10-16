<!DOCTYPE html>
<html lang="en" dir="rtl">
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>
        پنل مدیریت
        @hasSection('title')
        - @yield('title')
        @endif
    </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('/css/dashboard/style.css') }}">

    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico')}}" />
    @stack('styles')
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed
kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->

    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo" style="background-color: white">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
        </div>
    </div>
    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

            <!-- begin:: Aside -->
            <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

                <!-- begin:: Aside -->
                <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                    <div class="kt-aside__brand-logo bg-white p-1">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </div>
                    <div class="kt-aside__brand-tools">
                        <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler"><span></span></button>
                    </div>
                </div>

                <!-- end:: Aside -->

                <!-- begin:: Aside Menu -->
                <x-sidebar-menu />
                <!-- end:: Aside Menu -->
            </div>

            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <!-- begin:: Header -->
                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

                    <!-- begin: Header Menu -->
                    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
                            <ul class="kt-menu__nav ">
                                {{-- <li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true">--}}
                                {{-- <a href="{{  route('admin.lawyerinfo.index') }}" class="kt-menu__link ">--}}
                                {{-- <span id="group">--}}
                                {{-- <span class="kt-menu__link-text gp">وکلا</span>--}}
                                {{-- <span class="badge badge-light">{{ count(\Modules\LawyerInfo\Entities\lawyerInfo::where('flag_new', true)->get()) }}</span>--}}
                                {{-- </span>--}}
                                {{-- </a>--}}
                                {{-- </li>--}}
                                {{-- <li class="kt-menu__item  kt-menu__item--active " aria-haspopup="true">--}}
                                {{-- <a href="{{  route('admin.contactus.index') }}" class="kt-menu__link ">--}}
                                {{-- <span id="group">--}}
                                {{-- <span class="kt-menu__link-text gp">تماس با ما</span>--}}
                                {{-- <span class="badge badge-light">{{ count(\Modules\ContactUs\Entities\ContactUs::where('flag_new', true)->get()) }}</span>--}}
                                {{-- </span>--}}
                                {{-- </a>--}}
                                {{-- </li>--}}
                            </ul>
                        </div>
                    </div>

                    <!-- end: Header Menu -->

                    <!-- begin:: Header Topbar -->
                    <div class="kt-header__topbar">
                        <!--begin: Search -->
                        <!--begin: Search -->
                        <!--end: Search -->
                        <!--end: Search -->
                        <!--begin: Notifications -->
                        <!--end: Notifications -->
                        <!--begin: Quick Actions -->
                        <!--end: Quick Actions -->
                        <!--begin: My Cart -->
                        <!--end: My Cart -->
                        <!--begin: Quick panel toggler -->
                        <!--end: Quick panel toggler -->
                        <!--begin: Language bar -->
                        <!--end: Language bar -->
                        <!--begin: User Bar -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--user">
                            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                                <div class="kt-header__topbar-user">
                                    <span class="kt-header__topbar-username kt-hidden-mobile">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                </div>
                            </div>
                            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right
                        dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                                <!--begin: Head -->
                                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url({{ asset('images/dashboard/misc/bg-1.jpg') }})">
                                    <div class="kt-user-card__name">
                                        {{ \Illuminate\Support\Facades\Auth::user()->name}}
                                    </div>
                                </div>
                                <!--end: Head -->

                                <!--begin: Navigation -->
                                <div class="kt-notification">
                                    <div class="kt-notification__custom kt-space-between">
                                        <a class="btn btn-label btn-label-brand btn-sm btn-bold w-100" href="{{ route('logout') }}" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                            خروج
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>

                                <!--end: Navigation -->
                            </div>
                        </div>

                        <!--end: User Bar -->
                    </div>

                    <!-- end:: Header Topbar -->
                </div>

                <!-- end:: Header -->
                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                    <!-- begin:: Subheader -->
                    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                        <div class="kt-container  kt-container--fluid ">
                            <div class="kt-subheader__main">
                                @hasSection('breadCrumb')
                                    @yield('breadCrumb')
                                @endif
                            </div>
                            <div class="kt-subheader__toolbar">
                                <div class="kt-subheader__wrapper">
                                    <a class="btn kt-subheader__btn-daterange" id="kt_dashboard_daterangepicker" data-toggle="kt-tooltip" data-placement="left">
                                        <span class="kt-subheader__btn-daterange-date" id="kt_dashboard_daterangepicker_date">
                                            {{ Verta()->now()->format('Y-m-d') }}
                                        </span>

                                        <!--<i class="flaticon2-calendar-1"></i>-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--sm">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @hasSection('error')
                    <div class="container">
                        @if (session()->has("success"))
                        @include('layouts.Dashboard.partials.success')
                        @endif
                        @if (session()->has("unSuccess"))
                        @include('layouts.Dashboard.partials.unSuccess')
                        @endif
                        @if ($errors->any())
                        @include('layouts.Dashboard.partials.error')
                        @endif
                    </div>
                    @endif
                    @yield('content')
                    <!-- end:: Subheader -->
                </div>

                <!-- begin:: Footer -->
                <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                    <div class="kt-container  kt-container--fluid ">

                    </div>
                </div>

                <!-- end:: Footer -->
            </div>
        </div>
    </div>
    <!-- end:: Page -->


    <!-- end::Quick Panel -->

    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>
    <!-- end::Scrolltop -->

    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#2c77f4"
                    , "light": "#ffffff"
                    , "dark": "#282a3c"
                    , "primary": "#5867dd"
                    , "success": "#34bfa3"
                    , "info": "#36a3f7"
                    , "warning": "#ffb822"
                    , "danger": "#fd3995"
                }
                , "base": {
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"]
                    , "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                }
            }
        };

    </script>

    <!-- end::Global Config -->

    <!--begin::Global Theme Bundle(used by all pages) -->

    <!--begin:: Vendor Plugins -->
    <script type="text/javascript" src="{{ asset('js/dashboard/app.js') }}"></script>

    @stack('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert').slideUp(700);
            }, 4000);
        });

    </script>
</body>

<!-- end::Body -->
</html>
