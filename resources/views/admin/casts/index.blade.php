@extends('admin.layout')
@section('title', 'Kelola Cast')
@section('content')
<h2>Kelola Cast</h2>
<a href="{{ route('admin.casts.create') }}" class="btn btn-primary" style="margin-bottom:15px;">Tambah Cast</a>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Nama</th><th>Umur</th><th>Bio</th><th>Aksi</th></tr></thead>
    <tbody>
    @forelse($casts as $cast)
        <tr>
            <td>{{ $cast->id }}</td>
            <td>{{ $cast->name }}</td>
            <td>{{ $cast->age }}</td>
            <td>{{ Str::limit($cast->bio, 50) }}</td>
            <td>
                <a href="{{ route('admin.casts.edit', $cast) }}" class="btn btn-warning btn-xs">Edit</a>
                <form action="{{ route('admin.casts.destroy', $cast) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus cast ini? Semua peran terkait akan ikut terhapus.')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-xs">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr><td colspan="5" class="text-center">Tidak ada data.</td></tr>
    @endforelse
    </tbody>
</table>
</div>
{{ $casts->links() }}
@endsection
