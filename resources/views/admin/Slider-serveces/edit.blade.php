@extends('admin.index')

@section('content')
{{-- APP-CONTENT START --}}
<div class="main-content app-content">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Edit Slider Service</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Slider Service</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Page Header Close --}}

        {{-- ROW START --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card custom-card">
                    <div class="card-header justify-content-between">
                        <div class="card-title">Edit Slider Service</div>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('sliderService.update', $sliderService->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Title --}}
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" 
                                       value="{{ old('title', $sliderService->title) }}" required>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Service --}}
                            <div class="mb-3">
                                <label for="service_id" class="form-label">Service</label>
                                <select class="form-select" name="service_id" id="service_id" required>
                                    <option value="" disabled>Choose Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}" 
                                            {{ old('service_id', $sliderService->service_id) == $service->id ? 'selected' : '' }}>
                                            {{ $service->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Project --}}
                            <div class="mb-3">
                                <label for="project_id" class="form-label">Project</label>
                                <select class="form-select" name="project_id" id="project_id" required>
                                    <option value="" disabled>Choose Project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}" 
                                            {{ old('project_id', $sliderService->project_id) == $project->id ? 'selected' : '' }}>
                                            {{ $project->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('project_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Image --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                                <p class="mt-2">Current Image:</p>
                                @if ($sliderService->image)
                                    <img src="{{ asset($sliderService->image) }}" alt="Current Image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
                                @else
                                    <p>No image uploaded.</p>
                                @endif
                            </div>

                            {{-- Submit --}}
                            <button type="submit" class="btn btn-primary">Update</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
        {{-- ROW END --}}

    </div>
</div>
{{-- APP-CONTENT CLOSE --}}
@endsection
