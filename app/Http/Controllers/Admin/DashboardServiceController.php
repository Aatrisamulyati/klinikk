<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.service.index', [
            'services' => Service::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servies = Service::all();
        return view('admin.service.create');
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
            'gambar' => 'required|image', 
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        $serviceImage = null;

        if ($image = $request->file('gambar')) {
           
            $destinationPath = 'images/service/';
            $serviceImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $serviceImage);
        }
    
        $validated['gambar'] = $serviceImage;
        Service::create($validated); 
        return redirect('data-services')->with('success', 'Data berhasil ditambahkan!');
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
        return view('admin.service.edit', [
            'services' => Service::find($id),
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
            'gambar' => 'required', 
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
        ]);

        $services = Service::findOrFail($id);
    
        $serviceImage = $services->gambar;
    
        if ($image = $request->file('gambar')) {
            $destinationPath = 'images/service/';
            $serviceImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $serviceImage);
    
            // Hapus gambar lama jika ada
            if ($services->gambar && file_exists(public_path('images/services/' . $services->gambar))) {
                unlink(public_path('images/services/' . $services->gambar));
            }
        }
    
        $validated['gambar'] = $serviceImage;
    
        $services->update($validated);
        return redirect('data-services')->with('success', 'Data berhasil ditambahkan!');
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

        Service::where('id', $id)->delete();

        return redirect('data-services')->with('success', 'Data berhasil di Hapus!');
    }
}
