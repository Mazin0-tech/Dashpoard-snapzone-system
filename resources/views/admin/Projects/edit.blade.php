@extends('layouts.admin')
@section('content')

@push('css')
<!-- Summernote CSS via CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">
<style>
    .gallery-preview {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }

    .gallery-preview-item {
        position: relative;
        width: 100px;
        height: 100px;
        border: 2px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        cursor: pointer;
    }

    .gallery-preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .gallery-preview-item.selected {
        border-color: #007bff;
    }

    .featured-badge {
        position: absolute;
        top: 5px;
        right: 5px;
        background: #28a745;
        color: white;
        padding: 2px 5px;
        border-radius: 3px;
        font-size: 10px;
    }

    .existing-gallery {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 15px;
    }

    .existing-gallery-item {
        position: relative;
        width: 100px;
        height: 100px;
        border: 2px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
    }

    .existing-gallery-item.featured {
        border-color: #28a745;
    }

    .delete-gallery-btn {
        position: absolute;
        top: 2px;
        right: 2px;
        background: rgba(255, 0, 0, 0.7);
        color: white;
        border: none;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 12px;
        cursor: pointer;
    }
</style>
@endpush

<div class="main-content app-content">
    <div class="container-fluid">
        {{-- Page Header --}}
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Edit Project</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Projects</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Project</li>
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
                            Edit Project - {{ $project->title }}
                        </div>
                        <a href="{{ route('project.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-arrow-left"></i> Back to Projects
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('project.update', $project->id) }}" method="POST"
                            enctype="multipart/form-data" id="projectForm">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="title" class="form-label">Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title', $project->title) }}" required>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="industry" class="form-label">Industry <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('industry') is-invalid @enderror"
                                        id="industry" name="industry" value="{{ old('industry', $project->industry) }}"
                                        required>
                                    @error('industry')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        id="date" name="date" value="{{ old('date', $project->date->format('Y-m-d')) }}"
                                        required>
                                    @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="service_id" class="form-label">Service <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('service_id') is-invalid @enderror"
                                        name="service_id" id="service_id" required>
                                        <option value="" disabled>Choose Service</option>
                                        @foreach ($services as $service)
                                        <option value="{{ $service->id }}" {{ old('service_id', $project->service_id) ==
                                            $service->id ? 'selected' : '' }}>
                                            {{ $service->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="client" class="form-label">Client</label>
                                    <input type="text" class="form-control @error('client') is-invalid @enderror"
                                        id="client" name="client" value="{{ old('client', $project->client) }}">
                                    @error('client')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="link_project" class="form-label">Link to Project</label>
                                    <input type="url" class="form-control @error('link_project') is-invalid @enderror"
                                        id="link_project" name="link_project"
                                        value="{{ old('link_project', $project->link_project) }}">
                                    @error('link_project')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description <span
                                        class="text-danger">*</span></label>
                                <textarea name="description" id="summernote"
                                    class="@error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Main Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/webp">
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if($project->image)
                                    <div class="mt-2">
                                        <small class="text-muted">Current Image:</small>
                                        <img src="{{ $project->image }}" alt="Current Project Image"
                                            class="img-thumbnail mt-1" style="max-width: 200px;">
                                    </div>
                                    @endif
                                    <div class="form-text">Accepted formats: JPG, JPEG, PNG, WEBP. Max size: 2MB</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Slider Type</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="slider_type" id="landscape"
                                            value="0" {{ old('slider_type', $project->slider_type) == 0 ? 'checked' : ''
                                        }}>
                                        <label class="form-check-label" for="landscape">
                                            Landscape
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="slider_type" id="portrait"
                                            value="1" {{ old('slider_type', $project->slider_type) == 1 ? 'checked' : ''
                                        }}>
                                        <label class="form-check-label" for="portrait">
                                            Portrait
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Existing Gallery -->
                            @if($project->galleries->count() > 0)
                            <div class="mb-3">
                                <label class="form-label">Existing Gallery Images</label>
                                <div class="existing-gallery">
                                    @foreach($project->galleries as $gallery)
                                    <div class="existing-gallery-item {{ $gallery->is_featured ? 'featured' : '' }}"
                                        data-id="{{ $gallery->id }}">
                                        <img src="{{ $gallery->image }}" alt="Gallery Image">
                                        @if($gallery->is_featured)
                                        <span class="featured-badge">Featured</span>
                                        @endif
                                        <button type="button" class="delete-gallery-btn"
                                            onclick="deleteGalleryImage({{ $gallery->id }})" title="Delete Image">
                                            ×
                                        </button>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="form-text">Click on an image to set it as featured</div>
                            </div>
                            @endif

                            <!-- New Gallery Images -->
                            <div class="mb-3">
                                <label for="gallery" class="form-label">Add New Gallery Images</label>
                                <input type="file" class="form-control @error('gallery.*') is-invalid @enderror"
                                    id="gallery" name="gallery[]" multiple
                                    accept="image/jpeg,image/png,image/jpg,image/webp">
                                @error('gallery.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">You can select multiple images. Max size per image: 2MB</div>

                                <!-- Featured Image Selection for New Images -->
                                <div class="mt-3" id="featuredSelection" style="display: none;">
                                    <label class="form-label">Select Featured Image for New Uploads</label>
                                    <div class="gallery-preview" id="galleryPreview"></div>
                                    <input type="hidden" name="featured_image_index" id="featuredImageIndex" value="0">
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Update Project
                                </button>
                                <a href="{{ route('project.index') }}" class="btn btn-outline-secondary">
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

                    // Handle new gallery image selection and featured image
                    $('#gallery').on('change', function(e) {
                        const files = e.target.files;
                        const preview = $('#galleryPreview');
                        const featuredSelection = $('#featuredSelection');

                        preview.empty();

                        if (files.length > 0) {
                            featuredSelection.show();

                            Array.from(files).forEach((file, index) => {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    const isFeatured = index === 0 ? 'selected' : '';
                                    const badge = index === 0 ? '<span class="featured-badge">Featured</span>' : '';

                                    preview.append(`
                                        <div class="gallery-preview-item ${isFeatured}" data-index="${index}">
                                            <img src="${e.target.result}" alt="Preview">
                                            ${badge}
                                        </div>
                                    `);
                                };
                                reader.readAsDataURL(file);
                            });

                            // Set first image as featured by default
                            $('#featuredImageIndex').val(0);
                        } else {
                            featuredSelection.hide();
                        }
                    });

                    // Handle featured image selection for new images
                    $(document).on('click', '.gallery-preview-item', function() {
                        const index = $(this).data('index');
                        $('.gallery-preview-item').removeClass('selected').find('.featured-badge').remove();
                        $(this).addClass('selected').append('<span class="featured-badge">Featured</span>');
                        $('#featuredImageIndex').val(index);
                    });

                    // Handle featured image selection for existing images
                    $(document).on('click', '.existing-gallery-item', function() {
                        const galleryId = $(this).data('id');
                        setFeaturedImage(galleryId);
                    });

                    // Form validation
                    $('#projectForm').on('submit', function() {
                        const title = $('#title').val();
                        const description = $('#summernote').summernote('code').replace(/<(.|\n)*?>/g, '').trim();

                        if (!title || !description) {
                            alert('Please fill in all required fields');
                            return false;
                        }
                        return true;
                    });
                });

                // Set featured image for existing gallery
                function setFeaturedImage(galleryId) {
                    if (confirm('Set this image as featured?')) {
                        $.ajax({
                            url: '{{ route("project.toggleFeatured", "") }}/' + galleryId,
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                _method: 'PUT'
                            },
                            success: function(response) {
                                location.reload();
                            },
                            error: function(xhr) {
                                alert('Error setting featured image');
                            }
                        });
                    }
                }

                // Delete gallery image
                function deleteGalleryImage(galleryId) {
                    if (confirm('Are you sure you want to delete this image?')) {
                        $.ajax({
                            url: '{{ route("project.deleteGallery", "") }}/' + galleryId,
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                _method: 'DELETE'
                            },
                            success: function(response) {
                                location.reload();
                            },
                            error: function(xhr) {
                                alert('Error deleting image');
                            }
                        });
                    }
                }
</script>
@endpush

@endsection