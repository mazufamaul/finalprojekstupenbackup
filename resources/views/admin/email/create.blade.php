@extends('admin.layout.appadmin')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


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




<form class="p-5 card border mb-3" method="POST" action="{{ route('email.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="card-header mb-3">
    <label for="text" class="col-4 col-form-label">Input Data akun<i class="fas fa-plus ml-2"></i></label> 
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
    <label for="text1" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="text1" name="email" type="email" class="form-control @error('email') is-invalid @enderror">
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="text2" name="password" type="password" class="form-control @error('password') is-invalid @enderror">
      @error('password')
      <div class="invalid-feedback">
      {{ $message }}
      </div>
      @enderror
    </div>
  </div>
  
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
@endsection