@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title mb-4 text-center">Registrieren</h3>

                <!-- Validation Errors -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Name</label>
                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Passwort</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Passwort bestätigen</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">Registrieren</button>
                    </div>

                    <p class="mt-3 text-center">
                        Bereits registriert? <a href="{{ route('login') }}">Hier einloggen</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
