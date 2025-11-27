@extends('layouts.app')

@section('content')

<!-- Start Breadcrumb -->
<div class="ak-height-150 ak-height-lg-120"></div>
<div class="breadcrumb-area style-2">
  <div class="container">
    <div class="breadcrumb-wapper style-2">
      <div class="breadcrumb-title-box">
        <h1 class="breadcrumb-title">
          Our <span class="highlight-text"> Exceptional</span> Digital
          Industrial
          <span class="highlight-text">Recent News</span>
        </h1>
        <div class="breadcrumb-caption">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="223" height="12" viewBox="0 0 223 12" fill="none">
              <path d="M1.33789 1.18359H221.034L209.173 10.9822" stroke="#FF4A23" stroke-linecap="round"></path>
            </svg>
          </span>
          <span><a href="{{ url('/') }}">Home</a> / Blog Details </span>
        </div>
      </div>
    </div>
  </div>
  <div class="breadcrumb-stroke text-normal">ARTICLES</div>
</div>
<!-- End Breadcrumb -->

<!--Start Blogs Main Images -->
<div class="ak-height-150 ak-height-lg-80"></div>
<div class="portfolio-main-img ak-center ak-parallax">
  @if($blog->image)
    <img src="{{ asset( $blog->image) }}" class="td-main-img" alt="{{ $blog->title }}" />
  @else
  <img src="assets/img/team/td-main-img.png" class="td-main-img" alt="{{ $blog->title }}" />
  @endif
</div>
<!--End Blogs Main Images -->

<!-- Start Blog Details -->
<div class="ak-height-85 ak-height-lg-50"></div>
<div class="container blogs-details-wapper">
  <div class="blogs-details">
    <h2 class="blogs-details-main-title">
      {{ $blog->title }}
    </h2>
    <div class="ak-height-30 ak-height-lg-30"></div>
    <p class="blogs-details-desp-text">
      {{ $blog->short_description }}
    </p>
    <div class="ak-height-50 ak-height-lg-50"></div>
    <p class="blogs-details-desp-text">
      {!! $blog->description !!}  
    </p>
    <div class="ak-height-100 ak-height-lg-50"></div>
  </div>
</div>
<!-- End Blog Details -->

@endsection