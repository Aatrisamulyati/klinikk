<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::get();
        $services = Service::get();
        $users = User::whereIn('level', ['Pasien', 'Dokter'])->latest()->get();

        return view('admin.booking.index',[
            'booking' => $bookings,
            'user' => $users,
            'service' => $services,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::get();
        $dokters = User::where('level', 'Dokter')->latest()->get();
        $pasiens = User::where('level', 'Pasien')->latest()->get();

        return view('admin.booking.create',[
            'services' => $services,
            'dokters' => $dokters,
            'pasiens' => $pasiens,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:users,id',
            'dokter_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'status' => 'required',
        ]);

        Booking::create($request->all());

        return redirect()->route('data-booking.index')->with('success', 'Booking berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services = Service::get();
        $dokters = User::where('level', 'Dokter')->latest()->get();
        $pasiens = User::where('level', 'Pasien')->latest()->get();
        $booking = Booking::findOrFail($id);

        return view('admin.booking.edit',[
            'services' => $services,
            'dokters' => $dokters,
            'pasiens' => $pasiens,
            'booking' => $booking,
        ]);
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
        Booking::where('id', $id)->update([
            'status' => 'Selesai'
        ]);

        return redirect()->route('data-booking.index')->with('success', 'Booking berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
