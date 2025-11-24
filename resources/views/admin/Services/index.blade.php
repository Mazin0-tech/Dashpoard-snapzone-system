@extends('layouts.admin')
@section('content')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
<link rel="icon" href="{{ asset('assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">

<!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Choices JS -->
<script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

<!-- Main Theme Js -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<!-- Bootstrap Css -->
<link id="style" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Style Css -->
<link href="{{ asset('assets/css/styles.min.css') }}" rel="stylesheet">

<!-- Icons Css -->
<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

<!-- Node Waves Css -->
<link href="{{ asset('assets/libs/node-waves/waves.min.css') }}" rel="stylesheet">

<!-- Simplebar Css -->
<link href="{{ asset('assets/libs/simplebar/simplebar.min.css') }}" rel="stylesheet">

<!-- Color Picker Css -->
<link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/libs/@simonwep/pickr/themes/nano.min.css') }}">

<!-- Choices Css -->
<link rel="stylesheet" href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}">

<style>
  .description-cell {
    max-width: 200px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .action-buttons {
    display: flex;
    gap: 5px;
    flex-wrap: nowrap;
  }

  .service-image {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
    border: 2px solid #e9ecef;
  }
</style>
@endpush

<div class="main-content app-content">
  <div class="container-fluid">

    {{-- Page Header --}}
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
      <h1 class="page-title fw-semibold fs-18 mb-0">Services Management</h1>
      <div class="ms-md-1 ms-0">
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Services</li>
          </ol>
        </nav>
      </div>
    </div>
    {{-- Page Header Close --}}

    {{-- Create Button --}}
    <div class="mb-3 text-end">
      <a href="{{ route('service.create') }}" class="btn btn-success">
        <i class="fa fa-plus"></i> Create New Service
      </a>
    </div>

    {{-- Services Table --}}
    <div class="row">
      <div class="col-xl-12">
        <div class="card custom-card">
          <div class="card-header">
            <div class="card-title">Services List</div>
          </div>
          <div class="card-body">
            <table id="services-table" class="table table-bordered text-nowrap w-100">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Short Description</th>
                  <th>Industry</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($services as $service)
                <tr>
                  <td>{{ $service->id }}</td>
                  <td>
                    @if($service->image)
                    <img src="{{ $service->image }}" alt="{{ $service->title }}" class="service-image">
                    @else
                    <span class="text-muted">No Image</span>
                    @endif
                  </td>
                  <td>
                    <strong>{{ $service->title }}</strong>
                  </td>
                  <td class="description-cell" title="{{ strip_tags($service->description) }}">
                    {!! Str::limit(strip_tags($service->description), 50) !!}
                  </td>
                  <td class="description-cell" title="{{ strip_tags($service->shortdescription) }}">
                    {!! Str::limit(strip_tags($service->shortdescription), 30) !!}
                  </td>
                  <td>{{ $service->industry }}</td>
                  <td>
                    @if($service->start_date)
                    {{ $service->start_date}}
                    @else
                    <span class="text-muted">N/A</span>
                    @endif
                  </td>
                  <td>
                    @if($service->end_date)
                    {{ $service->end_date}}
                    @else
                    <span class="text-muted">N/A</span>
                    @endif
                  </td>
                  <td>
                    <div class="action-buttons">
                      <a href="{{ route('service.edit', $service->id) }}" class="btn btn-primary btn-sm"
                        title="Edit Service">
                        <i class="fa-solid fa-pen-to-square"></i>
                      </a>

                      <form method="POST" action="{{ route('service.destroy', $service->id) }}"
                        class="d-inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm delete-btn" title="Delete Service"
                          data-service-name="{{ $service->title }}">
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
    {{-- End:: row-4 --}}

  </div>
</div>

@push('js')
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Datatables Cdn -->
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

<!-- Internal Datatables JS -->
<script src="{{ asset('assets/js/datatables.js') }}"></script>

<!-- Custom JS -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

<script>
  $(document).ready(function() {
        // Initialize DataTable
        $('#services-table').DataTable({
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
                zeroRecords: "No matching services found",
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
                    targets: [1, 8], // Image and Actions columns
                    orderable: false,
                    searchable: false
                }
            ]
        });

        // SweetAlert for delete confirmation
        $('.delete-btn').on('click', function(e) {
            e.preventDefault();
            const form = $(this).closest('form');
            const serviceName = $(this).data('service-name');
            
            Swal.fire({
                title: 'Are you sure?',
                text: `You are about to delete "${serviceName}". This action cannot be undone!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                reverseButtons: true,
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-secondary'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });

        // Show success message
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                timer: 3000,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        @endif

        // Show error message
        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                timer: 4000,
                showConfirmButton: true
            });
        @endif

        // Show warning message
        @if(session('warning'))
            Swal.fire({
                icon: 'warning',
                title: 'Warning!',
                text: '{{ session('warning') }}',
                timer: 4000
            });
        @endif

        // Show info message
        @if(session('info'))
            Swal.fire({
                icon: 'info',
                title: 'Information',
                text: '{{ session('info') }}',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    });

    // Global delete confirmation function
    function confirmDelete(serviceName, formId) {
        Swal.fire({
            title: 'Are you sure?',
            text: `You are about to delete "${serviceName}". This action cannot be undone!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
            }
        });
    }
</script>
@endpush

@endsection