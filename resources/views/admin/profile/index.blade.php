@extends('admin.layouts.main')
@section('menuProfile', 'active')

@section('content')
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <div class="user-menu">
                    <ul class="list-group text-center" style="list-style-type: none; padding: 0;">
                        <li style="margin-bottom: 20px;">
                            <img src="{{ asset('../backend/img/avatars/6.jpg') }}" class="img-circle elevation-2" alt="User Image"
                                style="width: 90px; height: 90px; margin: 0 auto;">
                        </li>
                        <li class="text-center">
                            <h6 style="font-weight: bold;">{{ Auth()->user()->nama }}</h6>
                        </li>
                        <li class="text-center">
                            <p>{{ Auth()->user()->email }}</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h3 style="font-weight: bold;">Edit Profile</h3>
                </div>
                <div class="card-body">
                    <label>Nama</label>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="nama" class="form-control" placeholder="Nama" aria-label="Nama"
                                @error('nama') is-invalid @enderror value="{{ @old('nama', Auth::user()->nama) }}">
                        </div>
                        <div class="col">
                            <input type="text" name="email" class="form-control" placeholder="Email" aria-label="Email"
                                @error('email') is-invalid @enderror value="{{ @old('email', Auth::user()->email) }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Password Baru</label>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label>Foto Profile</label>
                        <input type="file" name="foto"
                            class="form-control @error('foto') is-invalid @enderror"
                            value="{{ @old('foto', Auth::user()->foto) }}">
                        @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 text-right">
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection