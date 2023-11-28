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

<!-- <h1 class="h3 mb-2 text-gray-800">Merk</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p> -->

                    
                       
                    <!-- DataTales Example -->
                    <h2>Data Jenis Bayar</h2>
                    <hr>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           <a href="{{url('jenis/create')}}" class="btn btn-success" ><i class="fas fa-plus"></i> Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            
                                    <thead>
                                        
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Bayar</th>
                                            <th>Action</th>   
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                        <th>Jenis Bayar</th>
                                        <th>Action</th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @php $no=1 @endphp
                                    @foreach ($jenis as $jen)
                                    
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$jen->jenis}}</td>
                                            <td>
                                                <a href="{{url('jenis/edit/'.$jen->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit data</a>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal{{$jen->id}}"><i class="fas fa-trash"></i> Hapus</button>

<!-- Modal -->
                                                    <div class="modal fade" id="exampleModal{{$jen->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah anda yakin akan menghapus data {{$jen->jenis}} ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="{{url('jenis/delete/'.$jen->id)}}" type="button" class="btn btn-danger">Delete</a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                            </td>


                                            </td>
                                        </tr>
                                        
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                  
@endsection






     



