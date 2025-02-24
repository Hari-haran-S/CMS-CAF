<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Animal House</title>

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css')}}">

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right side navbar -->
            <div class="input-group  col-md-6">
                <input class="form-control form-control-navbar" @keyup="searchit" v-model="search" type="search"
                    placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" @click="searchit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="./images/rat.png" alt="A" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Animal House</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="./images/boy.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            {{Auth::user()->name}}
                        </a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <router-link to="/dashboard" class="nav-link">
                                <i class="fas fa-tachometer-alt nav-icon green"></i>
                                <p>Dashboard</p>
                            </router-link>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{route('fileupload')}}" class="nav-link">
                                    <i class="fas fa-upload nav-icon green"></i>
                                    <p>FileUpload</p>
                                </a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <router-link to="/example" class="nav-link">
                                    <i class="fas fa-user nav-icon green"></i>
                                    <p>example</p>
                                </router-link>
                            </li> --}}
                        @can('isAdmin')
                        
                        <li class="nav-item">
                            <router-link to="/users" class="nav-link">
                                <i class="fas fa-user nav-icon green"></i>
                                <p>Manage Users</p>
                            </router-link>
                        </li>

                        {{-- <li class="nav-item">
                            <router-link to="/developer" class="nav-link">
                                <i class="fas fa-cogs nav-icon orange"></i>
                                <p>Developer</p>
                            </router-link>
                        </li> --}}
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fas fa-database green"></i>
                                <p>
                                    Database
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <router-link to="/dailyacts" class="nav-link">
                                        <i class="fas fa-calendar nav-icon teal"></i>
                                        <p>Daily Activities</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/animalinfos" class="nav-link">
                                        <i class="fas fa-paw nav-icon teal"></i>
                                        <p>Animal Details</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/breedings" class="nav-link">
                                        <i class="fas fa-venus-mars nav-icon teal"></i>
                                        <p>Breeding Details</p>
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link to="/stocks" class="nav-link">
                                        <i class="fas fa-folder-open nav-icon teal"></i>
                                        <p>Stock Register</p>
                                    </router-link>
                                </li>

                            </ul>

                        </li>
                        <li class="nav-item">
                            <router-link to="/toxicitytesting" class="nav-link">
                                <i class="fas fa-radiation-alt nav-icon green"></i>
                                <p>Toxicity Analysis</p>
                            </router-link>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                <i class="nav-icon fa fa-power-off red"></i>
                                <p>
                                    {{ __('Logout') }}
                                </p>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Central Animal Facility</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <router-view></router-view>
                    <vue-progress-bar></vue-progress-bar>
                    
                    
                    {{-- @include('partials.alerts') --}}
                    
                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Central animal Facility MIS.
            </div>
            <!-- Default to the left -->
             All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->
    @auth 
    <script>
        window.user = @json(auth()->user())
    </script>
    @endauth


    <script src="/js/app.js"></script>
</body>

</html>