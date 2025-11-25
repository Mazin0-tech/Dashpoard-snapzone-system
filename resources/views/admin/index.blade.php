@extends('layouts.admin')

@section('content')
@push('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
@endpush
<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Start::page-header -->
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <div>
                <p class="fw-semibold fs-18 mb-0">Welcome back, {{ Auth::user()->name }}!</p>
                <span class="fs-semibold text-muted">Track your activity and manage your content here.</span>
            </div>
            <div class="d-flex align-items-center">
                <span class="badge bg-light text-dark">
                    <i class="ti ti-calendar me-1"></i>
                    {{ now()->format('d M Y') }}
                </span>
            </div>
        </div>
        <!-- End::page-header -->

        <!-- Start::row-1 -->
        <div class="row">
            <!-- Main Statistics Cards -->
            <div class="col-md-12">
                <div class="row">
                    {{-- Total Projects --}}
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-top justify-content-between">
                                    <div>
                                        <span class="avatar avatar-md avatar-rounded bg-primary bg-opacity-10">
                                            <i class="ti ti-layout-dashboard fs-18 text-primary"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill ms-3">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                                            <div>
                                                <p class="text-muted mb-0">Total Projects</p>
                                                <h4 class="fw-semibold mt-1">{{ $projects->count() }}</h4>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge bg-primary-transparent">
                                                    <i class="ti ti-trending-up me-1"></i>
                                                    {{ $projects->where('created_at', '>=', now()->subDays(30))->count()
                                                    }} new
                                                </span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-2">
                                            <div>
                                                <a class="text-primary" href="{{ route('project.index') }}">
                                                    View All <i
                                                        class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Total Services --}}
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-top justify-content-between">
                                    <div>
                                        <span class="avatar avatar-md avatar-rounded bg-secondary bg-opacity-10">
                                            <i class="ti ti-settings fs-18 text-secondary"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill ms-3">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                                            <div>
                                                <p class="text-muted mb-0">Total Services</p>
                                                <h4 class="fw-semibold mt-1">{{ $services->count() }}</h4>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge bg-secondary-transparent">
                                                    Active
                                                </span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-2">
                                            <div>
                                                <a class="text-secondary" href="{{ route('service.index') }}">
                                                    View All <i
                                                        class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Total Partners --}}
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-top justify-content-between">
                                    <div>
                                        <span class="avatar avatar-md avatar-rounded bg-success bg-opacity-10">
                                            <i class="ti ti-users fs-18 text-success"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill ms-3">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                                            <div>
                                                <p class="text-muted mb-0">Total Partners</p>
                                                <h4 class="fw-semibold mt-1">{{ $partners->count() }}</h4>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge bg-success-transparent">
                                                    <i class="ti ti-shield-check me-1"></i>
                                                    Verified
                                                </span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-2">
                                            <div>
                                                <a class="text-success" href="{{ route('partners.index') }}">
                                                    View All <i
                                                        class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Total Blogs --}}
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="card custom-card overflow-hidden">
                            <div class="card-body">
                                <div class="d-flex align-items-top justify-content-between">
                                    <div>
                                        <span class="avatar avatar-md avatar-rounded bg-warning bg-opacity-10">
                                            <i class="ti ti-news fs-18 text-warning"></i>
                                        </span>
                                    </div>
                                    <div class="flex-fill ms-3">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                                            <div>
                                                <p class="text-muted mb-0">Total Blogs</p>
                                                <h4 class="fw-semibold mt-1">{{ $blogs->count() }}</h4>
                                            </div>
                                            <div class="text-end">
                                                <span class="badge bg-warning-transparent">
                                                    <i class="ti ti-eye me-1"></i>
                                                    {{ $blogs->sum('views') }} views
                                                </span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-2">
                                            <div>
                                                <a class="text-warning" href="{{ route('blog.index') }}">
                                                    View All <i
                                                        class="ti ti-arrow-narrow-right ms-2 fw-semibold d-inline-block"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Company Performance Statistics --}}
            <div class="col-md-12 mt-4">
                <div class="card custom-card">
                    <div class="card-header">
                        <h5 class="card-title">Company Performance</h5>
                        <span class="text-muted">Key performance indicators and achievements</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- Projects Completed --}}
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="card bg-info bg-opacity-10 border-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <span class="avatar avatar-md avatar-rounded bg-info">
                                                    <i class="ti ti-checklist fs-18 text-white"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="text-muted mb-0">Projects Completed</p>
                                                <h4 class="fw-semibold mt-1 mb-0">{{ $about->projects_completed ?? 0 }}
                                                </h4>
                                                <small class="text-info">Successful Deliveries</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Happy Customers --}}
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="card bg-primary bg-opacity-10 border-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <span class="avatar avatar-md avatar-rounded bg-primary">
                                                    <i class="ti ti-heart fs-18 text-white"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="text-muted mb-0">Happy Customers</p>
                                                <h4 class="fw-semibold mt-1 mb-0">{{ $about->happy_customers ?? 0 }}
                                                </h4>
                                                <small class="text-primary">Client Satisfaction</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Years of Experience --}}
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="card bg-success bg-opacity-10 border-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <span class="avatar avatar-md avatar-rounded bg-success">
                                                    <i class="ti ti-award fs-18 text-white"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="text-muted mb-0">Years of Experience</p>
                                                <h4 class="fw-semibold mt-1 mb-0">{{ $about->years_of_experience ?? 0 }}
                                                </h4>
                                                <small class="text-success">Industry Expertise</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Awards & Achievements --}}
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <div class="card bg-warning bg-opacity-10 border-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <span class="avatar avatar-md avatar-rounded bg-warning">
                                                    <i class="ti ti-trophy fs-18 text-white"></i>
                                                </span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="text-muted mb-0">Awards & Achievements</p>
                                                <h4 class="fw-semibold mt-1 mb-0">{{ $about->award_achievement ?? 0 }}
                                                </h4>
                                                <small class="text-warning">Recognition & Excellence</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recent Activity & Quick Stats --}}
            <div class="col-md-12 mt-4">
                <div class="row">
                    {{-- Recent Projects --}}
                    <div class="col-xl-6 col-lg-12">
                        <div class="card custom-card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Recent Projects</h5>
                                <a href="{{ route('project.index') }}" class="btn btn-sm btn-primary">View All</a>
                            </div>
                            <div class="card-body">
                                @forelse($projects->take(5) as $project)
                                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                                    <div class="avatar avatar-sm me-3">
                                        <img src="{{ asset($project->image) }}" alt="{{ $project->title }}"
                                            class="rounded"
                                            onerror="this.src='https://via.placeholder.com/40x40?text=P'">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 fw-semibold">{{ Str::limit($project->title, 30) }}</h6>
                                        <small class="text-muted">{{ $project->industry }} • {{
                                            $project->date->format('M d, Y') }}</small>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-light text-dark">{{ $project->status ?? 'Active' }}</span>
                                    </div>
                                </div>
                                @empty
                                <div class="text-center py-4">
                                    <i class="ti ti-folder-off fs-24 text-muted"></i>
                                    <p class="text-muted mt-2 mb-0">No projects found</p>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{-- Recent Blogs --}}
                    <div class="col-xl-6 col-lg-12">
                        <div class="card custom-card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">Recent Blogs</h5>
                                <a href="{{ route('blog.index') }}" class="btn btn-sm btn-primary">View All</a>
                            </div>
                            <div class="card-body">
                                @forelse($blogs->take(5) as $blog)
                                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                                    <div class="avatar avatar-sm me-3">
                                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}"
                                            class="rounded"
                                            onerror="this.src='https://via.placeholder.com/40x40?text=B'">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 fw-semibold">{{ Str::limit($blog->title, 30) }}</h6>
                                        <small class="text-muted">{{ Str::limit($blog->short_description, 50) }}</small>
                                    </div>
                                    <div class="text-end">
                                        <small class="text-muted">{{ $blog->created_at->format('M d') }}</small>
                                    </div>
                                </div>
                                @empty
                                <div class="text-center py-4">
                                    <i class="ti ti-news-off fs-24 text-muted"></i>
                                    <p class="text-muted mt-2 mb-0">No blogs found</p>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Analytics Charts --}}
            <div class="col-md-12 mt-4">
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <h5 class="card-title">Projects by Service</h5>
                                <span class="text-muted">Distribution of projects across different services</span>
                            </div>
                            <div class="card-body">
                                <canvas id="projectsChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <h5 class="card-title">Content Distribution</h5>
                                <span class="text-muted">Overview of your content types</span>
                            </div>
                            <div class="card-body">
                                <canvas id="contentChart" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="col-md-12 mt-4">
                <div class="card custom-card">
                    <div class="card-header">
                        <h5 class="card-title">Quick Actions</h5>
                        <span class="text-muted">Frequently used actions</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <a href="{{ route('project.create') }}" class="card quick-action-card">
                                    <div class="card-body text-center">
                                        <div class="avatar avatar-lg avatar-rounded bg-primary bg-opacity-10 mb-3">
                                            <i class="ti ti-plus fs-24 text-primary"></i>
                                        </div>
                                        <h6 class="mb-1">Add New Project</h6>
                                        <p class="text-muted mb-0">Create a new project</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <a href="{{ route('blog.create') }}" class="card quick-action-card">
                                    <div class="card-body text-center">
                                        <div class="avatar avatar-lg avatar-rounded bg-success bg-opacity-10 mb-3">
                                            <i class="ti ti-edit fs-24 text-success"></i>
                                        </div>
                                        <h6 class="mb-1">Write New Blog</h6>
                                        <p class="text-muted mb-0">Create a new blog post</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <a href="{{ route('service.create') }}" class="card quick-action-card">
                                    <div class="card-body text-center">
                                        <div class="avatar avatar-lg avatar-rounded bg-warning bg-opacity-10 mb-3">
                                            <i class="ti ti-settings fs-24 text-warning"></i>
                                        </div>
                                        <h6 class="mb-1">Add Service</h6>
                                        <p class="text-muted mb-0">Create a new service</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6">
                                <a href="{{ route('partners.create') }}" class="card quick-action-card">
                                    <div class="card-body text-center">
                                        <div class="avatar avatar-lg avatar-rounded bg-info bg-opacity-10 mb-3">
                                            <i class="ti ti-user-plus fs-24 text-info"></i>
                                        </div>
                                        <h6 class="mb-1">Add Partner</h6>
                                        <p class="text-muted mb-0">Add a new partner</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .quick-action-card {
        transition: all 0.3s ease;
        border: 1px solid #eaeaea;
    }

    .quick-action-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border-color: #007bff;
        text-decoration: none;
    }

    .quick-action-card .card-body {
        padding: 1.5rem 1rem;
    }
