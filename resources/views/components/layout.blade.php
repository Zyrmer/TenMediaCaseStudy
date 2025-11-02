{{-- <!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

    </head>

    <body class="antialiased">
        {{ $slot }}
    </body>

</html> --}}

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Jobverwaltung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('jobs.index') }}">JobPortal</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li><a class="nav-link" href="{{ route('jobs.index') }}">Jobs</a></li>
                <li><a class="nav-link" href="{{ route('companies.index') }}">Unternehmen</a></li>
                <li><a class="nav-link" href="{{ route('categories.index') }}">Kategorien</a></li>
            </ul>
             <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item me-3">
                        <span class="text-light">Hallo, {{ auth()->user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-sm btn-outline-light">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrieren</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>

