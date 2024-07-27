@extends('admin.layouts.main')

@section('menuDataBooking', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Edit Data Booking
            </div>
            <div class="card-body">
                <form action="{{ route('data-booking.update', $bookings->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="pasien_id">Nama Pasien</label>
                        <select class="form-control" id="pasien_id" name="pasien_id">
                            @foreach($pasiens as $data)
                                <option value="{{ $data->id }}" {{ $data->id == $booking->id ? 'selected' : '' }}>{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dokter_id">Nama Dokter</label>
                        <select class="form-control" id="dokter_id" name="dokter_id">
                            @foreach($dokters as $data)
                                <option value="{{ $data->id }}" {{ $data->id == $booking->dokter_id ? 'selected' : '' }}>{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service_id">Nama Layanan:</label>
                        <select class="form-control" id="service_id" name="service_id">
                            <option value="">Pilih Service</option>
                            @foreach($services as $data)
                                <option value="{{ $data->id }}" {{ $data->id == $booking->service_id ? 'selected' : '' }}>{{ $data->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label >Tanggal:</label>
                        <input type="date" name="tanggal" wire:model='tanggal'
                            class="form-control @error('tanggal') is-invalid @enderror"
                            value="{{ $booking->tanggal }}" min="{{ date('Y-m-d')}}">
                        @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label>Jam</label>
                        <div class="col-md-6">
                            @error('jam')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror

                            @for ($i = 10; $i < 24; $i++) 
                            <input type="radio" class="btn-check" name="jam"
                                id="btn-check-outlined-{{ $i }}" value="{{ $i }}.00" {{ $i==$booking->jam ?
                                'checked' :
                                '' }} >
                                    <label class="btn btn-outline-primary" for="btn-check-outlined-{{ $i }}">{{ $i
                                        }}.00</label>
                                @endfor
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="booking" {{ $booking->status == 'booking' ? 'selected' : '' }}>Booking
                        </option>
                        <option value="selesai" {{ $booking->status == 'selesai' ? 'selected' : '' }}>Selesai
                        </option>
                    </select>
                    @error('status')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('data-booking.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    @endsection