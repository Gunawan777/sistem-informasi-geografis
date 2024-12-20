@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Informasi Wisata</h1>

    <style>
        .card img {
            width: 100%;
            height: 200px; 
            object-fit: cover;
        }
    </style>

    <!-- Kontainer untuk informasi tempat wisata -->
    <div id="infos-info" class="mt-4 row">
    @foreach($touristInfo as $info)
        <div class="col-md-4 mb-3"> <!-- Menggunakan grid Bootstrap untuk kolom -->
            <div class="card">
                @if($info->image)
                    <img src="{{ asset('storage/' . $info->image) }}" class="card-img-top" alt="{{ $info->name }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $info->place->name }}</h5>
                    <p class="card-text text-end"><strong>Buka:</strong> {{  $info->opening_hours }}</p>
                    <p class="card-text text-end"><strong>Tutup:</strong> {{ $info->closing_hours }}</p>
                    <p class="card-text">{{  $info->informasi }}</p>
                    <a href="{{ route('tourist_info.show', $info) }}" class="btn btn-info btn-sm">Lihat</a>
                    <p class="card-text"><small class="text-muted">Terakhir diperbarui {{ $info->updated_at->diffForHumans() }}</small></p>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-4 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-2">
                <p class="mb-0">  {{ date('Y') }} NIM 221240001275.</p>
            </div>
            <div class="col-md-6 mb-2">
                <p class="mb-0">
                    <a href="{{ route('map.index') }}" class="text-white">Kontak Kami</a> | 
                    <a href="{{ route('map.index') }}" class="text-white">Tentang Kami</a>
                </p>
            </div>
        </div>
    </div>
</footer>
@endsection