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
               <a class="btn btn-success" href="{{ route('pemesan.create') }}" role="button"><i class="fas fa-plus"></i> Tambah Data </a>
            </div>
         </div>

         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                        <th class="col-1 text-center">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th class="col-2 text-center">Aksi</th>
                     </tr>
                  </thead>

                  <tfoot>
                     <tr>
                        <th class="col-1 text-center">No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th class="col-2 text-center">Aksi</th>
                     </tr>
                  </tfoot>

                  <tbody>
                     @php($no = 1)
                     @foreach ($orderers as $orderer)
                        <tr>
                           <td class="text-center">{{ $no }}</td>
                           <td>{{ $orderer->nama }}</td>
                           <td>{{ $orderer->alamat }}</td>
                           <td>
                            <a href="pemesan/{{ $orderer->id }}" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Lihat Data</a>
                            <a href="pemesan/{{ $orderer->id }}/edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit Data</a>
                              <form class="d-inline" action="pemesan/{{ $orderer->id }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> Hapus</button>
                              </form>
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