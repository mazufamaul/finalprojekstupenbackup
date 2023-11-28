@extends('admin.layout.appadmin')
@section('content')

<style>
    .card {
        width: 100%;
    }

    .card-text {
        text-align: left;
    }

    .label-column {
        font-weight: bold;
        margin-bottom: 0;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem; /* Atur sesuai kebutuhan desain Anda */
    }

    .flex-container {
        display: flex;
        align-items: center;
    }

    .image-container img {
        width: 200px;
        height: 200px;
        margin-right: 20px;
    }

</style>

<section class="py-3">
    <div class="card p-2 col-md-6 shadow">
        <div class="card-header mb-2 text-primary">Detail Akun : {{ $akun->nama }}</div>
        <div class="row no-gutters border">
            <div class="col-md-6">
                <div class="card-body">
                    <div class="flex-container">
                        <div class="image-container">
                            @empty($akun->foto)
                                <img class="card-img" src="{{ url('admin/img/nophoto.jpg') }}" alt="No Photo">
                            @else
                                <img class="card-img" src="{{ url('admin/img2') }}/{{ $akun->foto }}" alt="{{ $akun->nama }}">
                            @endempty
                        </div>

                        <div>
                            <p class="label-column">Nama :</p>
                            <p class="value-column">{{ $akun->nama }}</p>

                            <p class="label-column">Username:</p>
                            <p class="value-column">{{ $akun->username }}</p>

                           
                        </div>
                    </div>

                    <a href="{{ url('akun/') }}" class="btn btn-sm btn-secondary mt-5"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
