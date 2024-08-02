<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardInventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::with('product')->get();
        return view('admin.inventories.index', compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.inventories.create', compact('products'));
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
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer|min:1',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        $total = $request->jumlah * $request->harga_satuan;

        $inventory = Inventory::create([
            'product_id' => $request->product_id,
            'type' => $request->type,
            'jumlah' => $request->jumlah,
            'harga_satuan' => $request->harga_satuan,
            'total' => $total,
        ]);

        $product = Product::find($request->product_id);

        if ($request->type == 'masuk') {
            $product->stok += $request->jumlah;
        } elseif ($request->type == 'keluar') {
            if ($product->stok < $request->jumlah) {
                return redirect()->route('inventories.create')
                    ->withErrors(['jumlah' => 'Jumlah keluar melebihi stok yang tersedia.']);
            }
            $product->stok -= $request->jumlah;
        }

        $product->save();

        return redirect('data-inventories')->with('success', 'Data berhasil ditambahkan!');
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
