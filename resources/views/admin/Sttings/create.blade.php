@extends('admin.index')
@section('content')
{{--APP-CONTENT START--}}
<div class="main-content app-content">
   <div class="container-fluid">
      {{-- Page Header --}}
      <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
         <h1 class="page-title fw-semibold fs-18 mb-0">Settings</h1>
         <div class="ms-md-1 ms-0">
            <nav>
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Create</a></li>
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
                     Settings
                  </div>
               </div>
               <div class="card-body">

               {{-- Form to create/update settings --}}
               <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                   @csrf

                   {{-- Setting logo --}}
                   <div class="mb-3">
                       <label for="logo" class="form-label">Logo</label>
                       <input type="text" class="form-control" id="logo" name="logo" value="{{ old('logo') }}" required>
                       @error('logo')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   {{-- Setting Value --}}
                   <div class="mb-3">
                       <label for="about" class="form-label">Setting About</label>
                       <input type="text" class="form-control" id="about" name="about" about="{{ old('about') }}" required>
                       @error('about')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   {{-- Description --}}
                   <div class="mb-3">
                       <label for="face" class="form-label">facebook</label>
                       <input class="form-control" id="face" name="face" rows="4">{{ old('face') }}</input>
                       @error('face')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>
                   {{--  phone  --}}
                        <div class="mb-3">
                       <label for="phone" class="form-label">Phone</label>
                       <input class="form-control" id="phone" name="phone" rows="4">{{ old('phone') }}</input>
                       @error('phone')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                          {{--  Address  --}}
                        <div class="mb-3">
                       <label for="address" class="form-label">Address</label>
                       <input class="form-control" id="address" name="address" rows="4">{{ old('address') }}</input>
                       @error('address')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                      {{--  whatsapp  --}}
                        <div class="mb-3">
                       <label for="watsapp" class="form-label">whatsapp</label>
                       <input class="form-control" id="watsapp" name="watsapp" rows="4">{{ old('watsapp') }}</input>
                       @error('watsapp')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                     {{--  linkedin  --}}
                        <div class="mb-3">
                       <label for="linkedin" class="form-label">linkedin</label>
                       <input class="form-control" id="linkedin" name="linkedin" rows="4">{{ old('linkedin') }}</input>
                       @error('linkedin')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                      {{--  youtube  --}}
                        <div class="mb-3">
                       <label for="youtube" class="form-label">Youtube</label>
                       <input class="form-control" id="youtube" name="youtube" rows="4">{{ old('youtube') }}</input>
                       @error('youtube')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                        {{--  instagram  --}}
                        <div class="mb-3">
                       <label for="instagram" class="form-label">Instagram</label>
                       <input class="form-control" id="instagram" name="instagram" rows="4">{{ old('instagram') }}</input>
                       @error('instagram')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>



               
                  
                   {{-- Submit Button --}}
                   <button type="submit" class="btn btn-primary">Submit</button>
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