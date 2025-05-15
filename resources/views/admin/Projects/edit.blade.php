
@extends('admin.index')
@section('content')

@push('css')
    <!-- Summernote CSS via CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">
@endpush


<div class="main-content app-content">
   <div class="container-fluid">
      {{-- Page Header --}}
      <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
         <h1 class="page-title fw-semibold fs-18 mb-0">Projects</h1>
         <div class="ms-md-1 ms-0">
            <nav>
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Create</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Projects</li>
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
                     Create New Project
                  </div>
               </div>
               <div class="card-body">
             


  <form action="{{ route('project.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title Field -->
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" required>
        </div>

        {{--  <!-- Description Field -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $project->description) }}</textarea>
        </div>  --}}

                      <div class="form-group h-25">
                                <label for="description">Description</label>
                                <textarea name="description" id="summernote">{{ old('description' ,$project->description) }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


        {{--  <!-- Industry Field -->  --}}
        <div class="form-group">
            <label for="industry">Industry</label>
            <input type="text" class="form-control" id="industry" name="industry" value="{{ old('industry', $project->industry) }}">
              @error('industry')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
        </div>

        {{--  <!-- Date Field -->  --}}
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $project->date) }}" required>
              @error('date')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
        </div>

        {{--  <!-- Client Field -->  --}}
        <div class="form-group">
            <label for="client">Client</label>
            <input type="text" class="form-control" id="client" name="client" value="{{ old('client', $project->client) }}">
              @error('client')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
        </div>

        {{--  <!-- Service Field -->  --}}
        <div class="form-group">
            <label for="service_id">Service</label>
            <select class="form-control" id="service_id" name="service_id" required>
                <option value="">Select Service</option>
                @foreach ($services as $service)
                    <option value="{{ $service->id }}" 
                        {{ old('service_id', $project->service_id) == $service->id ? 'selected' : '' }}>
                        {{ $service->title }}
                    </option>
                      @error('service_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                @endforeach
            </select>
        </div>

        {{--  <!-- Image Field -->  --}}
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($project->image)
                <img src="{{ asset($project->image) }}" alt="Project Image" style="width: 100px; margin-top: 10px;">
            @endif
              @error('image')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
        </div>

        {{--  <!-- Gallery Field (Optional, if exists) -->  --}}
   <div class="form-group">
    <label for="gallery">Gallery</label>
    <input type="file" class="form-control" id="gallery" name="gallery[]" multiple>
    
    @if ($project->gallery)
        @foreach (json_decode($project->gallery, true) as $img)
            <img src="{{ asset($img) }}" style="width: 50px; margin: 5px;">
        @endforeach
    @endif
      @error('gallery[]')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
</div>


        

        {{--  <!-- Link Field -->  --}}
        <div class="form-group">
            <label for="link_project">Project Link</label>
            <input type="url" class="form-control" id="link_project" name="link_project" value="{{ old('link_project', $project->link_project) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Project</button>
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
            $('#summernote').summernote({
                height: 200
            });
        });
    </script>
@endpush

@endsection





















