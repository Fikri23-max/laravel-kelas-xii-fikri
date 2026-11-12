@extends('admin.layout')
@section('title', 'Detail Film')
@section('content')
<h2>Detail Film: {{ $film->title }}</h2>
<table class="table table-bordered">
    <tr><th width="150">Judul</th><td>{{ $film->title }}</td></tr>
    <tr><th>Sinopsis</th><td>{{ $film->sinopsis }}</td></tr>
    <tr><th>Tahun</th><td>{{ $film->year }}</td></tr>
    <tr><th>Genre</th><td>{{ $film->genre->name ?? '-' }}</td></tr>
    <tr><th>Poster</th><td><img src="/{{ $film->poster }}" alt="" width="150"></td></tr>
</table>
<a href="{{ route('admin.films.index') }}" class="btn btn-default">Kembali</a>
@endsection
