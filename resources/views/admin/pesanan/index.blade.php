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
       
                <h2>Data Pesanan</h2>
                <hr>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-header py-3">
                        <a href="{{url('pesanan/create')}}" class="btn btn-success" ><i class="fas fa-plus"></i> Tambah Data</a>

                      </a>
                        </div>
                        

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        
                                        <tr>
                                        <th>No</th>
                                            <th>Nama Pemesan</th>
                                            <th>Mobil</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal kembali</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                            <th>Nama Pemesan</th>
                                            <th>Mobil</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal kembali</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $no=1 @endphp
                                    @foreach ($pesanan as $pr)
                                    
                                        <tr>
                                            <td>{{$no++}}</td>                   
                                            <td>{{$pr->pemesan->nama}}</td>
                                            <td>{{$pr->mobil->nama}}</td>
                                            <td>{{$pr->tgl_pinjam}}</td>
                                            <td>{{$pr->tgl_kembali}}</td>
                                           
                                            <!-- <td>{{$pr->jenis_bayar_id}}</td>
                                            <td>{{$pr->mobil_id}}</td>
                                            <td>{{$pr->perjalanan_id}}</td> -->
                                            <td>
                                                <a href="{{url('pesanan/show/'.$pr->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-eye"></i> Lihat data</a>
                                                <a href="{{url('pesanan/edit/'.$pr->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit data</a>
                                                
                                                <!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$pr->id}}">
<i class="fas fa-trash"></i> Hapus
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal{{$pr->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah anda yakin akan menghapus data ini ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{url('pesanan/delete/'.$pr->id)}}" type="button" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
                                            </td>
                                           
                                        </tr>
                                        
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                

@endsection