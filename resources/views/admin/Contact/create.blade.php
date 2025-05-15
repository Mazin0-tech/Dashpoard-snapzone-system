@extends('admin.index')
@section('content')

{{--APP-CONTENT START--}}
<div class="main-content app-content">
   <div class="container-fluid">
      {{-- Page Header --}}
      <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
         <h1 class="page-title fw-semibold fs-18 mb-0">Create Contact</h1>
         <div class="ms-md-1 ms-0">
            <nav>
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Contacts</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create</li>
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
                     Add New Contact
                  </div>
               </div>
               <div class="card-body">

                  <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf

                     <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <div class="text-danger">{{ $name }}</div>
                        @enderror
                     </div>

                     <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <div class="text-danger">{{ $email }}</div>
                        @enderror
                     </div>

                     <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                        @error('phone')
                        <div class="text-danger">{{ $phone }}</div>
                        @enderror
                     </div>

                     <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" required>
                        @error('subject')
                        <div class="text-danger">{{ $subject }}</div>
                        @enderror
                     </div>

                     <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required>{{ old('message') }}</textarea>
                        @error('message')
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
{{--APP-CONTENT CLOSE--}}
@endsection
