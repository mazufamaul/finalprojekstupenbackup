{{-- @extends('admin.layout.appadmin')

@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <div>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </div>
</div>
@endif
    <div class="container bg-secondary text-white border rounded">
    <form class="p-3" action="{{ route('perjalanan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="inputAsal">Asal</label>
            <input id="inputAsal" rows="4" name="asal" type="text" class="form-control @error('asal') is-invalid @enderror">
            @error('kode')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputTujuan">Tujuan</label>
            <input id="inputTujuan" rows="4" name="tujuan" type="text" class="form-control @error('tujuan') is-invalid @enderror"></input>
            @error('tujuan')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">          
            <label for="inputJarak">Jarak</label>
            <input id="inputJarak" rows="4" name="jarak" type="text" class="form-control @error('jarak') is-invalid @enderror">
            @error('jarak')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
    </div>
@endsection --}}


@extends('admin.layout.appadmin')

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <div>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        </div>
    @endif

    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                Form Perjalanan
            </div>
            <div class="card-body">
                <form class="p-3" action="{{ route('perjalanan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="inputAsal">Asal</label>
                        <input id="inputAsal" rows="4" name="asal" type="text" class="form-control @error('asal') is-invalid @enderror">
                        @error('asal')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputTujuan">Tujuan</label>
                        <input id="inputTujuan" rows="4" name="tujuan" type="text" class="form-control @error('tujuan') is-invalid @enderror"></input>
                        @error('tujuan')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="inputJarak">Jarak</label>
                        <input id="inputJarak" rows="4" name="jarak" type="text" class="form-control @error('jarak') is-invalid @enderror">
                        @error('jarak')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
@endsection
