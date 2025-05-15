@extends('layouts.admin')

@section('content')

@push('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
    <link rel="icon" href="{{asset('assets/images/brand-logos/favicon.ico')}}" type="image/x-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
@endpush

<div class="main-content app-content">
    <div class="container-fluid">

        {{-- Page Header --}}
        <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
            <h1 class="page-title fw-semibold fs-18 mb-0">Contact</h1>
            <div class="ms-md-1 ms-0">
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Contact</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>
        {{-- Page Header Close --}}

        {{-- Create Button --}}
        <div class="mb-3 text-end">
            <a href="{{ route('contact.create') }}" class="btn btn-success">
                <i class="fa fa-plus"></i> Create Contact
            </a>
        </div>

        {{-- Table --}}
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">Contacts</div>
                    </div>
                    <div class="card-body">
                        <table id="file-export" class="table table-bordered text-nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contact as $contactt)
                                    <tr>
                                        <td>{{ $contactt->id }}</td>
                                        <td>{{ $contactt->name }}</td>
                                        <td>{{ $contactt->email }}</td>
                                        <td>{{ $contactt->subject }}</td>
                                        <td>{{ $contactt->message }}</td>
                                        <td>{{ $contactt->phone }}</td>
                                        <td>
                                            <a href="{{ route('contact.edit', $contactt->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <form class="d-inline" method="post" action="{{ route('contact.destroy', $contactt->id) }}" onsubmit="return confirm('Are you sure you want to delete this Contact?');">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Toastr message --}}
                        @if(session('success'))
                            <script>
                                toastr.success("{{ session('success') }}");
                            </script>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    {{-- jQuery (مهم لـ DataTables) --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- DataTables --}}
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    {{-- Toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    {{-- Init DataTables --}}
    <script>
        $(document).ready(function () {
            $('#file-export').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
@endpush

@endsection
