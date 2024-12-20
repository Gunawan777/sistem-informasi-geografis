@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Selamat Datang di Home</h1>

    <style>
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover; 
        }
    </style>

    <!-- Kontainer untuk informasi tempat wisata -->
    <div id="places-info" class="mt-4 row">
        @foreach($places as $place)
            <div class="col-md-4 mb-3">
                <div class="card">
                    @if($place->image)
                        <img src="{{ asset('storage/' . $place->image) }}" class="card-img-top" alt="{{ $place->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $place->name }}</h5>
                        <p class="card-text">{{ $place->description }}</p>
                        <a href="{{ route('places.show', $place) }}" class="btn btn-info btn-sm">Lihat</a>
                        <p class="card-text"><small class="text-muted">Terakhir diperbarui {{ $place->updated_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-4 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-2">
                <p class="mb-0">© {{ date('Y') }} NIM 221240001275.</p>
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