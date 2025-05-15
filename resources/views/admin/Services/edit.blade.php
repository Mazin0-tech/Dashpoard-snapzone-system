    @extends('admin.index')

    @section('content')

{{--  <!-- Summernote CSS via CDN -->  --}}
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">
@endpush

    {{--APP-CONTENT START--}}
    <div class="main-content app-content">
    <div class="container-fluid">
        {{-- Page Header --}}
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Edit Service</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Edit</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Service</li>
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
                        Edit Service
                    </div>
                </div>
                <div class="card-body">

                <form action="{{ route('service.update', $service->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- طريقة التحديث --}}
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $service->title) }}" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                  {{--  <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $service->description) }}" required>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>    --}}
                    {{--  sort description summernode  --}}
                    
                      <div class="form-group h-25">
        <label for="description">Description</label>
        <textarea name="description" id="descriptionEditor">{{ old('description',$service->description) }}</textarea>
        @error('description')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
                    {{--  sort description summernode  --}}

                     

                            <div class="form-group h-25">
            <label for="shortdescription">Short Description</label>
            <textarea name="shortdescription" id="shortDescriptionEditor">{{ old('shortdescription', $service->shortdescription) }}</textarea>
            @error('shortdescription')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

                    <div class="mb-3">
                        <label for="industry" class="form-label">Industry</label>
                        <input type="text" class="form-control" id="industry" name="industry" value="{{ old('industry', $service->industry) }}">
                        @error('industry')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{--  <div class="mb-3">
                        <label for="shortdescription" class="form-label">Short Description (optional)</label>
                        <input type="text" class="form-control" id="shortdescription" name="shortdescription" value="{{ old('shortdescription', $service->shortdescription) }}">
                        @error('shortdescription')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>  --}}

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @if($service->image)
                            <img src="{{ asset('images/' . basename($service->image)) }}" alt="current-image" style="width: 100px; margin-top: 10px;">
                        @endif
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

                </div>
                </div>
            </div>
        </div>
        {{--ROW-END--}}
    </div>
    </div>
    {{--APP-CONTENT CLOSE--}}

    {{--Summernote Scripts--}}
 {{--Summernote Scripts--}}
@push('js')
    <!-- jQuery and Bootstrap JS via CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Summernote JS via CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#descriptionEditor').summernote({
                height: 200
            });
            $('#shortDescriptionEditor').summernote({
                height: 150
            });
        });
    </script>
@endpush
    @endsection
