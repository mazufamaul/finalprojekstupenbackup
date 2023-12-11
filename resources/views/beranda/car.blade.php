@extends('front.app')

@section('front')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('front/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>

    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
        <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{url('/')}}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
          <h1 class="mb-3 bread">Choose Your Car</h1>
        </div>
      </div>
    </div>

  </section>



<section class="ftco-section bg-light">

    <div class="container">
        @auth

        @if(count($mobil) > 0)

        <div class="row">
            @foreach($mobil as $mob)
                <div class="col-md-4">
                    <div class="car-wrap rounded ftco-animate">

                        {{-- <div class="img rounded d-flex align-items-end" style="background-image: url(front/images/car-1.jpg);">
                        </div> --}}
                        <div class="img rounded d-flex align-items-end">
                            @empty($mob->gambar)
                            <img  class="img rounded" src="{{ url('admin/img/nophoto.jpg') }}" alt="No Photo">
                            @else
                            <img class="img rounded" src="{{ url('admin/img') }}/{{ $mob->gambar }}" alt="{{ $mob->nama }}">
                            @endempty
                        </div>

                        <div class="text">
                            <h2 class="mb-0"><a href="#">{{ $mob->nama }} </a></h2>

                            <div class="d-flex mb-3">
                                <span class="cat">{{ $mob->warna }} </span>

                                <p class="price ml-auto">
                                <?php 
                                $harga = $mob->harga;
                                echo 'Rp '.number_format($harga, 0,',','.');
                                ?>
                                <span>/day</span>
                                </p>

                            </div>

                            <a href="{{ url('rent/create?mobil=' . urlencode($mob->nama) . '&harga=' . $mob->harga) }}" class="btn btn-primary py-2 mr-1" onclick="setHarga('{{ $mob->harga }}')">Book Now</a>

                            {{-- <p class="d-flex mb-0 d-block">
                                <a href="{{ url('rent/create?mobil=' . urlencode($mob->nama) . '&harga=' . $mob->harga) }}" class="btn btn-primary py-2 mr-1">Book Now</a>
                            </p> --}}

                          
                            </p>

                        </div>

                                        

                    </div>
                </div>
            @endforeach
        </div>

        @else
            <div class="alert alert-info text-center" role="alert">
                <strong>Data Mobil Belum Diinputkan oleh Admin.</strong>
            </div>
        @endif
        
        @else
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="alert alert-primary text-center" role="alert">
                        <a href="{{ route('login') }}">
                            <strong>Perhatian!</strong> Anda harus login terlebih dahulu.
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endauth

        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>


@endsection


