<div class="header">
  <div class="container">
    <div class="w3layouts_logo">
      <a href="{{ route('home') }}"><h1>One<span>Movies</span></h1></a>
    </div>
    <div class="w3_search">
      <form action="{{ route('movies') }}" method="get">
        <input type="text" name="q" placeholder="Search" value="{{ request('q') }}" required="" aria-label="Cari film">
        <input type="submit" value="Go">
      </form>
    </div>
    <div class="w3l_sign_in_register">
      <ul>
        @guest
          <li><a href="#" data-toggle="modal" data-target="#myModal">Login</a></li>
        @else
          <li><i class="fa fa-user"></i> {{ Auth::user()->name }}</li>
          @if(Auth::user()->isAdmin())
            <li><a href="{{ route('admin.dashboard') }}" style="color: #fff; display: inline-block; text-transform: uppercase; text-decoration: none; background: #212121; text-align: center; padding: 6px 15px; font-weight: bold; transition: .5s ease-in;">Dashboard</a></li>
          @endif
          <li>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit" style="color: #fff; display: inline-block; text-transform: uppercase; text-decoration: none; background: #FF8D1B; text-align: center; padding: 6px 20px; font-weight: bold; border: none; outline: none; cursor: pointer; transition: .5s ease-in;" onmouseover="this.style.background='#212121'" onmouseout="this.style.background='#FF8D1B'">Logout</button>
            </form>
          </li>
        @endguest
      </ul>
    </div>
    <div class="clearfix"> </div>
  </div>
</div>
@if (session('subscribe_success') || (isset($errors) && $errors->subscribe->any()))
  <div class="container" style="margin-top: 15px;">
    @if (session('subscribe_success'))
      <div class="alert alert-success alert-dismissible auto-dismiss-alert" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ session('subscribe_success') }}
      </div>
    @endif
    @if (isset($errors) && $errors->subscribe->any())
      <div class="alert alert-danger alert-dismissible auto-dismiss-alert" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <ul style="margin: 0; padding-left: 15px;">
          @foreach ($errors->subscribe->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      setTimeout(function() {
        var alerts = document.querySelectorAll('.auto-dismiss-alert');
        alerts.forEach(function(alert) {
          if (typeof jQuery !== 'undefined') {
            $(alert).fadeOut(500, function() { $(this).remove(); });
          } else {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(function() { alert.remove(); }, 500);
          }
        });
      }, 4000);
    });
  </script>
@endif