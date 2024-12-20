@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="">Tambah Lokasi Wisata</h1>
        <a href="{{ route('places.create') }}" class="btn btn-primary">Tambah Wisata</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel daftar tempat wisata -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($places as $place)
                <tr>
                    <td>{{ $place->name }}</td>
                    <td>{{ $place->description }}</td>
                    <td>{{ $place->latitude }}</td>
                    <td>{{ $place->longitude }}</td>
                    <td>
                        @if($place->image)
                            <img src="{{ asset('storage/' . $place->image) }}" alt="{{ $place->name }}" width="100">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('places.show', $place) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('places.edit', $place) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('places.destroy', $place) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection