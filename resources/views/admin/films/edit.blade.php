@extends('admin.layout')
@section('title', 'Edit Film')
@section('content')
<h2>Edit Film: {{ $film->title }}</h2>
@if($errors->any())
<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif
<form action="{{ route('admin.films.update', $film) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" value="{{ old('title', $film->title) }}" required>
    </div>
    <div class="form-group">
        <label>Sinopsis</label>
        <textarea name="sinopsis" class="form-control" rows="4" required>{{ old('sinopsis', $film->sinopsis) }}</textarea>
    </div>
    <div class="form-group">
        <label>Tahun</label>
        <input type="number" name="year" class="form-control" value="{{ old('year', $film->year) }}" required>
    </div>
    <div class="form-group">
        <label>Genre</label>
        <select name="genre_id" class="form-control" required>
            <option value="">-- Pilih Genre --</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ old('genre_id', $film->genre_id) == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Poster (kosongkan jika tidak diubah)</label>
        @if($film->poster)
            <div style="margin-bottom:10px;"><img src="/{{ $film->poster }}" alt="" width="100"></div>
        @endif
        <input type="file" name="poster" class="form-control" accept="image/jpeg,image/png,image/webp">
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.films.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
