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
                                    <th scope="row text-left">Nama</th>
                                    <td>{{ $bookings->pasien->nama }}</td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Service</th>
                                    <td>{{ $bookings->service->nama }}</td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Product</th>
                                    <td>{{ $bookings->product->nama ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Harga</th>
                                    <td>Rp {{ number_format($bookings->service->harga + ($bookings->product->harga ?? 0)) }}</td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Dokter</th>
                                    <td>{{ $bookings->dokter->nama }}</td>
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
                                    <th scope="row text-left">Foto</th>
                                    <td>
                                        @if ($bookings->gambar)
                                            <img src="{{ asset('images/booking/' . $bookings->gambar) }}" alt="Booking Image" class="img-fluid table-img rounded" style="width: 60px; height: 60px;">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Keterangan</th>
                                    <td>{{ $bookings->keterangan }}</td>
                                </tr>
                                <tr>
                                    <th scope="row text-left">Status</th>
                                    <td>
                                        <span class="badge 
                                            @if($bookings->status == 'Selesai')
                                                badge-warning
                                            @elseif($bookings->status == 'Booking')
                                                badge-warning
                                            @else
                                                badge-danger
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
                                {{-- <button type="submit" class="btn btn-danger my-2"
                                    onclick="return confirm('Anda yakin cancel booking ini?')" @if($bookings->status ==
                                    'Booking' || $bookings->status == 'Batal') disabled @endif>
                                    Cancel
                                </button> --}}
                                @php
                                    $currentTime = time();
                                    $bookingTime = strtotime($bookings->created_at);
                                    $timeDifference = round(($currentTime - $bookingTime) / 60); // Hitung selisih waktu dalam menit
                                @endphp

                                <button type="submit" class="btn btn-danger my-2"
                                        onclick="return confirm('Anda yakin cancel booking ini?')" 
                                        @if($bookings->status == 'Selesai' || $bookings->status == 'Batal' || $timeDifference > 15) disabled @endif>
                                    Cancel
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