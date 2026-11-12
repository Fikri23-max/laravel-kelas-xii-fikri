<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Genre, Film};
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::orderByDesc('id')->paginate(10);
        return view('admin.genres.index', compact('genres'));
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
        ]);

        Genre::create($validated);

        return redirect()->route('admin.genres.index')->with('success', 'Genre berhasil ditambahkan.');
    }

    public function show(Genre $genre)
    {
        return view('admin.genres.show', compact('genre'));
    }

    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }

    public function update(Request $request, Genre $genre)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
        ]);

        $genre->update($validated);

        return redirect()->route('admin.genres.index')->with('success', 'Genre berhasil diperbarui.');
    }

    public function destroy(Genre $genre)
    {
        if (Film::where('genre_id', $genre->id)->exists()) {
            return redirect()->route('admin.genres.index')->with('error', 'Genre tidak bisa dihapus karena masih digunakan oleh film.');
        }

        $genre->delete();

        return redirect()->route('admin.genres.index')->with('success', 'Genre berhasil dihapus.');
    }
}
