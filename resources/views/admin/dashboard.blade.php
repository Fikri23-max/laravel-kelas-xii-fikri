@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')
<h2>Dashboard</h2>
<div class="row">
    <div class="col-md-4 col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading">Film</div>
            <div class="panel-body"><h3>{{ $counts['films'] }}</h3></div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="panel panel-success">
            <div class="panel-heading">Cast</div>
            <div class="panel-body"><h3>{{ $counts['casts'] }}</h3></div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">Genre</div>
            <div class="panel-body"><h3>{{ $counts['genres'] }}</h3></div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="panel panel-warning">
            <div class="panel-heading">Peran</div>
            <div class="panel-body"><h3>{{ $counts['perans'] }}</h3></div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="panel panel-danger">
            <div class="panel-heading">Komentar</div>
            <div class="panel-body"><h3>{{ $counts['kritiks'] }}</h3></div>
        </div>
    </div>
    <div class="col-md-4 col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">User</div>
            <div class="panel-body"><h3>{{ $counts['users'] }}</h3></div>
        </div>
    </div>
</div>
@endsection
