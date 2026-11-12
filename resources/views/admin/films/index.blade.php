@extends('admin.layout')
@section('title', 'Kelola Film')
@section('content')
<h2>Kelola Film</h2>
<a href="{{ route('admin.films.create') }}" class="btn btn-primary" style="margin-bottom:15px;">Tambah Film</a>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Poster</th><th>Judul</th><th>Tahun</th><th>Genre</th><th>Aksi</th></tr></thead>
    <tbody>
    @forelse($films as $film)
        <tr>
            <td>{{ $film->id }}</td>
            <td><img src="/{{ $film->poster }}" alt="" width="60"></td>
            <td>{{ $film->title }}</td>
            <td>{{ $film->year }}</td>
            <td>{{ $film->genre->name ?? '-' }}</td>
            <td>
                <a href="{{ route('admin.films.edit', $film) }}" class="btn btn-warning btn-xs">Edit</a>
                <form action="{{ route('admin.films.destroy', $film) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus film ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-xs">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="6" class="text-center">Tidak ada data.</td></tr>
    @endforelse
    </tbody>
</table>
</div>
{{ $films->links() }}
@endsection
