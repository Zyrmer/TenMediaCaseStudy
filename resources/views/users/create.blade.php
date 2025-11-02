
@extends('layouts.app')

@section('content')
<h1>Neuen Benutzer erstellen</h1>
<form action="{{ route('users.store') }}" method="POST">
    @include('users._form')
</form>
@endsection