<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\DetailBook;
use App\Models\Product;
use Illuminate\Http\Request;

class DokterDetailBookingController extends Controller
{
    public function index()
    {
        $booking_details = DetailBook::with('bookings', 'products')->get();
        $bookings = Booking::get();
        $products = Product::get();

        return view('dokter.bookingdetail.index', [
            'booking_details' => $booking_details,
            'bookings' => $bookings,
            'products' => $products,
        ]);
    }
}
