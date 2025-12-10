<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index()
    {
        $toko = Toko::all();
        return view('toko.index', compact('toko'));
    }

    public function create()
    {
        return view('toko.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'nama_toko' => 'required',
        'alamat' => 'required',
        'pemilik' => 'required'
    ]);

    Toko::create([
        'nama_toko' => $request->nama_toko,
        'alamat' => $request->alamat,
        'pemilik' => $request->pemilik
    ]);

    return redirect()->route('toko.index');
}

    public function edit($id)
    {
        $toko = Toko::findOrFail($id);
        return view('toko.edit', compact('toko'));
    }

    public function update(Request $request, $id)
    {
        $toko = Toko::findOrFail($id);
        $toko->update($request->all());

        return redirect()->route('toko.index');
    }

    public function destroy($id)
    {
        Toko::destroy($id);
        return redirect()->route('toko.index');
    }
}
