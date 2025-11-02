
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Benutzer bearbeiten</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')

        @include('users._form', ['user' => $user ?? null])

    </form>
</div>
@endsection