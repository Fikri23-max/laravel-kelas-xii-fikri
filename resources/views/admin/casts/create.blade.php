@extends('admin.layout')
@section('title', 'Tambah Cast')
@section('content')
<h2>Tambah Cast</h2>
@if($errors->any())
<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif
<form action="{{ route('admin.casts.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" maxlength="45" required>
    </div>
    <div class="form-group">
        <label>Umur</label>
        <input type="number" name="age" class="form-control" value="{{ old('age') }}" required>
    </div>
    <div class="form-group">
        <label>Bio</label>
        <textarea name="bio" class="form-control" rows="4" required>{{ old('bio') }}</textarea>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.casts.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
