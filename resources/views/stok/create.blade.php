@extends('layouts.app')

@section('title', 'Tambah Stok')

@section('content')
<div style="
    max-width: 750px; 
    margin:auto; 
    background:white;
    padding:30px; 
    border-radius:16px; 
    box-shadow:0 4px 12px rgba(0,0,0,0.08);
">

    <h1 style="margin-bottom:25px; font-size:28px; font-weight:700;">
        Tambah Stok Produk
    </h1>

    <form action="{{ route('stok.store') }}" method="POST">
        @csrf

        {{-- PRODUK --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; margin-bottom:6px; display:block;">Pilih Produk</label>

            <select name="product_id" required
                style="
                    width:100%; padding:12px; border:1px solid #d1d5db;
                    border-radius:8px; font-size:15px; background:white;
                ">
                <option value="">-- Pilih Produk --</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- JUMLAH --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; margin-bottom:6px; display:block;">
                Jumlah Stok
            </label>

            <input type="number" name="jumlah" required
                style="
                    width:100%; padding:12px; border:1px solid #d1d5db;
                    border-radius:8px; font-size:15px;
                "
                placeholder="Masukkan jumlah stok">
        </div>

        {{-- BUTTONS --}}
        <div style="display:flex; gap:10px; margin-top:10px;">
            <button type="submit"
                style="
                    padding:12px 22px; background:#3b82f6; border:none;
                    border-radius:10px; color:white; font-weight:600; cursor:pointer;
                ">
                Simpan
            </button>

            <a href="{{ route('stok.index') }}"
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
