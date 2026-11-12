@extends('admin.layout')
@section('title', 'Detail Peran')
@section('content')
<h2>Detail Peran</h2>
<table class="table table-bordered">
    <tr><th width="150">Nama Karakter</th><td>{{ $peran->actor }}</td></tr>
    <tr><th>Film</th><td>{{ $peran->film->title ?? '-' }}</td></tr>
    <tr><th>Cast</th><td>{{ $peran->cast->name ?? '-' }}</td></tr>
</table>
<a href="{{ route('admin.perans.index') }}" class="btn btn-default">Kembali</a>
@endsection
