@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div style="
    max-width: 750px;
    margin:auto;
    background:white;
    padding:35px;
    border-radius:18px;
    box-shadow:0 4px 16px rgba(0,0,0,0.1);
">

    <h1 style="
        margin-bottom:25px; 
        font-size:28px; 
        font-weight:700; 
        color:#111827;
    ">
        Edit Produk
    </h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- NAMA --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; display:block; margin-bottom:6px;">
                Nama Produk
            </label>

            <input type="text" name="name" value="{{ $product->name }}" required
                style="
                    width:100%; padding:12px; font-size:15px;
                    border:1px solid #d1d5db; border-radius:10px;
                ">
        </div>

        {{-- HARGA --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; display:block; margin-bottom:6px;">
                Harga Produk
            </label>

            <input type="number" name="price" value="{{ $product->price }}" required
                style="
                    width:100%; padding:12px; font-size:15px;
                    border:1px solid #d1d5db; border-radius:10px;
                ">
        </div>

        {{-- DESKRIPSI --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; display:block; margin-bottom:6px;">
                Deskripsi Produk
            </label>

            <textarea name="description" rows="4"
                style="
                    width:100%; padding:12px; font-size:15px;
                    border:1px solid #d1d5db; border-radius:10px;
                "
            >{{ $product->description }}</textarea>
        </div>

        {{-- TOKO --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; display:block; margin-bottom:6px;">
                Pilih Toko
            </label>

            <select name="toko_id" required
                style="
                    width:100%; padding:12px; font-size:15px;
                    border:1px solid #d1d5db; border-radius:10px;
                    background:white;
                ">
                @foreach ($toko as $t)
                    <option value="{{ $t->id }}" 
                        {{ $product->toko_id == $t->id ? 'selected' : '' }}>
                        {{ $t->nama_toko }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- INFORMASI --}}
        <p style="font-size:14px; color:#6b7280; margin-bottom:20px;">
            <i>Stok tidak dapat diubah di halaman ini. Gunakan menu <b>Manajemen Stok</b> untuk mengubah jumlah stok.</i>
        </p>

        {{-- BUTTONS --}}
        <div style="display:flex; gap:12px; margin-top:10px;">
            <button type="submit"
                style="
                    padding:12px 20px; background:#3b82f6; color:white;
                    border:none; border-radius:10px; font-weight:600;
                    cursor:pointer;
                ">
                Update Produk
            </button>

            <a href="{{ route('products.index') }}"
                style="
                    padding:12px 20px; background:#6b7280; color:white;
                    border-radius:10px; text-decoration:none;
                    font-weight:600;
                ">
                Kembali
            </a>
        </div>

    </form>

</div>
@endsection
