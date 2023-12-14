@extends('admin.layout.appadmin')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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


<form class="p-5 card border mb-3" method="POST" action="{{url('pesanan/store')}}" enctype="multipart/form-data">
    @csrf

    <div class="card-header mb-3">
    <label for="text" class="col-4 col-form-label">Input Pesanan<i class="fas fa-plus ml-2"></i></label> 
    </div>


    

  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Harga</label> 
    <div class="col-8">
       <input id="hargaMobil" name="harga" type="number" class="form-control @error('harga') is-invalid @enderror">
       @error('harga')
          <div class="invalid-feedback">
             {{ $message }}
          </div>
       @enderror
    </div>
 </div>

 
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Tanggal Pinjam</label> 
    <div class="col-8">
      <input id="text1" name="tgl_pinjam" type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror">
      @error('tgl_pinjam')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>

  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Tanggal Kembali</label> 
    <div class="col-8">
      <input id="text2" name="tgl_kembali" type="date" class="form-control @error('tgl_kembali') is-invalid @enderror">
      @error('tgl_kembali')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
  </div>
   
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Pemesan</label> 
    <div class="col-8">
      <select id="select" name="pemesan" class="custom-select">
        @foreach ($pemesan as $p)
        <option value="{{$p->id}}">{{$p->nama}}</option>
        @endforeach
      </select>
    </div>
  </div> 

  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Jenis Bayar</label> 
    <div class="col-8">
      <select id="select" name="jenis_bayar" class="custom-select">
        @foreach ($jenis_bayar as $p)
        <option value="{{$p->id}}">{{$p->jenis}}</option>
        @endforeach
      </select>
    </div>
  </div> 


  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Mobil</label> 
    <div class="col-8">
       <select id="selectMobil" name="mobil" class="custom-select">
          @foreach ($mobil as $p)
             <option value="{{$p->id}}" data-harga="{{$p->harga}}">{{$p->nama}}</option>
          @endforeach
       </select>
    </div>
 </div>

  

  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Perjalanan</label> 
    <div class="col-8">
        <select id="select" name="perjalanan" class="custom-select">
            @foreach ($perjalanan as $p)
                <option value="{{$p->id}}">{{$p->asal}} - {{$p->tujuan}}</option>
            @endforeach
        </select>
    </div>
</div> 



  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>

{{-- otomatis generate harga mobil --}}
{{-- <script>
   $(document).ready(function(){
      $('#selectMobil').on('change', function(){
         // Perbarui nilai harga saat memilih mobil
         var selectedHarga = $(this).find(':selected').data('harga');
         $('#hargaMobil').val(selectedHarga);
      });
   });
</script>  --}}
<form class="p-5 card border mb-3">
<div class="form-group row">
  <label for="text" class="col-4 col-form-label">Harga Per hari </label> 
  <div class="col-8">
     <input id="mobilHarga" name="harga" type="number" class="form-control" readonly>
  </div>
</div>
</form>


<script>
  $(document).ready(function(){
     $('#selectMobil').on('change', function(){
        //Perbarui nilai harga saat memilih mobil
        var selectedHarga = $(this).find(':selected').data('harga');
        $('#mobilHarga').val(selectedHarga);

        // Set harga ke dalam URL
        var url = new URL(window.location.href);
        url.searchParams.set('harga', selectedHarga);

        // Ganti URL tanpa mereload halaman
        window.history.replaceState({}, document.title, url.href);
     });
  });
</script> 




<script>
  $(document).ready(function(){
     $('#selectMobil, #text1, #text2').on('change', function(){
        // Perbarui nilai harga saat memilih mobil, tanggal pinjam, atau tanggal kembali
        updateHarga();
     });

     function updateHarga() {
        // Ambil nilai harga mobil
        var selectedHarga = $('#selectMobil').find(':selected').data('harga');

        // Ambil nilai tanggal pinjam dan tanggal kembali
        var tglPinjam = $('#text1').val();
        var tglKembali = $('#text2').val();

        // Hitung perbedaan hari
        var selisihHari = 0;
        if (tglPinjam && tglKembali) {
           var tanggalPinjam = new Date(tglPinjam);
           var tanggalKembali = new Date(tglKembali);
           selisihHari = Math.ceil((tanggalKembali - tanggalPinjam) / (1000 * 60 * 60 * 24));
        }

        // Hitung total harga
        var totalHarga = selectedHarga * selisihHari;

        // Perbarui nilai input harga
        $('#hargaMobil').val(totalHarga);
     }
  });
</script>





{{-- input tanggal pinjam dan tanggal kembali maka harga berubah --}}









@endsection





