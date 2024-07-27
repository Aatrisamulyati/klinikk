<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = User::where('level', 'pasien')->latest()->get();

        return view('admin.pasien.index', [
            'pasiens' => $pasien,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pasien.create');
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
            'nama' => 'required',
            'email' => 'required|email|unique:pasiens',
            'foto' => 'nullable|image',
            'ttl' => 'nullable|date',
            'telepon' => 'nullable|numeric',
            'password' => 'required|min:8|confirmed', 
            'alamat' => 'nullable|string',
            'spesialis' => 'nullable|string'
        ]);
            
        $pasienImage = null;

        if ($image = $request->file('foto')) {
           
            $destinationPath = 'images/pasien/';
            $pasienImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $pasienImage);
        }
    
        $validated['foto'] = $pasienImage;
        $validated['password'] = bcrypt($request->input('password'));
        $validated['level'] = 'Pasien';

        User::create($validated);

        return redirect('/data-pasien')->with('success', 'User berhasil ditambahkan!');
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
        return view('backend.pasien.edit', [
            'pasiens' => Pasien::find($id),
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
        // Validasi data yang dikirim dari formulir
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pasiens',
            'foto' => 'nullable|image',
            'ttl' => 'nullable|date',
            'telepon' => 'nullable|numeric',
            'password' => 'required|min:8|confirmed', 
            'alamat' => 'nullable|string',
            'spesialis' => 'nullable|string'
        ]);

        // Handle file upload (jika ada foto profil)
        // Jika ada file foto_profile di dalam request
        if ($request->hasFile('foto_profile')) {
            $file = $request->file('foto_profile');
            $fileName = hash('sha256', $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();

            $path = $file->storeAs('public/foto_profile/pasien/', $fileName);
            $validated['foto_profile'] = str_replace('public/', '', $path);
        } else {
            // Jika tidak ada file foto_profile di dalam request, atur nilai default atau sesuai kebutuhan
            $fileName = null; // Atur nilai default sesuai kebutuhan
        }

        // Handle password
        if ($request->filled('password')) {
            // Jika password diisi, hash password menggunakan bcrypt
            $validated['password'] = bcrypt($request->input('password'));
        } else {
            // Jika password tidak diisi, biarkan password tetap seperti sebelumnya
            unset($validated['password']);
        }

        // dd($validated);
        // Update user ke dalam database
        $validated['foto_profile'] = $fileName;
        $pelanggan = User::findOrFail($id);
        $pelanggan->update($validated);

        // Redirect ke halaman yang sesuai setelah menyimpan data
        return redirect('/data-pasien')->with('success', 'User berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id)
    {
        if($request->oldPicture) {
            Storage::delete($request->oldPicture);
        }

        Pasien::where('id', $id)->delete();

        return redirect('data-pasien')->with('success', 'Data berhasil di Hapus!');
    }
}
