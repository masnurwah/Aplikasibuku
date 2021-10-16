<!doctype html>
<html lang="en">

<head>
<title>{{ config('app.name', 'CMS') }} | @yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Mplify Bootstrap 4.1.1 Admin Template">
<meta name="author" content="ThemeMakker, design by: ThemeMakker.com">

<link rel="icon" href="favicon.ico" type="image/x-icon">

<!-- plugin css -->
@yield('css')
<!-- plugin css end -->

<!-- main css end -->
@include('layouts.backend.css')
<!-- main css end -->

</head>
<body class="theme-blue">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{ url('assets/backend') }}/images/thumbnail.png" width="48" height="48" alt="Input Data"></div>
        <p>Please wait...</p>
    </div>
</div>
<!-- Overlay For Sidebars -->
<div class="overlay" style="display: none;"></div>

<div id="wrapper">

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">

            <div class="navbar-brand">
                <a href="index.html">
                    <img src="{{ url('assets/backend') }}/images/logo-icon.svg" alt="Mplify Logo" class="img-responsive logo">
                    <span class="name">Input Data</span>
                </a>
            </div>
            
            <div class="navbar-right">
                <ul class="list-unstyled clearfix mb-0">
                    <li>
                        <div class="navbar-btn btn-toggle-show">
                            <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                        </div>                        
                        <a href="javascript:void(0);" class="btn-toggle-fullwidth btn-toggle-hide"><i class="fa fa-bars"></i></a>
                    </li>
                    {{-- <li>
                        <form id="navbar-search" class="navbar-form search-form">
                            <input value="" class="form-control" placeholder="Search here..." type="text">
                            <button type="button" class="btn btn-default"><i class="icon-magnifier"></i></button>
                        </form>
                    </li> --}}
                    <li>
                        <div id="navbar-menu">
                            <ul class="nav navbar-nav">
                                
                                <!-- notifications End -->
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                        <img class="rounded-circle" src="{{ url('assets/backend') }}/images/user.png" width="30" alt="">
                                    </a>
                                    <div class="dropdown-menu animated flipInY user-profile">
                                        <div class="d-flex p-3 align-items-center">
                                            <div class="drop-left m-r-10">
                                                <img src="{{ url('assets/backend') }}/images/user.png" class="rounded" width="50" alt="">
                                            </div>
                                            <div class="drop-right">
                                                <h4>{{ auth()->user()->name }}</h4>
                                                <p class="user-name">{{ auth()->user()->email }}</p>
                                            </div>
                                        </div>
                                        <div class="m-t-10 p-3 drop-list">
                                            <ul class="list-unstyled">
                                                <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                                                <li class="divider"></li>
                                                <li>
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        <i class="icon-power"></i>Logout
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Left Sidebar Start -->
        @include('layouts.backend.menu-left')
    <!-- Left Sidebar End -->

    <div id="main-content">
        <div class="container-fluid">
            
            <!-- Begin page Content -->
            @yield('content')
            <!-- End of page Content -->
            
        </div>
    </div>
    
</div>

@include('layouts.backend.script')

</body>
</html>