<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="dark" data-toggled="close">

<head>
    {{-- Meta Data --}}
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    {{-- Dynamic Title --}}
    <title>{{ $settings->title ?? 'Dashboard' }}</title>

    {{-- Dynamic Favicon --}}
    @if($settings && $settings->favicon)
    <link rel="icon" type="image/x-icon" href="{{ $settings->favicon }}">
    @else
    <link rel="icon" href="{{ asset('assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">
    @endif

    {{-- Dynamic Meta Description --}}
    <meta name="description" content="{{ $settings->meta ?? 'Admin Dashboard' }}">

    {{-- Dynamic Meta Keywords --}}
    <meta name="keywords" content="{{ $settings->keywords ?? 'admin, dashboard, panel' }}">

    <meta name="Author" content="{{ $settings->site_name ?? 'Your Company' }}">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Toastr CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Main Theme Assets --}}
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    {{-- Bootstrap Css --}}
    <link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- Style Css --}}
    <link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet">

    {{-- Icons Css --}}
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    {{-- Node Waves Css --}}
    <link href="{{ asset('assets/libs/node-waves/waves.min.css') }}" rel="stylesheet">

    {{-- Simplebar Css --}}
    <link href="{{ asset('assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">

    {{-- Color Picker Css --}}
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

    {{-- Choices Css --}}
    <link rel="stylesheet" href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

    {{-- Additional Libraries --}}
    <link rel="stylesheet" href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/swiper/swiper-bundle.min.css') }}">

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Box Icons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- SweetAlert2 CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    @stack('css')

</head>

