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
          <span><a href="index-2.html">Home</a> / Recent News </span>
        </div>
      </div>
    </div>
  </div>
  <div class="breadcrumb-stroke text-normal">Articles</div>
</div>
<!-- End Breadcrumb -->

<!-- Start  Blogs-->
<div class="ak-height-150 ak-height-lg-80"></div>
<section>
  <div class="container">
    <div class="blogs-content">
      @foreach ( $blogs as $blog )

      <a href="{{ route('blogfront.show', $blog->id) }}" class="blog-card">
        <div class="blog-image">
          <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" />
        </div>
        <div class="blog-info">
          <div class="blog-heading">
            <div class="meta-info">
              <span class="admin-tag">{{ $settings->site_name }}</span>
              <span class="date-tag">{{ $blog->created_at->format('d/m/Y') }}</span>
            </div>
            <h4 class="blog-title">
              {{ $blog->title }}
            </h4>
            <p class="blog-description">
              {!! Str::limit(strip_tags($blog->short_description), 150) !!}
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

    @if($blogs->hasMorePages())
    <div class="ak-height-100 ak-height-lg-50"></div>
    <div class="ak-center">
      <a href="{{ $blogs->nextPageUrl() }}" class="circle-btn circle-btn-anim">
        <span class="text text-uppercase">
          Load More <br />Articles
          <i class="flaticon-up-right-arrow"></i>
        </span>
      </a>
    </div>
    @endif
  </div>
</section>
<!-- End  Blogs-->

@endsection