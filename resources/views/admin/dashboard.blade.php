@extends('admin.layout.appadmin')
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
    </div>
@endif

<h2>Dashboard Rental Mobil-Uxe</h2>
<hr>

<div class="row">

<!-- Earnings (Monthly) Card Example -->

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
         <a href="{{url('/tbl_mobil')}}">
            <div class="card-body">

                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                              Data Mobil</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $tbl_mobil }} Mobil</div>
                     </div>
                     <div class="col-auto">
                        <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                        <i class="fas fa-car fa-2x text-gray-300"></i>
                        <!-- <i class="fab fa-product-hunt"></i> -->
                     </div>
                  </div>
            </div>
            </a>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
         <a href="{{url('/pemesan')}}">
            <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                              Data pemesan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pemesan }} Pemesan</div>
                     </div>
                     <div class="col-auto">
                        <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                     </div>
                  </div>
            </div>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
         <a href="{{url('/pesanan')}}">
            <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                              Data pesanan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pesanan }} Pesanan</div>
                     </div>
                     <div class="col-auto">
                        <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                     </div>
                  </div>
            </div>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
      <a href="{{url('/perjalanan')}}">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                              Data Perjalanan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $perjalanan }} Perjalanan</div>
                     </div>
                     <div class="col-auto">
                        <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                        <i class="fas fa-road fa-2x text-gray-300"></i>
                     </div>
                  </div>
            </div>
         </div>
      </div>
</div>  


<div>

<style>
    table {
        width: 100%;
    }

    .card-text {
        text-align: left;
    }

    .label-column {
        font-weight: bold;
        width: 40%;
    }

    .value-column {
        width: 60%;
    }

    .card-header {
        color: #555;
        font-weight: bold;
        display: flex;
        align-items: center;
    }

    .icon-circle {
        margin-right: 10px;
        border-radius: 50%;
        background-color: #00cc66; /* Warna hijau */
        color: #fff;
        padding: 8px;
    }
</style>

<section class="py-3">
   <a href="#"></a>
    <div class="card p-3 shadow">
        <div class="card-header mb-2">
            <div class="icon-circle">
                <i class="fas fa-user"></i> <!-- Ganti dengan ikon Font Awesome yang sesuai -->
            </div>
            Akun yang sedang login
        </div>
        <div class="row no-gutters border">
            <div class="col-md-8">
                <div class="card-body">
                    <table>

                        <tr>
                            <td class="label-column">Email</td>
                            <td class="value-column">: 

                              @if(@empty(Auth::user()->email))
                              {{''}}    
                              @else
                              {{Auth::user()->email }}
                              @endif   

                           </td>
                        </tr>
                        <tr>
                            <td class="label-column">Username </td>
                            <td class="value-column">:

                              @if(@empty(Auth::user()->name))
                              {{''}}    
                              @else
                              {{Auth::user()->name }}
                              @endif
                              
                            </td>
                        </tr>

                        <tr>
                           <td class="label-column">Tanggal dan waktu login</td>
                           <?php
                           date_default_timezone_set('Asia/Jakarta'); // Set timezone ke Waktu Indonesia Barat (WIB)
                           $now = new DateTime();
                           ?>
                           <td class="value-column">: <?php echo $now->format('l, d F Y H:i:s'); ?> WIB</td>
                       </tr>
                        {{-- <tr>
                            <td class="label-column">Tanggal dan waktu login</td>
                            <td class="value-column">: {{ now()->format('l, d F Y') }} </td>
                        </tr> --}}
                        <!-- Tambahkan baris lain sesuai kebutuhan -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

</div>




@endsection