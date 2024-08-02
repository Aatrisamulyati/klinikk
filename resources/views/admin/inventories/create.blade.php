@extends('admin.layouts.main')

@section('menuDataInventories', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <form action="{{ route('data-inventories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="btn btn-primary mb-3">
                    Tambah Data Inventory
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="product_id">Product</label>
                        <select name="product_id" id="product_id" class="form-control">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="type">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="masuk">Masuk</option>
                            <option value="keluar">Keluar</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga_satuan"> Harga Satuan</label>
                        <input type="number" step="0.01" name="harga_satuan" id="harga_satuan" class="form-control" min="0" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        Simpan Data
                    </button>
                    <a href="{{ route('data-inventories.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection