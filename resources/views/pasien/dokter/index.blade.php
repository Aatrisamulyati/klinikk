@extends('pasien.layouts.main')

@section('menuDokter', 'active')

<section id="doctors" class="doctors">
    <div class="container">
        <div class="section-title">
            <br><br><br><br>
            <h2>Doctors</h2>
            <!-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> -->
        </div>
        <div class="row">
            @foreach ($dokters as $data)
                <div class="col-lg-6">
                    <div class="member d-flex align-items-start">
                        <div class="pic">
                            <img src="{{ asset('images/dokter/' . $data->foto) }}" class="img-fluid" alt="{{ $data->nama }}">
                        </div>
                        <div class="member-info">
                            <h4>{{ $data->nama }}</h4>
                            <span>{{ $data->spesialis }}</span>
                            <p>{{ $data->phone }}</p>
                            <div class="social">
                                <a href="#"><i class="ri-twitter-fill"></i></a>
                                <a href="#"><i class="ri-facebook-fill"></i></a>
                                <a href="#"><i class="ri-instagram-fill"></i></a>
                                <a href="#"><i class="ri-linkedin-box-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
