@extends('front.app')

@section('front')

<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../front/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
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
       {{-- form data  --}}
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif


       @if($errors->any())
       <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong style="margin-bottom: 0.5em;">Warning!</strong> There were some problems with your input.
         <ul>
             @foreach($errors->all() as $error)
             <li>{{$error}}</li>
             @endforeach
         </ul>
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       @endif

      <form class="p-3" action="{{url('rent/store')}}" method="POST" enctype="multipart/form-data">
        @csrf

          <div class="card-header mb-3">
            <label for="text" class="col-4 col-form-label">Masukkan Identitas diri<i class="fas fa-plus ml-2"></i></label> 
          </div>

          <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Nama</label> 
              <div class="col-8">
                  <input id="text" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror">
                  @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="text1" class="col-4 col-form-label">No Telepon</label> 
            <div class="col-8">
              <input id="text1" name="no_telepon" type="number" class="form-control @error('no_telepon') is-invalid @enderror">
              @error('no_telepon')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>


            <div class="form-group row">
              <label for="text1" class="col-4 col-form-label">Alamat</label> 
              <div class="col-8">
                  <textarea id="text1" name="alamat" class="form-control @error('alamat') is-invalid @enderror"></textarea>
                  @error('alamat')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                  @enderror
              </div>
            </div>

          <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Mobil</label> 
              <div class="col-8">
                  <input id="text" name="mobil" type="text" value="{{ request('mobil') }}" class="form-control @error('mobil') is-invalid @enderror">
                  @error('mobil')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Tanggal Pinjam</label> 
              <div class="col-8">
                  <input id="text" name="tanggal_pinjam" type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror">
                  @error('tanggal_pinjam')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Tanggal Kembali</label> 
              <div class="col-8">
                  <input id="text" name="tanggal_kembali" type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror">
                  @error('tanggal_kembali')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="text4" class="col-4 col-form-label">Foto Ktp</label> 
            <div class="col-8">
              <input id="text4" name="foto" type="file" class="form-control @error('foto') is-invalid @enderror">
              @error('foto')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>           
          </div>
       
          <button type="submit" class="btn btn-primary">kirim</button>
    </form>
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

        {{-- <div class="row mt-5">
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
        </div> --}}
    </div>
</section>


@endsection

