<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Film, Cast, Genre, Peran, Kritik, User};

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'films' => Film::count(),
            'casts' => Cast::count(),
            'genres' => Genre::count(),
            'perans' => Peran::count(),
            'kritiks' => Kritik::count(),
            'users' => User::count(),
        ];
        return view('admin.dashboard', compact('counts'));
    }
}
