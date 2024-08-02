@extends('pasien.layouts.main')
@section('menuMyBooking', 'active')
@section('content')

<section class="hero-section">
    <div class="container">
        <div class="section-title">
            <br><br><br><br>
            <h2>My Booking</h2>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    @forelse ($bookings as $booking)
                    {{-- @php
                        dd($booking);
                    @endphp --}}
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
                                            <th scope="row text-left">Nama</th>
                                            <td>:</td>
                                            <td>{{ $booking->pasien->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row text-left">Service</th>
                                            <td>:</td>
                                            <td>{{ $booking->service->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row text-left">Dokter</th>
                                            <td>:</td>
                                            <td>{{ $booking->dokter->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row text-left">Tanggal</th>
                                            <td>:</td>
                                            <td>{{ $booking->tanggal }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row text-left">Jam</th>
                                            <td>:</td>
                                            <td>{{ $booking->jam }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row text-left">Status</th>
                                            <td>:</td>
                                            <td>
                                                <span class="badge 
                                                    @if($booking->status == 'Booking')
                                                        badge-warning
                                                    @elseif($booking->status == 'Selesai')    
                                                        badge-success
                                                    @else
                                                        badge-danger
                                                    @endif">
                                                    {{ $booking->status }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="3">
                                                <div class="center" style="text-align:center;">
                                                    <a href="{{route('my-booking.show', $booking->id)}}">
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
