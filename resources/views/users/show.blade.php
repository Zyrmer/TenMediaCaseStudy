
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Benutzerdetails</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>Username:</strong> {{ $user->username ?? '-' }}</p>
            <p><strong>E-Mail:</strong> {{ $user->email ?? '-' }}</p>
            <p><strong>Mobile:</strong> {{ $user->mobile ?? '-' }}</p>
            <p><strong>Rolle:</strong> {{ $user->role ?? '-' }}</p>
            <p><strong>E-Mail bestätigt am:</strong> 
                {{ $user->email_verified_at ? $user->email_verified_at->format('d.m.Y H:i') : 'Nicht bestätigt' }}
            </p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Bearbeiten</a>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Zurück</a>
    </div>
</div>
@endsection
