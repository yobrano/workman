@extends('layouts.app')

@section('title', 'View Project')
@section('content')
    @include('../partials/Loader')

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <div id="wrapper">

        @include('../partials/Topbar')
        @include('../partials/SidebarLeft')
        @include('../partials/SidebarRight')
        @include('../partials/Stickynote')


        <!-- Main body part  -->
        <div id="main-content">
            <div class="container-fluid">
                <!-- Page header section  -->
                <div class="block-header">
                    <div class="row clearfix">
                        <div class="col-xl-6 col-md-5 col-sm-12">
                            <h1>Project Category View</h1>
                            <span>ProjectCategoryView,</span>
                        </div>
                        <div class="col-xl-6 col-md-7 col-sm-12 text-md-right">
                            <div
                                class="d-flex align-items-center justify-content-md-end mt-4 mt-md-0 flex-wrap vivify pullUp delay-550">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('admin.categories.project') }}">Categories</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                    </ol>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="body">
                                <form method="POST" action="{{route('admin.update.category.project',$project->id)}}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-md-6 col-sm-10">
                                            <input  name="category_name" type="text" class="form-control" id="inputEmail3"
                                                placeholder="Enter Name" value="{{$project->category_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Detail</label>
                                        <div class="col-md-6 col-sm-10">
                                            <textarea name="category_description" rows="4"  class="form-control" >{{$project->category_description}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Category Image</label>
                                        <div class="col-md-6 col-sm-10">
                                            <img src="{{asset("storage/".$project->category_image)}}"  class="w-100" alt="project-image"/>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Update Image</label>
                                        <div class="col-md-6 col-sm-10">
                                            <input type="file" class="dropify" name="category_image" accept=".png, .jpg, .jpeg">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-md-6 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            {{-- <button type="submit" class="btn btn-default">Cancel</button> --}}
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection

@section('style')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <link href="{{ asset('vendors/dropify/css/dropify.min.css') }}" rel="stylesheet">
@endsection

@section('script')

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Vedor js file and create bundle with grunt  -->
    {{-- <script src="{{ asset('bundles/flotscripts.bundle.js') }}"></script><!-- flot charts Plugin Js --> --}}
    <script src="{{ asset('bundles/c3.bundle.js') }}"></script>
    <script src="{{ asset('bundles/apexcharts.bundle.js') }}"></script>
    <script src="{{ asset('bundles/jvectormap.bundle.js') }}"></script>
    <script src="{{ asset('vendors/toastr/toastr.js') }}"></script>

    <!-- Project core js file minify with grunt -->
    <script src="{{ asset('vendors/dropify/js/dropify.min.js') }}"></script>
    <script src="{{ asset('bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('bundles/forms/dropify.js') }}"></script>
    {{-- <script src="{{ asset('js/index.js') }}"></script> --}}




    <script>
        @if (Session::has('message'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.warning("{{ session('warning') }}");
        @endif

        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
@endsection
