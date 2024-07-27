<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index', [
            'products' => Product::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
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
            'gambar' => 'nullable|image',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        $productImage = null;

        if ($image = $request->file('gambar')) {
            $destinationPath = 'images/product/';
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
        }

        $validated['gambar'] = $productImage;
        Product::create($validated);

        return redirect('data-product')->with('success', 'Data berhasil ditambahkan!');

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
        return view('admin.product.edit', [
            'products' => Product::find($id),
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
            'gambar' => 'nullable|image',
            'harga' => 'required',
            'stok' => 'required'
        ]);

        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required',
            'gambar' => 'nullable|image',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric'
        ]);

        $productImage = $product->gambar;
        if ($image = $request->file('gambar')) {
            $destinationPath = 'images/product/';
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);

            if ($product->gambar && file_exists($destinationPath . $product->gambar)) {
                unlink($destinationPath . $product->gambar);
            }
        }

        $validated['gambar'] = $productImage;

        $product->update($validated);

        return redirect('data-product')->with('success', 'Data berhasil diperbarui!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->oldPicture) {
            Storage::delete($request->oldPicture);
        }

        Product::where('id', $id)->delete();

        return redirect('data-product')->with('success', 'Data berhasil di Hapus!');
    }
}
