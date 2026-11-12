@extends('admin.layout')
@section('title', 'Kelola User')
@section('content')
<h2>Kelola User</h2>
<a href="{{ route('admin.users.create') }}" class="btn btn-primary" style="margin-bottom:15px;">Tambah User</a>
<div class="table-responsive">
<table class="table table-bordered table-striped">
    <thead><tr><th>ID</th><th>Nama</th><th>Email</th><th>Role</th><th>Aksi</th></tr></thead>
    <tbody>
    @forelse($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name ?? '-' }}</td>
            <td>
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-xs">Edit</a>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus user ini?')">
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
{{ $users->links() }}
@endsection
