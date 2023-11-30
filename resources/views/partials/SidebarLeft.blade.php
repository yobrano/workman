 <?php  
    //  echo url()->current();
    $name = Route::current()->getName();

    $arr = explode('.',$name);
    $flg = $arr[count($arr)-1];
    $projectsState = false;
    $servicesState = false;
    $presetState = false;
    if($flg=="project" || $flg=="projects"){
        $projectsState = true;
    }
    if($flg=="service" || $flg=="services"){
        $servicesState = true;
    }

    if($flg=="preset" || $flg=="presets"){
        $presetState = true;
    }

    // echo $projectsState;
 ?>
  <!-- Main left sidebar menu -->
  <div id="left-sidebar" class="sidebar light_active">
    <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-angle-left"></i></a>
    <div class="navbar-brand">
        <a href="{{url('/admin')}}"><img src="{{ asset('/assets/images/frontend/logo-min.svg') }}" alt="workman Logo" class="img-fluid logo"><span>{{__(config('app.name', 'Laravel'))}}</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="fa fa-close"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="{{ asset('assets/images/user2.jpeg') }}" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>{{__('Welcome')}}</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="dr-profile.html"><i class="fa fa-user"></i>My Profile</a></li>
                    {{-- <li><a href="app-inbox.html"><i class="fa fa-envelope"></i>Messages</a></li> --}}
                    <li><a href="setting.html"><i class="fa fa-gear"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i>Logout</a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>  
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu animation-li-delay">
                <li class="header">Operations</li>
                <li class="{{$name=='admin.dashboard'?"active":""}}"><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li>
                    <a href="#Workperson" class="has-arrow"><i class="fa fa-wrench"></i><span>Professionals</span></a>
                    <ul>
                        <li><a href="dr-all.html">All Work person</a></li>
                        {{-- <li><a href="dr-add.html">Add Work person</a></li>
                        <li><a href="dr-profile.html">Work person Profile</a></li>
                        <li><a href="dr-schedule.html">Work person Schedule</a></li> --}}
                    </ul>
                </li>
                {{-- <li class="{{$name=='admin.projects'?"active":""}}"><a href="{{route('admin.projects')}}"><i class="fa fa-briefcase"></i> <span>Projects</span></a></li> --}}
                <li class="{{$projectsState?"active":""}}"> 
                    <a href="#Projects" class="has-arrow"><i class="fa fa-briefcase"></i><span>Projects</span></a>
                    <ul>
                        <li class="{{$name=='admin.projects'?"active":""}}"><a href="{{route('admin.projects')}}">All Projects</a></li>
                        <li class="{{$name=='admin.categories.project'?"active":""}}" ><a href="{{route('admin.categories.project')}}">Project Categories</a></li>
                        {{-- <li><a href="dr-profile.html">Work person Profile</a></li>
                        <li><a href="dr-schedule.html">Work person Schedule</a></li> --}}
                    </ul>
                </li>
                <li class="{{$servicesState?"active":""}}">
                    <a href="#Services" class="has-arrow"><i class="fa fa-thumbs-up"></i><span>Services</span></a>
                    <ul>
                        <li class="{{$name=='admin.service'?"active":""}}"><a href="{{route('admin.service')}}">All Services</a></li>
                        <li class="{{$name=='admin.groups.service'?"active":""}}"><a href="{{route('admin.groups.service')}}">Service Groups</a></li>
                    </ul>
                </li>
                {{-- <li>
                    <a href="#Patients" class="has-arrow"><i class="fa fa-user-circle-o"></i><span>Patients</span></a>
                    <ul>
                        <li><a href="patients-all.html">All Patient</a></li>
                        <li><a href="patients-add.html">Add Patient</a></li>
                        <li><a href="patients-profile.html">Patient Profile</a></li>
                        <li><a href="patients-invoice.html">Patient Invoices</a></li>
                    </ul>
                </li> --}}
                {{-- <li><a href="departments.html"><i class="fa fa-table"></i><span>Departments</span></a></li> --}}
                {{-- <li>
                    <a href="#Payments" class="has-arrow"><i class="fa fa-cc-paypal"></i><span>Payments</span></a>
                    <ul>
                        <li><a href="payments.html">Payments</a></li>
                        <li><a href="payments-add.html">Add Payments</a></li>
                        <li><a href="payments-invoice.html">Invoice</a></li>
                    </ul>
                </li> --}}
                <li class="header">Admin</li>
                {{-- <li><a href="app-inbox.html"><i class="fa fa-envelope"></i> <span>Email</span> <span class="badge badge-default mr-0">12</span></a></li> --}}
                {{-- <li><a href="app-chat.html"><i class="fa fa-comments"></i> <span>Chat</span></a></li> --}}
                <li><a href="#"><i class="fa fa-users"></i><span>Our Staffs</span></a></li>
                <li><a href="#"><i class="fa fa-address-book"></i> <span>Contacts</span></a></li>
                <li class="{{$presetState?"active":""}}">
                    <a href="#Pre-sets" class="has-arrow"><i class="fa fa-folder"></i><span>Pre sets</span></a>
                    <ul>
                        <li class="{{$name=='admin.locations.preset'?"active":""}}"><a href="{{route('admin.locations.preset')}}">Locations</a></li>
                        {{-- <li class="{{$name=='admin.groups.service'?"active":""}}"><a href="{{route('admin.groups.service')}}">Service Groups</a></li> --}}
                    </ul>
                </li>
                {{-- <li><a href="app-filemanager.html"><i class="fa fa-folder"></i> <span>File Manager</span></a></li> --}}
                {{-- <li><a href="our-centres.html"><i class="fa fa-map-marker"></i><span>Our Centres</span></a></li> --}}
                <li class="header">Social</li>
                {{-- <li><a href="page-news.html"><i class="fa fa-globe"></i> <span>Blog</span></a></li> --}}
                <li><a href="page-social.html"><i class="fa fa-share-alt-square"></i> <span>Social</span></a></li>                        
                <li class="extra_widget">
                    <div class="form-group">
                        <label class="d-block">Traffic this Month <span class="float-right">77%</span></label>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="d-block">Server Load <span class="float-right">50%</span></label>
                        <div class="progress progress-xxs">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>     
    </div>
</div>