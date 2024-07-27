@extends('admin.layouts.main')

@section('menuDataPasien', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <form action="{{ route('data-pasien.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    Tambah Data Pasien
                </div>
                <div class="card-body">
                    <!-- Nama Pasien -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="nama_pasien" class="form-label">Nama Pasien:</label>
                            <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror" id="nama_pasien"
                                name="nama_pasien" value="{{ old('nama_pasien') }}" required>
                            @error('nama_pasien')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Foto Profil -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="foto_profile" class="form-label">Foto Profil:</label>
                            <input type="file" name="foto_profile" class="form-control @error('foro_profile') is-invalid @enderror"
                                value="{{ @old('foto_profile') }}">
                            @error('foto_profile')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="tgl_lahir" class="form-label">Tanggal Lahir:</label>
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                            @error('tgl_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" required>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="password_confirmation" class="form-label">Confirm Password:</label>
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation" required>
                            @error('password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="alamat" class="form-label">Alamat:</label>
                            <textarea class="form-control" id="alamat" name="alamat">{{ old('alamat') }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
