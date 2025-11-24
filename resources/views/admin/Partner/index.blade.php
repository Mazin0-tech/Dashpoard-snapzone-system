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
    .logo-thumb {
        width: 80px;
        height: 80px;
        object-fit: contain;
        border-radius: 8px;
        border: 2px solid #e9ecef;
        background: white;
        padding: 5px;
    }

    .action-buttons {
        display: flex;
        gap: 5px;
        flex-wrap: nowrap;
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>
@endpush

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Partners Management</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Partners</li>
                    </ol>
                </nav>
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa fa-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="mb-3 text-end">
            <a href="{{ route('partners.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Add New Partner
            </a>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Partners List</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="partners-table" class="table table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Logo</th>
                                        <th>Title</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($partners as $partner)
                                    <tr>
                                        <td>{{ $partner->id }}</td>
                                        <td>
                                            @if($partner->logo)
                                            <img src="{{ $partner->logo }}" alt="{{ $partner->title }}"
                                                class="logo-thumb"
                                                onerror="this.src='{{ asset('assets/images/default-logo.png') }}'">
                                            @else
                                            <div
                                                class="logo-thumb bg-light d-flex align-items-center justify-content-center">
                                                <span class="text-muted small">No Logo</span>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ $partner->title }}</strong>
                                        </td>
                                        <td>{{ $partner->created_at->format('M d, Y') }}</td>
                                        <td>{{ $partner->updated_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ route('partners.edit', $partner->id) }}"
                                                    class="btn btn-primary btn-sm" title="Edit Partner">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>

                                                <form method="POST"
                                                    action="{{ route('partners.destroy', $partner->id) }}"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this partner? This action cannot be undone.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete Partner">
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
        </div>
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
        $('#partners-table').DataTable({
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
                zeroRecords: "No matching partners found",
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
                    targets: [1], // Logo column
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

    // Auto-dismiss alerts after 5 seconds
    $(document).ready(function() {
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    });
</script>
@endpush

@endsection