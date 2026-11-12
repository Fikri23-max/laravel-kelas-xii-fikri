<?php

namespace App\Http\Controllers;

use App\Models\{
    Film,
    Genre,
    Kritik,
    Peran,
};
use App\Http\Requests\StoreFilmRequest;
use App\Http\Requests\UpdateFilmRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function movies(Request $request)
    {
        //
        $genreFilm = null;
        $request->validate([
            'q' => 'nullable|string|max:100',
        ]);
        $q = trim($request->input('q', ''));

        $query = Film::select('id','title', 'poster','year')
            ->withAvg('kritiks', 'rating');

        if ($q !== '') {
            $query->where('title', 'like', '%' . $q . '%');
        }

        $films = $query->orderByDesc('year')
                ->OrderBy('created_at', 'asc')
                ->paginate(18)
                ->withQueryString();

        return view('components/movies', compact('films', 'genreFilm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilmRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        //
        $film->loadAvg('kritiks', 'rating');

        $filmByGenre    = Film::select('id','title', 'poster','year', 'sinopsis')
                        ->withAvg('kritiks', 'rating')
                        ->where('genre_id', '=', $film->genre_id)
                        ->OrderBy('created_at', 'asc')
                        ->limit(7)
                        ->get();
        $filmByRelease  = Film::select('id','title', 'poster','year')
                        ->withAvg('kritiks', 'rating')
                        ->where('year', '=', Carbon::now()->format('Y'))
                        ->OrderBy('created_at', 'asc')
                        ->limit(9)
                        ->get();
        $comments        = Kritik::with('user:id,name')
                        ->select('id', 'comment', 'user_id', 'created_at')
                        ->where('film_id', '=', $film->id)
                        ->orderByDesc('created_at')
                        ->orderByDesc('id')
                        ->limit(10)
                        ->get();
        $perans         = Peran::with('cast')->where('film_id', '=', $film->id)->get();
        return view('components.movie-show', compact('film','filmByGenre','filmByRelease','comments', 'perans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFilmRequest $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        //
    }

    public function movieHome()
    {
        $films = Film::select('id','title', 'poster','year')
                ->withAvg('kritiks', 'rating')
                ->OrderBy('created_at', 'asc')
                ->limit(9)->get();
        $filmFutured = Film::select('id','title', 'poster','year')
                        ->withAvg('kritiks', 'rating')
                        ->orderByDesc('year')
                        ->OrderBy('created_at', 'asc')
                        ->limit(6)->get();
        $filmRecentAdded = Film::select('id','title', 'poster','year')
                            ->withAvg('kritiks', 'rating')
                            ->orderByDesc('created_at', 'asc')
                            ->limit(6)->get();
        $filmSlidey = Film::select('title', 'poster','sinopsis')
                        ->orderByDesc('year')
                        ->OrderBy('created_at', 'asc')
                        ->limit(6)->get();
        return view('components/home', compact('filmSlidey','films','filmFutured','filmRecentAdded'));
    }

    public function moviesByGenre($genre)
    {
        //
        $genreFilm = Genre::where('id', '=', $genre)->first();
        $films = Film::select('id','title', 'poster','year')
                ->withAvg('kritiks', 'rating')
                ->where('genre_id', '=', $genre)
                ->orderByDesc('year')
                ->OrderBy('created_at', 'asc')
                ->paginate(18);
        return view('components/movies', compact('films','genreFilm'));
    }

    public function moviesByGenreName(string $name)
    {
        $genreFilm = Genre::where('name', $name)->first();

        $query = Film::select('id','title', 'poster','year')
                ->withAvg('kritiks', 'rating');

        if ($genreFilm) {
            $query->where('genre_id', '=', $genreFilm->id);
        } else {
            $query->whereRaw('1 = 0');
        }

        $films = $query->orderByDesc('year')
                ->OrderBy('created_at', 'asc')
                ->paginate(18);

        return view('components/movies', compact('films', 'genreFilm'));
    }
}
