@extends('layouts.app')

@section('title', 'Manajemen Toko')

@section('content')
<div class="card" style="padding:25px; border-radius:12px;">
    <h1 style="margin-bottom:20px;">Manajemen Toko</h1>

    <a href="{{ route('toko.create') }}" 
       style="display:inline-block; margin-bottom:20px; padding:10px 20px; background:#3b82f6; color:white; border-radius:8px; text-decoration:none;">
       + Tambah Toko
    </a>

    <table style="width:100%; border-collapse: collapse;">
    <thead>
        <tr style="background:#222325;">
            <th style="padding:12px;">ID</th>
            <th style="padding:12px;">Nama Toko</th>
            <th style="padding:12px;">Alamat</th>
            <th style="padding:12px;">Pemilik</th>
            <th style="padding:12px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($toko as $item)
        <tr>
            <td style="padding:12px;">{{ $item->id }}</td>
            <td style="padding:12px;">{{ $item->nama_toko }}</td>
            <td style="padding:12px;">{{ $item->alamat }}</td>
            <td style="padding:12px;">{{ $item->pemilik }}</td>
            <td style="padding:12px;">
                <a href="{{ route('toko.edit', $item->id) }}" 
                   style="padding:6px 14px; background:#f59e0b; color:white; border-radius:6px; text-decoration:none; margin-right:6px;">
                    Edit
                </a>

                <form action="{{ route('toko.destroy', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        onclick="return confirm('Yakin ingin menghapus?')"
                        style="padding:6px 14px; background:#ef4444; color:white; border:none; border-radius:6px;">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
