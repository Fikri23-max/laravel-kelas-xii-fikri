@extends('admin.layout')
@section('title', 'Edit Cast')
@section('content')
<h2>Edit Cast: {{ $cast->name }}</h2>
@if($errors->any())
<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif
<form action="{{ route('admin.casts.update', $cast) }}" method="POST">
    @csrf @method('PUT')
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $cast->name) }}" maxlength="45" required>
    </div>
    <div class="form-group">
        <label>Umur</label>
        <input type="number" name="age" class="form-control" value="{{ old('age', $cast->age) }}" required>
    </div>
    <div class="form-group">
        <label>Bio</label>
        <textarea name="bio" class="form-control" rows="4" required>{{ old('bio', $cast->bio) }}</textarea>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.casts.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
