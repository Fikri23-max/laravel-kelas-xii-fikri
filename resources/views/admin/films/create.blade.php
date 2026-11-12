@extends('admin.layout')
@section('title', 'Tambah Film')
@section('content')
<h2>Tambah Film</h2>
@if($errors->any())
<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif
<form action="{{ route('admin.films.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Judul</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
    </div>
    <div class="form-group">
        <label>Sinopsis</label>
        <textarea name="sinopsis" class="form-control" rows="4" required>{{ old('sinopsis') }}</textarea>
    </div>
    <div class="form-group">
        <label>Tahun</label>
        <input type="number" name="year" class="form-control" value="{{ old('year') }}" required>
    </div>
    <div class="form-group">
        <label>Genre</label>
        <select name="genre_id" class="form-control" required>
            <option value="">-- Pilih Genre --</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Poster</label>
        <input type="file" name="poster" class="form-control" accept="image/jpeg,image/png,image/webp" required>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.films.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
