@extends('layouts.app')

@section('content')

<!-- Start Breadcrumb -->
<div class="breadcrumb-area style-2">
  <div class="container">
    <div class="breadcrumb-wapper style-2">
      <div class="breadcrumb-title-box">
        <h1 class="breadcrumb-title">
          Our <span class="highlight-text">Exceptional</span> Successful
          Development
          <span class="highlight-text">Projects</span>
        </h1>
        <div class="breadcrumb-caption">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="223" height="12" viewBox="0 0 223 12" fill="none">
              <path d="M1.33789 1.18359H221.034L209.173 10.9822" stroke="#FF4A23" stroke-linecap="round"></path>
            </svg>
          </span>
          <span><a href="{{ url('/') }}">Home</a> / Projects </span>
        </div>
      </div>
    </div>
  </div>
  <div class="breadcrumb-stroke">PROJECTS</div>
</div>
<!-- End Breadcrumb -->

<div class="ak-height-150 ak-height-lg-80"></div>
<div class="container">
  <div class="portfolio-wrapper">
    <div class="row justify-content-between align-items-center g-5 overflow-hidden">
      @foreach($projects as $project)
      <!-- Debug: عرض قيمة slider_type -->
      <!-- <div>Debug: Project ID {{ $project->id }} - slider_type: {{ $project->slider_type }} - isPortrait: {{ $project->isPortrait() ? 'true' : 'false' }} - isLandscape: {{ $project->isLandscape() ? 'true' : 'false' }}</div> -->

      @if($project->isPortrait())
      <!-- Mobile Apps - Portrait (عمودي) - ارتفاع طويل -->
      <div class="col-md-6 mb-4">
        <a href="{{ route('projectfront.show', $project->id) }}" class="portfolio-card overflow-hidden d-block h-100">
          <div class="portfolio-top-img img-anim-left-show">
            <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="w-100"
              style="height: 600px; object-fit: cover; object-position: top;" />
          </div>
          <div class="portfolio-content">
            <h6 class="portfolio-title">
              {{ $project->title }}
            </h6>
            <div class="portfolio-btn">
              <i class="flaticon-up-right-arrow"></i>
            </div>
          </div>
        </a>
      </div>
      @elseif($project->isLandscape())
      <!-- Websites/Systems - Landscape (أفقي) - ارتفاع قصير -->
      <div class="col-md-6 mb-4">
        <a href="{{ route('projectfront.show', $project->id) }}" class="portfolio-card overflow-hidden d-block h-100">
          <div class="portfolio-top-img img-anim-right-show">
            <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="w-100"
              style="height: 350px; object-fit: cover;" />
          </div>
          <div class="portfolio-content">
            <h6 class="portfolio-title">
              {{ $project->title }}
            </h6>
            <div class="portfolio-btn">
              <i class="flaticon-up-right-arrow"></i>
            </div>
          </div>
        </a>
      </div>
      @else
      <!-- Fallback للمشاريع اللي ملهاش slider_type -->
      <div class="col-md-6 mb-4">
        <a href="{{ route('projectfront.show', $project->id) }}" class="portfolio-card overflow-hidden d-block h-100">
          <div class="portfolio-top-img img-anim-left-show">
            <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="w-100"
              style="height: 400px; object-fit: cover;" />
          </div>
          <div class="portfolio-content">
            <h6 class="portfolio-title">
              {{ $project->title }}
            </h6>
            <div class="portfolio-btn">
              <i class="flaticon-up-right-arrow"></i>
            </div>
          </div>
        </a>
      </div>
      @endif
      @endforeach
    </div>

    @if($projects->hasMorePages())
    <div class="ak-height-150 ak-height-lg-80"></div>
    <div class="ak-center">
      <a href="{{ $projects->nextPageUrl() }}" class="circle-btn circle-btn-anim">
        <span class="text text-uppercase">
          Load More
          <br />
          Projects
          <i class="flaticon-up-right-arrow"></i>
        </span>
      </a>
    </div>
    @endif
  </div>
</div>

@endsection