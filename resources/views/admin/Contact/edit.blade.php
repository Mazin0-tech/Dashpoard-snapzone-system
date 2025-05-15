@extends('admin.index')

@section('content')
{{--APP-CONTENT START--}}
<div class="main-content app-content">
   <div class="container-fluid">
      {{-- Page Header --}}
      <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
         <h1 class="page-title fw-semibold fs-18 mb-0">Edit Contact</h1>
         <div class="ms-md-1 ms-0">
            <nav>
               <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="#">Edit</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Contact</li>
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
                     Edit Contact
                  </div>
               </div>
               <div class="card-body">
               {{-- Form to edit contact --}}
               <form action="{{ route('contact.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                   @csrf
                   @method('PUT') {{-- This is important for PUT requests to update data --}}

                   <div class="mb-3">
                       <label for="name" class="form-label">Name</label>
                       <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $contact->name) }}" required>
                       @error('name')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                   <div class="mb-3">
                       <label for="email" class="form-label">Email</label>
                       <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $contact->email) }}" required>
                       @error('email')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>
                   
                   <div class="mb-3">
                       <label for="subject" class="form-label">Subject</label>
                       <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject', $contact->subject) }}" required>
                       @error('subject')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>

                       
                   <div class="mb-3">
                       <label for="message" class="form-label">Message</label>
                       <input type="text" class="form-control" id="message" name="Message" value="{{ old('message', $contact->message) }}" required>
                       @error('message')
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                   </div>
                   
                       
                   <div class="mb-3">
                       <label for="phone" class="form-label">Phone</label>
                       <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $contact->phone) }}" required>
                       @error('phone')
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
@endsection
