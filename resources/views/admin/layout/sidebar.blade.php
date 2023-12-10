<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rental Mobil-Uxe</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

</head>

<body id="page-top">


    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
               <div class="sidebar-brand-icon rotate-n-15">
               <i class="fas fa-car fa-3x"></i>
               </div>
               <div class="sidebar-brand-text mx-3">Rental Mobil-Uxe</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
         
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                  <a class="nav-link" href="{{url('/dashboard')}}">
                  <i class="fas fa-fw fa-tachometer-alt"></i>
                  <span>Dashboard</span></a>
            </li>
            
           
               <!-- Divider -->
               <hr class="sidebar-divider">

               <!-- Heading -->
               <div class="sidebar-heading">
                  Management Data
               </div>

           
               <!-- Nav Item - Pages Collapse Menu -->
               <li class="nav-item">
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                     <!-- <i class="fas fa-fw fa-cog"></i> -->
                     <i class="fas fa-car"></i>
                     <span>Data Kendaraan</span>
                  </a>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                     <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data</h6>
                        <a class="collapse-item" href="{{url('/tbl_mobil')}}">Mobil</a>
                        <a class="collapse-item" href="{{url('/tbl_merk')}}">Merk</a>
                     </div>
                  </div>
               </li>
          

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
               Management Order
            </div>

            <li class="nav-item">
               <a class="nav-link" href="{{route('pemesan.index')}}">
               <i class="fas fa-user"></i>
                  <span>Data Pemesan</span></a>
            </li>

            <li class="nav-item">
               <a class="nav-link" href="{{route('perjalanan.index')}}">
               <i class="fas fa-walking"></i>
                  <span>Data Perjalanan</span></a>
            </li>

            <li class="nav-item">
               <a class="nav-link" href="{{url('/jenis')}}">
               <i class="fas fa-dollar-sign"></i>
                  <span>Data Jenis Bayar</span></a>
            </li>

            <li class="nav-item">
               <a class="nav-link" href="{{url('/pesanan')}}">
               <i class="fas fa-clipboard-list"></i>
                  <span>Data Pesanan</span></a>
            </li>

            {{-- <li class="nav-item">
               <a class="nav-link" href="{{url('/user')}}">
                  <i class="fas fa-users"></i>
                  <span>Data User Test</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider">

            @if (Auth::user()->role == 'admin')
               <!-- Heading -->
               <div class="sidebar-heading">
                  Management User
               </div>

               <!-- Nav Item - Pages Collapse Menu -->
            
                  <!-- Nav Item - Charts -->
                  {{-- <li class="nav-item">
                     <a class="nav-link" href="{{route('akun.index')}}">
                        <i class="fas fa-users"></i>
                        <span>Data Akun</span></a>
                  </li> --}}

                  
                  <li class="nav-item">
                     <a class="nav-link" href="{{route('email.index')}}">
                        <i class="fas fa-users"></i>
                        <span>Data Akun Email</span></a>
                  </li>
               @endif


            <!-- Nav Item - Tables -->
            <!-- Divider -->
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
               <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card d-none d-lg-flex">
               <img class="sidebar-card-illustration mb-2" src="admin/img/undraw_rocket.svg" alt="...">
               <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
               <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

      </ul>
      <!-- End of Sidebar -->