<body>

    {{-- Start Switcher --}}
    <div class="offcanvas offcanvas-end" tabindex="-1" id="switcher-canvas" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title text-default" id="offcanvasRightLabel">Switcher</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <nav class="border-bottom border-block-end-dashed">
                <div class="nav nav-tabs nav-justified" id="switcher-main-tab" role="tablist">
                    <button class="nav-link active" id="switcher-home-tab" data-bs-toggle="tab"
                        data-bs-target="#switcher-home" type="button" role="tab" aria-controls="switcher-home"
                        aria-selected="true">Theme Styles</button>
                    <button class="nav-link" id="switcher-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#switcher-profile" type="button" role="tab" aria-controls="switcher-profile"
                        aria-selected="false">Theme Colors</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active border-0" id="switcher-home" role="tabpanel"
                    aria-labelledby="switcher-home-tab" tabindex="0">
                    <div class="">
                        <p class="switcher-style-head">Theme Color Mode:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-light-theme">
                                        Light
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style"
                                        id="switcher-light-theme" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-dark-theme">
                                        Dark
                                    </label>
                                    <input class="form-check-input" type="radio" name="theme-style"
                                        id="switcher-dark-theme">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Directions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-ltr">
                                        LTR
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction" id="switcher-ltr"
                                        checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-rtl">
                                        RTL
                                    </label>
                                    <input class="form-check-input" type="radio" name="direction" id="switcher-rtl">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Navigation Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-vertical">
                                        Vertical
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style"
                                        id="switcher-vertical" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-horizontal">
                                        Horizontal
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-style"
                                        id="switcher-horizontal">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navigation-menu-styles">
                        <p class="switcher-style-head">Vertical & Horizontal Menu Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-click">
                                        Menu Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-hover">
                                        Menu Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-menu-hover">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-click">
                                        Icon Click
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-click">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-hover">
                                        Icon Hover
                                    </label>
                                    <input class="form-check-input" type="radio" name="navigation-menu-styles"
                                        id="switcher-icon-hover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidemenu-layout-styles">
                        <p class="switcher-style-head">Sidemenu Layout Styles:</p>
                        <div class="row switcher-style gx-0 pb-2 gy-2">
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-default-menu">
                                        Default Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-default-menu" checked>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-closed-menu">
                                        Closed Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-closed-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icontext-menu">
                                        Icon Text
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icontext-menu">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-icon-overlay">
                                        Icon Overlay
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-icon-overlay">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-detached">
                                        Detached
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-detached">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-double-menu">
                                        Double Menu
                                    </label>
                                    <input class="form-check-input" type="radio" name="sidemenu-layout-styles"
                                        id="switcher-double-menu">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Page Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-regular">
                                        Regular
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-regular" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-classic">
                                        Classic
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-classic">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-modern">
                                        Modern
                                    </label>
                                    <input class="form-check-input" type="radio" name="page-styles"
                                        id="switcher-modern">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Layout Width Styles:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-full-width">
                                        Full Width
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width"
                                        id="switcher-full-width" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-boxed">
                                        Boxed
                                    </label>
                                    <input class="form-check-input" type="radio" name="layout-width"
                                        id="switcher-boxed">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Menu Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions"
                                        id="switcher-menu-fixed" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-menu-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="menu-positions"
                                        id="switcher-menu-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <p class="switcher-style-head">Header Positions:</p>
                        <div class="row switcher-style gx-0">
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-fixed">
                                        Fixed
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-fixed" checked>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check switch-select">
                                    <label class="form-check-label" for="switcher-header-scroll">
                                        Scrollable
                                    </label>
                                    <input class="form-check-input" type="radio" name="header-positions"
                                        id="switcher-header-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade border-0" id="switcher-profile" role="tabpanel"
                    aria-labelledby="switcher-profile-tab" tabindex="0">
                    <div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Menu Colors:</p>
                            <div class="d-flex switcher-style pb-2">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-light">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-dark" checked>
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Gradient Menu" type="radio" name="menu-colors"
                                        id="switcher-menu-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Menu"
                                        type="radio" name="menu-colors" id="switcher-menu-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Menu dynamically
                                change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Header Colors:</p>
                            <div class="d-flex switcher-style pb-2">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-white" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Light Header" type="radio" name="header-colors"
                                        id="switcher-header-light" checked>
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-dark" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Dark Header" type="radio" name="header-colors"
                                        id="switcher-header-dark">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Color Header" type="radio" name="header-colors"
                                        id="switcher-header-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-gradient" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Gradient Header" type="radio"
                                        name="header-colors" id="switcher-header-gradient">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-transparent"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Transparent Header"
                                        type="radio" name="header-colors" id="switcher-header-transparent">
                                </div>
                            </div>
                            <div class="px-4 pb-3 text-muted fs-11">Note:If you want to change color Header dynamically
                                change from below Theme Primary color picker</div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Primary:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-1" type="radio"
                                        name="theme-primary" id="switcher-primary">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-2" type="radio"
                                        name="theme-primary" id="switcher-primary1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-3" type="radio"
                                        name="theme-primary" id="switcher-primary2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-4" type="radio"
                                        name="theme-primary" id="switcher-primary3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-primary-5" type="radio"
                                        name="theme-primary" id="switcher-primary4">
                                </div>
                                <div class="form-check switch-select ps-0 mt-1 color-primary-light">
                                    <div class="theme-container-primary"></div>
                                    <div class="pickr-container-primary"></div>
                                </div>
                            </div>
                        </div>
                        <div class="theme-colors">
                            <p class="switcher-style-head">Theme Background:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-1" type="radio"
                                        name="theme-background" id="switcher-background">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-2" type="radio"
                                        name="theme-background" id="switcher-background1">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-3" type="radio"
                                        name="theme-background" id="switcher-background2">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-4" type="radio"
                                        name="theme-background" id="switcher-background3">
                                </div>
                                <div class="form-check switch-select me-3">
                                    <input class="form-check-input color-input color-bg-5" type="radio"
                                        name="theme-background" id="switcher-background4">
                                </div>
                                <div
                                    class="form-check switch-select ps-0 mt-1 tooltip-static-demo color-bg-transparent">
                                    <div class="theme-container-background"></div>
                                    <div class="pickr-container-background"></div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-image mb-3">
                            <p class="switcher-style-head">Menu With Background Image:</p>
                            <div class="d-flex flex-wrap align-items-center switcher-style">
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img1" type="radio"
                                        name="theme-background" id="switcher-bg-img">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img2" type="radio"
                                        name="theme-background" id="switcher-bg-img1">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img3" type="radio"
                                        name="theme-background" id="switcher-bg-img2">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img4" type="radio"
                                        name="theme-background" id="switcher-bg-img3">
                                </div>
                                <div class="form-check switch-select m-2">
                                    <input class="form-check-input bgimage-input bg-img5" type="radio"
                                        name="theme-background" id="switcher-bg-img4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas-footer d-grid">
                    <a href="javascript:void(0);" id="reset-all" class="btn btn-danger m-1">Reset</a>
                </div>
            </div>
        </div>
    </div>
    {{-- End Switcher --}}


    <div class="page">
        {{-- app-header --}}
        <header class="app-header">

            {{-- Start::main-header-container --}}
            <div class="main-header-container container-fluid">

                {{-- Start::header-content-left --}}
                <div class="header-content-left">



                    {{-- Start::header-element --}}
                    <div class="header-element">
                        {{-- Start::header-link --}}
                        <a aria-label="Hide Sidebar"
                            class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                            data-bs-toggle="sidebar" href="javascript:void(0);"><span></span></a>
                        {{-- End::header-link --}}
                    </div>
                    {{-- End::header-element --}}

                </div>
                {{-- End::header-content-left --}}

                {{-- Start::header-content-right --}}
                <div class="header-content-right">

                    {{-- Start::header-element --}}
                    <div class="header-element header-search">
                        {{-- Start::header-link --}}
                        <a href="javascript:void(0);" class="header-link" data-bs-toggle="modal"
                            data-bs-target="#searchModal">
                            <i class="bx bx-search-alt-2 header-link-icon"></i>
                        </a>
                        {{-- End::header-link --}}
                    </div>

                    {{-- Start::header-element --}}
                    <div class="header-element header-fullscreen">
                        {{-- Start::header-link --}}
                        <a onclick="openFullscreen();" href="#" class="header-link">
                            <i class="bx bx-fullscreen full-screen-open header-link-icon"></i>
                            <i class="bx bx-exit-fullscreen full-screen-close header-link-icon d-none"></i>
                        </a>
                        {{-- End::header-link --}}
                    </div>
                    {{-- End::header-element --}}

                    {{-- Start::header-element --}}
                    <div class="header-element">

                        <div class="header-element">
                            {{-- Start::header-link|switcher-icon --}}
                            <a href="#" class="header-link switcher-icon" data-bs-toggle="offcanvas"
                                data-bs-target="#switcher-canvas">
                                <i class="bx bx-cog header-link-icon"></i>
                            </a>
                            {{-- End::header-link|switcher-icon --}}
                        </div>
                        {{-- End::header-element --}}

                    </div>
                    {{-- End::header-content-right --}}

                </div>
                {{-- End::main-header-container --}}

        </header>
        {{-- /app-header --}}



        {{-- Start::app-sidebar --}}
        <aside class="app-sidebar sticky" id="sidebar">
            {{-- Start::main-sidebar --}}
            <div class="main-sidebar" id="sidebar-scroll">

                {{-- Start::nav --}}
                <nav class="main-menu-container nav nav-pills flex-column sub-open">
                    <ul class="main-menu">

                        {{-- User Info
                        <div class="user-info-section mb-4 mt-3 text-center">
                            <div class="user-avatar">
                                <i class="bx bx-user-circle text-light" style="font-size: 3rem;"></i>
                            </div>
                            <h6 class="text-light mt-2 mb-1">{{ Auth::check() ? Auth::user()->name : 'Admin' }}</h6>
                            <small class="text-muted">Administrator</small>
                        </div> --}}

                        {{-- Start::slide__category --}}
                        <li class="slide__category"><span class="category-name">Main</span></li>
                        {{-- End::slide__category --}}

                        {{-- Dashboard --}}
                        <li class="slide">
                            <a href="/admin" class="side-menu__item">
                                <i class="bx bx-dashboard side-menu__icon"></i>
                                <span class="side-menu__label">Dashboard</span>
                            </a>
                        </li>
                        {{-- End::slide --}}

                        {{-- Start::slide__category --}}
                        <li class="slide__category"><span class="category-name">Content Management</span></li>
                        {{-- End::slide__category --}}

                        {{-- Start::Services --}}
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-cog side-menu__icon"></i>
                                <span class="side-menu__label">Services</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Services Management</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('service.create') }}" class="side-menu__item">
                                        <i class="bx bx-plus-circle side-menu__icon"></i>
                                        Add Service
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('service.index') }}" class="side-menu__item">
                                        <i class="bx bx-list-ul side-menu__icon"></i>
                                        All Services
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- End::Services --}}

                        {{-- Start::Projects --}}
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-briefcase side-menu__icon"></i>
                                <span class="side-menu__label">Projects</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Projects Management</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('project.create') }}" class="side-menu__item">
                                        <i class="bx bx-plus-circle side-menu__icon"></i>
                                        Add Project
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('project.index') }}" class="side-menu__item">
                                        <i class="bx bx-list-ul side-menu__icon"></i>
                                        All Projects
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- End::Projects --}}

                        {{-- Start::Blogs --}}
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-news side-menu__icon"></i>
                                <span class="side-menu__label">Blogs</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Blogs Management</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('blog.create') }}" class="side-menu__item">
                                        <i class="bx bx-plus-circle side-menu__icon"></i>
                                        Add Blog
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('blog.index') }}" class="side-menu__item">
                                        <i class="bx bx-list-ul side-menu__icon"></i>
                                        All Blogs
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- End::Blogs --}}

                        {{-- Start::Partners --}}
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-group side-menu__icon"></i>
                                <span class="side-menu__label">Partners</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Partners Management</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('partners.create') }}" class="side-menu__item">
                                        <i class="bx bx-plus-circle side-menu__icon"></i>
                                        Add Partner
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('partners.index') }}" class="side-menu__item">
                                        <i class="bx bx-list-ul side-menu__icon"></i>
                                        All Partners
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- End::Partners --}}

                        {{-- Start::FAQs --}}
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-help-circle side-menu__icon"></i>
                                <span class="side-menu__label">FAQs</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">FAQs Management</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('faq.create') }}" class="side-menu__item">
                                        <i class="bx bx-plus-circle side-menu__icon"></i>
                                        Add FAQ
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('faq.index') }}" class="side-menu__item">
                                        <i class="bx bx-list-ul side-menu__icon"></i>
                                        All FAQs
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- End::FAQs --}}

                        {{-- Start::Contact --}}
                        <li class="slide has-sub">
                            <a href="javascript:void(0);" class="side-menu__item">
                                <i class="bx bx-envelope side-menu__icon"></i>
                                <span class="side-menu__label">Contact</span>
                                <i class="fe fe-chevron-right side-menu__angle"></i>
                            </a>
                            <ul class="slide-menu child1">
                                <li class="slide side-menu__label1">
                                    <a href="javascript:void(0)">Contact Management</a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('contact.create') }}" class="side-menu__item">
                                        <i class="bx bx-plus-circle side-menu__icon"></i>
                                        Add Contact
                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="{{ route('contact.index') }}" class="side-menu__item">
                                        <i class="bx bx-list-ul side-menu__icon"></i>
                                        All Contacts
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- End::Contact --}}

                        {{-- Start::About --}}
                        <li class="slide">
                            <a href="{{ route('about.edit', 1) }}" class="side-menu__item">
                                <i class="bx bx-cog side-menu__icon"></i>
                                <span class="side-menu__label">About</span>
                            </a>
                        </li>
                        {{-- End::About --}}

                        {{-- Start::Settings --}}
                        <li class="slide">
                            <a href="{{ route('settings.edit', 1) }}" class="side-menu__item">
                                <i class="bx bx-cog side-menu__icon"></i>
                                <span class="side-menu__label">Settings</span>
                            </a>
                        </li>
                        {{-- End::Settings --}}

                        {{-- Logout --}}
                        <li class="slide mt-4">
                            <a href="{{ route('logout') }}" class="side-menu__item text-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bx bx-log-out side-menu__icon"></i>
                                <span class="side-menu__label">Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>

                    {{-- Slide Right Button --}}
                    <div class="slide-right" id="slide-right">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                        </svg>
                    </div>
                </nav>
                {{-- End::nav --}}

            </div>
            {{-- End::main-sidebar --}}
        </aside>

        <style>
            .side-menu__item {
                display: flex;
                align-items: center;
                padding: 12px 20px;
                color: #a0a7b8;
                text-decoration: none;
                transition: all 0.3s ease;
            }

            .side-menu__item:hover {
                color: #fff;
                background: rgba(255, 255, 255, 0.1);
            }

            .side-menu__icon {
                margin-right: 12px;
                font-size: 18px;
                width: 20px;
                text-align: center;
            }

            .side-menu__label {
                flex: 1;
            }

            .side-menu__angle {
                margin-left: auto;
            }

            .slide-menu.child1 {
                background: #1a233a;
            }

            .slide-menu.child1 .side-menu__item {
                padding-left: 50px;
                font-size: 14px;
            }

            .slide__category {
                padding: 15px 20px 8px;
                font-size: 11px;
                font-weight: 600;
                text-transform: uppercase;
                color: #5b6e88;
                letter-spacing: 0.5px;
            }

            .side-menu__label1 {
                padding: 10px 20px;
                font-size: 12px;
                font-weight: 600;
                color: #8a99b5;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                border-bottom: 1px solid #2d374d;
            }

            .text-danger.side-menu__item:hover {
                background: rgba(220, 53, 69, 0.1);
                color: #fff;
            }
        </style>
        {{-- End::app-sidebar --}}



        @yield('content')

        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="input-group">
                            <a href="javascript:void(0);" class="input-group-text" id="Search-Grid"><i
                                    class="fe fe-search header-link-icon fs-18"></i></a>
                            <input type="search" class="form-control border-0 px-2" placeholder="Search"
                                aria-label="Username">
                            <a href="javascript:void(0);" class="input-group-text" id="voice-search"><i
                                    class="fe fe-mic header-link-icon"></i></a>
                            <a href="javascript:void(0);" class="btn btn-light btn-icon" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="fe fe-more-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <div class="mt-4">
                            <p class="font-weight-semibold text-muted mb-2">Are You Looking For...</p>
                            <span class="search-tags"><i class="fe fe-user me-2"></i>People<a href="javascript:void(0)"
                                    class="tag-addon"><i class="fe fe-x"></i></a></span>
                            <span class="search-tags"><i class="fe fe-file-text me-2"></i>Pages<a
                                    href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                            <span class="search-tags"><i class="fe fe-align-left me-2"></i>Articles<a
                                    href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                            <span class="search-tags"><i class="fe fe-server me-2"></i>Tags<a href="javascript:void(0)"
                                    class="tag-addon"><i class="fe fe-x"></i></a></span>
                        </div>
                        <div class="my-4">
                            <p class="font-weight-semibold text-muted mb-2">Recent Search :</p>
                            <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                                <a href="notifications.html"><span>Notifications</span></a>
                                <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert"
                                    aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                            </div>
                            <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                                <a href="alerts.html"><span>Alerts</span></a>
                                <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert"
                                    aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                            </div>
                            <div class="p-2 border br-5 d-flex align-items-center text-muted mb-0 alert">
                                <a href="mail.html"><span>Mail</span></a>
                                <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert"
                                    aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group ms-auto">
                            <button class="btn btn-sm btn-primary-light">Search</button>
                            <button class="btn btn-sm btn-primary">Clear Recents</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Footer Start --}}
        <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
                <span class="text-muted">
                    Copyright © <span id="current-year">{{ date('Y') }}</span>
                    <a href="{{ url('/') }}" class="text-dark fw-semibold">
                        {{ $settings->site_name ?? 'Default Site Name' }}
                    </a>.
                    Designed with <span class="bi bi-heart-fill text-danger"></span> by
                    <a href="{{ url('/') }}" target="_blank"
                        class="fw-semibold text-primary text-decoration-underline">
                        {{ $settings->site_name ?? 'Default Site Name' }}
                    </a>. All rights reserved.
                </span>
            </div>
        </footer>
        {{-- Footer End --}}

    </div>


    <div class="scrollToTop">
        <span class="arrow"><i class='bx bxs-arrow-to-top fs-3 '></i></span>
    </div>
    <div id="responsive-overlay"></div>

    {{-- Popper JS --}}
    <script src="{{asset('assets/libs/@popperjs/core/umd/popper.min.js')}}"></script>

    {{-- Bootstrap JS --}}
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    {{-- Defaultmenu JS --}}
    <script src="{{asset('assets/js/defaultmenu.min.js')}}"></script>

    {{-- Node Waves JS--}}
    <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

    {{-- Sticky JS --}}
    <script src="{{asset('assets/js/sticky.js')}}"></script>

    {{-- Simplebar JS --}}
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/js/simplebar.js')}}"></script>

    {{-- Color Picker JS --}}
    <script src="{{asset('assets/libs/@simonwep/pickr/pickr.es5.min.js')}}"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    {{-- JSVector Maps JS --}}
    <script src="{{asset('assets/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>

    {{-- JSVector Maps MapsJS --}}
    <script src="{{asset('assets/libs/jsvectormap/maps/world-merc.js')}}"></script>

    {{-- Apex Charts JS --}}
    <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

    {{-- Chartjs Chart JS --}}
    <script src="{{asset('assets/libs/chart.js/chart.min.js')}}"></script>

    {{-- CRM-Dashboard --}}
    <script src="{{asset('assets/js/crm-dashboard.js')}}"></script>


    {{-- Custom-Switcher JS --}}
    <script src="{{asset('assets/js/custom-switcher.min.js')}}"></script>

    {{-- Custom JS --}}
    <script src="{{asset('assets/js/custom.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>


    @stack('js')

</body>

</html>