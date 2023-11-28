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

<form class="p-5 card border mb-3" method="POST" action="{{url('pesanan/update/'.$pesanan->id)}}" enctype="multipart/form-data">
    @csrf
    <h2>Edit Pesanan</h2>
    <hr>

    <div class="form-group row">
        <label for="pemesan" class="col-4 col-form-label">Pemesan</label> 
        <div class="col-8">
            <select id="pemesan" name="pemesan" class="custom-select" disabled>
                @foreach ($pemesan as $p)
                    <option value="{{$p->id}}" {{$p->id == $pesanan->pemesan_id ? 'selected' : ''}}>{{$p->nama}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="mobil" class="col-4 col-form-label">Nama Mobil</label> 
        <div class="col-8">
            <select id="mobil" name="mobil" class="custom-select" disabled>
                @foreach ($mobil as $m)
                    <option value="{{$m->id}}" {{$m->id == $pesanan->mobil_id ? 'selected' : ''}}>{{$m->nama}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="jenis_bayar" class="col-4 col-form-label">Jenis Pembayaran</label> 
        <div class="col-8">
            <select id="jenis_bayar" name="jenis_bayar" class="custom-select" disabled>
                @foreach ($jenis_bayar as $jb)
                    <option value="{{$jb->id}}" {{$jb->id == $pesanan->jenis_bayar_id ? 'selected' : ''}}>{{$jb->jenis}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="harga" class="col-4 col-form-label">Harga</label> 
        <div class="col-8">
            <input id="harga" name="harga" type="number" class="form-control" value="{{$pesanan->harga}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="harga" class="col-4 col-form-label">Tanggal Pinjam</label> 
        <div class="col-8">
            <input id="tgl_pinjam" name="tgl_pinjam" type="date" class="form-control" value="{{$pesanan->tgl_pinjam}}" disabled>
        </div>
    </div>
    
    
    <div class="form-group row">
        <label for="tgl_kembali" class="col-4 col-form-label">Tanggal Kembali</label> 
        <div class="col-8">
            <input id="tgl_kembali" name="tgl_kembali" type="date" class="form-control" value="{{$pesanan->tgl_kembali}}">
        </div>
    </div>

    <div class="form-group row">
        <label for="perjalanan" class="col-4 col-form-label">Perjalanan</label> 
        <div class="col-8">
            <select id="perjalanan" name="perjalanan" class="custom-select" disabled>
                @foreach ($perjalanan as $p)
                    <option value="{{$p->id}}" {{$p->id == $pesanan->perjalanan_id ? 'selected' : ''}}>{{$p->asal}} - {{$p->tujuan}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

    {{-- <div class="form-group row">
        <div class="offset-4 col-8">
            <p class="text-danger">Note : 1 day / Rp 50.000</p>
        </div>
    </div> --}}
</form>
@endsection
