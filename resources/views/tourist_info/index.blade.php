@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Informasi Wisata</h1>
    <a href="{{ route('tourist_info.create') }}" class="btn btn-primary mb-3">Tambah Informasi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nama Tempat</th>
                <th>Jam Buka</th>
                <th>Jam Tutup</th>
                <th>Informasi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($touristInfos as $info)
                <tr>
                    <td>{{ $info->place->name }}</td>
                    <td>{{ $info->opening_hours }}</td>
                    <td>{{ $info->closing_hours }}</td>
                    <td>{{ Str::limit($info->informasi, 50) }}</td>
                    <td>
                        @if($info->image)
                            <img src="{{ asset('storage/' . $info->image) }}" alt="Image" style="width: 100px;">
                        @else
                            <span>Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>
                            <a href="{{ route('tourist_info.show', $info->id) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('tourist_info.edit', $info->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('tourist_info.destroy', $info->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
