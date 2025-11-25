@extends('layouts.admin')
@section('content')

@push('css')
<!-- Summernote CSS via CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">
<style>
    .counter-inputs {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .counter-item {
        margin-bottom: 15px;
    }

    .counter-item:last-child {
        margin-bottom: 0;
    }
</style>
@endpush

<div class="main-content app-content">
    <div class="container-fluid">
        {{-- Page Header --}}
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Edit About Page</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit About</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Page Header Close --}}

        <div class="row">
            <div class="col-md-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Edit About Page
                        </div>
                        <a href="{{ route('admin') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-arrow-left"></i> Back to About
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('about.update', $about->id) }}" method="POST" id="aboutForm">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="title" class="form-label">Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title', $about->title) }}" required>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="text_1" class="form-label">Text 1</label>
                                    <textarea class="form-control @error('text_1') is-invalid @enderror" id="text_1"
                                        name="text_1" rows="3"
                                        maxlength="500">{{ old('text_1', $about->text_1) }}</textarea>
                                    @error('text_1')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Max 500 characters</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="text_2" class="form-label">Text 2</label>
                                    <textarea class="form-control @error('text_2') is-invalid @enderror" id="text_2"
                                        name="text_2" rows="3"
                                        maxlength="500">{{ old('text_2', $about->text_2) }}</textarea>
                                    @error('text_2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Max 500 characters</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description <span
                                        class="text-danger">*</span></label>
                                <textarea name="description" id="summernote"
                                    class="@error('description') is-invalid @enderror">{{ old('description', $about->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="footer_about" class="form-label">Footer About Text</label>
                                <textarea class="form-control @error('footer_about') is-invalid @enderror"
                                    id="footer_about" name="footer_about" rows="3"
                                    maxlength="1000">{{ old('footer_about', $about->footer_about) }}</textarea>
                                @error('footer_about')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Max 1000 characters</div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="mission" class="form-label">Mission</label>
                                    <textarea class="form-control @error('mission') is-invalid @enderror" id="mission"
                                        name="mission" rows="4"
                                        maxlength="1000">{{ old('mission', $about->mission) }}</textarea>
                                    @error('mission')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Max 1000 characters</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="vision" class="form-label">Vision</label>
                                    <textarea class="form-control @error('vision') is-invalid @enderror" id="vision"
                                        name="vision" rows="4"
                                        maxlength="1000">{{ old('vision', $about->vision) }}</textarea>
                                    @error('vision')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Max 1000 characters</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="service_quote" class="form-label">Service Quote</label>
                                    <textarea class="form-control @error('service_quote') is-invalid @enderror"
                                        id="service_quote" name="service_quote" rows="3"
                                        maxlength="500">{{ old('service_quote', $about->service_quote) }}</textarea>
                                    @error('service_quote')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Max 500 characters</div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="portfolio_quote" class="form-label">Portfolio Quote</label>
                                    <textarea class="form-control @error('portfolio_quote') is-invalid @enderror"
                                        id="portfolio_quote" name="portfolio_quote" rows="3"
                                        maxlength="500">{{ old('portfolio_quote', $about->portfolio_quote) }}</textarea>
                                    @error('portfolio_quote')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Max 500 characters</div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="blog_quote" class="form-label">Blog Quote</label>
                                    <textarea class="form-control @error('blog_quote') is-invalid @enderror"
                                        id="blog_quote" name="blog_quote" rows="3"
                                        maxlength="500">{{ old('blog_quote', $about->blog_quote) }}</textarea>
                                    @error('blog_quote')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Max 500 characters</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="video_link" class="form-label">Video Link</label>
                                <input type="url" class="form-control @error('video_link') is-invalid @enderror"
                                    id="video_link" name="video_link"
                                    value="{{ old('video_link', $about->video_link) }}">
                                @error('video_link')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Enter a valid URL for the video</div>
                            </div>

                            <div class="counter-inputs">
                                <h5 class="mb-3">Statistics Counters</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="counter-item">
                                            <label for="projects_completed" class="form-label">Projects
                                                Completed</label>
                                            <input type="number"
                                                class="form-control @error('projects_completed') is-invalid @enderror"
                                                id="projects_completed" name="projects_completed"
                                                value="{{ old('projects_completed', $about->projects_completed) }}"
                                                min="0">
                                            @error('projects_completed')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="counter-item">
                                            <label for="happy_customers" class="form-label">Happy Customers</label>
                                            <input type="number"
                                                class="form-control @error('happy_customers') is-invalid @enderror"
                                                id="happy_customers" name="happy_customers"
                                                value="{{ old('happy_customers', $about->happy_customers) }}" min="0">
                                            @error('happy_customers')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="counter-item">
                                            <label for="years_of_experience" class="form-label">Years of
                                                Experience</label>
                                            <input type="number"
                                                class="form-control @error('years_of_experience') is-invalid @enderror"
                                                id="years_of_experience" name="years_of_experience"
                                                value="{{ old('years_of_experience', $about->years_of_experience) }}"
                                                min="0">
                                            @error('years_of_experience')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="counter-item">
                                            <label for="award_achievement" class="form-label">Awards &
                                                Achievements</label>
                                            <input type="number"
                                                class="form-control @error('award_achievement') is-invalid @enderror"
                                                id="award_achievement" name="award_achievement"
                                                value="{{ old('award_achievement', $about->award_achievement) }}"
                                                min="0">
                                            @error('award_achievement')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Update About Page
                                </button>
                                <a href="{{ route('about.index') }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-times"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<!-- jQuery and Bootstrap JS via CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Summernote JS via CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function () {
        // Initialize Summernote
        $('#summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        // Character counters for textareas
        function setupCharacterCounter(textareaId, maxLength) {
            const textarea = $('#' + textareaId);
            const counter = $('<div class="form-text text-end"><span class="char-count">0</span>/' + maxLength + '</div>');
            
            textarea.after(counter);
            
            function updateCounter() {
                const length = textarea.val().length;
                counter.find('.char-count').text(length);
                
                if (length > maxLength) {
                    counter.addClass('text-danger');
                } else {
                    counter.removeClass('text-danger');
                }
            }
            
            textarea.on('input', updateCounter);
            updateCounter(); // Initialize counter
        }

        // Setup character counters for all limited textareas
        setupCharacterCounter('text_1', 500);
        setupCharacterCounter('text_2', 500);
        setupCharacterCounter('footer_about', 1000);
        setupCharacterCounter('mission', 1000);
        setupCharacterCounter('vision', 1000);
        setupCharacterCounter('service_quote', 500);
        setupCharacterCounter('portfolio_quote', 500);
        setupCharacterCounter('blog_quote', 500);

        // Form validation
        $('#aboutForm').on('submit', function() {
            const title = $('#title').val();
            const description = $('#summernote').summernote('code').replace(/<(.|\n)*?>/g, '').trim();
            
            if (!title || !description) {
                alert('Please fill in all required fields');
                return false;
            }
            return true;
        });
    });
</script>
@endpush

@endsection