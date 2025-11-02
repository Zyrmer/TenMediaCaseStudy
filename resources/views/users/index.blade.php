@extends('layouts.app')

@section('content')
<h1>Benutzer</h1>

<a href="{{ route('users.create') }}" class="btn btn-primary mb-3">+ Neue Stelle</a>
@if($users->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Username</th>
                <th>E-Mail</th>
                <th>Mobile</th>
                <th>Role</th>
                <th>E-Mail_verified_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td><a href="{{ route('users.show', $user) }}">{{ $user->username }}</a></td>
                {{-- <td>{{ $user->username }}</td> --}}
                <td>{{ $user->email }}</td>
                <td>{{ $user->mobile }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->email_verified_at }}</td>
                <td>
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Bearbeiten</a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Wirklich löschen?')">Löschen</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
     @else
        <p>Keine Benutzer gefunden.</p>
    @endif
@endsection
