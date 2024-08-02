@extends('admin.layouts.main')

@section('menuDokterPemilik', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <div class="card">
            <div class="card-header">
                Data Dokter
            </div>
            <div class="card-body">
                {{-- <a href="{{ route('data-dokter.create') }}" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i>
                    Tambahkan Data Dokter
                </a> --}}
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th>Nama Dokter</th>
                            <th>Spesialis</th>
                            <th>Foto</th>
                            <th>Email</th>
                            <th>Phone</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dokters as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->spesialis }}</td>
                                <td><img src="{{ asset('images/dokter/' . $data->foto) }}" style="height: 70px; width: 70px;"></td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->telepon }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
