@extends('layouts.app')

@section('content')

@push('css')



@endpush

<!-- Start Breadcrumb -->
<div class="breadcrumb-area">
  <div class="container">
    <div class="breadcrumb-wapper style-2">
      <div class="breadcrumb-title-box">
        <h1 class="breadcrumb-title text-animation" data-direction="textRotate" data-split-text="lines"
          data-duration="1.5">
          Our <span class="highlight-text">Exceptional</span> Digital
          Transformation
          <span class="highlight-text">Services</span>
        </h1>
        <div class="breadcrumb-caption">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="223" height="12" viewBox="0 0 223 12" fill="none">
              <path d="M1.33789 1.18359H221.034L209.173 10.9822" stroke="#FF4A23" stroke-linecap="round"></path>
            </svg>
          </span>
          <span><a href="{{ url('/') }}">Home</a> / Services </span>
        </div>
      </div>
      <div>
       <div class="breadcrumb-img-box">
          <video autoplay="" muted="" loop="">
            <source src="{{ asset ('front/videos/markag-video.mp4')}}" type="video/mp4" />
            Your browser does not support the video tag.
          </video>
          <div class="breadcrumb-cricle">
            <div class="cricle-animated-text">
              <div class="rounded-text rotating">
                <svg viewBox="0 0 200 200">
                  <path id="textPath" d="M 85,0 A 85,85 0 0 1 -85,0 A 85,85 0 0 1 85,0" transform="translate(100,100)"
                    fill="none" stroke-width="0"></path>
                  <g font-size="22.1px">
                    <text text-anchor="start">
                      <textPath class="coloring" xlink:href="#textPath" startOffset="0%">
                        DIGITAL PRESENCE CREATIVITY & INNOVATION I N &nbsp;
                      </textPath>
                    </text>
                  </g>
                </svg>
              </div>
              <div class="cricle-ceneter-text"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Breadcrumb -->

<!-- Start Scroll text -->
<div class="ak-height-150 ak-height-lg-50"></div>
<div class="background-gradient">
  <div class="text-container">
    <span class="text-gradient">
      Digital Design / Product Design / Brand Design / Digital Design /
      Product
    </span>
    <span class="text-gradient">
      Digital Design / Product Design / Brand Design / Digital Desig /
      Product
    </span>
  </div>
</div>
<!-- End Scroll text -->

<!-- Start Services -->

<section class="service-bg">
  <div class="container">
    <div class="service-content">
      @foreach($services as $index => $service)
      <div class="service-card fade-animation" data-direction="bottom">
        <!-- صورة الخدمة من قاعدة البيانات -->
        @if($service->image)
        <img class="service-hover-img" src="{{ asset($service->image) }}" alt="{{ $service->title }}" />
        @else
        <!-- صورة افتراضية إذا لم توجد صورة -->
        <img class="service-hover-img" src="{{ asset('front/img/services/services-hover-' . ($index + 1) . '.png') }}"
          alt="{{ $service->title }}" />
        @endif

        <div class="service-card-item style-1">
          <div class="service-left-info d-flex align-items-center">
            <h4 class="service-title">{{ $service->title }}</h4>
          </div>
          <div class="service-left-right">
            <p class="service-desp">
              {!! $service->shortdescription ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting
              industry.
              Lorem Ipsum has been industry and typesetting.' !!}
            </p>
            <div class="service-btn-content">
              <a href="{{ route('servicefront.show', $service->id) }}" class="more-btn">
                <span class="morebtn-text"> Learn More </span>
                <span class="primary-icon-anim">
                  <i class="flaticon-up-right-arrow"></i>
                  <i class="flaticon-up-right-arrow"></i>
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="service-stroke-number ak-stroke-number">{{ sprintf('%02d', $index + 1) }}</div>
      </div>
      @endforeach
    </div>
    <div class="ak-height-150 ak-height-lg-80"></div>
</section>
<!-- End Services -->
<!-- End Services -->

<!-- Start Newsletter -->
<div class="ak-height-150 ak-height-lg-80"></div>
<section class="container">
  <div class="newsletter-content style-2">
    <div class="newsletter-title-content">
      <h2 class="newsletter-title text-animation">
        Join Our
        <span class="highlight text-underlines underline-anim">
          Newsletter</span>
        for the Latest <span class="highlight">Exclusive</span> Content
      </h2>
    </div>

    <form class="newsletter-form">
      <input type="email" class="newsletter-input style-2" placeholder="Enter your email..." required />
      <button type="submit" class="newsletter-btn">
        <span class="newbtn-text"> Subscribe </span>
        <span class="primary-icon-anim">
          <i class="flaticon-up-right-arrow"></i>
          <i class="flaticon-up-right-arrow"></i>
        </span>
      </button>
    </form>
  </div>
</section>
<!-- End Newsletter -->

<!-- Start CTA Section -->
<div class="ak-height-150 ak-height-lg-80"></div>
<section class="container">
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
          Ready to Transform Your
          <span class="highlight text-underlines underline-anim">Business</span>
          with Our Services?
        </h2>
      </div>
    </div>
    <div class="services-details-cta-btn">
      <a href="{{ route('contactfront.index') }}" class="circle-btn style-1 circle-btn-anim">
        <span class="text text-uppercase">
          Get
          <i class="flaticon-up-right-arrow"></i>
          <br />
          Started
        </span>
      </a>
    </div>
  </div>
</section>
<!-- End CTA Section -->

<div class="ak-height-100 ak-height-lg-40"></div>

@endsection