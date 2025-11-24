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
                        <li class="breadcrumb-item"><a href="{{ route('contact.index') }}">Contacts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Contact</li>
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
                            Edit Contact - {{ $contact->name }}
                        </div>
                        <div class="card-options">
                            <a href="{{ route('contact.index') }}" class="btn btn-sm btn-outline-secondary">
                                <i class="fa fa-arrow-left"></i> Back to Contacts
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- Form to edit contact --}}
                        <form action="{{ route('contact.update', $contact->id) }}" method="POST" id="updateForm">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                {{-- Name Field --}}
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name', $contact->name) }}" required>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Email Field --}}
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Primary Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ old('email', $contact->email) }}" required>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                {{-- Secondary Email --}}
                                <div class="col-md-6 mb-3">
                                    <label for="email2" class="form-label">Secondary Email</label>
                                    <input type="email" class="form-control @error('email2') is-invalid @enderror"
                                        id="email2" name="email2" value="{{ old('email2', $contact->email2) }}">
                                    @error('email2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Tertiary Email --}}
                                <div class="col-md-6 mb-3">
                                    <label for="email3" class="form-label">Additional Email</label>
                                    <input type="email" class="form-control @error('email3') is-invalid @enderror"
                                        id="email3" name="email3" value="{{ old('email3', $contact->email3) }}">
                                    @error('email3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                {{-- Primary Phone --}}
                                <div class="col-md-4 mb-3">
                                    <label for="phone" class="form-label">Primary Phone <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" value="{{ old('phone', $contact->phone) }}" required>
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Secondary Phone --}}
                                <div class="col-md-4 mb-3">
                                    <label for="phone2" class="form-label">Secondary Phone</label>
                                    <input type="text" class="form-control @error('phone2') is-invalid @enderror"
                                        id="phone2" name="phone2" value="{{ old('phone2', $contact->phone2) }}">
                                    @error('phone2')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Tertiary Phone --}}
                                <div class="col-md-4 mb-3">
                                    <label for="phone3" class="form-label">Additional Phone</label>
                                    <input type="text" class="form-control @error('phone3') is-invalid @enderror"
                                        id="phone3" name="phone3" value="{{ old('phone3', $contact->phone3) }}">
                                    @error('phone3')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Subject Field --}}
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                    id="subject" name="subject" value="{{ old('subject', $contact->subject) }}"
                                    required>
                                @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Message Field --}}
                            <div class="mb-3">
                                <label for="message" class="form-label">Message <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message"
                                    name="message" rows="4" required>{{ old('message', $contact->message) }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                {{-- Address Field --}}
                                <div class="col-md-8 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                        name="address" rows="3">{{ old('address', $contact->address) }}</textarea>
                                    @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Iframe Field --}}
                                <div class="col-md-4 mb-3">
                                    <label for="iframe" class="form-label">Google Maps Iframe</label>
                                    <textarea class="form-control @error('iframe') is-invalid @enderror" id="iframe"
                                        name="iframe" rows="3"
                                        placeholder="<iframe>...">{{ old('iframe', $contact->iframe) }}</textarea>
                                    @error('iframe')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary" id="updateBtn">
                                    <i class="fa fa-save"></i> Update Contact
                                </button>
                                <a href="{{ route('contact.index') }}" class="btn btn-outline-secondary">
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
{{--APP-CONTENT CLOSE--}}
@endsection

@push('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script>
    // Sweet Alert for form submission
   document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('updateForm');
      const submitBtn = document.getElementById('updateBtn');

      form.addEventListener('submit', function(e) {
         e.preventDefault();
         
         Swal.fire({
            title: 'Are you sure?',
            text: "You are about to update this contact information!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, update it!',
            cancelButtonText: 'Cancel',
            reverseButtons: true
         }).then((result) => {
            if (result.isConfirmed) {
               // Show loading state
               submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Updating...';
               submitBtn.disabled = true;
               
               // Submit the form
               form.submit();
            }
         });
      });

      // Character counter for message field
      const messageField = document.getElementById('message');
      const charCount = document.createElement('div');
      charCount.className = 'form-text text-end';
      messageField.parentNode.appendChild(charCount);

      function updateCharCount() {
         const length = messageField.value.length;
         charCount.textContent = `${length} characters`;
         
         if (length > 1000) {
            charCount.className = 'form-text text-end text-danger';
         } else if (length > 500) {
            charCount.className = 'form-text text-end text-warning';
         } else {
            charCount.className = 'form-text text-end text-success';
         }
      }

      messageField.addEventListener('input', updateCharCount);
      updateCharCount(); // Initial count
   });

   // Show success message if coming from update
   @if(session('success'))
      Swal.fire({
         icon: 'success',
         title: 'Success!',
         text: '{{ session('success') }}',
         timer: 3000,
         showConfirmButton: false
      });
   @endif

   // Show error message if any
   @if(session('error'))
      Swal.fire({
         icon: 'error',
         title: 'Error!',
         text: '{{ session('error') }}',
         timer: 4000
      });
   @endif
</script>
@endpush