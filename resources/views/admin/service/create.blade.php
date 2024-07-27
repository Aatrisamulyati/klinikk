@extends('admin.layouts.main')

@section('menuDataServices', 'active')
@section('content')

    <div class="row">
        <div class="col-lg">
            <form action="{{ route('data-services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        Tambah Data Services
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <form action="{{ route('data-services.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama">Nama Services</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" value="{{ old('nama') }}" required>
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror"
                                        id="gambar" name="gambar" value="{{ old('gambar') }}" required>
                                    @error('gambar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label>Harga</label>
                                    <input type="text" name="harga"
                                        class="form-control @error('harga') is-invalid @enderror"
                                        value="{{ @old('harga') }}">
                                    @error('harga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                        id="deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" required>
                                    @error('deskripsi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">
                                Simpan Data
                            </button>
                            <a href="{{ route('data-product.index') }}" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>
@endsection
