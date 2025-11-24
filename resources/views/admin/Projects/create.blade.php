@extends('admin.index')
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
</style>
@endpush

<div class="main-content app-content">
    <div class="container-fluid">
        {{-- Page Header --}}
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Projects</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('project.index') }}">Projects</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Project</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Create New Project</div>
                        <a href="{{ route('project.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-arrow-left"></i> Back to Projects
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data"
                            id="projectForm">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="title" class="form-label">Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title') }}" required>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="industry" class="form-label">Industry <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('industry') is-invalid @enderror"
                                        id="industry" name="industry" value="{{ old('industry') }}" required>
                                    @error('industry')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="date" class="form-label">Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        id="date" name="date" value="{{ old('date') }}" required>
                                    @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="service_id" class="form-label">Service <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('service_id') is-invalid @enderror"
                                        name="service_id" id="service_id" required>
                                        <option value="" selected disabled>Choose Service</option>
                                        @foreach ($services as $service)
                                        <option value="{{ $service->id }}" {{ old('service_id')==$service->id ?
                                            'selected' : '' }}>
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
                                        id="client" name="client" value="{{ old('client') }}">
                                    @error('client')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="link_project" class="form-label">Link to Project</label>
                                    <input type="url" class="form-control @error('link_project') is-invalid @enderror"
                                        id="link_project" name="link_project" value="{{ old('link_project') }}">
                                    @error('link_project')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description <span
                                        class="text-danger">*</span></label>
                                <textarea name="description" id="summernote"
                                    class="@error('description') is-invalid @enderror">{{ old('description') }}</textarea>
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
                                    <div class="form-text">Accepted formats: JPG, JPEG, PNG, WEBP. Max size: 2MB</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Slider Type</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="slider_type" id="landscape"
                                            value="0" {{ old('slider_type', 0)==0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="landscape">
                                            Landscape
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="slider_type" id="portrait"
                                            value="1" {{ old('slider_type')==1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="portrait">
                                            Portrait
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="gallery" class="form-label">Gallery Images</label>
                                <input type="file" class="form-control @error('gallery.*') is-invalid @enderror"
                                    id="gallery" name="gallery[]" multiple
                                    accept="image/jpeg,image/png,image/jpg,image/webp">
                                @error('gallery.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">You can select multiple images. Max size per image: 2MB</div>

                                <!-- Featured Image Selection -->
                                <div class="mt-3" id="featuredSelection" style="display: none;">
                                    <label class="form-label">Select Featured Image</label>
                                    <div class="gallery-preview" id="galleryPreview"></div>
                                    <input type="hidden" name="featured_image_index" id="featuredImageIndex" value="0">
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Create Project
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

            // Handle gallery image selection and featured image
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

            // Handle featured image selection
            $(document).on('click', '.gallery-preview-item', function() {
                const index = $(this).data('index');
                $('.gallery-preview-item').removeClass('selected').find('.featured-badge').remove();
                $(this).addClass('selected').append('<span class="featured-badge">Featured</span>');
                $('#featuredImageIndex').val(index);
            });

            // Form validation
            $('#projectForm').on('submit', function() {
                // Basic validation
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