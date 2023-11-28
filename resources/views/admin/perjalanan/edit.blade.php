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
        <form class="p-3" action="{{ url('perjalanan/' . $perjalanans->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="inputAsal">Asal</label>
                <input type="text" class="form-control" id="inputAsal" rows="4" name="asal" value="{{ $perjalanans->asal }}">
            </div>

            <div class="form-group">
                <label for="inputTujuan">Tujuan</label>
                <input type="text" class="form-control" id="inputTujuan" rows="4" name="tujuan" value="{{ $perjalanans->tujuan }}">
            </div>

            <div class="form-group">
                <label for="inputJarak">Jarak</label>
                <input type="text" class="form-control" id="inputJarak" rows="4" name="jarak" value="{{ $perjalanans->jarak }}">
            </div>

            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
    </div>
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
            Form Ubah Perjalanan
        </div>
        <div class="card-body">
            <form class="p-3" action="{{ url('perjalanan/' . $perjalanans->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="inputAsal">Asal</label>
                    <input type="text" class="form-control" id="inputAsal" rows="4" name="asal" value="{{ $perjalanans->asal }}">
                </div>

                <div class="form-group">
                    <label for="inputTujuan">Tujuan</label>
                    <input type="text" class="form-control" id="inputTujuan" rows="4" name="tujuan" value="{{ $perjalanans->tujuan }}">
                </div>

                <div class="form-group">
                    <label for="inputJarak">Jarak</label>
                    <input type="text" class="form-control" id="inputJarak" rows="4" name="jarak" value="{{ $perjalanans->jarak }}">
                </div>

                <button type="submit" class="btn btn-primary">Ubah</button>
            </form>
        </div>
    </div>
</div>
<script>
    var loadFile = function (event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
@endsection


