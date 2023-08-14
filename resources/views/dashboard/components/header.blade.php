<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Soyuz is a bootstrap 4x + laravel admin dashboard template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Iris Index page</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">
    <!-- Start css -->
    <!-- Start css -->
    <!-- Switchery css -->


    <link href="{{('/assets/css/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{('/assets/css/frame.css')}}" rel="stylesheet">
    <link href="/assets/plugins/switchery/switchery.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/flag-icon.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- End css -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body class="vertical-layout">


<div class="infobar-settings-sidebar-overlay"></div>
<!-- End Infobar Setting Sidebar -->
<!-- Start Containerbar -->
<div id="containerbar">
    <!-- Start Leftbar -->
    <div class="leftbar">
        <!-- Start Sidebar -->
        <div class="sidebar">
            <!-- Start Navigationbar -->
            <div class="navigationbar">
                <div class="vertical-menu-icon">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <div class="logobar">
                        </div>
                        <a class="nav-link" id="v-pills-crm-tab" data-toggle="pill" href="#v-pills-crm" role="tab" aria-controls="v-pills-crm" aria-selected="true"><img src="/assets/images/svg-icon/crm.svg" class="img-fluid" alt="CRM" data-toggle="tooltip" data-placement="top" title="CRM"></a>
                        <a class="nav-link" id="v-pills-ecommerce-tab" data-toggle="pill" href="#v-pills-ecommerce" role="tab" aria-controls="v-pills-ecommerce" aria-selected="false"><img src="/assets/images/svg-icon/ecommerce.svg" class="img-fluid" alt="eCommerce" data-toggle="tooltip" data-placement="top" title="eCommerce"></a>
                        <a class="nav-link active" id="v-pills-hospital-tab" data-toggle="pill" href="#v-pills-hospital" role="tab" aria-controls="v-pills-hospital" aria-selected="false">
                            <img src="/assets/images/svg-icon/hospital.svg" class="img-fluid" alt="Hospital" data-toggle="tooltip" data-placement="top" title="Hospital"></a>
                        <a class="nav-link" id="v-pills-uikits-tab" data-toggle="pill" href="#v-pills-uikits" role="tab" aria-controls="v-pills-uikits" aria-selected="false"><img src="/assets/images/svg-icon/ui-kits.svg" class="img-fluid" alt="UI Kits" data-toggle="tooltip" data-placement="top" title="UI Kits"></a>
                        <a class="nav-link" id="v-pills-pages-tab" data-toggle="pill" href="#v-pills-pages" role="tab" aria-controls="v-pills-pages" aria-selected="false"><img src="/assets/images/svg-icon/pages.svg" class="img-fluid" alt="Pages" data-toggle="tooltip" data-placement="top" title="Pages"></a>
                    </div>
                </div>
                <div class="vertical-menu-detail">
                    <div class="logobar">
                        <a href="index.html" class="logo logo-large"><img src="{{('/assets/images/logo.jpeg')}}" class="img-fluid" alt="logo"></a>
                    </div>
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade" id="v-pills-crm" role="tabpanel" aria-labelledby="v-pills-crm-tab">
                            <ul class="vertical-menu">
                                <li><h5 class="menu-title">CRM</h5></li>
                                {{--                                <li><a href="index.html"><img src="assets/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard">Dashboard</a></li>--}}
                                <li><a href="crm-projects.html"><img src="/assets/images/svg-icon/reports.svg" class="img-fluid" alt="projects">Projects</a></li>
                                <li><a href="crm-lead-status.html"><img src="/assets/images/svg-icon/charts.svg" class="img-fluid" alt="leads">Lead Status</a></li>
                                <li><a href="crm-clients.html"><img src="/assets/images/svg-icon/customers.svg" class="img-fluid" alt="clients">Clients</a></li>
                            </ul>
                        </div>

                        <div class="tab-pane fade show active" id="v-pills-hospital" role="tabpanel" aria-labelledby="v-pills-hospital-tab">
                            <ul class="vertical-menu">
                                <li><h5 class="menu-title">Fernando & Partners</h5></li>
                                <li><a href="dashboard-hospital.html"><img src="/assets/images/svg-icon/dashboard.svg" class="img-fluid" alt="dashboard">Dashboard</a></li>
                                {{--                                    <li><a href="hospital-appointment.html"><img src="assets/images/svg-icon/calender.svg" class="img-fluid" alt="appointments">Appointments</a></li>--}}
                                {{--                                    <li><a href="hospital-doctor.html"><img src="assets/images/svg-icon/doctor.svg" class="img-fluid" alt="doctors">Doctors</a></li>--}}
                                <li>
                                    <a href="{{ route('dashboard.index') }}">
                                        <img src="{{('/assets/images/svg-icon/backend.svg')}}" class="img-fluid" alt="backend"><span>Klanten</span>
                                    </a>
{{--                                    <ul class="vertical-submenu">--}}
{{--                                        <li><a href="">Edit</a></li>--}}
{{--                                        <li><a href="ecommerce-product-detail.html">Delete</a></li>--}}
{{--                                        <li><a href="ecommerce-order-list.html">Create</a></li>--}}
{{--                                        <li><a href="ecommerce-order-detail.html">Update</a></li>--}}
{{--                                    </ul>--}}
                                </li>                            </ul>
                        </div>

                    </div>

                </div>
            </div>
            <!-- End Navigationbar -->
        </div>
        <!-- End Sidebar -->
    </div>
    <!-- End Leftbar -->
    <!-- Start Rightbar -->
    <div class="rightbar">
        <!-- Start Topbar Mobile -->
        <div class="topbar-mobile">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="mobile-logobar">
                        <a href="index.html" class="mobile-logo"><img src="/assets/images/logo.svg" class="img-fluid" alt="logo"></a>
                    </div>
                    <div class="mobile-togglebar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="topbar-toggle-icon">
                                    <a class="topbar-toggle-hamburger" href="javascript:void();">
                                        <img src="/assets/images/svg-icon/horizontal.svg" class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                        <img src="/assets/images/svg-icon/verticle.svg" class="img-fluid menu-hamburger-vertical" alt="verticle">
                                    </a>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="menubar">
                                    <a class="menu-hamburger" href="javascript:void();">
                                        <img src="/assets/images/svg-icon/menu.svg" class="img-fluid menu-hamburger-collapse" alt="collapse">
                                        <img src="/assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Topbar -->
        <div class="topbar">
            <!-- Start row -->
            <div class="row align-items-center">
                <!-- Start col -->
                <div class="col-md-12 align-self-center">
                    <div class="togglebar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="menubar">
                                    <a class="menu-hamburger" href="javascript:void();">
                                        <img src="/assets/images/svg-icon/menu.svg" class="img-fluid menu-hamburger-collapse" alt="menu">
                                        <img src="/assets/images/svg-icon/close.svg" class="img-fluid menu-hamburger-close" alt="close">
                                    </a>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="searchbar">
                                    <form action="{{ route('dashboard.index') }}" method="GET">
                                        <div class="input-group">
                                            <div class="input-group-append">
                                                <button class="btn" type="submit" id="button-addonSearch">
                                                    <img src="/assets/images/svg-icon/search.svg" class="img-fluid" alt="search">
                                                </button>
                                            </div>
                                            <input type="search" name="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addonSearch">
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="infobar">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="profilebar">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="/assets/images/users/profile.svg" class="img-fluid" alt="profile">
                                            <span class="live-icon">{{ Auth::user()->name }}</span><span class="feather icon-chevron-down live-icon"></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                            <div class="dropdown-item">
                                                <div class="profilename">
                                                    <h5>{{ Auth::user()->name }}</h5>
                                                </div>
                                            </div>
                                            <div class="userbox">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="media dropdown-item">
                                                        <a href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                                                document.getElementById('logout-form').submit();"
                                                           class="profile-icon"><img src="/assets/images/svg-icon/logout.svg" class="img-fluid" alt="logout"> {{ __('Logout') }}

                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End col -->
            </div>
            <!-- End row -->
        </div>
        <!-- End Topbar -->
