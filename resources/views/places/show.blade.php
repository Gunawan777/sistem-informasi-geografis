@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">{{ $place->name }}</h1>
    <div class="card">
        <div class="card-body">
            <p class="card-text">{{ $place->description }}</p>
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text"><strong>Latitude:</strong> {{ $place->latitude }}</p>
                    <p class="card-text"><strong>Longitude:</strong> {{ $place->longitude }}</p>
                </div>
                <div class="col-md-6 text-center">
                    @if($place->image)
                        <a href="{{ asset('storage/' . $place->image) }}" data-lightbox="place-image" data-title="{{ $place->name }}">
                            <img src="{{ asset('storage/' . $place->image) }}" alt="{{ $place->name }}" class="img-fluid" style="max-width: 100%; height: auto;">
                        </a>
                    @else
                        <p class="text-muted">Gambar tidak tersedia</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection