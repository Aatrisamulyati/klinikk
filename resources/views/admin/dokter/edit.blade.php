@extends('admin.layouts.main')

@section('menuDataDokter', 'active')
@section('content')

<div class="row">
    <div class="col-lg">
        <form action="{{ route('data-dokter.update', $dokters->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    Edit Data Dokter
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Nama Dokter</label>
                            <input type="text" name="nama"
                                class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama', $dokters->nama) }}">
                            @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>Spesialis</label>
                            <select id="spesialis" name="spesialis" class="form-control">
                                <option value="Dokter Umum" {{ old('spesialis', $dokters->spesialis) == 'Dokter Umum' ? 'selected' : '' }}>Dokter Umum</option>
                                <option value="Spesialis Ortho" {{ old('spesialis', $dokters->spesialis) == 'Spesialis Ortho' ? 'selected' : '' }}>Spesialis Ortho</option>
                                <option value="Spesialis Gigi" {{ old('spesialis', $dokters->spesialis) == 'Spesialis Gigi' ? 'selected' : '' }}>Spesialis Gigi</option>
                            </select>
                            @error('spesialis')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $dokters->email) }}">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label>No HP</label>
                            <input type="text" name="telepon"
                                class="form-control @error('telepon') is-invalid @enderror"
                                value="{{ old('telepon', $dokters->telepon) }}">
                            @error('telepon')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label>Foto:</label>
                        <input type="file" id="foto" name="foto" 
                            class="form-control @error('foto') is-invalid @enderror">
                        @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

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
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('data-dokter.index') }}" class="btn btn-danger">Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
