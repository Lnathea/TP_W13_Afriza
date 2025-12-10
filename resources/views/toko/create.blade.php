@extends('layouts.app')

@section('title', 'Tambah Toko')

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
        Tambah Toko
    </h1>

    <form action="{{ route('toko.store') }}" method="POST">
        @csrf

        {{-- NAMA TOKO --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; margin-bottom:6px; display:block;">Nama Toko</label>
            <input type="text" name="nama_toko" required
                style="
                    width:100%; padding:12px; border:1px solid #d1d5db;
                    border-radius:8px; font-size:15px;
                "
                placeholder="Masukkan nama toko">
        </div>

        {{-- ALAMAT --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; margin-bottom:6px; display:block;">Alamat</label>
            <input type="text" name="alamat" required
                style="
                    width:100%; padding:12px; border:1px solid #d1d5db;
                    border-radius:8px; font-size:15px;
                "
                placeholder="Masukkan alamat toko">
        </div>

        {{-- PEMILIK --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; margin-bottom:6px; display:block;">Pemilik</label>
            <input type="text" name="pemilik" required
                style="
                    width:100%; padding:12px; border:1px solid #d1d5db;
                    border-radius:8px; font-size:15px;
                "
                placeholder="Nama pemilik toko">
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

            <a href="{{ route('toko.index') }}"
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
