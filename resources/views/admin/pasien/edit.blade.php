@extends('admin.layouts.main')

@section('menuDataPasien', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <form action="{{ route('data-pasien.update', $pasien->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    Edit Data Pasien
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label">Nama Pasien:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                value="{{ @old('name', $pasien->name) }}" required>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                value="{{ @old('email',$pasien->email) }}" required>
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
                            <input type="file" name="foto_profile"
                                class="form-control @error('foto_profile') is-invalid @enderror">
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
                                value="{{ @old('tgl_lahir', $pasien->tgl_lahir) }}" required>
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
                            <input type="tel" class="form-control" @error('phone') is-invalid @enderror" id="phone"
                                name="phone" value="{{ $pasien->phone }}">
                                @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
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
                            <label for="password" class="form-label">New Password:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="password_confirmation" class="form-label">Confirm New Password:</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation">
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="alamat" class="form-label">Alamat:</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                name="alamat">{{ old('alamat', $pasien->alamat) }}</textarea>
                            @error('alamat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection