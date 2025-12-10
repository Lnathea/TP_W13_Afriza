@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="card" style="padding:25px; border-radius:12px;">

    <h1 style="margin-bottom:20px;">Daftar Produk</h1>

    <a href="{{ route('products.create') }}"
        style="display:inline-block; margin-bottom:20px; padding:10px 20px;
               background:#3b82f6; color:white; border-radius:8px; text-decoration:none;">
        + Tambah Produk
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
                <th style="padding:12px;">ID</th>
                <th style="padding:12px;">Nama</th>
                <th style="padding:12px;">Harga</th>
                <th style="padding:12px;">Toko</th>
                <th style="padding:12px;">Stok</th>
                <th style="padding:12px; text-align:center;">Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse($products as $p)
            <tr style="border-bottom:1px solid #ddd;">
                
                {{-- ID Produk --}}
                <td style="padding:12px; text-align:center;">
                    {{ $p->id }}
                </td>

                {{-- Nama Produk --}}
                <td style="padding:12px;">{{ $p->name }}</td>

                {{-- Harga --}}
                <td style="padding:12px;">
                    Rp {{ number_format($p->price, 0, ',', '.') }}
                </td>

                {{-- Toko --}}
                <td style="padding:12px;">
                    {{ $p->toko->nama_toko ?? 'Tidak ada' }}
                </td>

                {{-- Stok --}}
                <td style="padding:12px; font-weight:bold; text-align:center;">
                    {{ $p->stok->jumlah ?? 0 }}
                </td>

                {{-- Aksi --}}
                <td style="padding:12px; text-align:center;">

                    <a href="{{ route('products.edit', $p->id) }}"
                        style="padding:6px 14px; background:#f59e0b; color:white; 
                               border-radius:6px; text-decoration:none; margin-right:6px;">
                        Edit
                    </a>

                    <form action="{{ route('products.destroy', $p->id) }}"
                          method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                onclick="return confirm('Hapus produk ini?')"
                                style="padding:6px 14px; background:#ef4444; color:white;
                                       border:none; border-radius:6px;">
                            Hapus
                        </button>
                    </form>

                </td>

            </tr>

        @empty
            <tr>
                <td colspan="6" style="padding:20px; text-align:center; color:#6b7280;">
                    Belum ada produk tersedia.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>
@endsection
