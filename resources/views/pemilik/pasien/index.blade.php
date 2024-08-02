@extends('admin.layouts.main')

@section('menuPasienPemilik', 'active')
@section('content')

    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="card-header">
                    Data Pasien
                </div>
                <div class="card-body">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Foto</th>
                                <th>Tanggal Lahir</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasiens as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td><img src="{{ asset('images/pasien/' . $data->foto) }}" style="height: 70px; width: 70px;"></td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->ttl }}</td>
                                    <td>{{ $data->telepon }}</td>
                                    <td>{{ $data->alamat }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
