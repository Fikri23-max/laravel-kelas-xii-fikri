@extends('admin.layout')
@section('title', 'Detail Genre')
@section('content')
<h2>Detail Genre: {{ $genre->name }}</h2>
<table class="table table-bordered">
    <tr><th width="150">Nama</th><td>{{ $genre->name }}</td></tr>
</table>
<a href="{{ route('admin.genres.index') }}" class="btn btn-default">Kembali</a>
@endsection
