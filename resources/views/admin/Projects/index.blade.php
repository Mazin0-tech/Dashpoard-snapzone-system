@extends('layouts.admin')
@section('content')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
<link rel="icon" href="{{ asset('assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">
<script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="{{ asset('assets/js/main.js') }}"></script>
<link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/libs/node-waves/waves.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}">
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

    .gallery-thumbnails {
        display: flex;
        flex-wrap: wrap;
        gap: 5px;
        max-width: 150px;
    }

    .gallery-thumb {
        width: 30px;
        height: 30px;
        object-fit: cover;
        border-radius: 3px;
        border: 1px solid #ddd;
    }

    .gallery-count {
        background: #007bff;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        font-size: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-left: 5px;
    }

    .featured-badge {
        background: #28a745;
        color: white;
        padding: 2px 6px;
        border-radius: 3px;
        font-size: 10px;
        margin-left: 5px;
    }

    .action-buttons {
        display: flex;
        gap: 5px;
        flex-wrap: nowrap;
    }
</style>
@endpush

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Projects Management</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Projects</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="mb-3 text-end">
            <a href="{{ route('project.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Create New Project
            </a>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Projects List</div>
                    </div>
                    <div class="card-body">
                        <table id="projects-table" class="table table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Industry</th>
                                    <th>Date</th>
                                    <th>Client</th>
                                    <th>Service</th>
                                    <th>Project Link</th>
                                    <th>3D Model</th>
                                    <th>Gallery</th>
                                    <th>Slider Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->id }}</td>
                                    <td>
                                        @if($project->image)
                                        <img src="{{ $project->image }}" alt="Project Image"
                                            style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px; border: 2px solid #e9ecef;">
                                        @else
                                        <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $project->title }}</strong>
                                        @if($project->galleries->where('is_featured', true)->first())
                                        <span class="featured-badge">Featured</span>
                                        @endif
                                    </td>
                                    <td class="description-cell" title="{{ strip_tags($project->description) }}">
                                        <div class="description-wrapper">
                                            {!! Str::limit(strip_tags($project->description), 100) !!}
                                        </div>
                                    </td>
                                    <td>{{ $project->industry ?? 'N/A' }}</td>
                                    <td>{{ $project->date ? $project->date->format('M d, Y') : 'N/A' }}</td>
                                    <td>{{ $project->client ?? 'N/A' }}</td>
                                    <td>
                                        @if($project->service)
                                        <span class="badge bg-primary">{{ $project->service->title }}</span>
                                        @else
                                        <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($project->link_project)
                                        <a href="{{ $project->link_project }}" class="btn btn-outline-info btn-sm"
                                            target="_blank">
                                            <i class="fa fa-external-link"></i> View
                                        </a>
                                        @else
                                        <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($project->model_link)
                                        <a href="{{ $project->model_link }}" class="btn btn-outline-secondary btn-sm"
                                            target="_blank">
                                            <i class="fa fa-cube"></i> View 3D Model
                                        </a>
                                        @else
                                        <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($project->galleries->count() > 0)
                                        <div class="gallery-thumbnails">
                                            @foreach($project->galleries->take(3) as $gallery)
                                            <img src="{{ $gallery->image }}" alt="Gallery" class="gallery-thumb"
                                                title="{{ $gallery->is_featured ? 'Featured Image' : 'Gallery Image' }}">
                                            @endforeach
                                            @if($project->galleries->count() > 3)
                                            <span class="gallery-count">+{{ $project->galleries->count() - 3 }}</span>
                                            @endif
                                        </div>
                                        <small class="text-muted">{{ $project->galleries->count() }} images</small>
                                        @else
                                        <span class="text-muted">No Gallery</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($project->slider_type === 1)
                                        <span class="badge bg-success">Portrait</span>
                                        @else
                                        <span class="badge bg-info">Landscape</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('project.edit', $project->id) }}"
                                                class="btn btn-primary btn-sm" title="Edit Project">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <form method="POST" action="{{ route('project.destroy', $project->id) }}"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this project? This action cannot be undone.');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    title="Delete Project">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
        @endif

        @if(session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
        @endif

    </div>
</div>

@push('js')
<script src="{{ asset('assets/js/custom-switcher.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    $(document).ready(function() {
                $('#projects-table').DataTable({
                    responsive: true,
                    dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>' +
                         '<"row"<"col-sm-12"tr>>' +
                         '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                    buttons: [
                        {
                            extend: 'copy',
                            className: 'btn btn-sm btn-outline-secondary',
                            exportOptions: {
                                columns: ':not(:last-child)'
                            }
                        },
                        {
                            extend: 'csv',
                            className: 'btn btn-sm btn-outline-primary',
                            exportOptions: {
                                columns: ':not(:last-child)'
                            }
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-sm btn-outline-success',
                            exportOptions: {
                                columns: ':not(:last-child)'
                            }
                        },
                        {
                            extend: 'pdf',
                            className: 'btn btn-sm btn-outline-danger',
                            exportOptions: {
                                columns: ':not(:last-child)'
                            }
                        },
                        {
                            extend: 'print',
                            className: 'btn btn-sm btn-outline-dark',
                            exportOptions: {
                                columns: ':not(:last-child)'
                            }
                        }
                    ],
                    language: {
                        search: "Search:",
                        lengthMenu: "Show _MENU_ entries",
                        info: "Showing _START_ to _END_ of _TOTAL_ entries",
                        infoEmpty: "Showing 0 to 0 of 0 entries",
                        infoFiltered: "(filtered from _MAX_ total entries)",
                        zeroRecords: "No matching projects found",
                        paginate: {
                            first: "First",
                            last: "Last",
                            next: "Next",
                            previous: "Previous"
                        }
                    },
                    order: [[0, 'desc']],
                    pageLength: 10,
                    lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                    columnDefs: [
                        {
                            targets: [1, 9], // Image and Gallery columns
                            orderable: false,
                            searchable: false
                        },
                        {
                            targets: -1, // Actions column
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            });
</script>
@endpush

@endsection