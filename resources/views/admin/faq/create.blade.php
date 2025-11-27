@extends('layouts.admin')
@section('content')

@push('css')
<!-- Summernote CSS via CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">
<style>
    .question-preview {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 5px;
        padding: 15px;
        margin-top: 10px;
    }

    .answer-preview {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 5px;
        padding: 15px;
        margin-top: 10px;
        min-height: 100px;
    }
</style>
@endpush

<div class="main-content app-content">
    <div class="container-fluid">
        {{-- Page Header --}}
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">FAQs</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('faq.index') }}">FAQs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create FAQ</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Create New FAQ</div>
                        <a href="{{ route('faq.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-arrow-left"></i> Back to FAQs
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('faq.store') }}" method="POST" id="faqForm">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="service_id" class="form-label">Service (Optional)</label>
                                    <select class="form-control @error('service_id') is-invalid @enderror"
                                        id="service_id" name="service_id">
                                        <option value="">General FAQ (No specific service)</option>
                                        @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ old('service_id')==$service->id ?
                                            'selected' : '' }}>
                                            {{ $service->title }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Leave empty for general FAQs that apply to all services</div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="is_active"
                                            name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Active
                                        </label>
                                    </div>
                                    <div class="form-text">Inactive FAQs won't be displayed to users</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="question" class="form-label">Question <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('question') is-invalid @enderror" id="question"
                                        name="question" rows="3" required
                                        placeholder="Enter the frequently asked question">{{ old('question') }}</textarea>
                                    @error('question')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Keep the question clear and concise</div>

                                    <!-- Question Preview -->
                                    <div class="question-preview mt-2" id="questionPreview" style="display: none;">
                                        <strong>Preview:</strong>
                                        <div id="previewQuestion"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="answer" class="form-label">Answer <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('answer') is-invalid @enderror" id="answer"
                                        name="answer" rows="6" required
                                        placeholder="Enter the detailed answer">{{ old('answer') }}</textarea>
                                    @error('answer')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Provide a clear and helpful answer</div>

                                    <!-- Answer Preview -->
                                    <div class="answer-preview mt-2" id="answerPreview" style="display: none;">
                                        <strong>Preview:</strong>
                                        <div id="previewAnswer"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Create FAQ
                                </button>
                                <a href="{{ route('faq.index') }}" class="btn btn-outline-secondary">
                                    <i class="fa fa-times"></i> Cancel
                                </a>
                            </div>
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

<script>
    $(document).ready(function () {
                // Question preview
                $('#question').on('input', function() {
                    const question = $(this).val();
                    const preview = $('#questionPreview');
                    const previewText = $('#previewQuestion');

                    if (question.trim()) {
                        previewText.text(question);
                        preview.show();
                    } else {
                        preview.hide();
                    }
                });

                // Answer preview
                $('#answer').on('input', function() {
                    const answer = $(this).val();
                    const preview = $('#answerPreview');
                    const previewText = $('#previewAnswer');

                    if (answer.trim()) {
                        previewText.text(answer);
                        preview.show();
                    } else {
                        preview.hide();
                    }
                });

                // Form validation
                $('#faqForm').on('submit', function(e) {
                    const question = $('#question').val().trim();
                    const answer = $('#answer').val().trim();

                    if (!question) {
                        e.preventDefault();
                        alert('Please enter a question');
                        $('#question').focus();
                        return false;
                    }

                    if (!answer) {
                        e.preventDefault();
                        alert('Please enter an answer');
                        $('#answer').focus();
                        return false;
                    }

                    return true;
                });

                // Trigger preview on page load if there are old values
                @if(old('question'))
                    $('#question').trigger('input');
                @endif

                @if(old('answer'))
                    $('#answer').trigger('input');
                @endif
            });
</script>
@endpush

@endsection