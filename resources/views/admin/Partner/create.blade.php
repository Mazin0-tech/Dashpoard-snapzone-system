@extends('admin.index')
@section('content')

@push('css')
<!-- Summernote CSS via CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">
<style>
    .logo-preview {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }

    .logo-preview-item {
        position: relative;
        width: 150px;
        height: 150px;
        border: 2px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
    }

    .logo-preview-item img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        background: white;
        padding: 10px;
    }

    .current-logo {
        border-color: #28a745;
    }
</style>
@endpush

<div class="main-content app-content">
    <div class="container-fluid">
        {{-- Page Header --}}
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Partners</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('partners.index') }}">Partners</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Partner</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Create New Partner</div>
                        <a href="{{ route('partners.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-arrow-left"></i> Back to Partners
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('partners.store') }}" method="POST" enctype="multipart/form-data"
                            id="partnerForm">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="title" class="form-label">Partner Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title') }}" required
                                        placeholder="Enter partner company name">
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="logo" class="form-label">Logo <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                        id="logo" name="logo"
                                        accept="image/jpeg,image/png,image/jpg,image/webp,image/svg+xml" required>
                                    @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Accepted formats: JPG, PNG, WEBP, SVG. Max size: 2MB</div>
                                </div>
                            </div>

                            <!-- Logo Preview -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="logo-preview mb-3" id="logoPreview" style="display: none;">
                                        <label class="form-label">Logo Preview:</label>
                                        <div class="logo-preview-item">
                                            <img id="previewImage" src="" alt="Logo Preview">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Create Partner
                                </button>
                                <a href="{{ route('partners.index') }}" class="btn btn-outline-secondary">
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

<script>
    $(document).ready(function () {
            // Handle logo preview
            $('#logo').on('change', function(e) {
                const files = e.target.files;
                const preview = $('#logoPreview');
                const previewImage = $('#previewImage');
                
                if (files.length > 0) {
                    const file = files[0];
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        previewImage.attr('src', e.target.result);
                        preview.show();
                    };
                    
                    reader.readAsDataURL(file);
                } else {
                    preview.hide();
                }
            });

            // Form validation
            $('#partnerForm').on('submit', function() {
                const title = $('#title').val();
                const logo = $('#logo').val();
                
                if (!title) {
                    alert('Please enter partner name');
                    return false;
                }
                
                if (!logo) {
                    alert('Please select a logo');
                    return false;
                }
                
                return true;
            });

            // Show file name when selected
            $('#logo').on('change', function() {
                var fileName = $(this).val().split('\\').pop();
                $(this).next('.form-text').before('<div class="text-success small">Selected: ' + fileName + '</div>');
            });
        });
</script>
@endpush

@endsection