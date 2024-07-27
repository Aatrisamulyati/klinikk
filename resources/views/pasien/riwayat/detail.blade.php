@extends('pasien.layouts.main')

@section('content')

<section class="hero-section">
    <div class="container">
        <div class="row mb-3">
            <h1 class="text-center text-white">Detail Booking</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-2">
                    <div class="card-body text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Detail</th>
                                    <th scope="col">Informasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row text-left">Service</th>
                                    <td>{{ $bookings->services->nama_service }}</td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Harga</th>
                                    <td>Rp {{number_format($bookings->services->harga, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Dokter</th>
                                    <td>{{ $bookings->dokter->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Tanggal</th>
                                    <td>{{ $bookings->tanggal }}</td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Jam</th>
                                    <td>{{ $bookings->jam }}</td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Status</th>
                                    <td>
                                        <span class="badge 
                                                    @if($bookings->status == 'Selesai')
                                                        badge-warning
                                                    @elseif($bookings->status == 'Dibatalkan')
                                                        badge-danger
                                                    @else
                                                        badge-success
                                                    @endif">
                                            {{ $bookings->status }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="float-end" style="text-align:center;">
                            <form action="{{ route('my-booking.destroy', $bookings->id) }}" method="POST"
                                class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger my-2"
                                    onclick="return confirm('Anda yakin cancel booking ini?')" @if($bookings->status ==
                                    'Selesai' || $bookings->status == 'Dibatalkan') disabled @endif>
                                    <i class="fas fa-trash">Cancel</i>
                                </button>
                            </form>
                            <a href="{{ route('booking.index') }}" class="btn btn-primary">Order More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection