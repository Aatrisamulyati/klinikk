@extends('pasien.layouts.main')

@section('menuBooking', 'active')
@section('content')
<section class="hero-section">
    <br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="text-center mb-5 pb-2">
                    <div id="step1" class="card" style="display: block;">
                        <div class="card-header">
                            <div class="card-body">
                                @livewire('bookingpasien.create')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
