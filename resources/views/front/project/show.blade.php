@extends('layouts.app')

@section('content')

@push('css')
<style>
  .gallery-card {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
  }

  .gallery-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
  }

  .gallery-img-top {
    overflow: hidden;
    position: relative;
  }

  .gallery-img-top img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .gallery-card:hover .gallery-img-top img {
    transform: scale(1.05);
  }

  /* تصنيف الصور حسب النوع */
  .img-landscape {
    height: 200px;
    /* ارتفاع أقل للصور الأفقية */
  }

  .img-portrait {
    height: 300px;
    /* ارتفاع أكبر للصور العمودية */
  }

  /* تحسينات للشريط المنزلق */
  .ak-gallery-slider .swiper-slide {
    padding: 0 10px;
  }

  .gallery-swiper-controller {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }

  .gallery-logs-navigation {
    display: flex;
    gap: 10px;
  }

  .gallery-logs-button-prev,
  .gallery-logs-button-next {
    cursor: pointer;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #e9ecef;
    border-radius: 50%;
    transition: all 0.3s ease;
  }

  .gallery-logs-button-prev:hover,
  .gallery-logs-button-next:hover {
    background: #007bff;
    border-color: #007bff;
  }

  .gallery-logs-button-prev:hover svg path,
  .gallery-logs-button-next:hover svg path {
    fill: white;
  }

  /* Matterport 3D Tour Styles */
  .matterport-container {
    width: 100%;
    background: #f8f9fa;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
  }

  .matterport-wrapper {
    position: relative;
    width: 100%;
  }

  .matterport-iframe-container {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%;
    /* نسبة 16:9 */
    height: 0;
    overflow: hidden;
    background: #000;
  }

  .matterport-iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
  }

  .matterport-controls {
    position: absolute;
    bottom: 20px;
    right: 20px;
    z-index: 10;
  }

  /* تحسينات للشاشات الصغيرة */
  @media (max-width: 768px) {
    .matterport-container {
      border-radius: 10px;
      margin-bottom: 20px;
    }

    .matterport-iframe-container {
      padding-bottom: 75%;
      /* نسبة 4:3 للشاشات الصغيرة */
    }
  }

  /* وضع Fullscreen */
  .matterport-iframe:-webkit-full-screen {
    width: 100%;
    height: 100%;
  }

  .matterport-iframe:-moz-full-screen {
    width: 100%;
    height: 100%;
  }

  .matterport-iframe:-ms-fullscreen {
    width: 100%;
    height: 100%;
  }

  .matterport-iframe:fullscreen {
    width: 100%;
    height: 100%;
  }
</style>
@endpush

<!-- Start Breadcrumb -->
<div class="breadcrumb-area style-2">
  <div class="container">
    <div class="breadcrumb-wapper style-2">
      <div class="breadcrumb-title-box">
        <h1 class="breadcrumb-title">
          Our <span class="highlight-text">Exceptional</span> Successful
          Development
          <span class="highlight-text">Project</span>
        </h1>
        <div class="breadcrumb-caption">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="223" height="12" viewBox="0 0 223 12" fill="none">
              <path d="M1.33789 1.18359H221.034L209.173 10.9822" stroke="#FF4A23" stroke-linecap="round"></path>
            </svg>
          </span>
          <span><a href="{{ url('/') }}">Home</a> / <a href="{{ route('projectfront.index') }}">Projects</a> / {{
            $project->title }}</span>
        </div>
      </div>
    </div>
  </div>
  <div class="breadcrumb-stroke" style="margin-top: 110px">Project</div>
</div>
<!-- End Breadcrumb -->

<!--Start Portfolio Main Images -->
<div class="ak-height-150 ak-height-lg-80"></div>
<div class="portfolio-main-img ak-center ak-parallax">
  <img src="{{ asset( $project->image) }}" class="pd-main-img" alt="{{ $project->title }}" />
  <div class="image-content">
    <h4 class="image-content-title me-5">
      {{ $project->title }}
    </h4>

    <div class="image-content-box">
      <div class="image-info">
        <h6 class="image-info-title">Published:</h6>
        <p class="image-info-desp">{{ $project->created_at->format('d/m/Y') }}</p>
      </div>
      <div class="image-info">
        <h6 class="image-info-title">Industry:</h6>
        <p class="image-info-desp">{{ $project->industry }}</p>
      </div>
    </div>
    <div class="image-content-box justify-content-xl-end">
      <div class="image-info">
        <h6 class="image-info-title">Services:</h6>
        <p class="image-info-desp">{{ $project->service->title ?? 'N/A' }}</p>
      </div>
      <div class="image-info">
        <h6 class="image-info-title">Client:</h6>
        <p class="image-info-desp">{{ $project->client }}</p>
      </div>
    </div>
  </div>
