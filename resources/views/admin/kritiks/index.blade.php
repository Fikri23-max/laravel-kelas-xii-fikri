@extends('admin.layout')
@section('title', 'Kelola Komentar')
@section('content')
<h2>Kelola Komentar</h2>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>User</th><th>Film</th><th>Komentar</th><th>Rating</th><th>Aksi</th></tr></thead>
    <tbody>
    @forelse($kritiks as $kritik)
        <tr>
            <td>{{ $kritik->id }}</td>
            <td>{{ $kritik->user->name ?? '-' }}</td>
            <td>{{ $kritik->film->title ?? '-' }}</td>
            <td>{{ Str::limit($kritik->comment, 50) }}</td>
            <td>{{ $kritik->rating }}</td>
            <td>
                <a href="{{ route('admin.kritiks.edit', $kritik) }}" class="btn btn-warning btn-xs">Edit</a>
                <form action="{{ route('admin.kritiks.destroy', $kritik) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus komentar ini?')">
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
{{ $kritiks->links() }}
@endsection
