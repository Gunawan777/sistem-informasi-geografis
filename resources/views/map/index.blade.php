@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center" style="margin-top: -20px;">Maps Lokasi</h1> <!-- Ubah margin-top sesuai kebutuhan -->

    <!-- Kontainer untuk peta -->
    <div class="d-flex justify-content-center">
        <div class="card shadow-lg" style="width: 100%; max-width: 900px;">
            <div class="card-body">
                <div id="map" style="height: 470px; width: 100%;"></div> 
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
var map = L.map('map', {
        touchZoom: true,
    }).setView([-6.659766, 110.781708], 6); 

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        minZoom: 0, 
        attribution: '© OpenStreetMap'
    }).addTo(map);

    var bounds = L.latLngBounds();

    @foreach($places as $place)
        var marker = L.marker([{{ $place->latitude }}, {{ $place->longitude }}]).addTo(map);
        
        var popupContent = '<b>{{ $place->name }}</b><br>{{ $place->description }}';
        @if($place->image)
            popupContent += '<br><img src="{{ asset('storage/' . $place->image) }}" alt="{{ $place->name }}" style="width:100px; height:100px;">';
        @endif
        
        popupContent += '<br><a href="{{ route('places.show', $place->id) }}" class="btn btn-light btn-sm mt-2" style="text-align: center;">Lihat Detail</a>';
        
        marker.bindPopup(popupContent);
        
        bounds.extend(marker.getLatLng());
    @endforeach

    map.fitBounds(bounds);
</script>

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