<?php

namespace App\Http\Controllers\Pasien;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PasienRiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::where('pasien_id', Auth::id())->orderByDesc('created_at')->get();
        return view('pasien.riwayat.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('pasien.riwayat.detail', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        if (!$booking) {
            return redirect()->route('my-booking.index')->with('error', 'Booking tidak ditemukan.');
        }

        $currentTime = time();
        $bookingTime = strtotime($booking->created_at);

        // Hitung selisih waktu dalam menit
        $timeDifference = round(($currentTime - $bookingTime) / 60);

        // Cek apakah booking dapat dibatalkan
        if ($booking->status != 'Selesai' && $timeDifference < 60) {
            // Update status booking menjadi 'Dibatalkan'
            $booking->status = 'Dibatalkan';
            $booking->save();

            // Redirect dengan pesan sukses
            return redirect()->route('my-booking.index')->with('success', 'Booking berhasil dibatalkan.');
        } elseif ($booking->status == 'Selesai') {
            // Redirect dengan pesan error jika booking sudah selesai
            return redirect()->route('my-booking.index')->with('error', 'Booking sudah selesai dan tidak dapat dibatalkan.');
        } else {
            // Redirect dengan pesan error jika booking sudah lewat 15 menit
            return redirect()->route('my-booking.index')->with('error', 'Booking sudah lewat batas waktu untuk pembatalan.');
        }
    }
}
