@extends('admin.layouts.main')

@section('menuDataBooking', 'active')
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
                                <th>Aksi</th>
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
                                
                                <td>
                                    @if ($data->status_orders == 'Selesai')
                                    @else
                                    <form action="{{ route('data-booking.update', $data->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success mt-2"
                                            onclick="return confirm('Anda yakin untuk selesaikan pesan ini ?')">
                                            <i class="fas fa-check"></i>
                                            Selesai
                                        </button>
                                    </form>

                                    @endif    
                                    </form>
                                    <form action="{{ route('data-booking.destroy', $data->id) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm my-2" onclick="return confirm('Anda yakin menghapus data ini?')">Hapus</button>
                                    </form>
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