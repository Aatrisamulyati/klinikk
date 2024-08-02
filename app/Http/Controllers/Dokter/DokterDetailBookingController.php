<?php

namespace App\Http\Controllers\Dokter;

use App\Models\User;
use App\Models\Booking;
use App\Models\Product;
use App\Models\DetailBook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DokterDetailBookingController extends Controller
{
    public function index()
    {
        // Load the related models
        $bookings = Booking::get();
        $products = Product::all();
        $users = User::whereIn('level', ['Pasien', 'Dokter'])->latest()->get();

        return view('dokter.bookingdetail.index', [
            'bookings' => $bookings,
            'users' => $users,
            'products' => $products,
        ]);
    }

    public function edit($id)
    {
        $bookings = Booking::findOrFail($id);
        $products = Product::all();
        return view('dokter.bookingdetail.edit', compact('bookings', 'products'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'product_id' => 'nullable|exists:products,id',
            'gambar' => 'nullable|image|max:2048',
            'keterangan' => 'nullable|string',
        ]);

        $booking = Booking::findOrFail($id);

        // Cek jika product_id lama dan baru berbeda
        if ($booking->product_id !== $request->product_id) {
            if ($booking->product_id) {
                // Tambahkan kembali stok produk lama
                $oldProduct = Product::find($booking->product_id);
                $oldProduct->stok += 1; // Asumsikan setiap booking mengurangi 1 unit produk
                $oldProduct->save();
            }

            if ($request->product_id) {
                // Kurangi stok produk baru
                $newProduct = Product::find($request->product_id);
                if ($newProduct->stok < 1) {
                    return redirect()->route('bookings.edit', $id)
                        ->withErrors(['product_id' => 'Stok produk tidak mencukupi.']);
                }
                $newProduct->stok -= 1;
                $newProduct->save();
            }
        }

        if ($request->hasFile('gambar')) {
            $destinationPath = 'images/booking/';
            $bookingImage = date('YmdHis') . "." . $request->file('gambar')->getClientOriginalExtension();
            $request->file('gambar')->move($destinationPath, $bookingImage);

            // Delete old image if it exists
            if ($booking->gambar && file_exists(public_path('images/booking/' . $booking->gambar))) {
                unlink(public_path('images/booking/' . $booking->gambar));
            }

            $validatedData['gambar'] = $bookingImage;
        }

        // Ensure product_id is updated
        $booking->update($validatedData);

        return redirect('booking-detail')->with('success', 'Data berhasil diperbarui!');
    }


}