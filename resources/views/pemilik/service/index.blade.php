@extends('admin.layouts.main')

@section('menuServicePemilik', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Data Services
            </div>
            <div class="card-body">
                
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Layanan</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td><img src="{{ asset('images/service/' . $data->gambar) }}" style="height: 70px; width: 70px;"></td>
                                <td>Rp. {{ number_format($data->harga, 0, ',', '.') }}</td>
                                <td>{{ $data->deskripsi }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
