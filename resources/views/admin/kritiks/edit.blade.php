@extends('admin.layout')
@section('title', 'Edit Komentar')
@section('content')
<h2>Edit Komentar</h2>
@if($errors->any())
<div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
@endif
<div class="well">
    <p><strong>User:</strong> {{ $kritik->user->name ?? '-' }}</p>
    <p><strong>Film:</strong> {{ $kritik->film->title ?? '-' }}</p>
</div>
<form action="{{ route('admin.kritiks.update', $kritik) }}" method="POST">
    @csrf @method('PUT')
    <div class="form-group">
        <label>Komentar</label>
        <textarea name="comment" class="form-control" rows="4" maxlength="500" required>{{ old('comment', $kritik->comment) }}</textarea>
    </div>
    <div class="form-group">
        <label>Rating</label>
        <select name="rating" class="form-control" required>
            @for($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}" {{ old('rating', $kritik->rating) == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.kritiks.index') }}" class="btn btn-default">Batal</a>
</form>
@endsection