</style>
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Projects by Industry Chart
    var projectsCtx = document.getElementById('projectsChart').getContext('2d');
    var projectsChart = new Chart(projectsCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($projects->groupBy('services')->keys()) !!},
            datasets: [{
                label: 'Projects Count',
                data: {!! json_encode($projects->groupBy('services')->map->count()) !!},
                backgroundColor: [
                    '#007bff', '#28a745', '#ffc107', '#dc3545', 
                    '#6f42c1', '#fd7e14', '#20c997', '#e83e8c'
                ],
                borderWidth: 0,
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0,0,0,0.8)',
                    titleFont: {
                        size: 14
                    },
                    bodyFont: {
                        size: 13
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        drawBorder: false
                    },
                    ticks: {
                        stepSize: 1
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Content Distribution Chart
    var contentCtx = document.getElementById('contentChart').getContext('2d');
    var contentChart = new Chart(contentCtx, {
        type: 'doughnut',
        data: {
            labels: ['Projects', 'Services', 'Partners', 'Blogs'],
            datasets: [{
                label: 'Content Distribution',
                data: [
                    {{ $projects->count() }},
                    {{ $services->count() }},
                    {{ $partners->count() }},
                    {{ $blogs->count() }}
                ],
                backgroundColor: [
                    '#007bff', '#28a745', '#ffc107', '#dc3545'
                ],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true,
                        pointStyle: 'circle'
                    }
                }
            }
        }
    });

    // Add loading states
    document.addEventListener('DOMContentLoaded', function() {
        const quickActionCards = document.querySelectorAll('.quick-action-card');
        quickActionCards.forEach(card => {
            card.addEventListener('click', function(e) {
                const originalText = this.querySelector('h6').textContent;
                this.querySelector('h6').textContent = 'Loading...';
                this.style.opacity = '0.7';
                
                setTimeout(() => {
                    this.querySelector('h6').textContent = originalText;
                    this.style.opacity = '1';
                }, 2000);
            });
        });
    });
</script>
@endpush