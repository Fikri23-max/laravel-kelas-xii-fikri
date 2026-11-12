@extends('admin.layout')
@section('title', 'Tambah Genre')
@section('content')
<h2>Tambah Genre</h2>
@if($errors->any())
<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif
<form action="{{ route('admin.genres.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Nama Genre</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.genres.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
