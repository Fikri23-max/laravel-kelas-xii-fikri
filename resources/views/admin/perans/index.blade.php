@extends('admin.layout')
@section('title', 'Kelola Peran')
@section('content')
<h2>Kelola Peran</h2>
<a href="{{ route('admin.perans.create') }}" class="btn btn-primary" style="margin-bottom:15px;">Tambah Peran</a>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Nama Karakter</th><th>Film</th><th>Cast</th><th>Aksi</th></tr></thead>
    <tbody>
    @forelse($perans as $peran)
        <tr>
            <td>{{ $peran->id }}</td>
            <td>{{ $peran->actor }}</td>
            <td>{{ $peran->film->title ?? '-' }}</td>
            <td>{{ $peran->cast->name ?? '-' }}</td>
            <td>
                <a href="{{ route('admin.perans.edit', $peran) }}" class="btn btn-warning btn-xs">Edit</a>
                <form action="{{ route('admin.perans.destroy', $peran) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus peran ini?')">
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
{{ $perans->links() }}
@endsection
