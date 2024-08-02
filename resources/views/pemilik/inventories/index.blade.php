@extends('admin.layouts.main')

@section('menuInventoriesPemilik', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Data Inventories
            </div>
            <div class="card-body">
                {{-- <a href="{{ route('data-inventories.create') }}" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i>
                    Tambahkan Data Inventories
                </a> --}}
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Product</th>
                            <th>Type</th>
                            <th>Jumlah</th>
                            <th>Created At</th>
                            <th>Harga Satuan </th>
                            <th>Total</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventories as $inventory)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $inventory->product->nama }}</td>
                                <td>{{ $inventory->type }}</td>
                                <td>{{ $inventory->jumlah }}</td>
                                <td>{{ $inventory->created_at }}</td>
                                <td>Rp. {{ number_format($inventory->harga_satuan, 0, ',', '.') }}</td>
                                <td>Rp. {{ number_format($inventory->total, 0, ',', '.') }}</td>
                                
                                    
                                {{-- <a href="{{ route('data-product.edit', $data->id) }}" class="btn btn-sm btn-warning" role="button">Edit</a>
                                    <form action="{{ route('data-product.destroy', $data->id) }}" method="POST" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm my-2" onclick="return confirm('Anda yakin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
