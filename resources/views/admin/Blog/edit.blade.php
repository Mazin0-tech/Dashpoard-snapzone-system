@extends('layouts.admin')
@section('content')

@push('css')
    <!-- Summernote CSS via CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">
@endpush


<div class="main-content app-content">
   <div class="container-fluid">
      <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
         <h1 class="page-title fw-semibold fs-18 mb-0">Edit Blog</h1>
         <div class="ms-md-1 ms-0">
            <nav>
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Edit</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Blog</li>
               </ol>
            </nav>
         </div>
      </div>

      <div class="row">
         <div class="col-md-12">
            <div class="card custom-card">
               <div class="card-header justify-content-between">
                  <div class="card-title">Edit Blog</div>
               </div>
               <div class="card-body">
                  <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')

                     <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title) }}" required>
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>

                     {{--  <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{ old('description', $blog->description) }}" required>
                        @error('description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>  --}}



     <div class="form-group h-25">
                                <label for="description">Description</label>
                                <textarea name="description" id="summernote">{{ old('description',$blog->description) }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>




                     {{--  <div class="mb-3">
                        <label for="shortdescription" class="form-label">Short Description (optional)</label>
                        <input type="text" class="form-control" id="shortdescription" name="shortdescription" value="{{ old('shortdescription', $blog->short_description) }}">
                        @error('shortdescription')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>  --}}
                     
       <div class="form-group h-25">
                                <label for="shortdescription">Short Description</label>
                                <textarea name="shortdescription" id="shortdescription-editor">{{ old('shortdescription',$blog->description) }}</textarea>
                                @error('shortdescription')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                     <div class="mb-3">
                        <label for="image" class="form-label">Image</label><br>
                        @if($blog->image)
                           <img src="{{ asset($blog->image) }}" alt="Current Image" style="width: 100px; margin-bottom: 10px;">
                        @endif
                        <input type="file" class="form-control" id="image" name="image">
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
   </div>
</div>

{{--  start summrnode js  --}}

@push('js')
    <!-- jQuery and Bootstrap JS via CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Summernote JS via CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 200
            });
        });
    </script>
     <script>
        $(document).ready(function () {
            $('#shortdescription-editor').summernote({
                height: 200
            });
        });
    </script>
@endpush

@endsection
