<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .invoice-container {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }

        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .company-info {
            margin-bottom: 20px;
        }

        .bill-to {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
            text-align: left;
        }

        th, td {
            padding: 10px;
        }

        .notes {
            margin-top: 20px;
        }

        .signature {
            margin-top: 20px;
            text-align: left;
        }

        .signature img {
            max-width: 150px;
            max-height: 80px;
        }

    </style>
</head>
<body>

    <div class="invoice-container">
        <div class="header">
            INVOICE
        </div>

        <!-- Your company information -->
        <div class="company-info">
            <img src="admin/img/download.jpg" alt="Car Image" width="100px" height="100px">
            <p>Rental Jaya</p>
            <p>jl haji naim no 43 rt002/rw003 </p>
            <p>Kota Tangerang, Indonesia, 15157</p>
        </div>

        <hr>

        <!-- Bill to information -->
        {{-- <div class="bill-to">
            <p><strong>Kepada : {{ $order->pemesan->nama }}</strong></p>
            <br>
            @php $no=1 @endphp
            <p><strong>Invoice No #</strong> {{$no++}} </p>
            <p><strong>Date:</strong> {{   date('m/d/y') }}</p>
        </div> --}}
        <div class="bill-to">
            <p><strong>Kepada : {{ $order->pemesan->nama }}</strong></p>
            <br>
            @php 
                // Ambil nomor invoice dari sesi, atau inisialisasi ke 1 jika belum ada
                $invoiceNumber = session('invoiceNumber', 1);
                $invoiceNumber++;
        
                // Simpan nomor invoice yang baru ke dalam sesi
                session(['invoiceNumber' => $invoiceNumber]);
            @endphp
            <p><strong>Invoice No #</strong> {{ $invoiceNumber }} </p>
            <p><strong>Date:</strong> {{ date('m/d/y') }}</p>
        </div>

        <!-- Invoice items table -->
        <table>
            <thead>
                <tr>
                    <th>Nama Mobil</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Perjalanan Asal</th>
                    <th>Perjalanan tujuan</th>
                    <th>Jenis Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> {{ $order->mobil->nama}}</td>
                    <td> {{ $order->tgl_pinjam}}</td>
                    <td> {{ $order->tgl_kembali}}</td>
                    <td> {{ $order->perjalanan->asal}}</td>
                    <td> {{ $order->perjalanan->tujuan}}</td>
                    <td> {{ $order->JenisBayar->jenis}}</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>

        <!-- Notes and total -->
        <div class="notes">
            <p><strong>Biaya sewa : RP </strong> {{ number_format($order->harga, 0, ',', '.') }}</p>
            {{-- <p><strong>Biaya sewa : RP </strong> {{ $order->harga }}</p> --}}
        </div>

        <div class="signature">
            <p><strong>Hormat kami</strong></p>
            <img src="admin/img/tanda.png" alt="Tanda tangan Owner">
            <p><strong>Direktur Utama</strong></p>
        </div>
    </div>

</body>
</html>
