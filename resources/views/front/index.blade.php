@extends('layouts.app')

@section('content')

<!-- Start Hero -->
<section class="container container-customize">
  <div class="digital-agencye-hero style-1">
    <div class="hero-left-column">
      <div class="title-box">
        <h2 class="title">
          <span class="digital">DIGITAL</span>
          <span class="agency">AGENCY</span>
        </h2>
      </div>
      <div class="cta-box">
        <div class="hero-btn">
          <a href="{{ route ('contact.index') }}" class="circle-btn circle-btn-anim">
            <span class="text text-uppercase">
              Start
              <i class="flaticon-up-right-arrow"></i>
              <br />
              Project
            </span>
          </a>
        </div>
        <p class="description">
          {{ $about->text_2 ?? 'Lorem ipsum is simply dummy text of the printing and typesetting
          industry. Lorem ipsum has been the industry\'s standard dummy text
          ever since the 1500s.' }}
        </p>
      </div>
      <div class="partners-section">
        <div class="da-shape-line"></div>
        <h6 class="partners-title">Our Trusted Partner</h6>
        <div class="ak-slider partners-logos-slider">
          <div class="swiper-wrapper">
            @if($partners->count() > 0)
            @foreach ( $partners as $partner )

            <div class="swiper-slide mr-2 pr-2">
              <div class="client-logo style2">
                <img src="{{ $partner->logo }}" alt="{{ $partner->title }}" />
                {{-- <div class="client-info">
                  <h6 class="client-title">{{ $partner->title }}</h6>
                </div> --}}
              </div>
            </div>
            @endforeach
            @else
            <div class="swiper-slide">
              <div class="client-logo style2">
                <img src="assets/img/client/client-1.png" alt="" />
                <div class="client-info">
                  <h6 class="client-title">Credesign</h6>
                  <p class="client-shot-title">Portfolio Template</p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="client-logo style2">
                <img src="{{ asset('front/img/client/client-2.png') }}" alt="" />
                <div class="client-info">
                  <h6 class="client-title">Credesign</h6>
                  <p class="client-shot-title">Portfolio Template</p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="client-logo style2">
                <img src="{{ asset('front/img/client/client-3.png') }}" alt="" />
                <div class="client-info">
                  <h6 class="client-title">Credesign</h6>
                  <p class="client-shot-title">Portfolio Template</p>
                </div>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="client-logo style2">
                <img src="{{ asset('front/img/client/client-4.png') }}" alt="" />
                <div class="client-info">
                  <h6 class="client-title">Credesign</h6>
                  <p class="client-shot-title">Portfolio Template</p>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
        <div class="partners-swiper-controller">
          <div class="partners-logs-scrollbar"></div>
          <div class="partners-logs-navigation">
            <div class="partners-logs-button-next hover-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="10" viewBox="0 0 28 10" fill="none">
                <g clip-path="url(#clip0_278989272_379)">
                  <path
                    d="M0.716728 5.58228L6.17073 1.58728V5.24028L26.5947 5.58228L6.17073 5.92428V9.57728L0.716728 5.58228Z"
                    fill="#353535" />
                </g>
                <defs>
                  <clipPath id="clip0_278989272_379">
                    <rect width="27" height="9" fill="white" transform="matrix(-1 0 0 1 27.4551 0.949463)" />
                  </clipPath>
                </defs>
              </svg>
            </div>
            <div class="partners-logs-button-prev hover-2">
              <svg xmlns="http://www.w3.org/2000/svg" width="28" height="10" viewBox="0 0 28 10" fill="none">
                <g clip-path="url(#clip0_2221321372_376)">
                  <path
                    d="M27.1934 5.58228L21.7394 1.58728V5.24028L1.31543 5.58228L21.7394 5.92428V9.57728L27.1934 5.58228Z"
                    fill="#353535" />
                </g>
                <defs>
                  <clipPath id="clip0_2221321372_376">
                    <rect width="27" height="9" fill="white" transform="translate(0.455078 0.949463)" />
                  </clipPath>
                </defs>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hero-right-column">
      <p class="description">
        {{ $about->text_1 ?? 'Lorem ipsum is simply dummy text of the printing and typesetting
        industry. Lorem ipsum has been the industry\'s standard dummy text
        ever since the 1500s.' }}
      </p>
      <div class="image-box">
        <div class="da-shape-star">
          <img class="star-shape" src="{{ asset('front/img/shape/star-1.png') }}" alt="..." />
        </div>
        <div class="hero-right-image"></div>
        <video autoplay muted loop playsinline>
          <source src="{{ $about->video_link ? asset($about->video_link) : asset('front/videos/digital-agencye.mp4') }}"
            type="video/mp4" />
          Your browser does not support the video tag.
        </video>
      </div>
    </div>
  </div>
</section>
<!-- End Hero -->

<!-- Start About -->
<div class="ak-height-95 ak-height-lg-80"></div>
<section class="about-content container">
  <div class="star-content">
    <img src="{{ asset('front/img/shape/star-2.png') }}" alt="star" class="star-1" />
    <img src="{{ asset('front/img/shape/star-2.png') }}" alt="star" class="star-2" />
  </div>
  <div class="about-info">
    <h3 class="about-title text-color-shiption">
      {!! $about->description ?? 'We thrive on <span class="highlight ak-black-color">creativity</span> and <span
        class="highlight">innovation</span>. Our team is constantly exploring new ideas and approaches to ensure your
      <span class="highlight">digital presence</span> is fresh, engaging, and ahead of the competition.' !!}
    </h3>

    <div class="fade-animation">
      <a href="{{ route('about.index') }}" class="more-btn">
        <span class="morebtn-text"> More AboutUs </span>
        <span class="primary-icon-anim">
          <i class="flaticon-up-right-arrow"></i>
          <i class="flaticon-up-right-arrow"></i>
        </span>
      </a>
    </div>

    <img src="{{ asset('front/img/shape/line-2.png') }}" alt="swirl design" class="swirl" />
  </div>
</section>
<!-- End About -->

<!-- Start Services -->
<div class="ak-height-150 ak-height-lg-80"></div>
<section class="service-bg">
  <div class="container">
    <div class="ak-height-150 ak-height-lg-80"></div>
    <div class="service-content">
      <div class="ak-section-heading ak-style-1">
        <div class="ak-section-left">
          <h2 class="ak-section-title text-animation" data-ease="power2.out" data-split-text="chars" data-duration="0.7"
            data-direction="textTop" data-offset="100%">
            Our <span class="highlight">Exceptional</span> Digital
            Transformation <span class="highlight">Services</span>
          </h2>
        </div>
        <div class="ak-section-right">
          <p class="ak-section-desp text-animation" data-direction="rotationX" data-split-text="lines" data-delay="0.3">
            {{ $about->service_quote ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. has
            been industry and typesetting of the printing .' }}
          </p>
          <div class="ak-section-caption fade-animation" data-direction="right" data-delay="0.3">
            <span>
              <svg xmlns="http://www.w3.org/2000/svg" width="223" height="12" viewBox="0 0 223 12" fill="none">
                <path d="M1.33789 1.18359H221.034L209.173 10.9822" stroke="#FF4A23" stroke-linecap="round" />
              </svg>
            </span>
            <span> Services </span>
          </div>
        </div>
      </div>

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
          <div class="service-left-info">
            <h4 class="service-title">{{ $service->title }}</h4>
            <ul class="service-lists">
              <li class="service-list">
                <span>
                  <i class="flaticon-star-2"></i>
                </span>
                <span> Brand Research </span>
              </li>
              <li class="service-list">
                <span>
                  <i class="flaticon-star-2"></i>
                </span>
                <span> Competitor Analysis </span>
              </li>
              <li class="service-list">
                <span>
                  <i class="flaticon-star-2"></i>
                </span>
                <span> Design Structure </span>
              </li>
            </ul>
          </div>
          <div class="service-left-right">
            <p class="service-desp">
              {{ $service->shortdescription ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting
              industry.
              Lorem Ipsum has been industry and typesetting.' }}
            </p>
            <div class="service-btn-content">
              <a href="{{ route('service.show', $service->id) }}" class="more-btn">
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
</section>
<!-- End Services -->

<!-- Start Core Feature static -->
<div class="ak-height-150 ak-height-lg-80"></div>
<section class="core-features-area">
  <div class="container">
    <div class="core-features">
      <div class="core-feature-card fade-animation" data-delay="0.15" data-direction="left">
        <div class="icon">
          <i class="flaticon-circle"></i>
        </div>
        <h6 class="core-feature-title">Strategic Marketing</h6>
        <p class="core-feature-desp">
          Lorem Ipsum is simply dummy text of the printing and typesetting
          industry. Lorem Ipsum has been industry.
        </p>
        <p class="core-feature-number">01</p>
      </div>
      <div class="core-feature-card fade-animation" data-delay="0.35" data-direction="left">
        <div class="icon">
          <i class="flaticon-folded"></i>
        </div>
        <h6 class="core-feature-title">Strategic Marketing</h6>
        <p class="core-feature-desp">
          Lorem Ipsum is simply dummy text of the printing and typesetting
          industry. Lorem Ipsum has been industry.
        </p>
        <p class="core-feature-number">02</p>
      </div>
      <div class="core-feature-card fade-animation" data-delay="0.55" data-direction="left">
        <div class="icon">
          <i class="flaticon-twirl"></i>
        </div>
        <h6 class="core-feature-title">Strategic Marketing</h6>
        <p class="core-feature-desp">
          Lorem Ipsum is simply dummy text of the printing and typesetting
          industry. Lorem Ipsum has been industry.
        </p>
        <p class="core-feature-number">03</p>
      </div>
    </div>
  </div>
</section>
<!-- Start Core Feature -->

<!-- Start Projects -->
<div class="ak-height-150 ak-height-lg-80"></div>
<section class="container">
  <div class="portfolio-content">
    <div class="d-flex flex-lg-column flex-column-reverse">
      <div class="portfolio-content-top">
        @foreach($projects->take(2) as $project)
        <a href="{{ route('project.show', $project->id) }}" class="portfolio-card style-1">
          <div class="portfolio-img img-anim-left-show">
            <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" />
          </div>
          <div class="portfolio-info">
            <div class="portfolio-subtitle">{{ $project->service->title ?? 'Google Marketing' }}</div>
            <div class="portfolio-text style-1">
              <h4 class="portfolio-title">{{ $project->title }}</h4>
              <div class="portfolio-btn">
                <i class="flaticon-up-right-arrow"></i>
              </div>
            </div>
          </div>
        </a>
        @endforeach
      </div>

      <h2 class="portfolio-title-content">
        Our <span class="highlight">Exceptional</span> Sucessfull
        <br />
        <span class="highlight style-2">Projects</span>
      </h2>
      <div class="ak-height-lg-80"></div>
    </div>
    <div class="portfolio-content-bottom">
      @foreach($projects->slice(2) as $project)
      <a href="{{ route('project.show', $project->id) }}" class="portfolio-card style-1 mb-0 mb-md-5">
        <div class="portfolio-img img-anim-left-show">
          <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" />
        </div>
        <div class="portfolio-info">
          <div class="portfolio-subtitle">{{ $project->service->title ?? 'Google Marketing' }}</div>
          <div class="portfolio-text style-1">
            <h4 class="portfolio-title">{{ $project->title }}</h4>
            <div class="portfolio-btn">
              <i class="flaticon-up-right-arrow"></i>
            </div>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>
<!-- End Projects -->

<!-- Start  funfact -->
<div class="ak-height-150 ak-height-lg-80"></div>
<div class="container">
  <div class="funfact-content">
    <div class="funfact style1">
      <div class="funfact-card style-1">
        <div class="funfact-number">
          <span id="count1" class="amin_auto_count">{{ $about->projects_completed ?? '65' }}</span>
          <span>K</span>
        </div>
        <p class="funfact-text">Project Completed</p>
      </div>
    </div>
    <div class="funfact style1">
      <div class="funfact-card style-1">
        <div class="funfact-number">
          <span id="count2" class="amin_auto_count">{{ $about->happy_customers ?? '8' }}</span>
          <span>K</span>
        </div>
        <p class="funfact-text">Happy Customers</p>
      </div>
    </div>

    <div class="funfact style1">
      <div class="funfact-card style-1">
        <div class="funfact-number">
          <span id="count3" class="amin_auto_count">{{ $about->years_of_experience ?? '32' }}</span>
          <span>+</span>
        </div>
        <p class="funfact-text">Years of Experience</p>
      </div>
    </div>
    <div class="funfact style1">
      <div class="funfact-card style-1">
        <div class="funfact-number">
          <span id="count4" class="amin_auto_count">{{ $about->award_achievement ?? '13' }}</span>
        </div>
        <p class="funfact-text">Award Achievement</p>
      </div>
    </div>
  </div>
</div>
<!-- End funfact -->

<!-- Start Video -->
<div class="ak-height-150 ak-height-lg-80"></div>
<a href="{{ $about->video_link ?? 'https://www.youtube.com/watch?v=VcaAVWtP48A' }}"
  class="ak-center ak-video-block ak-style1 ak-video-open ak-bg">
  <img src="{{ asset('front/img/bg/video-section-bg.png')}}" class="video-img ak-bg" alt="..." />
  <span class="video-player-btn circle-btn-anim ak-center">
    <span class="text">Play Now</span>
  </span>
</a>
<!-- End Video -->

<!-- Start Scroll text static -->
<div class="ak-height-150 ak-height-lg-80"></div>
<div class="text-moving-container style2">
  <div class="text-moving-bg"></div>
  <div class="text-moving-info">
    <span class="text-moving style2">
      Digital Design / Product Design / Brand Design / Digital Design /
      Product
    </span>
    <span class="text-moving style2">
      Digital Design / Product Design / Brand Design / Digital Desig /
      Product
    </span>
  </div>
</div>
<!-- End Scroll text -->

<!-- Start  Blogs-->
<div class="ak-height-150 ak-height-lg-80"></div>
<section>
  <div class="container">
    <div class="ak-section-heading ak-style-1">
      <div class="ak-section-left">
        <h2 class="ak-section-title text-animation" data-ease="power2.out" data-split-text="chars"
          data-direction="textTop" data-duration="0.7" data-offset="100%">
          Our <span class="highlight">Exceptional</span> Digital Industrial
          <span class="highlight">News</span>
        </h2>
      </div>
      <div class="ak-section-right">
        <p class="ak-section-desp text-animation" data-direction="rotationX" data-split-text="lines" data-delay="0.3">
          {{ $about->blog_quote ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. has been
          industry and typesetting of the printing .' }}
        </p>
        <div class="ak-section-caption fade-animation" data-direction="right" data-delay="0.3">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="223" height="12" viewBox="0 0 223 12" fill="none">
              <path d="M1.33789 1.18359H221.034L209.173 10.9822" stroke="#FF4A23" stroke-linecap="round" />
            </svg>
          </span>
          <span> Recent News </span>
        </div>
      </div>
    </div>
    <div class="ak-height-75 ak-height-lg-50"></div>
    <div class="blogs-content fade-animation">
      @foreach($blogs as $blog)
      <a href="{{ route('blog.show', $blog->id) }}" class="blog-card">
        <div class="blog-image">
          <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" />
        </div>
        <div class="blog-info">
          <div class="blog-heading">
            <div class="meta-info">
              <span class="admin-tag">Admin</span>
              <span class="date-tag">{{ $blog->created_at->format('d/m/Y') }}</span>
            </div>
            <h4 class="blog-title">
              {{ $blog->title }}
            </h4>
            <p class="blog-description">
              {{ Str::limit(strip_tags($blog->short_description ?? 'Lorem ipsum is simply dummy text of the printing and
              typesetting
              industry.
              Lorem ipsum has been industry and typesetting.'), 120, '...') }}
            </p>
          </div>
          <div class="blog-card-btn">
            <i class="flaticon-up-right-arrow"></i>
            <i class="flaticon-up-right-arrow"></i>
          </div>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>
<!-- End  Blogs-->

<!-- Start Newsletter -->
<div class="ak-height-150 ak-height-lg-80"></div>
<section class="container">
  <div class="newsletter-content style-2">
    <div class="newsletter-title-content text-animation">
      <h2 class="newsletter-title">
        Join Our
        <span class="highlight text-underlines underline-anim">
          Newsletter</span>
        for the Latest <span class="highlight">Exclusive</span> Content
      </h2>
    </div>

    <form class="newsletter-form fade-animation" data-direction="right" action="#" method="POST">
      @csrf
      <input type="email" name="email" class="newsletter-input style-2" placeholder="Enter your email..." required />
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