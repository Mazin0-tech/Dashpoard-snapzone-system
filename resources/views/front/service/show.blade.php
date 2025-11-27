@extends('layouts.app')

@section('content')
<!-- Start Breadcrumb -->
<div class="ak-height-150 ak-height-lg-120"></div>
<div class="breadcrumb-area style-2">
  <div class="container">
    <div class="breadcrumb-wapper style-2">
      <div class="breadcrumb-title-box">
        <h1 class="breadcrumb-title">
          {{ $service->title }}
        </h1>
        <div class="breadcrumb-caption">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="223" height="12" viewBox="0 0 223 12" fill="none">
              <path d="M1.33789 1.18359H221.034L209.173 10.9822" stroke="#FF4A23" stroke-linecap="round"></path>
            </svg>
          </span>
          <span><a href="{{ route('home') }}">Home</a> / Services </span>
        </div>
      </div>
    </div>
  </div>
  <div class="breadcrumb-stroke">SERVICE</div>
</div>
<!-- End Breadcrumb -->

<!--Start Services Main Images -->
@if($service->image)
<div class="ak-height-150 ak-height-lg-80"></div>
<div class="container">
  <div class="services-main-img">
    @if ($service->image)
      <img src="{{ $service->image }}" class="img-fluid" alt="{{ $service->title }}" />
    @else
    <img src="{{ asset('front/img/services/services-main-img.png') }}" class="img-fluid" alt="{{ $service->title }}" />
    @endif
  </div>
</div>
@endif
<!--End Services Main Images -->

<!-- Start Services Short Info -->
<section class="container">
  <div class="services-short-info">
    <div class="services-short-info-content">
      <div class="services-short-info-item">
        <span class="services-short-info-label">Services:</span>
        <span class="services-short-info-text">{{ $service->title }}</span>
      </div>
      <div class="services-short-info-item">
        <span class="services-short-info-label">Approximate Time:</span>
        <span class="services-short-info-text">
          {{$service->start_date }} -
          {{$service->end_date }}
        </span>
      </div>
      <div class="services-short-info-item">
        <span class="services-short-info-label">Industry:</span>
        <span class="services-short-info-text">
          {{ $service->industry ?? 'Multiple Industries' }}</span>
      </div>
      <div class="services-short-info-item">
        <span class="services-short-info-label">Area We Cover: </span>
        <span class="services-short-info-text">Around Globe</span>
      </div>
    </div>
  </div>
</section>
<!-- End Services Short Info -->

<!-- Start Services Details Title -->
<section>
  <div class="container">
    <div class="services-details-title">
      <h3 class="services-details-title-text text-animation">
        {{ $service->title }}
      </h3>
      <div class="services-details-title-description">
        {!! $service->description !!}
      </div>

      <!-- FAQ Section -->
      @if($service->faqs && $service->faqs->count() > 0)
      <div class="ak-height-50 ak-height-lg-50"></div>
      <div class="row align-items-center">
        <div class="col-xl-6 col-12 d-none d-xl-block">
          <div class="image-hov-one">
            <img src="{{ asset('front/img/services/accordion-1.png') }}" class="img-fluid" alt="FAQ Image" />
          </div>
        </div>
        <div class="col-xl-6 col-12">
          <div class="ak-accordion">
            @foreach($service->faqs as $index => $faq)
            <div class="ak-accordion-item">
              <div class="ak-accordion-title-content {{ $index === 0 ? 'active' : '' }}">
                <h6 class="ak-accordion-title">
                  {{ $index + 1 }}. {!! $faq->question !!}
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
                {!! $faq->answer !!}
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</section>
<!-- End Services Details Title -->

