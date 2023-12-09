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

   <h2>Data Pemesan</h2>
   <hr>
   <div class="container">
      <!-- Page Heading -->
    

      <!-- DataTales Example -->
      <div class="card shadow mb-4">
         <div class="card-header py-3">
            {{-- <h6 class="m-0 font-weight-bold text-primary">Data Pemesan</h6> --}}
            <div class="mt-1">
               <a class="btn btn-success" href="{{url('pemesan/create')}}" role="button"><i class="fas fa-plus"></i> Tambah Data </a>
            </div>
         </div>

         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                        <th class="col-1 text-center">No</th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Mobil</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        
                        <th class="col-2 text-center">Aksi</th>
                     </tr>
                  </thead>

                  <tfoot>
                     <tr>
                        <th class="col-1 text-center">No</th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Mobil</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        
                        <th class="col-2 text-center">Aksi</th>
                     </tr>
                  </tfoot>

                  <tbody>
                     @php($no = 1)
                     @foreach ($orderers as $orderer)
                        <tr>
                           <td class="text-center">{{ $no }}</td>
                           <td>{{ $orderer->nama }}</td>
                           <td>{{ $orderer->no_telepon }}</td>
                           <td>{{ $orderer->alamat }}</td>
                           <td>{{ $orderer->mobil }}</td>
                           <td>{{ $orderer->tanggal_pinjam }}</td>
                           <td>{{ $orderer->tanggal_kembali }}</td>
                          
                           <td>
                            <a href="pemesan/{{ $orderer->id }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Lihat Data</a>
                            <a href="pemesan/{{ $orderer->id }}/edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit Data</a>

                              <button type="button" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#exampleModal{{$orderer->id}}">
<i class="fas fa-trash"></i> Hapus
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$orderer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin akan menghapus data {{$orderer->nama}} ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{url('pemesan/delete/'.$orderer->id)}}" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

                           </td>
                        </tr>

                      
                                                
                        @php($no++)
                     @endforeach
                  </tbody>

               </table>
            </div>
         </div>
      </div>
   @endsection