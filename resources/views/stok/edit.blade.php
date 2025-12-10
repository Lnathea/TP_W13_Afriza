@extends('layouts.app')

@section('title', 'Edit Stok')

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
        Edit Stok Produk
    </h1>

    <form action="{{ route('stok.update', $stok->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- PRODUK --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; display:block; margin-bottom:6px;">
                Pilih Produk
            </label>

            <select name="product_id" required
                style="
                    width:100%; padding:12px; font-size:15px;
                    border:1px solid #d1d5db; border-radius:10px;
                    background:white;
                ">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}"
                        {{ $product->id == $stok->product_id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- JUMLAH --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; display:block; margin-bottom:6px;">
                Jumlah Stok
            </label>

            <input type="number" name="jumlah" value="{{ $stok->jumlah }}" required
                style="
                    width:100%; padding:12px; font-size:15px;
                    border:1px solid #d1d5db; border-radius:10px;
                ">
        </div>

        {{-- INFORMASI --}}
        <p style="font-size:14px; color:#6b7280; margin-bottom:20px;">
            <i>Pastikan jumlah stok sesuai dengan kondisi barang saat ini.</i>
        </p>

        {{-- BUTTONS --}}
        <div style="display:flex; gap:12px; margin-top:10px;">
            <button type="submit"
                style="
                    padding:12px 20px; background:#3b82f6; color:white;
                    border:none; border-radius:10px; font-weight:600;
                    cursor:pointer;
                ">
                Update Stok
            </button>

            <a href="{{ route('stok.index') }}"
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
