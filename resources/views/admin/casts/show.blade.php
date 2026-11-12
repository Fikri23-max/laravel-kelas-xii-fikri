@extends('admin.layout')
@section('title', 'Detail Cast')
@section('content')
<h2>Detail Cast: {{ $cast->name }}</h2>
<table class="table table-bordered">
    <tr><th width="150">Nama</th><td>{{ $cast->name }}</td></tr>
    <tr><th>Umur</th><td>{{ $cast->age }}</td></tr>
    <tr><th>Bio</th><td>{{ $cast->bio }}</td></tr>
</table>
<a href="{{ route('admin.casts.index') }}" class="btn btn-default">Kembali</a>
@endsection
