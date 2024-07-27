@extends('pasien.layouts.main')
@section('menuMyBooking', 'active')
@section('content')

<section class="hero-section">
    <div class="container">
        <div class="row mb-3">

            <h1 class="text-center text-white">My Booking</h1>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    @forelse ($bookings as $booking)
                    <div class="col-md-4 mb-4">
                        <div class="card border-2">
                            <div class="card-body text-center ">
                                <table class="table">
                                    <thead>
                                        <tr style="display:none">
                                            <th scope="col" style="width:50px;">title</th>
                                            <th scope="col">:</th>
                                            <th scope="col">input</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row text-left">Service</th>
                                            <td>:</td>
                                            <td>{{ $bookings->service->nama_service }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row text-left">Dokter</th>
                                            <td>:</td>
                                            <td>{{ $bookings->dokter->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row text-left">Tanggal</th>
                                            <td>:</td>
                                            <td>{{ $bookings->tanggal }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row text-left">Jam</th>
                                            <td>:</td>
                                            <td>{{ $bookings->jam }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row text-left">Status</th>
                                            <td>:</td>
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
                                        <tr>
                                            <th colspan="3">
                                                <div class="center" style="text-align:center;">
                                                    <a href="{{route('my-booking.show', $bookings->id)}}">
                                                        Lihat Detail
                                                    </a>
                                                </div>
                                            </th>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-12">
                        <p>Tidak ada riwayat booking.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
