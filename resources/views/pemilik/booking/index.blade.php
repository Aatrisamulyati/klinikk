@extends('admin.layouts.main')

@section('menuBookingPemilik', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Data Booking
            </div>
            <div class="card-body">
                {{-- <a href="{{ route('data-booking.cetak') }}" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i>
                    Catak Data Booking
                </a> --}}
                <a href="/dashboard" class="btn btn-primary mb-3">
                    <i class="fas fa-print"></i>
                    Cetak Data Booking
                </a>
                <div class="table-responsive">  
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Nama Dokter</th>
                                <th>Nama Layanan</th>
                                <th>Produk</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th>Keterangan</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach ($booking as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->pasien -> nama }}</td>
                                    <td>{{ $data->dokter -> nama }}</td>
                                    <td>{{ $data->service -> nama }}</td>
                                    <td>{{ $data->product->nama ?? 'N/A' }}</td>
                                    <td>{{ $data->tanggal }}</td>
                                    <td>{{ $data->jam }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td>
                                        <img src="{{ $data->gambar ? asset('images/booking/' . $data->gambar) : asset('images/no_image.jpg') }}" alt="gambar" class="img-fluid table-img rounded" style="width: 60px; height: 60px;">
                                    </td>
                                    <td>{{ $data->keterangan }}</td>
                                    <td>
                                        @if ($data->product)
                                            Rp {{ number_format($data->service->harga + $data->product->harga, 0, ',', '.') }}
                                        @else
                                            Rp {{ number_format($data->service->harga, 0, ',', '.') }}
                                        @endif
                                    </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection