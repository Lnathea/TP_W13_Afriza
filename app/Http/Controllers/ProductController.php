<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Toko;
use App\Models\Stok;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Ambil produk + relasi stok + toko
        $products = Product::with(['stok', 'toko'])->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $toko = Toko::all(); // untuk dropdown toko
        return view('products.create', compact('toko'));
    }

    // app/Http/Controllers/ProductController.php

    public function store(Request $request)
    {
    // Validasi tanpa 'stok'
    $request->validate([
        'name'          => 'required',
        'price'         => 'required|numeric',
        'description'   => 'nullable',
        // PASTIKAN NAMA TABEL ADALAH 'tokos' ATAU 'toko'
        'toko_id'       => 'required|exists:toko,id', 
    ]);

    // Simpan produk
    $product = Product::create([
        'name'          => $request->name,
        'price'         => $request->price,
        'description'   => $request->description,
        'toko_id'       => $request->toko_id,
    ]);

    // Hapus penyimpanan stok di sini!

    return redirect('/products')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $toko = Toko::all(); // untuk dropdown toko
        return view('products.edit', compact('product', 'toko'));
    }

    // app/Http/Controllers/ProductController.php

    public function update(Request $request, Product $product)
    {
    $request->validate([
        'name'          => 'required',
        'price'         => 'required|numeric',
        'description'   => 'nullable',
        // PASTIKAN NAMA TABEL ADALAH 'tokos' ATAU 'toko'
        'toko_id'       => 'required|exists:tokos,id', 
        // 'stok' => 'required|numeric', <-- HARUS DIHAPUS
    ]);

    // update produk
    $product->update([
        'name'          => $request->name,
        'price'         => $request->price,
        'description'   => $request->description,
        'toko_id'       => $request->toko_id,
    ]);

    // Hapus update stok di sini!
    // $product->stok->update(['jumlah' => $request->stok,]);

    return redirect('/products')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $product->delete(); // stok terhapus otomatis (cascade)
        return redirect('/products');
    }
}
