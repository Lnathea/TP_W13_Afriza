<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Product;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
    // Memuat relasi 'product' DAN di dalam 'product' memuat relasi 'toko'
    $stoks = Stok::with('product.toko')->get(); 
    return view('stok.index', compact('stoks'));
    }

    public function create()
    {
        $products = Product::all();
        return view('stok.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah'     => 'required|integer|min:0',
        ]);

        Stok::create($request->all());

        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $stok = Stok::findOrFail($id);
        $products = Product::all();

        return view('stok.edit', compact('stok', 'products'));
    }

    public function update(Request $request, $id)
    {
        $stok = Stok::findOrFail($id);

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'jumlah'     => 'required|integer|min:0',
        ]);

        $stok->update($request->all());

        return redirect()->route('stok.index')->with('success', 'Stok berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Stok::destroy($id);

        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus.');
    }
}
