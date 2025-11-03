<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>JobPortal - Auth</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('jobs.index') }}">JobPortal</a>
        <ul class="navbar-nav ms-auto">
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">Registrieren</a></li>
            @else
                <li class="nav-item me-3 text-light">
                    Hallo, {{ auth()->user()->name }}
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light">Logout</button>
                    </form>
                </li>
            @endguest
        </ul>

    </div>
</nav>

<div class="container" style="max-width: 500px;">
    @yield('content')
</div>

</body>
</html>