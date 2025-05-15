@extends('admin.index')

@section('content')
{{--APP-CONTENT START--}}

<div class="main-content app-content">
   <div class="container-fluid">
      {{-- Page Header --}}
      <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
         <h1 class="page-title fw-semibold fs-18 mb-0">Edit Settings</h1>
         <div class="ms-md-1 ms-0">
            <nav>
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Edit</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Settings</li>
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
                     Edit Settings
                  </div>
               </div>
               <div class="card-body">
               {{-- Form to edit settings --}}
               <form action="{{ route('settings.update', $settings->id) }}" method="POST" enctype="multipart/form-data">
                   @csrf
                   @method('PUT') {{-- This is important for PUT requests to update data --}}

                   {{-- Logo --}}
                   <div class="mb-3">
                       <label for="logo" class="form-label">Logo</label>
                       <input type="text" class="form-control" id="logo" name="logo">
                       @error('logo')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror

                      
                   </div>

                   {{-- About --}}
                   <div class="mb-3">
                       <label for="about" class="form-label">About</label>
                       <textarea class="form-control" id="about" name="about" rows="5" required>{{ old('about', $settings->about) }}</textarea>
                       @error('about')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   {{-- Phone --}}
                   <div class="mb-3">
                       <label for="phone" class="form-label">Phone</label>
                       <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $settings->phone) }}" required>
                       @error('phone')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   {{-- Address --}}
                   <div class="mb-3">
                       <label for="address" class="form-label">Address</label>
                       <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $settings->address) }}" required>
                       @error('address')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   {{-- Social Links --}}
                   <div class="mb-3">
                       <label for="watsapp" class="form-label">WhatsApp</label>
                       <input type="text" class="form-control" id="watsapp" name="watsapp" value="{{ old('watsapp', $settings->watsapp) }}" required>
                       @error('watsapp')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="mb-3">
                       <label for="linkedin" class="form-label">LinkedIn</label>
                       <input type="text" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $settings->linkedin) }}" required>
                       @error('linkedin')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="mb-3">
                       <label for="youtube" class="form-label">YouTube</label>
                       <input type="text" class="form-control" id="youtube" name="youtube" value="{{ old('youtube', $settings->youtube) }}" required>
                       @error('youtube')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="mb-3">
                       <label for="instagram" class="form-label">Instagram</label>
                       <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $settings->instagram) }}" required>
                       @error('instagram')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   <button type="submit" class="btn btn-primary">Update Settings</button>
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
