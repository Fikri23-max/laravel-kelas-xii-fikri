<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Cast, Peran};
use Illuminate\Http\Request;

class CastController extends Controller
{
    public function index()
    {
        $casts = Cast::orderByDesc('id')->paginate(10);
        return view('admin.casts.index', compact('casts'));
    }

    public function create()
    {
        return view('admin.casts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:45'],
            'age' => ['required', 'integer'],
            'bio' => ['required', 'string'],
        ]);

        Cast::create($validated);

        return redirect()->route('admin.casts.index')->with('success', 'Cast berhasil ditambahkan.');
    }

    public function show(Cast $cast)
    {
        return view('admin.casts.show', compact('cast'));
    }

    public function edit(Cast $cast)
    {
        return view('admin.casts.edit', compact('cast'));
    }

    public function update(Request $request, Cast $cast)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:45'],
            'age' => ['required', 'integer'],
            'bio' => ['required', 'string'],
        ]);

        $cast->update($validated);

        return redirect()->route('admin.casts.index')->with('success', 'Cast berhasil diperbarui.');
    }

    public function destroy(Cast $cast)
    {
        Peran::where('cast_id', $cast->id)->delete();
        $cast->delete();

        return redirect()->route('admin.casts.index')->with('success', 'Cast berhasil dihapus.');
    }
}
