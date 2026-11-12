@extends('admin.layout')
@section('title', 'Edit User')
@section('content')
<h2>Edit User: {{ $user->name }}</h2>
@if($errors->any())
<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif
<form action="{{ route('admin.users.update', $user) }}" method="POST">
    @csrf @method('PUT')
    <div class="form-group">
        <label>Nama</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
    </div>
    <div class="form-group">
        <label>Password (kosongkan jika tidak diubah)</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="form-group">
        <label>Role</label>
        <select name="role_id" class="form-control" required>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
