@extends('admin.layout.appadmin')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

@foreach ($pemesan as $pr)

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

{{-- action="{{ url('pemesan/' . $pr->id) }}" --}}

<form class="p-5 card border mb-3" method="POST" action="{{url('pemesan/update/'.$pr->id)}}" enctype="multipart/form-data">
   @csrf
<div class="card-header mb-3">
<label for="text" class="col-4 col-form-label">Edit Data Pemesan<i class="fas fa-edit ml-2"></i></label> 
</div>

 <div class="form-group row ">
   <label for="text" class="col-4 col-form-label">Nama</label> 
   <div class="col-8">
     <input id="text" name="nama" type="text" class="form-control" value="{{$pr->nama}}">
   </div>
 </div>

 <div class="form-group row">
   <label for="text1" class="col-4 col-form-label">No Telepon</label> 
   <div class="col-8">
     <input id="text1" name="no_telepon" type="number" class="form-control" value="{{$pr->no_telepon}}">
   </div>
 </div>

 <div class="form-group row">
   <label for="text1" class="col-4 col-form-label">Alamat</label> 
   <div class="col-8">
       <textarea id="text1" name="alamat" class="form-control" >{{$pr->alamat}}</textarea>
   </div>
</div>

<div class="form-group row">
   <label for="text1" class="col-4 col-form-label">Mobil</label> 
   <div class="col-8">
     <input id="text1" name="mobil" type="text" class="form-control" value="{{$pr->mobil}}">
   </div>
 </div>

 <div class="form-group row">
   <label for="text1" class="col-4 col-form-label">Tanggal Pinjam</label> 
   <div class="col-8">
     <input id="text1" name="tanggal_pinjam" type="date" class="form-control" value="{{$pr->tanggal_pinjam}}">
   </div>
 </div>

 <div class="form-group row">
   <label for="text1" class="col-4 col-form-label">Tanggal Kembali</label> 
   <div class="col-8">
     <input id="text1" name="tanggal_kembali" type="date" class="form-control" value="{{$pr->tanggal_kembali}}">
   </div>
 </div>

 <div class="form-group row">
   <label for="text4" class="col-4 col-form-label">Foto Ktp</label> 
   <div class="col-8">
     <input id="text4" name="foto" type="file" class="form-control">
     @if(!empty($pr->ktp))
     <img src="{{url('admin/img')}}/{{$pr->ktp}}" alt="" class="mt-3 border p-3">
   @endif
   </div>

 <div class="form-group row">
   <div class="offset-4 col-8">
   <button name="submit" type="submit" class="btn btn-primary">Update</button>
   </div>
</div>
 
 



   {{-- <div class="container mt-3">
      <div class="card">
         <div class="card-header  bg-light text-dark">
            Form Ubah Pemesan
         </div>
         <div class="card-body bg-light">
            <form class="p-3" action="{{ url('pemesan/' . $data->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')

               <div class="form-group">
                  <label for="inputNama">Nama</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="inputNama" name="nama" value="{{ $data->nama }}">
                  @error('nama')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
               <label for="inputNama">No Telepon</label>
               <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="inputNama" name="no_telepon" value="{{ $data->no_telepon }}">
               @error('no_telepon')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
           </div>

              <div class="form-group">
                  <label for="inputAddress">Alamat</label>
                  <textarea class="form-control @error('alamat') is-invalid @enderror" id="inputAddress" rows="4" name="alamat"> {{ $data->alamat }} </textarea>
                  @error('alamat')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
               </div>
              
              

               <div class="form-group">
                  <label for="inputPinjam">Tanggal Pinjam</label>
                  <input type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror" id="inputPinjam" name="tanggal_pinjam" value="{{ $data->tanggal_pinjam }}">
                  @error('tanggal_pinjam')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
              </div>

              <div class="form-group">
               <label for="inputPinjam">Tanggal Kembali</label>
               <input type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror" id="inputPinjam" name="tanggal_kembali" value="{{ $data->tanggal_kembali }}">
               @error('tanggal_kembali')
               <div class="invalid-feedback">{{ $message }}</div>
               @enderror
           </div>

           <div class="form-group">
            <label for="inputPinjam">Mobil</label>
            <input type="input" class="form-control @error('mobil') is-invalid @enderror" id="inputPinjam" name="mobil" value="{{ $data->mobil }}">
            @error('mobil')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

           
         <div class="form-group">
            <label for="inputFileKTP">KTP</label>
            <input type="file" class="form-control-file border rounded bg-white text-dark p-1" id="inputFileKTP" name="ktp" onchange="loadFile(event)">
            <input type="hidden" name="ktpLama" value="{{ $data->ktp }}">
         </div>
         <div class="form-group col">
            <img class="border p-3" style="max-width: 300px; max-height: 300px; " id="output" src="{{ asset($data->ktp) }}" />
         </div>
           
         

               <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
         </div>
      </div>
   </div> --}}

   <script>
      var loadFile = function(event) {
         var reader = new FileReader();
         reader.onload = function() {
            var output = document.getElementById('output');
            output.src = reader.result;
         };
         reader.readAsDataURL(event.target.files[0]);
      };
   </script>
@endforeach
@endsection
