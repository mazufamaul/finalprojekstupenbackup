{{-- @extends('admin.layout.appadmin')

@section('content')
   <div class="container bg-secondary text-white border rounded">
      <form class="p-3" action="{{ url('pemesan/' . $data->id) }}" method="POST" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <div class="form-group">
            <label for="inputNama">Nama</label>
            <input type="text" class="form-control" id="inputNama" name="nama" value="{{ $data->nama }}">
         </div>

         <div class="form-group">
            <label for="inputAddress">Address</label>
            <textarea class="form-control" id="inputAddress" rows="4" name="alamat">{{ $data->alamat }}</textarea>
         </div>

         <div class="form-row">
            <div class="form-group col-3">
               <label for="inputJenisKelamin">Jenis Kelamin</label>
               <select id="inputJenisKelamin" class="form-control" name="jenisKelamin">
                  <option disabled>...</option>
                  <option value="L" @php echo $data->jenis_kelamin == 'L' ? "selected" : '' @endphp>Laki-laki</option>
                  <option value="P" @php echo $data->jenis_kelamin == 'P' ? "selected" : '' @endphp>Perempuan</option>
               </select>
            </div>
            <div class="form-group col-3">
               <label for="inputFileKTP">KTP</label>
               <input type="file" class="form-control-file border rounded bg-white text-dark p-1" id="inputFileKTP" name="ktp" onchange="loadFile(event)">
               <input type="hidden" name="ktpLama" value="{{ $data->ktp }}">
            </div>
            <div class="form-group col">
               <img class="col mt-4" id="output" src="{{ asset($data->ktp) }}" />
            </div>
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
   <div class="container mt-3">
      <div class="card">
         <div class="card-header  bg-light text-dark">
            Form Ubah Pemesan
         </div>
         <div class="card-body bg-light">
            <form class="p-3" action="{{ url('pemesan/' . $data->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="form-group">
                  <label for="inputNama">Nama</label>
                  <input type="text" class="form-control" id="inputNama" name="nama" value="{{ $data->nama }}">
               </div>

               <div class="form-group">
                  <label for="inputAddress">Address</label>
                  <textarea class="form-control" id="inputAddress" rows="4" name="alamat">{{ $data->alamat }}</textarea>
               </div>

               <div class="form-row">
                  <div class="form-group col-3">
                     <label for="inputJenisKelamin">Jenis Kelamin</label>
                     <select id="inputJenisKelamin" class="form-control" name="jenisKelamin">
                        <option disabled>...</option>
                        <option value="L" @php echo $data->jenis_kelamin == 'L' ? "selected" : '' @endphp>Laki-laki</option>
                        <option value="P" @php echo $data->jenis_kelamin == 'P' ? "selected" : '' @endphp>Perempuan</option>
                     </select>
                  </div>
                  <div class="form-group col-3">
                     <label for="inputFileKTP">KTP</label>
                     <input type="file" class="form-control-file border rounded bg-white text-dark p-1" id="inputFileKTP" name="ktp" onchange="loadFile(event)">
                     <input type="hidden" name="ktpLama" value="{{ $data->ktp }}">
                  </div>
                  <div class="form-group col">
                     <img class="col mt-4" id="output" src="{{ asset($data->ktp) }}" />
                  </div>
               </div>
               <button type="submit" class="btn btn-primary">Ubah</button>
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
