@extends('admin.layouts.main')

@section('menuDataProduct', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <form action="{{ route('data-product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="btn btn-primary mb-3">
                    Tambah Data Product
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label>Nama Product</label>
                        <input type="text" name="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            value="{{ @old('nama') }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Gambar</label>
                        <input type="file" name="gambar"
                            class="form-control @error('gambar') is-invalid @enderror"
                            value="{{ @old('gambar') }}">
                        @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Harga Satuan</label>
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
                        <label>Stok</label>
                        <input type="number" name="stok"
                            class="form-control @error('stok') is-invalid @enderror"
                            value="{{ @old('stok') }}">
                        @error('stok')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
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