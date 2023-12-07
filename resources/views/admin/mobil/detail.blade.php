@extends('admin.layout.appadmin')
@section('content')



@foreach ($mobil as $p)

<section class="py-3">

<div class="card col-md-8 p-3 shadow">
    <div class="card-header mb-2 text-primary">Data mobil - {{ $p->nama }}</div>
    <div class="row no-gutters border">
        <div class="col-md-4 p-2">
            @empty($p->gambar)
            <img class="card-img p-2 border" src="{{ url('admin/img/nophoto.png') }}" alt="No Photo">
            @else
            <img class="card-img p-2 border" src="{{ url('admin/img') }}/{{ $p->gambar }}" alt="{{ $p->nama }}">
            @endempty
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <p class="card-text font-weight-bold">Mobil         : {{ $p->nama }}</p>
                <p class="card-text font-weight-bold">Warna         : {{ $p->warna }}</p>
                <p class="card-text font-weight-bold">Harga Sewa    : {{ $p->harga }}</p>
                <p class="card-text font-weight-bold">No Polisi     : {{ $p->no_polisi }}</p>
                <p class="card-text font-weight-bold">Jumlah Kursi  : {{ $p->jumlah_kursi }}</p>
                <p class="card-text font-weight-bold">Tahun Beli    : {{ $p->tahun_beli }}</p>
                <p class="card-text font-weight-bold">Merk          : {{ $p->merk->merk }}</p>
            </div>
        </div>
    </div>
    <div>
        <a href="{{ url('tbl_mobil/') }}" class="btn btn-sm btn-secondary mb-2 mt-2"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
</div>
</section>


@endforeach

@endsection





    <!-- <section class="py-5">
    <input type="hidden" value="{{ $p->id }}">
    <div class="card">
    <div class="card-header">
        Mobil
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    @empty($p->gambar)
                    <img class="card-img img-fluid" src="{{ url('admin/img/nophoto.png') }}" alt="No Photo">
                    @else
                    <img class="card-img img-fluid" src="{{ url('admin/img') }}/{{ $p->gambar }}" alt="{{ $p->nama }}">
                    @endempty
                </div>
                <div class="col-md-6">
                    <h2 class="card-title">Mobil: {{ $p->nama }}</h2>
                    <p class="card-text">Warna: {{ $p->warna }}</p>
                    <p class="card-text">No Polisi: {{ $p->no_polisi }}</p>
                    <p class="card-text">Jumlah Kursi: {{ $p->jumlah_kursi }}</p>
                    <p class="card-text">Tahun Beli: {{ $p->tahun_beli }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

</section> -->