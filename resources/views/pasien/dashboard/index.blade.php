@extends('pasien.layouts.main')

@section('menuBeranda', 'active')

@section('content')

{{-- <section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="text-center mb-5 pb-2">
                    <h1 class="text-white">Consult Your Haircut</h1>

                    <p class="text-white">Sculpting Handsome Excellence: Elevate Your Handsomeness Here!</p>

                    <a href="/booking" class="btn custom-btn smoothscroll mt-3">Booking now !!</a>
                </div>

                    @include('pelanggan.imageSlider.index')
            </div>

        </div>
    </div>
</section> --}}


<section class="latest-podcast-section section-padding pb-0 scroll-animation" id="services">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5">
                    <h4 class="section-title">Services</h4>
                </div>
            </div>
            @include('pasien.service.index')

        </div>
    </div>
</section>


<section class="topics-section section-padding pb-0 scroll-animation" id="dokter">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="section-title-wrap mb-5 d-flex justify-content-between align-items-center mx-auto">
                    <h4 class="section-title">Dokter</h4>
                </div>
            </div>

            @include('pasien.dokter.index')
        </div>
    </div>
</section>

@endsection