@extends('admin.layout')
@section('title', 'Tambah User')
@section('content')
<h2>Tambah User</h2>
@if($errors->any())
<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif
<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Role</label>
        <select name="role_id" class="form-control" required>
            <option value="">-- Pilih Role --</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
