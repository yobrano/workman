@extends('layouts.app')

@section('title', 'Location List')
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
                            <h1>Location List</h1>
                            <span>LocationList,</span>
                        </div>
                        <div class="col-xl-6 col-md-7 col-sm-12 text-md-right">
                            <div
                                class="d-flex align-items-center justify-content-md-end mt-4 mt-md-0 flex-wrap vivify pullUp delay-550">
                                {{-- <div class="border-right pr-4 mr-4 mb-3 mb-xl-0 hidden-xs">
                                <p class="text-muted mb-1">Fever</p>
                                <h5 class="mb-0">12</h5>
                            </div>
                            <div class="border-right pr-4 mr-4 mb-3 mb-xl-0">
                                <p class="text-muted mb-1">Cholera</p>
                                <h5 class="mb-0">13</h5>
                            </div>
                            <div class="pr-4 mb-3 mb-xl-0">
                                <p class="text-muted mb-1">Malaria</p>
                                <h5 class="mb-0">25</h5>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row clearfix">
                    <div class="col-12">
                        <div class="card">
                            <div class="body">
                                <form>
                                    <div class="input-group">
                                        <input type="button" class="btn btn-primary theme-bg gradient"
                                            value="Create Location" data-toggle="modal" data-target="#addPrpject" />
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="search-mail"><i class="icon-plus"></i></span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <div class="m-3">
                                    <table class="table table-hover  yajra-datatable w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Location Name</th>
                                                {{-- <th>Detail</th> --}}
                                                <th> Creation Date &amp; Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                        {{-- <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                            </ul>
                        </nav> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Default Size -->
    <div class="modal fade" id="addPrpject" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Add Location</h5>
                </div>
                <form action="{{ route('admin.store.location.preset') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group c_form_group">
                            <label>Name</label>
                            <div class="form-line">
                                <input type="text" class="form-control" placeholder="Location Title" name="location_name">
                            </div>
                        </div>
                        {{-- <div class="form-group c_form_group">
                            <label> Location Image</label>
                            <div class="form-line">
                                <input type="file" name="project_image_path" class="form-control" placeholder="Location Image" accept=".png, .jpg, .jpeg">
                            </div>
                        </div> --}}
                        {{-- <div class="form-group c_form_group">
                            <label>Description</label>
                            <div class="form-line">
                                <textarea name="project_detail" rows="4" class="form-control no-resize" placeholder="Location Description..."></textarea>
                            </div>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary theme-bg gradient">Post</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    

@endsection

@section('style')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
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

    <!-- Location core js file minify with grunt -->
    <script src="{{ asset('bundles/mainscripts.bundle.js') }}"></script>
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

        $(function() {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.get.locations.preset') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'location_name',
                        name: 'location_name'
                    },
                    // {
                    //     data: 'project_detail',
                    //     name: 'project_detail'
                    // },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });


        });
        // $(document).ready(function() {
        //     var id = document.location.pathname
        //     console.log(id);
        //     $.ajax({
        //         url: '/admin/stats',
        //         type: "GET",
        //         dataType: 'json',
        //         cache: false,
        //         data: {
        //             _token: '{{ csrf_token() }}'
        //         },
        //         success: function(dataResult) {
        //             console.log(dataResult);
        //             // var dataResult = JSON.parse(dataResult);
        //             // let auxArr= [0,0,0,0,0,0,0,0,0,0,1,0];
        //             // localStorage.setItem('linegraph', JSON.stringify(dataResult.linedata))
        //             // localStorage.setItem('piegraph', JSON.stringify(dataResult.piedata))
        //             if (dataResult.statusCode == 200) {

        //             }
        //         }
        //     });
        // });
    </script>
@endsection
