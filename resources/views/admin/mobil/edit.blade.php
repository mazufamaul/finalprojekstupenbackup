@extends('admin.layout.appadmin')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@foreach ($mobil as $pr)

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


<form class="p-5 card border mb-3" method="POST" action="{{url('tbl_mobil/update/'.$pr->id)}}" enctype="multipart/form-data">
    @csrf
<div class="card-header mb-3">
<label for="text" class="col-4 col-form-label">Edit Mobil<i class="fas fa-edit ml-2"></i></label> 
</div>

  <div class="form-group row ">
    <label for="text" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <input id="text" name="nama" type="text" class="form-control" value="{{$pr->nama}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Warna</label> 
    <div class="col-8">
      <input id="text1" name="warna" type="text" class="form-control" value="{{$pr->warna}}">
    </div>
  </div>

  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Harga Sewa</label> 
    <div class="col-8">
      <input id="text1" name="harga" type="number" class="form-control" value="{{$pr->harga}}">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">No Polisi</label> 
    <div class="col-8">
      <input id="text2" name="no_polisi" type="text" class="form-control" value="{{$pr->no_polisi}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Jumlah Kursi</label> 
    <div class="col-8">
      <input id="text3" name="jumlah_kursi" type="number" class="form-control" value="{{$pr->jumlah_kursi}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Tahun Beli</label> 
    <div class="col-8">
      <input id="text4" name="tahun_beli" type="number" class="form-control" value="{{$pr->tahun_beli}}">
    </div>
  </div>
 
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="text4" name="foto" type="file" class="form-control">
      @if(!empty($pr->gambar))
      <img src="{{url('admin/img')}}/{{$pr->gambar}}" alt="" class="mt-3 border p-3">
    @endif
    </div>
    

    </div>
    <div class="form-group row">
        <label for="select" class="col-4 col-form-label">Merk</label> 
        <div class="col-8">
        <select id="select" name="id_merk" class="custom-select">
            @foreach ($tbl_merk as $p)
            @php $sel = ($p->id == $pr->id_merk) ? 'selected' : ''; @endphp
            <option value="{{$p->id}}" {{$sel}}>{{$p->merk}}</option>
            @endforeach
        </select>
        </div>
    </div> 
    
    <div class="form-group row">
        <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
    </form>
@endforeach
@endsection