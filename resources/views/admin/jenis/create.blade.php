@extends('admin.layout.appadmin')
@section('content')

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

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form class="p-5 card border mb-3" method="POST" action="{{url('jenis/store')}}" enctype="multipart/form-data">
    @csrf

<div class="card-header mb-3">
<label for="text" class="col-4 col-form-label">Input Jenis Bayar<i class="fas fa-plus ml-2"></i></label> 
</div>
    
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Jenis Bayar</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div>

        <input id="text" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Isi Jenis Bayar">
        @error('nama')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror

      </div>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
@endsection