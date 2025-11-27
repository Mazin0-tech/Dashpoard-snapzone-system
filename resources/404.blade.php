<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="author" content="{{ $setting->site_name }}" />
  <meta name="description" content="{{ $setting->meta }}" />
  <meta name="keywords" content="{{ $setting->keywords }}" />

  @if($settings && $settings->favicon)
  <link rel="icon" type="image/x-icon" href="{{ $settings->favicon }}">
  @else
  <link rel="icon" href="{{ asset('front/img/logo/favicon.svg') }}" type="image/x-icon">
  @endif

  <!-- Site Title -->
  <title>{{ $setting->title }}- 404</title>

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
          <text class="svg-text" id="svgText">{{ $setting->site_name }}</text>
        </svg>
      </div>
      <div class="loading-percent">0%</div>
    </div>
  </div>
  <!-- Preloader -->

  <!-- Start Main Content -->
  <div class="ak-height-150 ak-height-lg-80"></div>
  <div class="container">
    <div class="ak-center">
      <div class="error-page-container">
        <div class="number-stroke">
          <span class="number">4</span>
          <span class="exclamation">
            <svg width="131" height="191" viewBox="0 0 131 191" fill="none" xmlns="http://www.w3.org/2000/svg">
              <mask id="path-1-outside-1_0_1" maskUnits="userSpaceOnUse" x="51.3477" y="49.693" width="24" height="97"
                fill="black">
                <rect fill="white" x="51.3477" y="49.693" width="24" height="97" />
                <path
                  d="M72.6678 51.4704L68.8282 117.116H57.3092L53.4696 51.4704H72.6678ZM63.1926 144.551C60.3438 144.551 57.9285 143.56 55.9468 141.578C53.965 139.597 52.9741 137.181 52.9741 134.332C52.9741 131.525 53.965 129.13 55.9468 127.149C57.9285 125.167 60.3438 124.176 63.1926 124.176C66 124.176 68.3947 125.167 70.3764 127.149C72.3582 129.13 73.349 131.525 73.349 134.332C73.349 137.181 72.3582 139.597 70.3764 141.578C68.3947 143.56 66 144.551 63.1926 144.551Z" />
              </mask>
              <path
                d="M72.6678 51.4704L73.9043 51.5428L73.981 50.2318H72.6678V51.4704ZM68.8282 117.116V118.355H69.9964L70.0646 117.188L68.8282 117.116ZM57.3092 117.116L56.0727 117.188L56.141 118.355H57.3092V117.116ZM53.4696 51.4704V50.2318H52.1564L52.2331 51.5428L53.4696 51.4704ZM55.9468 141.578L55.071 142.454L55.9468 141.578ZM55.9468 127.149L55.071 126.273L55.9468 127.149ZM70.3764 141.578L69.5006 140.702L70.3764 141.578ZM71.4313 51.3981L67.5917 117.044L70.0646 117.188L73.9043 51.5428L71.4313 51.3981ZM68.8282 115.877H57.3092V118.355H68.8282V115.877ZM58.5457 117.044L54.7061 51.3981L52.2331 51.5428L56.0727 117.188L58.5457 117.044ZM53.4696 52.709H72.6678V50.2318H53.4696V52.709ZM63.1926 143.312C60.6662 143.312 58.5678 142.448 56.8226 140.702L55.071 142.454C57.2892 144.672 60.0214 145.789 63.1926 145.789V143.312ZM56.8226 140.702C55.0774 138.957 54.2127 136.859 54.2127 134.332H51.7355C51.7355 137.504 52.8527 140.236 55.071 142.454L56.8226 140.702ZM54.2127 134.332C54.2127 131.853 55.0736 129.773 56.8226 128.024L55.071 126.273C52.8565 128.487 51.7355 131.197 51.7355 134.332H54.2127ZM56.8226 128.024C58.5678 126.279 60.6662 125.415 63.1926 125.415V122.937C60.0214 122.937 57.2892 124.055 55.071 126.273L56.8226 128.024ZM63.1926 125.415C65.6722 125.415 67.7516 126.275 69.5006 128.024L71.2522 126.273C69.0377 124.058 66.3279 122.937 63.1926 122.937V125.415ZM69.5006 128.024C71.2496 129.773 72.1104 131.853 72.1104 134.332H74.5876C74.5876 131.197 73.4667 128.487 71.2522 126.273L69.5006 128.024ZM72.1104 134.332C72.1104 136.859 71.2458 138.957 69.5006 140.702L71.2522 142.454C73.4705 140.236 74.5876 137.504 74.5876 134.332H72.1104ZM69.5006 140.702C67.7516 142.451 65.6722 143.312 63.1926 143.312V145.789C66.3279 145.789 69.0377 144.669 71.2522 142.454L69.5006 140.702Z"
                fill="#FF4A23" mask="url(#path-1-outside-1_0_1)" />
              <path
                d="M35.4936 182.641L35.4959 182.642C43.7873 187.751 53.8141 190.29 65.5471 190.29C77.2796 190.29 87.2662 187.751 95.4762 182.641C103.741 177.548 110.417 170.619 115.503 161.866C120.66 153.047 124.398 142.95 126.721 131.581C129.042 120.224 130.202 108.292 130.202 95.785C130.202 83.2783 129.042 71.3461 126.721 59.9898C124.398 48.5388 120.661 38.3596 115.504 29.4592C110.42 20.5412 103.744 13.5283 95.4776 8.43414C87.2674 3.24091 77.2802 0.660854 65.5471 0.660854C53.8126 0.660854 43.7847 3.24149 35.4928 8.43413C27.3088 13.5284 20.6339 20.541 15.4674 29.4574L15.4653 29.4611C10.3915 38.361 6.69621 48.5396 4.37292 59.99C2.05198 71.3462 0.892421 83.2783 0.892421 95.785C0.892421 108.292 2.05201 120.224 4.37303 131.581C6.69649 142.949 10.3921 153.046 15.4665 161.863L15.47 161.869C20.6373 170.62 27.312 177.548 35.4936 182.641Z"
                stroke="#FF4A23" stroke-width="1.2386" />
            </svg>
          </span>
          <span class="number">4</span>
        </div>
        <h2 class="error-message">Page Not Found!</h2>
        <p class="error-description">
          We're sorry, but the page you're looking for doesn't exist.
        </p>
        <div class="more-btn style3 home-back-btn">
          <span class="text-1"><a href="index.html"> Back To Home</a></span>

          <span class="svg-icon">
            <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_2476343543_323)">
                <path
                  d="M21.1224 11.0496L11.4311 1.32042C11.2082 1.09665 10.8454 1.09627 10.6212 1.31956C10.3971 1.54286 10.396 1.9057 10.6189 2.12947L19.3352 10.8799L1.28014 10.8609C0.963872 10.8605 0.706807 11.1166 0.705908 11.4329C0.705458 11.5912 0.769035 11.7342 0.872408 11.838C0.975782 11.9418 1.11875 12.0061 1.27689 12.0061L19.3322 12.0253L10.566 20.7573C10.3418 20.9806 10.3408 21.3434 10.5637 21.5672C10.7866 21.791 11.1494 21.7914 11.3736 21.5681L21.1201 11.8595C21.3443 11.6362 21.3453 11.2734 21.1224 11.0496Z"
                  fill="#FF4A23" />
              </g>
              <defs>
                <clipPath id="clip0_2476343543_323">
                  <rect width="21.0576" height="22" fill="white" transform="translate(0.46875 0.432617)" />
                </clipPath>
              </defs>
            </svg>

            <svg width="22" height="23" viewBox="0 0 22 23" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_2476_3233423)">
                <path
                  d="M21.1224 11.0496L11.4311 1.32042C11.2082 1.09665 10.8454 1.09627 10.6212 1.31956C10.3971 1.54286 10.396 1.9057 10.6189 2.12947L19.3352 10.8799L1.28014 10.8609C0.963872 10.8605 0.706807 11.1166 0.705908 11.4329C0.705458 11.5912 0.769035 11.7342 0.872408 11.838C0.975782 11.9418 1.11875 12.0061 1.27689 12.0061L19.3322 12.0253L10.566 20.7573C10.3418 20.9806 10.3408 21.3434 10.5637 21.5672C10.7866 21.791 11.1494 21.7914 11.3736 21.5681L21.1201 11.8595C21.3443 11.6362 21.3453 11.2734 21.1224 11.0496Z"
                  fill="#FF4A23" />
              </g>
              <defs>
                <clipPath id="clip0_2476_3233423">
                  <rect width="21.0576" height="22" fill="white" transform="translate(0.46875 0.432617)" />
                </clipPath>
              </defs>
            </svg>
          </span>
        </div>
      </div>
    </div>
  </div>
  <!-- End Main Content -->

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