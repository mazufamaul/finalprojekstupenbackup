{{-- @extends('admin.layout.appadmin')

@section('content')
    <div class="container border rounded p-3 bg-info">
        <table class="table table-borderless table-striped text-white">
            <tbody>
                <tr>
                    <td>Asal</td>
                    <td>:</td>
                    <td>{{ $perjalanans->asal }}</td>
                </tr>
                <tr>
                    <td>Tujuan</td>
                    <td>:</td>
                    <td>{{ $perjalanans->tujuan }}</td>
                </tr>
                <tr>
                    <td>Jarak </td>
                    <td>:</td>
                    <td>{{ $perjalanans->jarak }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary mt-3" href="{{ route('perjalanan.index') }}">Kembali</a>
@endsection --}}


@extends('admin.layout.appadmin')

@section('content')
    <div class="container mt-3">
        <div class="card">
            <div class="card-header ">
                Detail Perjalanan
            </div>
            <div class="card-body">
                <table class="table table-borderless table-striped">
                    <tbody>
                        <tr>
                            <td>Asal</td>
                            <td>:</td>
                            <td>{{ $perjalanans->asal }}</td>
                        </tr>
                        <tr>
                            <td>Tujuan</td>
                            <td>:</td>
                            <td>{{ $perjalanans->tujuan }}</td>
                        </tr>
                        <tr>
                            <td>Jarak</td>
                            <td>:</td>
                            <td>{{ $perjalanans->jarak }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="{{ route('perjalanan.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection
