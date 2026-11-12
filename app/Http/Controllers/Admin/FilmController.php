<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Film, Genre, Kritik, Peran};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with('genre')->orderByDesc('id')->paginate(10);
        return view('admin.films.index', compact('films'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('admin.films.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'sinopsis' => ['required', 'string'],
            'year' => ['required', 'integer', 'min:1900', 'max:2100'],
            'genre_id' => ['required', 'exists:genres,id'],
            'poster' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $path = $request->file('poster')->store('images', 'public');
        $validated['poster'] = 'storage/' . $path;

        Film::create($validated);

        return redirect()->route('admin.films.index')->with('success', 'Film berhasil ditambahkan.');
    }

    public function show(Film $film)
    {
        $film->load('genre', 'perans.cast');
        return view('admin.films.show', compact('film'));
    }

    public function edit(Film $film)
    {
        $genres = Genre::all();
        return view('admin.films.edit', compact('film', 'genres'));
    }

    public function update(Request $request, Film $film)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'sinopsis' => ['required', 'string'],
            'year' => ['required', 'integer', 'min:1900', 'max:2100'],
            'genre_id' => ['required', 'exists:genres,id'],
            'poster' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('poster')) {
            // Delete old poster if it's an uploaded file (starts with storage/images/)
            if ($film->poster && str_starts_with($film->poster, 'storage/')) {
                $oldPath = str_replace('storage/', '', $film->poster);
                Storage::disk('public')->delete($oldPath);
            }
            $path = $request->file('poster')->store('images', 'public');
            $validated['poster'] = 'storage/' . $path;
        } else {
            unset($validated['poster']);
        }

        $film->update($validated);

        return redirect()->route('admin.films.index')->with('success', 'Film berhasil diperbarui.');
    }

    public function destroy(Film $film)
    {
        DB::transaction(function () use ($film) {
            Peran::where('film_id', $film->id)->delete();
            Kritik::where('film_id', $film->id)->delete();
            $film->delete();
        });

        return redirect()->route('admin.films.index')->with('success', 'Film berhasil dihapus.');
    }
}
