<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body { padding-top: 50px; }
        .sidebar { position: fixed; top: 51px; bottom: 0; left: 0; z-index: 1000; display: block; padding: 20px 0; overflow-x: hidden; overflow-y: auto; background-color: #222; width: 220px; }
        .sidebar .nav > li > a { color: #ccc; padding: 12px 20px; }
        .sidebar .nav > li > a:hover, .sidebar .nav > li > a:focus { color: #fff; background-color: #333; }
        .sidebar .nav > li.active > a { color: #fff; background-color: #ff8d1b; }
        .main-content { margin-left: 220px; padding: 20px; }
        .navbar-brand { color: #ff8d1b !important; font-weight: bold; }
        .navbar-inverse { background-color: #1a1a2e; border-color: #1a1a2e; }
        .btn-warning { background-color: #ff8d1b; border-color: #e07d15; }
    </style>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">OneMovies Admin</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('home') }}"><i class="glyphicon glyphicon-home"></i> Ke Situs</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-link navbar-btn" style="color:#ccc;">
                            <i class="glyphicon glyphicon-log-out"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="sidebar">
        <ul class="nav nav-pills nav-stacked">
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a>
            </li>
            <li class="{{ request()->routeIs('admin.films.*') ? 'active' : '' }}">
                <a href="{{ route('admin.films.index') }}"><i class="glyphicon glyphicon-film"></i> Film</a>
            </li>
            <li class="{{ request()->routeIs('admin.casts.*') ? 'active' : '' }}">
                <a href="{{ route('admin.casts.index') }}"><i class="glyphicon glyphicon-user"></i> Cast</a>
            </li>
            <li class="{{ request()->routeIs('admin.genres.*') ? 'active' : '' }}">
                <a href="{{ route('admin.genres.index') }}"><i class="glyphicon glyphicon-tags"></i> Genre</a>
            </li>
            <li class="{{ request()->routeIs('admin.perans.*') ? 'active' : '' }}">
                <a href="{{ route('admin.perans.index') }}"><i class="glyphicon glyphicon-star"></i> Peran</a>
            </li>
            <li class="{{ request()->routeIs('admin.kritiks.*') ? 'active' : '' }}">
                <a href="{{ route('admin.kritiks.index') }}"><i class="glyphicon glyphicon-comment"></i> Komentar</a>
            </li>
            <li class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}"><i class="glyphicon glyphicon-user"></i> User</a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
