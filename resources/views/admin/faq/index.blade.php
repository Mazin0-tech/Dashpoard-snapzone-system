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
    .question-text {
        max-width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .status-badge {
        font-size: 0.75rem;
        padding: 0.25rem 0.5rem;
    }

    .action-buttons {
        display: flex;
        gap: 5px;
        flex-wrap: nowrap;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .filter-section {
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
    }
</style>
@endpush

<div class="main-content app-content">
    <div class="container-fluid">
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">FAQs Management</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">FAQs</li>
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

        <!-- Filters Section -->
        <div class="filter-section">
            <form method="GET" action="{{ route('faq.index') }}" class="row g-3">
                <div class="col-md-3">
                    <label for="service_id" class="form-label">Filter by Service</label>
                    <select name="service_id" id="service_id" class="form-select">
                        <option value="">All Services</option>
                        @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ request('service_id')==$service->id ? 'selected' : '' }}>
                            {{ $service->title }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="is_active" class="form-label">Status</label>
                    <select name="is_active" id="is_active" class="form-select">
                        <option value="">All Status</option>
                        <option value="1" {{ request('is_active')==='1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ request('is_active')==='0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Quick Filters</label>
                    <div class="d-flex gap-2">
                        <a href="{{ route('faq.index', ['active_only' => true]) }}"
                            class="btn btn-outline-success btn-sm">
                            Active Only
                        </a>
                        <a href="{{ route('faq.index', ['general_only' => true]) }}"
                            class="btn btn-outline-info btn-sm">
                            General FAQs
                        </a>
                        <a href="{{ route('faq.index') }}" class="btn btn-outline-secondary btn-sm">
                            Clear Filters
                        </a>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary me-2">Apply Filters</button>
                </div>
            </form>
        </div>

        <div class="mb-3 text-end">
            <a href="{{ route('faq.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Add New FAQ
            </a>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">FAQs List</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="faqs-table" class="table table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Question</th>
                                        <th>Service</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faqs as $faq)
                                    <tr>
                                        <td>{{ $faq->id }}</td>
                                        <td>
                                            <div class="question-text" title="{{ $faq->question }}">
                                                {{ $faq->question }}
                                            </div>
                                        </td>
                                        <td>
                                            @if($faq->service)
                                            <span class="badge bg-primary">{{ $faq->service->title }}</span>
                                            @else
                                            <span class="badge bg-secondary">General</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($faq->is_active)
                                            <span class="badge bg-success status-badge">Active</span>
                                            @else
                                            <span class="badge bg-danger status-badge">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $faq->created_at->format('M d, Y') }}</td>
                                        <td>{{ $faq->updated_at->format('M d, Y') }}</td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="{{ route('faq.edit', $faq->id) }}"
                                                    class="btn btn-primary btn-sm" title="Edit FAQ">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>

                                                <form method="POST" action="{{ route('faq.toggle-status', $faq->id) }}"
                                                    class="d-inline">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-{{ $faq->is_active ? 'warning' : 'success' }} btn-sm"
                                                        title="{{ $faq->is_active ? 'Deactivate' : 'Activate' }}">
                                                        <i
                                                            class="fa-solid fa-{{ $faq->is_active ? 'eye-slash' : 'eye' }}"></i>
                                                    </button>
                                                </form>

                                                <form method="POST" action="{{ route('faq.destroy', $faq->id) }}"
                                                    class="d-inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this FAQ? This action cannot be undone.');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Delete FAQ">
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
                $('#faqs-table').DataTable({
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
                        zeroRecords: "No matching FAQs found",
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