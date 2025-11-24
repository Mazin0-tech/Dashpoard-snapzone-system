@extends('admin.index')

@section('content')

@push('css')
<style>
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

    .form-label.required:after {
        content: " *";
        color: #dc3545;
    }
</style>
@endpush

<div class="main-content app-content">
    <div class="container-fluid">
        {{-- Page Header --}}
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Edit Settings</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Settings</li>
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
                            Edit Website Settings
                        </div>
                        <a href="{{ route('settings.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-arrow-left"></i> Back to Settings
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('settings.update', $setting->id) }}" method="POST"
                            enctype="multipart/form-data" id="settingsForm">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                {{-- Site Name --}}
                                <div class="col-md-6 mb-3">
                                    <label for="site_name" class="form-label required">Site Name</label>
                                    <input type="text" class="form-control @error('site_name') is-invalid @enderror"
                                        id="site_name" name="site_name"
                                        value="{{ old('site_name', $setting->site_name) }}" required>
                                    @error('site_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Title --}}
                                <div class="col-md-6 mb-3">
                                    <label for="title" class="form-label required">Website Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title', $setting->title) }}" required>
                                    @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                {{-- Email --}}
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email', $setting->email) }}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Phone --}}
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" value="{{ old('phone', $setting->phone) }}">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="mb-3">
                                <label for="address" class="form-label required">Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                    name="address" rows="3" required>{{ old('address', $setting->address) }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                {{-- Meta Description --}}
                                <div class="col-md-6 mb-3">
                                    <label for="meta" class="form-label required">Meta Description</label>
                                    <textarea class="form-control @error('meta') is-invalid @enderror" id="meta"
                                        name="meta" rows="3" required>{{ old('meta', $setting->meta) }}</textarea>
                                    @error('meta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Brief description for search engines (max 500 characters)
                                    </div>
                                </div>

                                {{-- Keywords --}}
                                <div class="col-md-6 mb-3">
                                    <label for="keywords" class="form-label required">Keywords</label>
                                    <textarea class="form-control @error('keywords') is-invalid @enderror" id="keywords"
                                        name="keywords" rows="3"
                                        required>{{ old('keywords', $setting->keywords) }}</textarea>
                                    @error('keywords')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Comma separated keywords for SEO</div>
                                </div>
                            </div>

                            <div class="row">
                                {{-- Logo --}}
                                <div class="col-md-6 mb-3">
                                    <label for="logo" class="form-label">Website Logo</label>
                                    <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                        id="logo" name="logo"
                                        accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml,image/webp">
                                    @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Recommended: PNG, SVG, or WebP. Max size: 2MB</div>

                                    @if($setting->logo)
                                    <div class="mt-2">
                                        <small class="text-muted">Current Logo:</small>
                                        <div class="image-preview">
                                            <img src="{{ $setting->logo }}" alt="Current Logo" class="current-image">
                                        </div>
                                    </div>
                                    @endif

                                    <!-- New Logo Preview -->
                                    <div class="image-preview mt-2" id="logoPreview" style="display: none;">
                                        <small class="text-muted">New Logo Preview:</small>
                                        <img src="" alt="New Logo Preview" class="img-thumbnail mt-1">
                                    </div>
                                </div>

                                {{-- Favicon --}}
                                <div class="col-md-6 mb-3">
                                    <label for="favicon" class="form-label">Favicon</label>
                                    <input type="file" class="form-control @error('favicon') is-invalid @enderror"
                                        id="favicon" name="favicon"
                                        accept="image/x-icon,image/vnd.microsoft.icon,image/png,image/jpeg">
                                    @error('favicon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Recommended: ICO or PNG. Max size: 1MB</div>

                                    @if($setting->favicon)
                                    <div class="mt-2">
                                        <small class="text-muted">Current Favicon:</small>
                                        <div class="image-preview">
                                            <img src="{{ $setting->favicon }}" alt="Current Favicon"
                                                class="current-image" style="max-width: 32px;">
                                        </div>
                                    </div>
                                    @endif

                                    <!-- New Favicon Preview -->
                                    <div class="image-preview mt-2" id="faviconPreview" style="display: none;">
                                        <small class="text-muted">New Favicon Preview:</small>
                                        <img src="" alt="New Favicon Preview" class="img-thumbnail mt-1"
                                            style="max-width: 32px;">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h5 class="mb-3">Social Media Links</h5>

                            <div class="row">
                                {{-- Facebook --}}
                                <div class="col-md-6 mb-3">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input type="url" class="form-control @error('facebook') is-invalid @enderror"
                                        id="facebook" name="facebook" value="{{ old('facebook', $setting->facebook) }}"
                                        placeholder="https://facebook.com/yourpage">
                                    @error('facebook')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Twitter --}}
                                <div class="col-md-6 mb-3">
                                    <label for="twitter" class="form-label">Twitter</label>
                                    <input type="url" class="form-control @error('twitter') is-invalid @enderror"
                                        id="twitter" name="twitter" value="{{ old('twitter', $setting->twitter) }}"
                                        placeholder="https://twitter.com/yourpage">
                                    @error('twitter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                {{-- Instagram --}}
                                <div class="col-md-6 mb-3">
                                    <label for="instagram" class="form-label">Instagram</label>
                                    <input type="url" class="form-control @error('instagram') is-invalid @enderror"
                                        id="instagram" name="instagram"
                                        value="{{ old('instagram', $setting->instagram) }}"
                                        placeholder="https://instagram.com/yourpage">
                                    @error('instagram')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- YouTube --}}
                                <div class="col-md-6 mb-3">
                                    <label for="youtube" class="form-label">YouTube</label>
                                    <input type="url" class="form-control @error('youtube') is-invalid @enderror"
                                        id="youtube" name="youtube" value="{{ old('youtube', $setting->youtube) }}"
                                        placeholder="https://youtube.com/yourchannel">
                                    @error('youtube')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                {{-- LinkedIn --}}
                                <div class="col-md-6 mb-3">
                                    <label for="linkedin" class="form-label">LinkedIn</label>
                                    <input type="url" class="form-control @error('linkedin') is-invalid @enderror"
                                        id="linkedin" name="linkedin" value="{{ old('linkedin', $setting->linkedin) }}"
                                        placeholder="https://linkedin.com/company/yourcompany">
                                    @error('linkedin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- TikTok --}}
                                <div class="col-md-6 mb-3">
                                    <label for="tiktok" class="form-label">TikTok</label>
                                    <input type="url" class="form-control @error('tiktok') is-invalid @enderror"
                                        id="tiktok" name="tiktok" value="{{ old('tiktok', $setting->tiktok) }}"
                                        placeholder="https://tiktok.com/@yourpage">
                                    @error('tiktok')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                {{-- Snapchat --}}
                                <div class="col-md-6 mb-3">
                                    <label for="snapchat" class="form-label">Snapchat</label>
                                    <input type="url" class="form-control @error('snapchat') is-invalid @enderror"
                                        id="snapchat" name="snapchat" value="{{ old('snapchat', $setting->snapchat) }}"
                                        placeholder="https://snapchat.com/add/yourpage">
                                    @error('snapchat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Update Settings
                                </button>
                                <a href="{{ route('settings.index') }}" class="btn btn-outline-secondary">
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
<script>
    $(document).ready(function() {
        // Logo preview
        $('#logo').on('change', function(e) {
            const file = e.target.files[0];
            const preview = $('#logoPreview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.show();
                    preview.find('img').attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
                
                // Validate file size
                if (file.size > 2 * 1024 * 1024) {
                    alert('Logo size must be less than 2MB');
                    $(this).val('');
                    preview.hide();
                }
            } else {
                preview.hide();
            }
        });

        // Favicon preview
        $('#favicon').on('change', function(e) {
            const file = e.target.files[0];
            const preview = $('#faviconPreview');
            
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.show();
                    preview.find('img').attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
                
                // Validate file size
                if (file.size > 1 * 1024 * 1024) {
                    alert('Favicon size must be less than 1MB');
                    $(this).val('');
                    preview.hide();
                }
            } else {
                preview.hide();
            }
        });

        // Form validation
        $('#settingsForm').on('submit', function(e) {
            const siteName = $('#site_name').val().trim();
            const title = $('#title').val().trim();
            const address = $('#address').val().trim();
            const meta = $('#meta').val().trim();
            const keywords = $('#keywords').val().trim();
            
            if (!siteName || !title || !address || !meta || !keywords) {
                e.preventDefault();
                alert('Please fill in all required fields');
                return false;
            }
            
            return true;
        });
    });
</script>
@endpush

@endsection