@extends('layouts.admin')

@section('content')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
<link rel="icon" href="{{ asset('assets/images/brand-logos/favicon.ico') }}" type="image/x-icon">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush

<div class="main-content app-content">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Contact Management</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contacts</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Page Header Close --}}

        {{-- Create Button --}}
        <div class="mb-3 text-end">
            <a href="{{ route('contact.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Create New Contact
            </a>
        </div>

        {{-- Table --}}
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Contacts List</div>
                    </div>
                    <div class="card-body">
                        <table id="contacts-table" class="table table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->id }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>
                                        {{ $contact->email }}
                                        @if($contact->email2 || $contact->email3)
                                        <br>
                                        <small class="text-muted">
                                            @if($contact->email2) {{ $contact->email2 }} @endif
                                            @if($contact->email3) , {{ $contact->email3 }} @endif
                                        </small>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $contact->phone }}
                                        @if($contact->phone2 || $contact->phone3)
                                        <br>
                                        <small class="text-muted">
                                            @if($contact->phone2) {{ $contact->phone2 }} @endif
                                            @if($contact->phone3) , {{ $contact->phone3 }} @endif
                                        </small>
                                        @endif
                                    </td>
                                    <td>{{ Str::limit($contact->subject, 30) }}</td>
                                    <td>{{ Str::limit($contact->message, 50) }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            {{-- Edit Button --}}
                                            <a href="{{ route('contact.edit', $contact->id) }}"
                                                class="btn btn-primary btn-sm" title="Edit Contact">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Toastr Messages --}}
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
            </div>
        </div>
    </div>
</div>

@push('js')
{{-- jQuery --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- DataTables --}}
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

{{-- Toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

{{-- Initialize DataTables --}}
<script>
    $(document).ready(function() {
            $('#contacts-table').DataTable({
                responsive: true,
                dom: '<"row"<"col-sm-12 col-md-6"B><"col-sm-12 col-md-6"f>>' +
                     '<"row"<"col-sm-12"tr>>' +
                     '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
                buttons: [
                    {
                        extend: 'copy',
                        className: 'btn btn-sm btn-outline-secondary'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-sm btn-outline-primary'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-sm btn-outline-success'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-sm btn-outline-danger'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-sm btn-outline-dark'
                    }
                ],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from _MAX_ total entries)",
                    zeroRecords: "No matching records found",
                    paginate: {
                        first: "First",
                        last: "Last",
                        next: "Next",
                        previous: "Previous"
                    }
                },
                order: [[0, 'desc']],
                pageLength: 10,
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
            });
        });
</script>
@endpush

@endsection