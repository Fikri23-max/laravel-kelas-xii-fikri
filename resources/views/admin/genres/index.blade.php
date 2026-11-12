@extends('admin.layout')
@section('title', 'Kelola Genre')
@section('content')
<h2>Kelola Genre</h2>
<a href="{{ route('admin.genres.create') }}" class="btn btn-primary" style="margin-bottom:15px;">Tambah Genre</a>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Nama</th><th>Aksi</th></tr></thead>
    <tbody>
    @forelse($genres as $genre)
        <tr>
            <td>{{ $genre->id }}</td>
            <td>{{ $genre->name }}</td>
            <td>
                <a href="{{ route('admin.genres.edit', $genre) }}" class="btn btn-warning btn-xs">Edit</a>
                <form action="{{ route('admin.genres.destroy', $genre) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus genre ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-xs">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="3" class="text-center">Tidak ada data.</td></tr>
    @endforelse
    </tbody>
</table>
</div>
{{ $genres->links() }}
@endsection
