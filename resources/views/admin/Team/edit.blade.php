@extends('admin.index')

@section('content')
{{--APP-CONTENT START--}}
<div class="main-content app-content">
   <div class="container-fluid">
      {{-- Page Header --}}
      <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
         <h1 class="page-title fw-semibold fs-18 mb-0">Edit Team</h1>
         <div class="ms-md-1 ms-0">
            <nav>
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Edit</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Team</li>
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
                     Edit Team
                  </div>
               </div>
               <div class="card-body">
               {{-- Form to edit team --}}
               <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                   @csrf
                   @method('PUT') {{-- This is important for PUT requests to update data --}}

                   <div class="mb-3">
                       <label for="name" class="form-label">Name</label>
                       <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $team->name) }}" required>
                       @error('name')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="mb-3">
                       <label for="jobtitle" class="form-label">Job Title</label>
                       <input type="text" class="form-control" id="jobtitle" name="jobtitle" value="{{ old('jobtitle', $team->jobtitle) }}" required>
                       @error('jobtitle')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>
                   
                   <div class="mb-3">
                       <label for="linkedin" class="form-label">Linkedin</label>
                       <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $team->linkedin) }}" required>
                       @error('linkedin')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="mb-3">
                       <label for="image" class="form-label">Image</label>
                       <input type="file" class="form-control" id="image" name="image">
                       @error('image')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                       <p>Current Image:</p>
                       @if ($team->image)
                           <img src="{{ $team->image }}" alt="Current Image" style="width: 100px; height: 100px;">
                       @else
                           <p>No image uploaded.</p>
                       @endif
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
@endsection
