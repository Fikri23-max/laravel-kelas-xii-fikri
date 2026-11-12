@extends('admin.layout')
@section('title', 'Edit Peran')
@section('content')
<h2>Edit Peran</h2>
@if($errors->any())
<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif
<form action="{{ route('admin.perans.update', $peran) }}" method="POST">
    @csrf @method('PUT')
    <div class="form-group">
        <label>Nama Karakter</label>
        <input type="text" name="actor" class="form-control" value="{{ old('actor', $peran->actor) }}" required>
    </div>
    <div class="form-group">
        <label>Film</label>
        <select name="film_id" class="form-control" required>
            <option value="">-- Pilih Film --</option>
            @foreach($films as $film)
                <option value="{{ $film->id }}" {{ old('film_id', $peran->film_id) == $film->id ? 'selected' : '' }}>{{ $film->title }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Cast</label>
        <select name="cast_id" class="form-control" required>
            <option value="">-- Pilih Cast --</option>
            @foreach($casts as $cast)
                <option value="{{ $cast->id }}" {{ old('cast_id', $peran->cast_id) == $cast->id ? 'selected' : '' }}>{{ $cast->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.perans.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