</div>
<!--End Portfolio Main Images -->

<!-- Start Portfolio Details Container -->
<div class="container portfolio-details-container">
  <div class="ak-height-75 ak-height-lg-50"></div>
  <div class="portfolio-details-box">
    <h3 class="pd-title mb-2">{{ $project->title }}</h3>
    <div class="pd-desp">
      {!! $project->description !!}
    </div>
  </div>
</div>

<div class="ak-height-150 ak-height-lg-80"></div>

<div class="container-fluid px-0">
  <!-- Start Gallery Section -->
  <section>
    <div class="container">
      <div class="ak-section-heading ak-style-1">
        <div class="ak-section-left">
          <h2 class="ak-section-title text-animation" data-ease="power2.out" data-split-text="chars"
            data-direction="textTop" data-duration="0.7" data-offset="100%">
            Our <span class="highlight">Exceptional</span> Digital Industrial
            <span class="highlight">Gallery</span>
          </h2>
        </div>
        <div class="ak-section-right">
          <p class="ak-section-desp text-animation" data-direction="rotationX" data-split-text="lines" data-delay="0.3">
            Explore the visual journey of our {{ $project->title }} project through our comprehensive gallery.
          </p>
          <div class="ak-section-caption fade-animation" data-direction="right" data-delay="0.3">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" width="223" height="12" viewBox="0 0 223 12" fill="none">
                <path d="M1.33789 1.18359H221.034L209.173 10.9822" stroke="#FF4A23" stroke-linecap="round" />
              </svg>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="ak-height-75 ak-height-lg-50"></div>
    <div class="team-swiper-controller">
      <div class="team-logs-scrollbar"></div>
      <div class="team-logs-navigation">
        <div class="team-logs-button-prev">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="10" viewBox="0 0 28 10" fill="none">
            <g clip-path="url(#clip0_2879789272_379)">
              <path
                d="M0.716728 5.58228L6.17073 1.58728V5.24028L26.5947 5.58228L6.17073 5.92428V9.57728L0.716728 5.58228Z"
                fill="#353535" />
            </g>
            <defs>
              <clipPath id="clip0_2879789272_379">
                <rect width="27" height="9" fill="white" transform="matrix(-1 0 0 1 27.4551 0.949463)" />
              </clipPath>
            </defs>
          </svg>
        </div>
        <div class="team-logs-button-next">
          <svg xmlns="http://www.w3.org/2000/svg" width="28" height="10" viewBox="0 0 28 10" fill="none">
            <g clip-path="url(#clip0_2344554272_376)">
              <path
                d="M27.1934 5.58228L21.7394 1.58728V5.24028L1.31543 5.58228L21.7394 5.92428V9.57728L27.1934 5.58228Z"
                fill="#353535" />
            </g>
            <defs>
              <clipPath id="clip0_2344554272_376">
                <rect width="27" height="9" fill="white" transform="translate(0.455078 0.949463)" />
              </clipPath>
            </defs>
          </svg>
        </div>
      </div>
    </div>
    <div class="mt-4 ak-slider ak-team-slider">
      <div class="swiper-wrapper row row-cols-1 row-cols-md-3 row-cols-lg-5 mx-auto flex-nowrap">
        @foreach($project->image)
        <div class="swiper-slide">
          <a href="#" class="border-0 team-card d-block h-100">
            <div class="team-img-top h-100">
              <img src="{{ $project->image }}" alt="{{ $project->title }}" class="w-100 h-100 object-fit-cover"
                style="@if($project->isLandscape()) max-height: 400px; min-height: 300px; min-width: 500px; max-width: 700px; @else max-height: 500px; min-height: 400px; @endif" />
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <!-- End Gallery Section -->
</div>

