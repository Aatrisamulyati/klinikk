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
                <a href="{{ route('booking-detail.create') }}" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i>
                    Cetak Detail Booking
                </a>
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
                            
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->pasien->nama }}</td>
                                <td>{{ $data->dokter->nama }}</td>
                                <td>{{ $data->service->nama }}</td>
                                <td>{{ $data->product->nama ?? '' }}</td>
                                <td>{{ $data->tanggal }}</td>
                                <td>{{ $data->jam }}</td>
                                <td>{{ $data->status }}</td>
                                
                                <td>
                                    <img src="{{ $data->gambar ? asset('images/booking/' . $data->gambar) : asset('images/no_image.jpg') }}" alt="gambar" class="img-fluid table-img rounded" style="width: 60px; height: 60px;">
                                </td>
                                <td>{{ $data->keterangan }}</td>
                                <td>
                                    <a href="{{ route('booking-detail.edit', $data->id) }}" class="btn btn-sm btn-warning" role="button">Edit</a>
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
