<?php

namespace App\Http\Controllers\Pemilik;

use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PemilikCetakController extends Controller
{
    public function cetakHarian(Request $request)
    {
        $tanggal_awal = $request->input('tanggal_awal');
        $tanggal_akhir = $request->input('tanggal_akhir');
        
        $bookings = Booking::whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])->get();
        $total_pemasukan = $bookings->sum(function ($booking) {
            return $booking->product ? $booking->service->harga + $booking->product->harga : $booking->service->harga;
        });

        return view('pemilik.cetak.harian', compact('bookings', 'tanggal_awal', 'tanggal_akhir', 'total_pemasukan'));
    }



    public function cetakBulanan(Request $request)
    {
        // Validate input
        $request->validate([
            'bulan' => 'required|date_format:m', // Expecting month in 'mm' format
            'tahun' => 'required|digits:4',
        ]);
    
        $bulan = $request->input('bulan'); // Format: MM
        $tahun = $request->input('tahun'); // Format: YYYY
    
        // Fetch bookings for the given month and year
        $bookings = Booking::whereMonth('tanggal', $bulan)
                            ->whereYear('tanggal', $tahun)
                            ->get();
    
        // Calculate total revenue
        $totalPemasukan = $bookings->reduce(function ($carry, $booking) {
            $hargaProduk = $booking->product ? $booking->product->harga : 0;
            return $carry + $booking->service->harga + $hargaProduk;
        }, 0);
    
        return view('pemilik.cetak.bulanan', [
            'bulan' => $bulan,  // Pass month as '07', '08', etc.
            'tahun' => $tahun,
            'bookings' => $bookings,
            'total_pemasukan' => $totalPemasukan,
        ]);
    }
    


    public function cetakTahunan(Request $request)
    {
        // Validasi input tahun
        $request->validate([
            'tahun' => 'required|integer|min:1900|max:2100',
        ]);

        // Ambil tahun dari input
        $tahun = $request->input('tahun');
        $tanggalAwal = Carbon::create($tahun, 1, 1);
        $tanggalAkhir = Carbon::create($tahun, 12, 31);

        // Query data booking untuk tahun tersebut
        $bookings = Booking::whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->get();

        // Hitung total pemasukan
        $totalPemasukan = $bookings->reduce(function ($carry, $booking) {
            $hargaProduk = $booking->product ? $booking->product->harga : 0;
            return $carry + $booking->service->harga + $hargaProduk;
        }, 0);

        // Kirim data ke view untuk dicetak
        return view('pemilik.cetak.tahunan', [
            'tahun' => $tahun,
            'bookings' => $bookings,
            'total_pemasukan' => $totalPemasukan,
        ]);
    }
}
