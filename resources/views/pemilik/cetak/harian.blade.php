<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Harian</title>
    <link href="{{ asset('/fe/css/templatemo-pod-talk.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/fe/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/fe/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/fe/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/fe/css/owl.theme.default.min.css') }}">
    <style>
        .header {
            color: black;
            padding: 20px;
            text-align: center;
        }

        /* Style untuk informasi perusahaan */
        .company-info {
            font-weight: bold;
            font-size: 25px;
            margin-top: 10px;
        }

        /* Style untuk alamat perusahaan */
        .company-slogan {
            font-size: 16px;
            font-weight: bold;
        }

        .company-address {
            font-size: 14px;
        }

        /* Style untuk garis pemisah */
        .separator {
            border-top: 2px solid #000000;
            margin: 20px 0;
        }

        .logo {
            width: 160px;
            height: auto;
        }
        .table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #030303;
            padding: 12px;
            text-align: left;
        }

        .table-bordered th {
            background-color: #f6f6f6;
            font-weight: bold;
            color: #333;
        }

        .table-bordered td {
            background-color: #ffffff;
            color: #333;
        }

        .table-bordered tr:nth-child(even) {
            background-color: #080707;
        }

        .table-bordered tr:hover {
            background-color: #f7f7f7;
        }

        .table-img {
            border-radius: 4px;
        }

    </style>
</head>

<body>
    <div class="header">
        <img src="../images/logo .jpg" alt="Logo Perusahaan" class="logo">
        <div class="company-info">Maicit Dental Care</div>
        <div class="company-slogan">"Healthy teeth, cheerful smile. Because your smile is our happiness!"</div>
        <div class="company-address">Jl. Andalas No.88, Andalas, Kec. Padang Tim., Kota Padang, Sumatera Barat 25126</div>
    </div>
    <div class="separator"></div>

    <p style="font-weight: bold">Tanggal Awal: {{ $tanggal_awal }}</p>
    <p style="font-weight: bold">Tanggal Akhir: {{ $tanggal_akhir }}</p>
    <p style="font-weight: bold">Dicetak Oleh: {{ Auth::user()->nama }}</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Layanan</th>
                <th>Produk</th>
                <th>Jam</th>
                <th>Status</th>
                <th>Gambar</th>
                <th>Keterangan</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $index => $booking)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $booking->pasien->nama }}</td>
                <td>{{ $booking->dokter->nama }}</td>
                <td>{{ $booking->service->nama }}</td>
                <td>{{ $booking->product->nama ?? '' }}</td>
                <td>{{ $booking->jam }}</td>
                <td>{{ $booking->status }}</td>
                <td>
                    @if ($booking->gambar)
                        <img src="{{ asset('images/booking/' . $booking->gambar) }}" alt="gambar" class="img-fluid table-img rounded" style="width: 60px; height: 60px;">
                    @endif
                </td>
                <td>{{ $booking->keterangan }}</td>
                <td>
                    @if ($booking->product)
                        Rp {{ number_format($booking->service->harga + $booking->product->harga, 0, ',', '.') }}
                    @else
                        Rp {{ number_format($booking->service->harga, 0, ',', '.') }}
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="10"></td> <!-- Empty row to add space -->
            </tr>
            <tr>
                <td colspan="9" style="text-align: right; font-weight: bold;">Total Pemasukan:</td>
                <td>Rp {{ number_format($total_pemasukan, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>
<script type="text/javascript">
    window.print();
</script>

</html>
