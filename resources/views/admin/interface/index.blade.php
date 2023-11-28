<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Interface</title>

  <style>
    .hidden-include {
      display: none;
    }
  </style>

  @include('admin.layout.bootstrap')
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Your Logo</a>
      <!-- Add your navigation links or buttons here -->
    </div>
  </nav>

  <!-- Content -->
  <div class="container mt-5">
    <h3 class="text-center">Halaman Interface</h3>
    <h5 class="text-primary">Data mobil tersedia saat ini</h5>
    <div class="card-deck p-3">
      @php $no=1 @endphp
      @foreach ($mobil as $pr)
      <div class="card">
        @empty($pr->gambar)
        <img class="card-img-top" width="150px" height="200px" src="{{ url('admin/img/nophoto.png') }}" alt="No Photo">
        @else
        <img class="card-img-top" width="150px" height="200px" src="{{ url('admin/img') }}/{{ $pr->gambar }}" alt="{{ $pr->nama }}">
        @endempty
        <div class="card-body">
          <h5 class="card-title">Mobil: {{ $pr->nama }}</h5>
          <p class="card-text">Warna: {{ $pr->warna }}</p>
          <p class="card-text">No Polisi: {{ $pr->no_polisi }}</p>
          <p class="card-text">Jumlah Kursi: {{ $pr->jumlah_kursi }}</p>
          <p class="card-text">Tahun Beli: {{ $pr->tahun_beli }}</p>
          <p class="card-text">Merk: {{ $pr->merk->merk }}</p>
          <a href="#" class="btn btn-primary">Sewa Sekarang</a>
        </div>
        <div class="card-footer">
          <?php
          date_default_timezone_set('Asia/Jakarta');
          $now = new DateTime();
          ?>
          <small class="text-muted">Last updated: <?php echo $now->format('l, d F Y H:i:s'); ?></small>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-light py-3">
    <div class="container text-center">
      <p>&copy; 2023 Your Company</p>
    </div>
  </footer>

</body>

</html>
