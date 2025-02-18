<!doctype html>
<html lang="en">
<head>
    <title>dashdash</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    @yield('style')
<style>
    textarea { resize: none; }

</style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand">dashdash</a>
        </div>
        <ul class="nav navbar-nav">
            <li ><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('dashboardChose') }}">Dashboard menu</a></li>
        </ul>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        <ul class="nav navbar-nav navbar-right">
            @auth
                <li> <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        Logout
                    </a></li>

                <li><a href="home"> {{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</a></li>
            @endauth
            @guest()
                <li><a href="{{ route('register') }}"> Sign Up</a></li>
                <li><a href="{{ route('login') }}"> Login</a></li>
            @endguest
        </ul>
    </div>
</nav>

@yield('main-content')
</body>
</html>


