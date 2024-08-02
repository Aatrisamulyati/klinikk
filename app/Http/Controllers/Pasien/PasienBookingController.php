<?php

namespace App\Http\Controllers\Pasien;
use App\Models\User;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PasienBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            // Jika sudah login, arahkan ke halaman booking
            return view('pasien.booking.index');
        } else {
            // Jika belum login, kembalikan respons JSON
            return back()->withErrors([
                'email' => 'Login Terlebih Dahulu!!',
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        {
            $services = Service::get();
            $dokters = User::where('level',  'Dokter')->latest()->get();
            $pasien = User::where('level', 'Pasien',)->latest()->get();
    
            return view('pasien.booking.create',[
                'service' => $services,
                'dokter' => $dokters,
                'pasien' => $pasiens,
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pasien_id' => 'required',
            'service_id' => 'required',
            'dokter_id' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'status' => 'nullable'
        ]);
        
        Booking::create($validated);

        return redirect('/booking')->with('success', 'Data berhasil di tambahkan!');
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
