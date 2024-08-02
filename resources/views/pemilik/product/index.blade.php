@extends('admin.layouts.main')

@section('menuProductPemilik', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Data Product
            </div>
            <div class="card-body">
                
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Product</th>
                            <th>Gambar</th>
                            <th>Harga Satuan </th>
                            <th>Stok</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>
                                   <img src="{{ $data->gambar ? asset('images/product/' . $data->gambar) : asset('images/no_image.jpg') }}" alt="gambar"
                                   class="img-fluid table-img rounded" style="width: 60px; height: 60px;">
                                </td>
                                <td>Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
                                <td>{{ $data->stok }}</td>
                               
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
