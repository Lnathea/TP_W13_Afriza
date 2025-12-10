@extends('layouts.app')

@section('title', 'Edit Toko')

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
        Edit Toko
    </h1>

    <form action="{{ route('toko.update', $toko->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- NAMA TOKO --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; display:block; margin-bottom:6px;">
                Nama Toko
            </label>

            <input type="text" name="nama_toko" value="{{ $toko->nama_toko }}" required
                style="
                    width:100%; padding:12px; font-size:15px;
                    border:1px solid #d1d5db; border-radius:10px;
                ">
        </div>

        {{-- ALAMAT --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; display:block; margin-bottom:6px;">
                Alamat Toko
            </label>

            <input type="text" name="alamat" value="{{ $toko->alamat }}" required
                style="
                    width:100%; padding:12px; font-size:15px;
                    border:1px solid #d1d5db; border-radius:10px;
                ">
        </div>

        {{-- PEMILIK --}}
        <div style="margin-bottom:18px;">
            <label style="font-weight:600; display:block; margin-bottom:6px;">
                Pemilik Toko
            </label>

            <input type="text" name="pemilik" value="{{ $toko->pemilik }}" required
                style="
                    width:100%; padding:12px; font-size:15px;
                    border:1px solid #d1d5db; border-radius:10px;
                ">
        </div>

        <div style="display:flex; gap:12px; margin-top:10px;">
            <button type="submit"
                style="
                    padding:12px 20px; background:#3b82f6; color:white;
                    border:none; border-radius:10px; font-weight:600;
                    cursor:pointer;
                ">
                Update Toko
            </button>

            <a href="{{ route('toko.index') }}"
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
