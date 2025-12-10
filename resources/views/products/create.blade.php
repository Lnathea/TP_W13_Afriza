@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div style="
    max-width: 750px; 
    margin:auto; 
    background:white;
    padding:30px; 
    border-radius:16px; 
    box-shadow:0 4px 12px rgba(0,0,0,0.08);
">

    <h1 style="margin-bottom:25px; font-size:28px; font-weight:700;">Tambah Produk</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        {{-- NAMA PRODUK --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; margin-bottom:6px; display:block;">Nama Produk</label>
            <input type="text" name="name" required
                style="
                    width:100%; padding:12px; border:1px solid #d1d5db;
                    border-radius:8px; font-size:15px;
                ">
        </div>

        {{-- HARGA --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; margin-bottom:6px; display:block;">Harga Produk</label>
            <input type="number" name="price" required
                style="
                    width:100%; padding:12px; border:1px solid #d1d5db;
                    border-radius:8px; font-size:15px;
                ">
        </div>

        {{-- DESKRIPSI --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; margin-bottom:6px; display:block;">Deskripsi Produk</label>
            <textarea name="description" rows="4"
                style="
                    width:100%; padding:12px; border:1px solid #d1d5db;
                    border-radius:8px; font-size:15px;
                "></textarea>
        </div>

        {{-- TOKO --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; margin-bottom:6px; display:block;">Pilih Toko</label>
            <select name="toko_id" required
                style="
                    width:100%; padding:12px; border:1px solid #d1d5db; 
                    border-radius:8px; font-size:15px;
                ">
                <option value="">-- Pilih Toko --</option>
                @foreach ($toko as $t)
                    <option value="{{ $t->id }}">{{ $t->nama_toko }}</option>
                @endforeach
            </select>
        </div>

        <p style="margin-top:5px; margin-bottom:25px; color:#6b7280; font-style:italic;">
            Stok produk tidak diinput di sini — lakukan melalui menu <b>Manajemen Stok</b>.
        </p>

        {{-- BUTTONS --}}
        <div style="display:flex; gap:10px;">
            <button type="submit"
                style="
                    padding:12px 22px; background:#3b82f6; border:none;
                    border-radius:10px; color:white; font-weight:600; cursor:pointer;
                ">
                Simpan Produk
            </button>

            <a href="{{ route('products.index') }}"
               style="
                   padding:12px 22px; background:#6b7280; border-radius:10px;
                   color:white; text-decoration:none; font-weight:600;
               ">
                Kembali
            </a>
        </div>

    </form>
</div>
@endsection
