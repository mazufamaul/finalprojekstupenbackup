@extends('admin.layout.appadmin')
@section('content')

<style>
    table {
        width: 100%;
    }

    .card-text {
        text-align: left;
    }

    .label-column {
        font-weight: bold;
        width: 40%; /* Sesuaikan lebar sesuai kebutuhan */
    }

    .value-column {
        width: 60%; /* Sesuaikan lebar sesuai kebutuhan */
    }
</style>

@foreach ($pesanan as $p)

    <h2>Detail Pesanan</h2>
    <hr>
    <section class="py-3">
        <div class="card p-3">
            <div class="card-header mb-2 text-primary">Data Pesanan - {{ $p->pemesan->nama }}</div>
            <div class="row no-gutters border">
                <div class="col-md-8">
                    <div class="card-body">
                        <table>
                        <tr>
                                <td class="label-column">Nama Pemesan</td>
                                <td class="value-column">: {{ $p->pemesan->nama }}</td>
                            </tr>
                            <tr>
                                <td class="label-column">Nama Mobil</td>
                                <td class="value-column">: {{ $p->mobil->nama }}</td>
                            </tr>
                            <tr>
                                <td class="label-column">Tanggal Pinjam</td>
                                <td class="value-column">: {{ $p->tgl_pinjam }}</td>
                            </tr>

                            <tr>
                                <td class="label-column">Tanggal Kembali</td>
                                <td class="value-column">: {{ $p->tgl_kembali }}</td>
                            </tr>

                            <tr>
                                <td class="label-column">Perjalanan Asal</td>
                                <td class="value-column">: {{ $p->perjalanan->asal}}</td>
                            </tr>

                            <tr>
                                <td class="label-column">Perjalanan Tujuan</td>
                                <td class="value-column">: {{ $p->perjalanan->tujuan}}</td>
                            </tr>

                            <tr>
                                <td class="label-column">Jenis Pembayaran</td>
                                <td class="value-column">: {{ $p->JenisBayar->jenis}}</td>
                            </tr>

                            <tr>
                                <td class="label-column">Biaya Sewa</td>
                                <td class="value-column">: Rp. {{ number_format($p->harga, 0, ',', '.') }}</td>
                                {{-- <td class="value-column">: Rp. {{ $p->harga }}</td> --}}
                            </tr>
                            <!-- Tambahkan baris lain sesuai kebutuhan -->
                        </table>
                        <a href="{{url('pesanan/')}}" class="btn btn-sm btn-secondary mt-5"><i
                                class="fas fa-arrow-left"></i>
                            Kembali</a>

                            <a href="{{ url('generate-pdf', ['orderId' => $p->id]) }}" type="_blank" class="btn btn-sm btn-danger mt-5"><i class="fas fa-file-pdf"></i> Struk</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endforeach

@endsection

