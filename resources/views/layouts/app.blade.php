<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="{{ $settings->site_name }}" />
    <meta name="description" content="{{ $settings->meta }}" />
    <meta name="keywords" content="{{ $settings->keywords }}" />

    @if($settings && $settings->favicon)
    <link rel="icon" type="image/x-icon" href="{{ $settings->favicon }}">
    @else
    <link rel="icon" href="{{ asset('front/img/logo/favicon.svg') }}" type="image/x-icon">
    @endif

    <!-- Site Title -->
    <title>{{ $settings->title }}</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('front/fonts/flaticon_cretio.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/plugins/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/plugins/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" />
</head>

<body class="dark">
    <!-- Preloader -->
    <div id="preloader" class="preloader">
        <div class="txt-loading">
            <div class="preloader-text">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 300" class="preloader-text-svg">
                    <defs>
                        <linearGradient id="textGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" stop-color="#000" />
                            <stop offset="50%" stop-color="#000" />
                            <stop offset="100%" stop-color="#000" />
                        </linearGradient>
                    </defs>
                    <text class="svg-text" id="svgText">cretio</text>
                </svg>
            </div>
            <div class="loading-percent">0%</div>
        </div>
    </div>
    <!-- Preloader -->

    <!-- Start Header Section -->
    <header class="ak-site_header ak-style1 ak-sticky_header">
        <div class="ak-main_header">
            <div class="container container-customize">
                <div class="ak-main_header_in">
                    <div class="ak-main-header-left">
                        <a class="ak-site_branding dark-logo" href="index.html">
                            <img src="{{ asset('front/img/logo/dark-logo.svg') }}" alt="..." />
                        </a>
                        <a class="ak-site_branding white-logo" href="index.html">
                            <img src="{{ asset('front/img/logo/white-logo.svg') }}" alt="..." />
                        </a>
                    </div>
                    <div class="ak-main-header-center">
                        <div class="ak-nav ak-medium">
                          <ul class="ak-nav_list">
                        
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                        
                            <li>
                                <a href="{{ route('servicefront.index') }}">Service</a>
                            </li>
                        
                            <li>
                                <a href="{{ route('projectfront.index') }}">Projects</a>
                            </li>
                        
                            <li>
                                <a href="{{ route('blogfront.index') }}">Blog</a>
                            </li>
                        
                            <li>
                                <a href="{{ route('aboutfront.index') }}">About Us</a>
                            </li>
                        
                            <li>
                                <a href="{{ route('contactfront.index') }}">Contact</a>
                            </li>
                        
                        </ul>
                        </div>
                    </div>
                    <div class="ak-main-header-right">
                        <div class="ak-space-between gap-3">
                            <div class="btn-wrapper">
                                <div class="button-container">
                                    <a href="contact.html" class="custom-button ak-center">
                                        <svg width="180px" height="50px" viewBox="0 0 180 50">
                                            <rect x="0" y="0" width="180" height="50" rx="30" ry="30" class="bg-line" />
                                            <rect x="0" y="0" width="180" height="50" rx="30" ry="30" class="hl-line" />
                                        </svg>
                                        <span>Start Project</span>
                                    </a>
                                </div>
                            </div>

                            <div class="offcanvaopen-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                aria-controls="offcanvasRight">
                                <i class="flaticon-dots-menu"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-bar-border"></div>
    </header>
    <!-- Start offcanvas body -->
    <div class="offcanvas offcanvas-end style-1" tabindex="-1" id="offcanvasRight">
        <div class="offcanvas-header">
            <button type="button" class="btn-close btn-close-black ms-auto" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="offcanvas-body-coustom-style">
                <div class="offcanvas-logo-content">
                    <a class="ak-site_branding dark-logo" href="index.html">
                        <img src="{{ asset('front/img/logo/dark-logo.svg') }}" alt="..." />
                    </a>
                    <a class="ak-site_branding white-logo" href="index.html">
                        <img src="{{ asset('front/img/logo/white-logo.svg') }}" alt="..." />
                    </a>
                </div>
                <p class="desp">
                    We thrive on creativity and innovation. Our team is constantly
                    exploring new.
                </p>
                <div class="row row-cols-3 g-3">
                    <div class="col">
                        <img src="{{ asset('front/img/gallery/mini-gallery-1.png') }}" class="img-fluid" alt="..." />
                    </div>
                    <div class="col">
                        <img src="{{ asset('front/img/gallery/mini-gallery-2.png') }}" class="img-fluid" alt="..." />
                    </div>
                    <div class="col">
                        <img src="{{ asset('front/img/gallery/mini-gallery-3.png') }}" class="img-fluid" alt="..." />
                    </div>
                    <div class="col">
                        <img src="{{ asset('front/img/gallery/mini-gallery-4.png') }}" class="img-fluid" alt="..." />
                    </div>
                    <div class="col">
                        <img src="{{ asset('front/img/gallery/mini-gallery-5.png') }}" class="img-fluid" alt="..." />
                    </div>
                    <div class="col">
                        <img src="{{ asset('front/img/gallery/mini-gallery-6.png') }}" class="img-fluid" alt="..." />
                    </div>
                </div>
                <div class="offcanvas-footer-contant">
                    <p class="short-title">Say hello!</p>
                    <a class="email" href="emailto:info@email.com"> info@email.com </a>
                    <a class="email" href="telto:(406)555-0120">(406) 555-0120</a>
                    <a href="#">
                        901 N Pitt Str., Suite 170 <br />
                        Alexandria, USA
                    </a>
                    <div class="ak-height-25 ak-height-lg-25"></div>
                    <p class="short-title">Social:</p>
                    <div class="social-icon">
                        <a href="#" class="icon style-2 dark-mode">
                            <i class="flaticon-facebook"></i>
                        </a>
                        <a href="#" class="icon style-2 dark-mode">
                            <i class="flaticon-video"></i>
                        </a>
                        <a href="#" class="icon style-2 dark-mode">
                            <i class="flaticon-linkedin"></i>
                        </a>
                        <a href="#" class="icon style-2 dark-mode">
                            <i class="flaticon-twitter"></i>
                        </a>
                    </div>
                    <div class="ak-height-40 ak-height-lg-40"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End offcanvas body -->
    <div class="ak-height-190 ak-height-lg-80"></div>
    <!-- End Header Section -->


    @yield('content')

    <!-- Start Footer -->
    <div class="ak-height-150 ak-height-lg-80"></div>
    <footer class="ak-footer style-1 ak-bg" data-src="{{ asset('front/img/bg/footer-bg.png') }}">
        <div class="ak-height-120 ak-height-lg-50"></div>
        <img src="{{ asset('front/img/bg/footer-bgshape.png') }}" class="ak-bg footer-bgshape" alt="bgshape" />
        <div class="container">
            <div class="ak-footer-container">
                <div class="footer-cta">
                    <div class="footer-cta-info">
                        <h1 class="footer-cta-title">Let's</h1>
                        <h2 class="footer-cta-title-two"><span>work</span> Together</h2>
                    </div>
                    <div class="footer-btn-email">
                        <div class="footer-btn-content">
                            <a href="contact.html" class="footer-btn circle-btn-anim">
                                <span class="text">
                                    Start
                                    <i class="flaticon-up-right-arrow"></i>
                                    <span>Project</span>
                                </span>
                            </a>
                        </div>
                        <div class="footer-email">
                            <p class="email-short-title">Say hello!</p>
                            <a href="emailto:info@email.com"> info@email.com</a>
                        </div>
                    </div>
                </div>
                <div class="footer-content">
                    <div class="about-company">
                        <img class="footer-logo" src="{{ asset('front/img/logo/footer-logo.svg') }}"
                            alt="white-logo.svg" />
                        <p class="about-company-desp">
                            We thrive on creativity and <span>innovation</span>. Our team is
                            constantly exploring new ideas and approaches to ensure your
                            <span>digital presence </span> is fresh.
                        </p>
                    </div>

                    <div class="address-phn">
                        <a href="telto:(406)555-0120" class="phn">
                            <span>
                                <i class="flaticon-telephone"></i>
                            </span>
                            (406) 555-012
                        </a>
                        <p class="address">901 N Pitt Str., Suite 170 Alexandria, USA</p>
                    </div>

                    <div class="footer-list-content">
                        <ul class="footer-list-menu">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="services.html">Services</a></li>
                            <li><a href="portfolio.html">Portfolio</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="ak-height-95 ak-height-lg-50"></div>
        <div class="copy-right-content">
            <div class="container">
                <div class="ak-space-between">
                    <div class="social-icon">
                        <a href="#" class="icon">
                            <i class="flaticon-facebook"></i>
                        </a>
                        <a href="#" class="icon">
                            <i class="flaticon-video"></i>
                        </a>
                        <a href="#" class="icon">
                            <i class="flaticon-linkedin"></i>
                        </a>
                    </div>
                    <a href="#" class="copy-right-text">© 2025 <span>Thememarch.</span> All rights
                        reserved.</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div class="mode-toggle">
        <div class="setting-mode">
            <button id="open">
                <i class="flaticon-sun"></i>
            </button>
            <button id="clecel">
                <i class="flaticon-close-button-1"></i>
            </button>
        </div>
        <div class="mode-btn js-mode-type">
            <button data-mode="light" class="mode-light">
                <i class="flaticon-sun"></i>
            </button>
            <button data-mode="dark" class="active mode-dark">
                <i class="flaticon-night-mode"></i>
            </button>
        </div>
    </div>

    <span class="ak-scrollup">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 10L1.7625 11.7625L8.75 4.7875V20H11.25V4.7875L18.225 11.775L20 10L10 0L0 10Z"
                fill="currentColor" />
        </svg>
    </span>
    <!-- Start Video Popup -->
    <div class="ak-video-popup">
        <div class="ak-video-popup-overlay"></div>
        <div class="ak-video-popup-content">
            <div class="ak-video-popup-layer"></div>
            <div class="ak-video-popup-container">
                <div class="ak-video-popup-align">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="about:blank"></iframe>
                    </div>
                </div>
                <div class="ak-video-popup-close"></div>
            </div>
        </div>
    </div>
    <!-- End Video Popup -->

    <!-- Script -->
    <script src="{{ asset('front/js/plugins/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('front/js/plugins/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front/js/plugins/swiper.min.js') }}"></script>

    <script src="{{ asset('front/js/plugins/gsap.js') }}"></script>
    <script src="{{ asset('front/js/plugins/splittext.js') }}"></script>
    <script src="{{ asset('front/js/plugins/scrolltigger.js') }}"></script>
    <script src="{{ asset('front/js/plugins/scrolltoplugins.js') }}"></script>
    <script src="{{ asset('front/js/plugins/lenis.min.js') }}"></script>

    <script src="{{ asset('front/js/main.js') }}"></script>
</body>

</html>