<div class="container portfolio-details-container">

  @if($project->link_project)
  <div class="project-link-box mt-4 text-center">
    <a href="{{ $project->link_project }}" target="_blank" class="btn btn-primary">
      <i class="flaticon-up-right-arrow me-2"></i>
      View Live Project
    </a>
  </div>
  @endif

  @if ($project->model_link)
  <!-- Start Matterport 3D Tour Section -->
  <div class="ak-height-150 ak-height-lg-80"></div>
  <div class="container-fluid px-0">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="ak-section-heading ak-style-1 mb-5">
            <div class="ak-section-left">
              <h2 class="ak-section-title text-animation" data-ease="power2.out" data-split-text="chars"
                data-direction="textTop" data-duration="0.7" data-offset="100%">
                Explore Our <span class="highlight">3D Virtual Tour</span>
              </h2>
            </div>
            <div class="ak-section-right">
              <p class="ak-section-desp text-animation" data-direction="rotationX" data-split-text="lines"
                data-delay="0.3">
                Immerse yourself in a virtual experience of the {{ $project->title }} project with our interactive 3D
                tour.
              </p>
              <div class="ak-section-caption fade-animation" data-direction="right" data-delay="0.3">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="223" height="12" viewBox="0 0 223 12" fill="none">
                    <path d="M1.33789 1.18359H221.034L209.173 10.9822" stroke="#FF4A23" stroke-linecap="round" />
                  </svg>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="pb-5">
      <div class="matterport-container">
        <div class="matterport-wrapper">
          <!-- Matterport iframe مع نسبة أبعاد 16:9 -->
          <div class="matterport-iframe-container">
            <iframe src="{{ $project->model_link }}" title="{{ $project->title }} - 3D Virtual Tour" frameborder="0"
              allow="fullscreen; accelerometer; gyroscope; magnetometer; vr; xr-spatial-tracking" allowfullscreen
              loading="lazy" class="matterport-iframe">
            </iframe>
          </div>

          <!-- عنصر تحكم للنسبة إذا لزم الأمر -->
          <div class="matterport-controls d-none">
            <button class="btn btn-outline-primary btn-sm" onclick="enterFullscreen()">
              <i class="fas fa-expand me-2"></i>Full Screen
            </button>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- End Matterport 3D Tour Section -->
  @else
  <div class="ak-height-150 ak-height-lg-80"></div>
  @endif

  <!-- FAQs Section -->
  @if($project->service && $project->service->faqs->where('is_active', true)->count() > 0)
  <div class="p-md-5 mt-5">
    <h4 class="section-title mb-4">FAQs About {{ $project->service->title }}</h4>
    <div class="ak-accordion">
      @foreach($project->service->faqs->where('is_active', true) as $index => $faq)
      <div class="ak-accordion-item">
        <div class="ak-accordion-title-content {{ $index === 0 ? 'active' : '' }}">
          <h6 class="ak-accordion-title mb-0">
            {{ $loop->iteration }}. {{ $faq->question }}
          </h6>
          <span class="accordion-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="11" viewBox="0 0 16 11" fill="none">
              <g clip-path="url(#clip0_347_32rtyr)">
                <path
                  d="M8.00033 1.10913C7.82983 1.10913 7.65916 1.1743 7.529 1.30446L0.862366 7.9711C0.601868 8.23159 0.601868 8.65342 0.862366 8.91376C1.12286 9.17409 1.5447 9.17426 1.80503 8.91376L8.00033 2.71846L14.1956 8.91376C14.4561 9.17426 14.878 9.17426 15.1383 8.91376C15.3986 8.65326 15.3988 8.23143 15.1383 7.9711L8.47166 1.30446C8.34149 1.1743 8.17083 1.10913 8.00033 1.10913Z"
                  fill="#030917"></path>
              </g>
              <defs>
                <clipPath id="clip0_347_32rtyr">
                  <rect width="16" height="10" fill="white" transform="translate(0.000488281 0.109131)"></rect>
                </clipPath>
              </defs>
            </svg>
          </span>
        </div>
        <div class="ak-accordion-tab" style="{{ $index === 0 ? 'display: block;' : 'display: none;' }}">
          <div class="p-3  rounded">
            <div style="font-size: 14px; word-break: break-word;">
              {{ strip_tags($faq->answer) }}
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @endif
  <!-- End FAQs Section -->
