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

<h2>Data Perjalanan</h2>
<hr>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
    
    @if (Auth::user()->role == 'admin')  
    <a class="btn btn-success" href="{{ route('perjalanan.create') }}" role="button"><i class="fas fa-plus"></i> Tambah Data </a>
    </div>
    @endif

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>Jarak</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Asal</th>
                        <th>Tujuan</th>
                        <th>Jarak</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php $no=1 @endphp
                    @foreach ($perjalanans as $pl)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$pl->asal}}</td>
                        <td>{{$pl->tujuan}}</td>
                        <td>{{$pl->jarak}}</td>
                        <td >

                            <a href="perjalanan/{{ $pl->id }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Lihat Data</a>

                            @if (Auth::user()->role == 'admin')  
                            <a href="perjalanan/{{ $pl->id }}/edit" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit Data</a>

                            <form class="d-inline" action="perjalanan/{{ $pl->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"> <i class="fas fa-trash"></i> Hapus 
                                </button>
                              </form>
                            @endif  

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection