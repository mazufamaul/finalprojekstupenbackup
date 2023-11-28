{{-- @extends('admin.layout.appadmin')

@section('content')

   @if ($errors->any())
      <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
   @endif
   <div class="container bg-secondary text-white border rounded">
      <form class="p-3" action="{{ route('pemesan.store') }}" method="POST" enctype="multipart/form-data">
         @csrf
         <div class="form-group">
            <label for="inputNama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="inputNama" name="nama" value="{{ old('nama') }}">
            @error('nama')
               <div class="invalid-feedback">{{ $message }}</div>
            @enderror
         </div>

         <div class="form-group">
            <label for="inputAddress">Address</label>
            <textarea class="form-control @error('alamat') is-invalid @enderror" id="inputAddress" rows="4" name="alamat">{{ old('alamat') }}</textarea>
            @error('alamat')
               <div class="invalid-feedback">{{ $message }}</div>
            @enderror
         </div>

         <div class="form-row">
            <div class="form-group col-3">
               <label for="inputJenisKelamin">Jenis Kelamin</label>
               <select id="inputJenisKelamin" class="form-control  @error('jenisKelamin') is-invalid @enderror" name="jenisKelamin">
                  <option disabled>...</option>
                  <option value="L" @php echo old('jenisKelamin') === "L" ? "selected":"" @endphp>Laki-laki</option>
                  <option value="P" @php echo old('jenisKelamin') === "P" ? "selected":"" @endphp>Perempuan</option>
               </select>
               @error('jenisKelamin')
                  <div class="invalid-feedback">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group col-3">
               <label for="inputFileKTP">KTP</label>
               <input type="file" class="form-control-file border rounded bg-white text-dark p-1  @error('ktp') is-invalid @enderror" id="inputFileKTP" name="ktp" onchange="loadFile(event)">
               @error('ktp')
                  <div class="invalid-feedback">{{ $message }}</div>
               @enderror
            </div>
            <div class="form-group col">
               <img class="col mt-4" id="output" />
            </div>
         </div>
         <button type="submit" class="btn btn-primary">Tambah</button>
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

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">
    <div class="card mt-3">
        <div class="card-header">
            Form Tambah Pemesan
        </div>
        <div class="card-body">
            <form class="p-3" action="{{ route('pemesan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="inputNama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="inputNama" name="nama" value="{{ old('nama') }}">
                    @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="inputAddress" rows="4" name="alamat">{{ old('alamat') }}</textarea>
                    @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group col-3">
                        <label for="inputJenisKelamin">Jenis Kelamin</label>
                        <select id="inputJenisKelamin" class="form-control  @error('jenisKelamin') is-invalid @enderror" name="jenisKelamin">
                            <option disabled>...</option>
                            <option value="L" @php echo old('jenisKelamin') === "L" ? "selected":"" @endphp>Laki-laki</option>
                            <option value="P" @php echo old('jenisKelamin') === "P" ? "selected":"" @endphp>Perempuan</option>
                        </select>
                        @error('jenisKelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-3">
                        <label for="inputFileKTP">KTP</label>
                        <input type="file" class="form-control-file border rounded bg-white text-dark p-1  @error('ktp') is-invalid @enderror" id="inputFileKTP" name="ktp" onchange="loadFile(event)">
                        @error('ktp')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <img class="col mt-4" id="output" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>
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
@endsection