<!-- باقي الصفحة يبقى كما هو بدون تغيير -->
<!-- Start Process  -->
<div class="ak-height-150 ak-height-lg-80"></div>
<section>
  <div class="container">
    <div class="ak-section-heading ak-style-1">
      <div class="ak-section-left">
        <h2 class="ak-section-title text-animation">
          Our <span class="highlight">Exceptional</span> Digital Industrial
          <span class="highlight">Working Process</span>
        </h2>
      </div>
      <div class="ak-section-right">
        <p class="ak-section-desp"> Through a refined and efficient workflow, we turn concepts into high-impact digital
          experiences. Every step is guided by precision, innovation, and a commitment to excellence. </p>
        <div class="ak-section-caption">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="223" height="12" viewBox="0 0 223 12" fill="none">
              <path d="M1.33789 1.18359H221.034L209.173 10.9822" stroke="#FF4A23" stroke-linecap="round" />
            </svg>
          </span>
          <span> Process </span>
        </div>
      </div>
    </div>
    <div class="ak-height-75 ak-height-lg-50"></div>
    <div class="funfact-content">
      <div class="funfact style1">
        <div class="funfact-card style-1">
          <div class="funfact-number">
           
            <span id="count1" class="amin_auto_count">1</span>
          </div>
          <p class="funfact-text text-center">
            Planning and Idea <br />
            Validation
          </p>
        </div>
      </div>
      <div class="funfact style1">
        <div class="funfact-card style-1">
          <div class="funfact-number">
            
            <span id="count2" class="amin_auto_count">2</span>
          </div>
          <p class="funfact-text text-center">
            Wireframing and <br />
            Design
          </p>
        </div>
      </div>

      <div class="funfact style1">
        <div class="funfact-card style-1">
          <div class="funfact-number">
            
            <span id="count3" class="amin_auto_count">3</span>
          </div>
          <p class="funfact-text text-center">
            Technical Planning & <br />
            Development
          </p>
        </div>
      </div>
      <div class="funfact style1">
        <div class="funfact-card style-1">
          <div class="funfact-number">
            
            <span id="count4" class="amin_auto_count">4</span>
          </div>
          <p class="funfact-text text-center">
            Testing, Deployment <br />
            Regular Update
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Start Process  -->

<!-- Start Services Details Cta-->
<div class="ak-height-150 ak-height-lg-80 "></div>
<div class="container">
  <div class="services-details-cta">
    <div class="dot-top-left"></div>
    <div class="dot-top-right"></div>
    <div class="dot-bottom-left"></div>
    <div class="dot-bottom-right"></div>
    <div class="services-bg-start">
      <img src="{{ asset('front/img/shape/cta-start-left.png') }}" class="ak-parallax" alt="..." />
      <img src="{{ asset('front/img/shape/cta-start-right.png') }}" class="ak-parallax" alt="..." />
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

<!-- Start Moving text -->
<div class="ak-height-150 ak-height-lg-80"></div>
<div class="slideing-text-content style2">
  <p class="slideing-text text-color-three">
    Design / Product Development / Brand Design
  </p>
  <p class="slideing-text text-color-two">
    Digital Design / Product Design / Brand Design
  </p>
</div>
<!-- End Moving text -->

<!-- Start Newsletter -->
<div class="ak-height-150 ak-height-lg-80"></div>
<section class="container">
  <div class="newsletter-content style-2">
    <div class="newsletter-title-content">
      <h2 class="newsletter-title text-animation">
        Join Our
        <span class="highlight text-underlines underline-anim">Newsletter</span>
        for the Latest <span class="highlight">Exclusive</span> Content
      </h2>
    </div>

    <form class="newsletter-form">
      <input type="email" class="newsletter-input style-2" placeholder="Enter your email..." required />
      <button type="submit" class="newsletter-btn">
        <span class="newbtn-text"> Newsletter </span>
        <span class="primary-icon-anim">
          <i class="flaticon-up-right-arrow"></i>
          <i class="flaticon-up-right-arrow"></i>
        </span>
      </button>
    </form>
  </div>
</section>
<!-- End Newsletter -->
@endsection