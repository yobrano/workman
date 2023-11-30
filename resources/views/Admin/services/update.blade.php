@extends('layouts.app')

@section('title', 'Services')
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
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <h1>View Service</h1>
                            <span>Add Service,</span>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
                            <div class="d-flex align-items-center justify-content-lg-end mt-4 mt-lg-0 flex-wrap vivify pullUp delay-550">
                              
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('admin.service') }}">Services</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">View</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3 mt-3 mb-xl-0">
                                <a href="#" class="btn btn-primary theme-bg gradient">Service Gallery</a>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="body">
                                <form action="{{route('admin.update.service',$service->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row clearfix">
                                        <div class="col-sm-12">
                                            <div class="form-group c_form_group">
                                                <label>Service Name <span class="text-danger">*</span></label>
                                                <input name="service_name" class="form-control" type="text" value="{{$service->service_name}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group mt-3">
                                                <textarea name="service_detail" rows="4" class="form-control no-resize" placeholder="Service Description...">{{$service->service_detail}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="update-img-div" style="">
                                                <img src="{{asset(env('MEDIA_PATH').$service->service_image)}}" class="w-100" alt="{{$service->service_name}}-image">
                                            </div>
                                          
                                        </div>
                                        <div class="col-lg-12">
                                            <label class="">Service Image (png, jpg, jpeg)</label>
                                            <input name="service_image" type="file" class="dropify" accept=".png, .jpg, .jpeg">
                                        </div>
                                    
                                        <div class="col-sm-6">
                                            <div class="form-group c_form_group mt-3">
                                                <label>Service Group </label>
                                                <select class="form-control show-tick" name="service_group" required value="{{$service->service_group}}">
                                                    <option value="">- Choose group -</option>
                                                    @foreach ($servicegroup as $item)
                                                    <option {{$item['group_name']==$service->service_group?"selected":""}} value="{{$item['group_name']}}">- {{$item['group_name']}} -</option>
                                                    @endforeach
                                                </select>
                                                @error('service_group')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group c_form_group mt-3">
                                                <label>Location </label>
                                                <select class="form-control show-tick" name="location_name" value="{{$service->service_location}}" required >
                                                    <option value="">- Choose Location -</option>
                                                    @foreach ($location as $item)
                                                    <option {{$item['location_name']==$service->service_location?"selected":""}} value="{{$item['location_name']}}">- {{$item['location_name']}} -</option>
                                                    @endforeach
                                                </select>
                                                @error('service_group')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group c_form_group mt-3">
                                                <label>Response Time</label>
                                                <input name="service_availability" class="form-control" type="text" value="{{$service->service_availability}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group c_form_group mt-3">
                                                <label>Payment Method</label>
                                                <input name="service_payment_method" class="form-control" type="text" value="{{$service->service_payment_method}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group c_form_group mt-3">
                                                <label>Business Hours</label>
                                                <input name="service_business_hour" class="form-control" type="text" value="{{$service->service_business_hour}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group c_form_group mt-3">
                                                <label>Email</label>
                                                <input name="service_email" class="form-control" type="email" value="{{$service->service_email}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group c_form_group mt-3">
                                                <label>Phone</label>
                                                <input name="service_phone" class="form-control" type="text" value="{{$service->service_phone}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group c_form_group mt-3">
                                                <label>Number of Employees</label>
                                                <input name="service_employee_no" class="form-control" type="number" value="{{$service->service_employee_no}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group c_form_group mt-3">
                                                <label>Years of Experience</label>
                                                <input name="service_period_of_existence" class="form-control" type="number" value="{{$service->service_period_of_existence}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                            {{-- <button type="submit" class="btn btn-outline-secondary">Cancel</button> --}}
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
     <script src="{{ asset('vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
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
                ajax: "{{ route('admin.get.groups.service') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'group_name',
                        name: 'group_name'
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
