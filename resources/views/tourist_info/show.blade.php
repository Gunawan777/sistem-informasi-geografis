@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Detail Informasi Wisata</h1>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $touristInfo->place->name }}</h3>
            <p class="card-text"><strong>Jam Buka:</strong> {{ $touristInfo->opening_hours }}</p>
            <p class="card-text"><strong>Jam Tutup:</strong> {{ $touristInfo->closing_hours }}</p>
            <p class="card-text"><strong>Informasi:</strong> {{ $touristInfo->informasi }}</p>
            <div class="row">
                <div class="col-md-6">
                    @if($touristInfo->image)
                        <a href="{{ asset('storage/' . $touristInfo->image) }}" data-lightbox="tourist-info" data-title="{{ $touristInfo->place->name }}">
                            <img src="{{ asset('storage/' . $touristInfo->image) }}" alt="Image" class="img-fluid" style="max-width: 100%; height: auto;">
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