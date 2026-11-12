@extends('admin.layout')
@section('title', 'Detail User')
@section('content')
<h2>Detail User: {{ $user->name }}</h2>
<table class="table table-bordered">
    <tr><th width="150">Nama</th><td>{{ $user->name }}</td></tr>
    <tr><th>Email</th><td>{{ $user->email }}</td></tr>
    <tr><th>Role</th><td>{{ $user->role->name ?? '-' }}</td></tr>
</table>
<a href="{{ route('admin.users.index') }}" class="btn btn-default">Kembali</a>
@endsection
