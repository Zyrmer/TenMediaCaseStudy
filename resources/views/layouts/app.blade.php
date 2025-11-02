<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>JobPortal</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="font-sans antialiased bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('start') }}">JobPortal</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    @auth
                        <li><a class="nav-link" href="{{ route('images.index') }}">Konzepte</a></li>
                        <li><a class="nav-link" href="{{ route('jobs.index') }}">Jobs</a></li>
                        <li><a class="nav-link" href="{{ route('companies.index') }}">Unternehmen</a></li>
                        <li><a class="nav-link" href="{{ route('categories.index') }}">Kategorien</a></li>
                        <li><a class="nav-link" href="{{ route('users.index') }}">User</a></li>
                    @endauth
                </ul>

                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrieren</a></li>
                    @else
                        <li class="nav-item me-3 text-light">
                            Hallo, {{ auth()->user()->username }}
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
        </div>
    </nav>

    <div class="container">
        <main>
             @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
