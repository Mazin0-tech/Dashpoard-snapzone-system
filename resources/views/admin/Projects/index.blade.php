@extends('layouts.admin')
@section('content')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
<link rel="icon" href="{{asset('assets/images/brand-logos/favicon.ico')}}" type="image/x-icon">
<script src="{{asset('assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="{{asset('assets/js/main.js')}}"></script>
<link id="style" href="{{asset('assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/styles.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">
<link href="{{asset('assets/libs/node-waves/waves.min.css')}}" rel="stylesheet">
<link href="{{asset('assets/libs/simplebar/simplebar.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/libs/@simonwep/pickr/themes/nano.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/libs/choices.js/public/assets/styles/choices.min.css')}}">
<style>
    .description-cell {
        max-width: 250px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        vertical-align: top;
    }

    .description-wrapper {
        white-space: normal;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

@endpush

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Projects</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Projects</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> Projects</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="mb-3 text-end">
            <a href="{{ route('project.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Create Project
            </a>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Projects</div>
                    </div>
                    <div class="card-body">
                        <table id="file-export" class="table table-bordered text-nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Industry</th>
                                    <th>Date</th>
                                    <th>Client</th>
                                    <th>Services</th>
                                    <th>Project Link</th>
                                    <th>Gallery</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>
                                        @if($project->image)
                                            <img src="{{ asset($project->image) }}" alt="Image" style="width: 50px; border-radius:10px; margin: auto;">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $project->title }}</td>
                                    {{--  <td>{!! $project->description !!}</td>  --}}
                                    {{--  new style description  --}}
                                <td class="description-cell" title="{{ strip_tags($project->description) }}">
                                        <div class="description-wrapper">
                                            {!! $project->description !!}
                                        </div>
                                    </td>
                                     
                                    <td>{{ $project->industry }}</td>
                                    <td>{{ $project->date }}</td>
                                    <td>{{ $project->client }}</td>
                                    <td>{{ $project->services->title }}</td>
                                    <td>
                                        @if($project->link_project)
                                            <a href="{{ $project->link_project }}" class="btn btn-info btn-sm" target="_blank">View Project</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                              <td>


    @if ($project->gallery)
    @php
        $galleryImages = json_decode($project->gallery, true); // نحول JSON إلى array
    @endphp

    @if (is_array($galleryImages))
        @foreach ($galleryImages as $img)
            @if (is_string($img))  <!-- تحقق من أن $img هو string -->
                <img src="{{ $img }}" class="d-block" style="width: 30px; margin: 2px;">
            @else
                <p>Invalid image data</p> <!-- يمكنك إظهار رسالة في حالة وجود بيانات غير صحيحة -->
            @endif
        @endforeach
    @endif
@endif

</td>



                                    <td>
                                        <a href="{{ route('project.edit', $project->id) }}" class="btn btn-primary btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form class="d-inline" method="POST" action="{{ route('project.destroy', $project->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div> <!-- col -->
        </div> <!-- row -->

        {{-- Gallery Placeholder --}}
        {{--  Uncomment if needed  --}}
       

        {{-- Search Modal --}}
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="input-group">
                            <a href="javascript:void(0);" class="input-group-text" id="Search-Grid"><i class="fe fe-search header-link-icon fs-18"></i></a>
                            <input type="search" class="form-control border-0 px-2" placeholder="Search" aria-label="Search">
                            <a href="javascript:void(0);" class="input-group-text" id="voice-search"><i class="fe fe-mic header-link-icon"></i></a>
                            <a href="javascript:void(0);" class="btn btn-light btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fe fe-more-vertical"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <div class="mt-4">
                            <p class="font-weight-semibold text-muted mb-2">Are You Looking For...</p>
                            <span class="search-tags"><i class="fe fe-user me-2"></i>People<a href="#" class="tag-addon"><i class="fe fe-x"></i></a></span>
                            <span class="search-tags"><i class="fe fe-file-text me-2"></i>Pages<a href="#" class="tag-addon"><i class="fe fe-x"></i></a></span>
                            <span class="search-tags"><i class="fe fe-align-left me-2"></i>Articles<a href="#" class="tag-addon"><i class="fe fe-x"></i></a></span>
                            <span class="search-tags"><i class="fe fe-server me-2"></i>Tags<a href="#" class="tag-addon"><i class="fe fe-x"></i></a></span>
                        </div>
                        <div class="my-4">
                            <p class="font-weight-semibold text-muted mb-2">Recent Search :</p>
                            <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                                <a href="notifications.html"><span>Notifications</span></a>
                                <a class="ms-auto lh-1" href="#" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                            </div>
                            <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                                <a href="alerts.html"><span>Alerts</span></a>
                                <a class="ms-auto lh-1" href="#" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                            </div>
                            <div class="p-2 border br-5 d-flex align-items-center text-muted mb-0 alert">
                                <a href="mail.html"><span>Mail</span></a>
                                <a class="ms-auto lh-1" href="#" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-group ms-auto">
                            <button class="btn btn-sm btn-primary-light">Search</button>
                            <button class="btn btn-sm btn-primary">Clear Recents</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- container-fluid -->
</div> <!-- main-content -->

@push('js')
<script src="{{asset('assets/js/custom-switcher.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('assets/js/datatables.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
@endpush

@endsection
