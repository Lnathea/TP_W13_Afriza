@extends('layouts.app')

@section('title', 'Manajemen Stok')

@section('content')
<div class="card" style="padding:25px; border-radius:12px;">

    <h1 style="margin-bottom:20px;">Manajemen Stok</h1>

    <a href="{{ route('stok.create') }}"
       style="display:inline-block; margin-bottom:20px; padding:10px 20px; 
              background:#3b82f6; color:white; border-radius:8px; text-decoration:none;">
       + Tambah Stok
    </a>

    @if(session('success'))
        <div style="padding:12px; background:#d1fae5; border-left:5px solid #10b981; 
                    margin-bottom:20px; border-radius:6px; color:#065f46;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width:100%; border-collapse: collapse;">
        <thead>
            <tr style="background:#222325;">
                <th style="padding:12px;">Nama Produk</th>
                <th style="padding:12px;">Toko (Lokasi)</th>
                <th style="padding:12px;">Jumlah Stok</th>
                <th style="padding:12px;">Terakhir Update</th>
                <th style="padding:12px; text-align:center;">Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse($stoks as $stok)
            <tr style="border-bottom:1px solid #ddd;">
                <td style="padding:12px;">
                    {{ $stok->product->name ?? 'Produk tidak ditemukan' }}
                </td>

                {{-- KOLOM BARU UNTUK TOKO --}}
                <td style="padding:12px;">
                    {{ $stok->product->toko->nama_toko ?? 'Toko tidak ditemukan' }}
                </td>
                
                <td style="padding:12px; font-weight:bold; text-align:center;">
                    {{ $stok->jumlah }}
                </td>

                <td style="padding:12px;">
                    {{ $stok->updated_at->format('d-m-Y H:i') }}
                </td>

                <td style="padding:12px; text-align:center;">
                    {{-- Tombol Aksi --}}
                    <a href="{{ route('stok.edit', $stok->id) }}"
                        style="padding:6px 14px; background:#f59e0b; color:white; 
                                 border-radius:6px; text-decoration:none; margin-right:6px;">
                        Edit
                    </a>

                    <form action="{{ route('stok.destroy', $stok->id) }}"
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                            onclick="return confirm('Hapus stok ini?')"
                            style="padding:6px 14px; background:#ef4444; color:white; 
                                   border:none; border-radius:6px;">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="padding:20px; text-align:center; color:#6b7280;">
                    Belum ada data stok.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>
@endsection
