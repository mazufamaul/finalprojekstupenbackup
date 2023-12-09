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


<div class="container">
    <div class="card mt-3">
        
        <div class="card-body">
            <form class="p-3" action="{{url('pemesan/store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="card-header mb-3">
                  <label for="text" class="col-4 col-form-label">Input Data Pemesan<i class="fas fa-plus ml-2"></i></label> 
                  </div>

                <div class="form-group row">
                  <label for="text" class="col-4 col-form-label">Nama</label> 
                    <div class="col-8">
                        <input id="text" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                  </div>
                </div>

              <div class="form-group row">
               <label for="text1" class="col-4 col-form-label">No Telepon</label> 
               <div class="col-8">
                 <input id="text1" name="no_telepon" type="number" class="form-control @error('no_telepon') is-invalid @enderror">
                 @error('no_telepon')
                 <div class="invalid-feedback">
                   {{ $message }}
                 </div>
                 @enderror
               </div>
             </div>


             <div class="form-group row">
               <label for="text1" class="col-4 col-form-label">Alamat</label> 
               <div class="col-8">
                   <textarea id="text1" name="alamat" class="form-control @error('alamat') is-invalid @enderror"></textarea>
                   @error('alamat')
                       <div class="invalid-feedback">
                           {{ $message }}
                       </div>
                   @enderror
               </div>
           </div>

           <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Mobil</label> 
              <div class="col-8">
                  <input id="text" name="mobil" type="text" class="form-control @error('mobil') is-invalid @enderror">
                  @error('mobil')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Tanggal Pinjam</label> 
              <div class="col-8">
                  <input id="text" name="tanggal_pinjam" type="date" class="form-control @error('tanggal_pinjam') is-invalid @enderror">
                  @error('tanggal_pinjam')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Tanggal Kembali</label> 
              <div class="col-8">
                  <input id="text" name="tanggal_kembali" type="date" class="form-control @error('tanggal_kembali') is-invalid @enderror">
                  @error('tanggal_kembali')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="text4" class="col-4 col-form-label">Foto Ktp</label> 
            <div class="col-8">
              <input id="text4" name="foto" type="file" class="form-control @error('foto') is-invalid @enderror">
              @error('foto')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
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
