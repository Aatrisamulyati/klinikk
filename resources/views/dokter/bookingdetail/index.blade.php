@extends('admin.layouts.main')

@section('menuDetailBooking', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Booking Detail
            </div>
            <div class="card-body">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($booking_details as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->bookings->pasiens->name }}</td>
                                <td>{{ $data->bookings->dokters->name }}</td>
                                <td>{{ $data->bookings->services->name }}</td>
                                <td>{{ $data->products->name }}</td> 
                                <td>{{ $data->bookings->tanggal }}</td>
                                <td>{{ $data->bookings->jam }}</td>
                                <td>{{ $data->bookings->status }}</td>
                                <td><img src="{{ $data->gambar ? asset('images/product/' . $data->gambar) : asset('images/no_image.jpg') }}" alt="gambar" class="img-fluid table-img rounded" style="width: 60px; height: 60px;"></td>
                                <td>{{ $data->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
