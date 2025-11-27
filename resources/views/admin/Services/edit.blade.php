@extends('layouts.admin')
@section('content')

@push('css')
<!-- Summernote CSS via CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">
<style>
    .form-label.required:after {
        content: " *";
        color: #dc3545;
    }

    .image-preview {
        max-width: 200px;
        margin-top: 10px;
    }

    .image-preview img {
        max-width: 100%;
        border-radius: 8px;
        border: 2px solid #e9ecef;
    }

    .current-image {
        border: 3px solid #28a745;
    }
</style>
@endpush

<div class="main-content app-content">
    <div class="container-fluid">
        {{-- Page Header --}}
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Edit Service</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('service.index') }}">Services</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Service</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Page Header Close --}}

        {{--ROW-START--}}
        <div class="row">
            <div class="col-md-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">
                            Edit Service - {{ $service->title }}
                        </div>
                        <a href="{{ route('service.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-arrow-left"></i> Back to Services
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('service.update', $service->id) }}" method="POST"
                            enctype="multipart/form-data" id="serviceForm">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="title" class="form-label required">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title', $service->title) }}"
                                        placeholder="Enter service title" required>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="industry" class="form-label required">Industry</label>
                                    <input type="text" class="form-control @error('industry') is-invalid @enderror"
                                        id="industry" name="industry" value="{{ old('industry', $service->industry) }}"
                                        placeholder="Enter industry" required>
                                    @error('industry')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="text" class="form-control @error('start_date') is-invalid @enderror"
                                        id="start_date" name="start_date"
                                        value="{{ old('start_date', $service->start_date) }}">
                                    @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="text" class="form-control @error('end_date') is-invalid @enderror"
                                        id="end_date" name="end_date" value="{{ old('end_date', $service->end_date) }}">
                                    @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="shortdescription" class="form-label">Short Description</label>
                                <textarea name="shortdescription" id="shortDescriptionEditor"
                                    class="form-control @error('shortdescription') is-invalid @enderror"
                                    placeholder="Enter short description (max 500 characters)">{{ old('shortdescription', $service->shortdescription) }}</textarea>
                                @error('shortdescription')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">Maximum 500 characters</div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label required">Description</label>
                                <textarea name="description" id="descriptionEditor"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Enter detailed description">{{ old('description', $service->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Service Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                    name="image" accept="image/jpeg,image/png,image/jpg,image/gif,image/webp">
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">
                                    Accepted formats: JPG, JPEG, PNG, GIF, WEBP. Max size: 2MB
                                </div>

                                <!-- Current Image -->
                                @if($service->image)
                                <div class="mt-3">
                                    <small class="text-muted">Current Image:</small>
                                    <div class="image-preview">
                                        <img src="{{ $service->image }}" alt="Current Service Image"
                                            class="current-image img-thumbnail">
                                    </div>
                                    <small class="text-info">Upload a new image to replace the current one</small>
                                </div>
                                @endif

                                <!-- New Image Preview -->
                                <div class="image-preview mt-2" id="imagePreview" style="display: none;">
                                    <small class="text-muted">New Image Preview:</small>
                                    <img src="" alt="New Image Preview" class="img-thumbnail mt-1">
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Update Service
                                </button>
                                <a href="{{ route('service.index') }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-times"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--ROW-END--}}
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
                    // Initialize Summernote for description
                    $('#descriptionEditor').summernote({
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
                        ],
                        callbacks: {
                            onInit: function() {
                                // Set required attribute for the hidden textarea
                                $('#descriptionEditor').attr('required', 'required');
                            }
                        }
                    });

                    // Initialize Summernote for short description
                    $('#shortDescriptionEditor').summernote({
                        height: 150,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'italic', 'underline', 'clear']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['view', ['fullscreen', 'codeview']]
                        ],
                        callbacks: {
                            onChange: function(contents) {
                                // Limit short description to 500 characters
                                var plainText = $(contents).text();
                                if (plainText.length > 500) {
                                    $('#shortDescriptionEditor').summernote('code', contents.substring(0, 500));
                                    alert('Short description cannot exceed 500 characters');
                                }
                            }
                        }
                    });

                    // Image preview functionality
                    $('#image').on('change', function(e) {
                        const file = e.target.files[0];
                        const preview = $('#imagePreview');

                        if (file) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                preview.show();
                                preview.find('img').attr('src', e.target.result);
                            }

                            reader.readAsDataURL(file);

                            // Validate file size (2MB)
                            if (file.size > 2 * 1024 * 1024) {
                                alert('File size must be less than 2MB');
                                $(this).val('');
                                preview.hide();
                            }
                        } else {
                            preview.hide();
                        }
                    });

                    // Update end date min attribute when start date changes
                    $('#start_date').on('change', function() {
                        $('#end_date').attr('min', $(this).val());
                    });

                    // Form validation
                    $('#serviceForm').on('submit', function(e) {
                        const title = $('#title').val().trim();
                        const industry = $('#industry').val().trim();
                        const description = $('#descriptionEditor').summernote('code').replace(/<(.|\n)*?>/g, '').trim();

                        if (!title) {
                            e.preventDefault();
                            alert('Please enter a title');
                            $('#title').focus();
                            return false;
                        }

                        if (!industry) {
                            e.preventDefault();
                            alert('Please enter an industry');
                            $('#industry').focus();
                            return false;
                        }

                        if (!description) {
                            e.preventDefault();
                            alert('Please enter a description');
                            $('#descriptionEditor').summernote('focus');
                            return false;
                        }

                        return true;
                    });
                });
</script>
@endpush

@endsection