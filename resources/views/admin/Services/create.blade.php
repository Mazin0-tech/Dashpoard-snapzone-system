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
         <h1 class="page-title fw-semibold fs-18 mb-0">Service</h1>
         <div class="ms-md-1 ms-0">
            <nav>
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Create</a></li>
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
                     Service
                  </div>
               </div>
               <div class="card-body">

<form action="{{ route('service.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
        @error('title')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group h-25">
        <label for="description">Description</label>
        <textarea name="description" id="descriptionEditor">{{ old('description') }}</textarea>
        @error('description')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="industry" class="form-label">Industry</label>
        <input type="text" class="form-control" id="industry" name="industry" value="{{ old('industry') }}">
        @error('industry')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group h-25">
        <label for="shortdescription">Short Description</label>
        <textarea name="shortdescription" id="shortDescriptionEditor">{{ old('shortdescription') }}</textarea>
        @error('shortdescription')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image">
        @error('image')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

            </div>
         </div>
      </div>
   </div>
   {{--ROW-END--}}
</div>
</div>

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
