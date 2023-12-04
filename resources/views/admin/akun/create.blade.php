<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

<style>
  .form-control {
  border-radius: 25px; /* Atur border radius sesuai keinginan Anda */
  background-color: #ffffff; /* Warna latar belakang putih */
  padding: 10px;
  font-size: 13px;
}

body {
        background-color: #193655; /* Ganti dengan warna primer yang diinginkan #007bff*/
    }

</style>


@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong style="margin-bottom: 0.5em;">Warning!</strong> There were some problems with your input.
  <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
  </ul>
</div>
@endif


@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> --}}
    </div>
@endif

<a class="nav-link" href="{{url('/interface')}}">
  <span>Kembali</span>
</a>


<div class="container">
  <div class="row justify-content-center ">
      <div class="col-md-6">
          <div class="form-container shadow bg-white" style="padding: 20px; border-radius: 8px;">


  <h2 class="text-center">Registration</h2>

  <form class="p-5 mb-3 form mx-auto" method="POST" action="{{ route('akun.store')}}" enctype="multipart/form-data">
    @csrf


    <div class="form-group">
        <label for="text" class="col-4 col-form-label"><i class="far fa-user-circle"></i> Nama</label>
        <input type="text" name="nama" class="form-control border-radius @error('nama') is-invalid @enderror" placeholder="masukkan nama" required>
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
    </div>

    {{-- <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Nama</label> 
        <div class="col-8">
            <input id="text" name="nama" placeholder="masukkan nama" type="text" class="form-control @error('nama') is-invalid @enderror" required>
            @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div> --}}


    {{-- username --}}

    <div class="form-group">
        <label for="text1" class="col-4 col-form-label"><i class="fas fa-male"></i> Username</label>
        <input type="text" name="username" class="form-control border-radius @error('nama') is-invalid @enderror" placeholder="masukkan username" required>
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
    </div>

    
    {{-- <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Username</label> 
        <div class="col-8">
            <input id="text1" name="username" placeholder="masukkan username" type="text" class="form-control @error('username') is-invalid @enderror" required>
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div> --}}







    <div class="form-group">
        <label for="text2" class="col-4 col-form-label"><i class="fas fa-lock"></i> Password</label> 
            <input id="text2" name="password" placeholder="masukkan password" type="password" class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
    </div>


    <div class="form-group">
        <label for="text4" class="col-4 col-form-label"><i class="fas fa-portrait"></i> Foto</label> 
            <input id="text4" name="foto" placeholder="masukkan foto" type="file" class="form-control @error('foto') is-invalid @enderror" required>
            @error('foto')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
    </div>

    <p>Already Have account? <a href="{{url('/user/login')}}">Login</a> </p>

    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Register</button>
        </div>
    </div>
    </form>
      </div>
    </div>
  </div>
</div>


