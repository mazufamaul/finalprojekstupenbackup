{{-- @extends('admin.layout.appadmin')

@section('content')
   <div class="mb-3 text-right">
      <a href="{{ url('/pemesan/' . $data->id . '/edit') }}" class="btn btn-sm btn-warning mr-1"><i class="fas fa-edit"></i> Edit Data</a>
      <form class="d-inline mb-3" action="{{ url('/pemesan/' . $data->id) }}" method="POST">
         @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus Data
         </button>
      </form>
   </div>
   <div class="container border rounded p-3 bg-info">
      <table class="table table-borderless table-striped text-white">
         <tbody>
            <tr>
               <td class="col-2">Nama</td>
               <td>:</td>
               <td>{{ $data->nama }}</td>
            </tr>
            <tr>
               <td>alamat</td>
               <td>:</td>
               <td>{{ $data->alamat }}</td>
            </tr>
            <tr>
               <td>Jenis Kelamin</td>
               <td>:</td>
               <td>{{ $data->jenis_kelamin }}</td>
            </tr>
            <tr>
               <td>KTP</td>
               <td>:</td>
               <td><img class="col-6 img rounded float-left" src="{{ asset($data->ktp) }}" alt=""></td>
            </tr>
         </tbody>
      </table>
   </div>
   <a class="btn btn-primary mt-3" href="{{ route('pemesan.index') }}">Kembali</a>
@endsection --}}


@extends('admin.layout.appadmin')

@section('content')
   <div class="container mt-3">
      <div class="card">
         <div class="card-header">
            Detail Pemesan
            <div class="float-right">
               <a href="{{ url('/pemesan/' . $data->id . '/edit') }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit Data</a>
               <form class="d-inline" action="{{ url('/pemesan/' . $data->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus Data</button>
               </form>
            </div>
         </div>
         <div class="card-body ">
            <table class="table table-borderless table-striped">
               <tbody>
                  <tr>
                     <td class="col-2">Nama</td>
                     <td>:</td>
                     <td>{{ $data->nama }}</td>
                  </tr>
                  <tr>
                     <td>Alamat</td>
                     <td>:</td>
                     <td>{{ $data->alamat }}</td>
                  </tr>
                  <tr>
                     <td>Jenis Kelamin</td>
                     <td>:</td>
                     <td>{{ $data->jenis_kelamin }}</td>
                  </tr>
                  <tr>
                     <td>KTP</td>
                     <td>:</td>
                     <td><img class="col-6 img rounded" src="{{ asset($data->ktp) }}" alt=""></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <a class="btn btn-primary mt-3" href="{{ route('pemesan.index') }}">Kembali</a>
@endsection
