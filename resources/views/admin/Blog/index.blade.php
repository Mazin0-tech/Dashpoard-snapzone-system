@extends('layouts.admin')
@section('content')


@push('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">

<link rel="icon" href="{{asset('assets/images/brand-logos/favicon.ico')}}" type="image/x-icon">

{{--
<!-- Choices JS --> --}}
<script src="{{asset('assets/libs/choices.js/public/assets/scripts/choices.min.js')}}"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

{{--
<!-- Main Theme Js --> --}}
<script src="{{asset('assets/js/main.js')}}"></script>

{{--
<!-- Bootstrap Css --> --}}
<link id="style" href="{{asset('assets/libs/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

{{--
<!-- Style Css --> --}}
<link href="{{asset('assets/css/styles.min.css')}}" rel="stylesheet">

{{--
<!-- Icons Css --> --}}
<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

<!-- Node Waves Css -->
<link href="{{asset('assets/libs/node-waves/waves.min.css')}}" rel="stylesheet">

<!-- Simplebar Css -->
<link href="{{asset('assets/libs/simplebar/simplebar.min.css')}}" rel="stylesheet">

<!-- Color Picker Css -->
<link rel="stylesheet" href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/libs/@simonwep/pickr/themes/nano.min.css')}}">

<!-- Choices Css -->
<link rel="stylesheet" href="{{asset('assets/libs/choices.js/public/assets/styles/choices.min.css')}}">


@endpush


<div class="main-content app-content">
  <div class="container-fluid">

    {{--
    <!-- Page Header --> --}}
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
      <h1 class="page-title fw-semibold fs-18 mb-0">Blog</h1>
      <div class="ms-md-1 ms-0">
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Blog</li>
          </ol>
        </nav>
      </div>
    </div>
    {{--
    <!-- Page Header Close --> --}}


    {{-- Create Button --}}
    <div class="mb-3 text-end">
      <a href="{{ route('blog.create') }}" class="btn btn-success">
        <i class="fa fa-plus"></i> Create Blog
      </a>
    </div>

    {{-- Start:: row-4 --}}
    <div class="row">
      <div class="col-xl-12">
        <div class="card custom-card">
          <div class="card-header">
            <div class="card-title">Blog</div>
          </div>
          <div class="card-body">
            <table id="file-export" class="table table-bordered text-nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Short description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($blog as $bloggg)
                <tr>
                  <td>{{ $bloggg->id }}</td>
                  <td>

                    <img src="{{ asset($bloggg->image) }}" alt="{{ $bloggg->title }}"
                      style="width: 50px; border-radius: 10px; margin: auto;">

                  </td>
                  <td>{{ $bloggg->title }}</td>
                  <td>{!! Str::limit(strip_tags($bloggg->description), 50) !!}</td>
                  <td>{!! Str::limit(strip_tags($bloggg->short_description), 50) !!}</td>
                  <td>
                    <a href="{{ route('blog.edit' , $bloggg->id) }}" class="btn btn-primary">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a>

                    <form class="m-auto d-inline" method="post" action="{{ route('blog.destroy',$bloggg->id) }}"
                      onsubmit="return confirm('Are you sure you want to delete this blog post?');">
                      @csrf
                      @method('delete')

                      <button type="submit" class="btn btn-danger">
                        <i class="fa-solid fa-trash danger"></i>
                      </button>
                    </form>

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


    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <div class="input-group">
              <a href="javascript:void(0);" class="input-group-text" id="Search-Grid"><i
                  class="fe fe-search header-link-icon fs-18"></i></a>
              <input type="search" class="form-control border-0 px-2" placeholder="Search" aria-label="Username">
              <a href="javascript:void(0);" class="input-group-text" id="voice-search"><i
                  class="fe fe-mic header-link-icon"></i></a>
              <a href="javascript:void(0);" class="btn btn-light btn-icon" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fe fe-more-vertical"></i>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Separated link</a></li>
              </ul>
            </div>
            <div class="mt-4">
              <p class="font-weight-semibold text-muted mb-2">Are You Looking For...</p>
              <span class="search-tags"><i class="fe fe-user me-2"></i>People<a href="javascript:void(0)"
                  class="tag-addon"><i class="fe fe-x"></i></a></span>
              <span class="search-tags"><i class="fe fe-file-text me-2"></i>Pages<a href="javascript:void(0)"
                  class="tag-addon"><i class="fe fe-x"></i></a></span>
              <span class="search-tags"><i class="fe fe-align-left me-2"></i>Articles<a href="javascript:void(0)"
                  class="tag-addon"><i class="fe fe-x"></i></a></span>
              <span class="search-tags"><i class="fe fe-server me-2"></i>Tags<a href="javascript:void(0)"
                  class="tag-addon"><i class="fe fe-x"></i></a></span>
            </div>
            <div class="my-4">
              <p class="font-weight-semibold text-muted mb-2">Recent Search :</p>
              <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                <a href="notifications.html"><span>Notifications</span></a>
                <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i
                    class="fe fe-x text-muted"></i></a>
              </div>
              <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                <a href="alerts.html"><span>Alerts</span></a>
                <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i
                    class="fe fe-x text-muted"></i></a>
              </div>
              <div class="p-2 border br-5 d-flex align-items-center text-muted mb-0 alert">
                <a href="mail.html"><span>Mail</span></a>
                <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i
                    class="fe fe-x text-muted"></i></a>
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

  </div>
</div>



@push('js')

<script src="{{asset('assets/js/custom-switcher.min.js')}}"></script>

<!-- Datatables Cdn -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- Internal Datatables JS -->
<script src="{{asset('assets/js/datatables.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('assets/js/custom.js')}}"></script>

@endpush

@endsection