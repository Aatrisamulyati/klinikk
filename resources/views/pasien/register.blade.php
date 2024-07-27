@extends('pasien.layouts.main')
<section id="appointment" class="appointment section-bg">
    <div class="container">
        <div class="row">
            <div class="card-group mt-5"> <!-- Added margin-top to card-group -->
                <div class="card p-4">
                    <div class="card-body">
                        <div class="col-md-5 mx-auto">
                            <form method="POST" action="/register">
                                @csrf
                               
                                <h5 class="text-center">Sign Up User</h5>
                                <p class="text-muted" style="font-size: 12px;">Sign Up to your account</p>
                                   
                                <div class="input-group mb-3" style="font-size: 12px;">
                                    <!-- Icon untuk username -->
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                        placeholder="Nama" value="{{old('nama')}}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                     @enderror
                                </div>

                                <div class="input-group mb-3" style="font-size: 12px;">
                                    <!-- Icon untuk username -->
                                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Email" value="{{old('email')}}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                     @enderror
                                </div>
                                <div class="input-group mb-4" style="font-size: 12px;">
                                    <!-- Icon untuk password -->
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>

                                <div class="input-group mb-4" style="font-size: 12px;">
                                    <!-- Icon untuk password -->
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                    <input type="password" name="password_confirmation"
                                        class="form-control" placeholder="Konfirmasi Password">
                                </div>
                                    
                                    <div class="col-12 text-center"> <!-- Mengubah col-6 menjadi col-12 -->
                                        <button type="submit" class="btn btn-primary btn-rounded">Sign Up</button>
                                    </div>
								</div>
								<!-- Teks atau tombol untuk registrasi -->
								<div class="col-12 text-center mt-3" style="font-size: 12px;">
                                    <p>Belum punya akun? 
                                    <a href="/login" class="text-center">Login</a></p>
                                </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
