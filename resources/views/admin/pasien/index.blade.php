@extends('admin.layouts.main')

@section('menuDataPasien', 'active')
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
                                <th>Aksi</th>
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

                                    {{-- <td>{{ $data->ulasan }}</td> --}}
                                    <td>
                                        <form action="{{ route('data-pasien.destroy', $data->id) }}" method="POST" class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm my-2" onclick="return confirm('Anda yakin menghapus data ini?')">Hapus</button>
                                        </form>
                                    </td>
                                    

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