</div>
<!-- End Portfolio Details Container -->

<!-- Start Portfolio Details Cta-->

<div class="container">
  <div class="services-details-cta">
    <div class="dot-top-left"></div>
    <div class="dot-top-right"></div>
    <div class="dot-bottom-left"></div>
    <div class="dot-bottom-right"></div>
    <div class="services-bg-start">
      <img src="assets/img/shape/cta-start-left.png" alt="..." />
      <img src="assets/img/shape/cta-start-right.png" alt="..." />
    </div>
    <div class="services-details-cta-wapper">
      <div class="services-details-cta-content">
        <h2 class="services-details-cta-title text-animation">
          Get in Touch to Bring Your
          <span class="highlight text-underlines underline-anim">Project</span>
          to Life!
        </h2>
      </div>
    </div>
    <div class="services-details-cta-btn">
      <a href="{{ route('contactfront.index') }}" class="circle-btn style-1 circle-btn-anim">
        <span class="text text-uppercase">
          Start
          <i class="flaticon-up-right-arrow"></i>
          <br />
          Project
        </span>
      </a>
    </div>
  </div>
</div>
<!-- End Services Details Cta-->

@endsection

@push('js')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Accordion functionality - إصدارة واحدة فقط
    const accordionItems = document.querySelectorAll('.ak-accordion-item');
    
    accordionItems.forEach(item => {
        const title = item.querySelector('.ak-accordion-title-content');
        const tab = item.querySelector('.ak-accordion-tab');
        const icon = item.querySelector('.accordion-icon svg');
        
        title.addEventListener('click', function() {
            // Close all other items first
            accordionItems.forEach(otherItem => {
                if (otherItem !== item) {
                    otherItem.querySelector('.ak-accordion-title-content').classList.remove('active');
                    otherItem.querySelector('.ak-accordion-tab').style.display = 'none';
                    otherItem.querySelector('.accordion-icon svg').style.transform = 'rotate(0deg)';
                }
            });
            
            // Toggle current item
            const isActive = title.classList.contains('active');
            
            if (isActive) {
                // Close current item
                title.classList.remove('active');
                tab.style.display = 'none';
                icon.style.transform = 'rotate(0deg)';
            } else {
                // Open current item
                title.classList.add('active');
                tab.style.display = 'block';
                icon.style.transform = 'rotate(180deg)';
            }
        });
    });

    function enterFullscreen() {
    const iframe = document.querySelector('.matterport-iframe');
    if (iframe.requestFullscreen) {
    iframe.requestFullscreen();
    } else if (iframe.mozRequestFullScreen) { // Firefox
    iframe.mozRequestFullScreen();
    } else if (iframe.webkitRequestFullscreen) { // Chrome, Safari and Opera
    iframe.webkitRequestFullscreen();
    } else if (iframe.msRequestFullscreen) { // IE/Edge
    iframe.msRequestFullscreen();
    }
    }
    
    // كشف تغيير وضع Fullscreen
    document.addEventListener('fullscreenchange', exitHandler);
    document.addEventListener('webkitfullscreenchange', exitHandler);
    document.addEventListener('mozfullscreenchange', exitHandler);
    document.addEventListener('MSFullscreenChange', exitHandler);
    
    function exitHandler() {
    if (!document.fullscreenElement &&
    !document.webkitIsFullScreen &&
    !document.mozFullScreen &&
    !document.msFullscreenElement) {

    }
    }

    // باقي الكود الخاص بالسلايدر...
    if (document.querySelector('.ak-gallery-slider')) {
        const gallerySwiper = new Swiper('.ak-gallery-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            navigation: {
                nextEl: '.gallery-logs-button-next',
                prevEl: '.gallery-logs-button-prev',
            },
            scrollbar: {
                el: '.gallery-logs-scrollbar',
                draggable: true,
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                992: {
                    slidesPerView: 4,
                },
                1200: {
                    slidesPerView: 5,
                }
            }
        });
    }
});
</script>
@endpush