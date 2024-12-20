@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Informasi Wisata</h1>

    <form action="{{ route('tourist_info.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="place_id">Tempat Wisata</label>
            <select name="place_id" id="place_id" class="form-control" required>
                <option value="">Pilih Tempat</option>
                @foreach($places as $place)
                    <option value="{{ $place->id }}">{{ $place->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="opening_hours">Jam Buka</label>
            <input type="text" name="opening_hours" id="opening_hours" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="closing_hours">Jam Tutup</label>
            <input type="text" name="closing_hours" id="closing_hours" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="informasi">Informasi</label>
            <textarea name="informasi" id="informasi" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="image">Gambar</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection