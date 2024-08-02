
@extends('admin.layouts.main')

@section('menuDetailbookings', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <form action="{{ route('booking-detail.update', $bookings->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    Edit Data Services
                </div>
                <div class="card-body">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="product_id">Nama Product</label>
                            <select class="form-control @error('product_id') is-invalid @enderror" id="product_id" name="product_id" required>
                                <option value="">Pilih Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ $bookings->product_id == $product->id ? 'selected' : '' }}>
                                        {{ $product->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    
                    <div class="mb-3">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                        @error('gambar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @if($bookings->gambar)
                            <img src="{{ asset('images/booking/' . $bookings->gambar) }}" alt="gambar" class="img-fluid table-img rounded mt-2" style="width: 60px; height: 60px;">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" rows="5" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $bookings->keterangan) }}</textarea>
                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
           
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                    <a href="{{ route('booking-detail.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
