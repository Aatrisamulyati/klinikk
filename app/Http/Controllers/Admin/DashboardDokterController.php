<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = User::where('level', 'dokter')->latest()->get();

        return view('admin.dokter.index', [
            'dokters' => $dokter,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dokter.create');
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
            'email' => 'required|email|unique',
            'foto' => 'nullable|image',
            'ttl' => 'nullable|date',
            'telepon' => 'nullable|numeric',
            'password' => 'required|min:8|confirmed', 
            'alamat' => 'nullable|string',
            'spesialis' => 'nullable|string'
        ]);

        $pasienImage = null;

        if ($image = $request->file('foto')) {
           
            $destinationPath = 'images/dokter/';
            $pasienImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $pasienImage);
        }
    
        $validated['foto'] = $pasienImage;
        $validated['password'] = bcrypt($request->input('password'));
        $validated['level'] = 'Dokter';

        User::create($validated);
       
        return redirect('data-dokter')->with('success', 'Data berhasil ditambahkan!');

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
        return view('admin.dokter.edit', [
            'dokters' => User::find($id)
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
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'foto' => 'nullable|image',
            'ttl' => 'nullable|date',
            'telepon' => 'nullable|numeric',
            'password' => 'nullable|min:8|confirmed', 
            'alamat' => 'nullable|string',
            'spesialis' => 'nullable|string'
        ]);
    
        $dokter = User::findOrFail($id);
    
        $pasienImage = $dokter->foto;
    
        if ($image = $request->file('foto')) {
            $destinationPath = 'images/dokter/';
            $pasienImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $pasienImage);
    
            // Hapus gambar lama jika ada
            if ($dokter->foto && file_exists(public_path('images/dokter/' . $dokter->foto))) {
                unlink(public_path('images/dokter/' . $dokter->foto));
            }
        }
    
        $validated['foto'] = $pasienImage;
    
        // Jika password diisi, hash password baru
        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->input('password'));
        } else {
            // Jika password tidak diisi, biarkan password lama
            unset($validated['password']);
        }
    
        $validated['level'] = 'Dokter';
    
        $dokter->update($validated);
    
        return redirect('data-dokter')->with('success', 'Data berhasil diperbarui!');
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

        User::where('id', $id)->delete();

        return redirect('data-dokter')->with('success', 'Data berhasil di Hapus!');
    }
}
