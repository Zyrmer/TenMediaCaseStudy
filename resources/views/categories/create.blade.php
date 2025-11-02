@extends('layouts.app')

@section('content')
<h1>Neue Kategorie anlegen</h1>
<form action="{{ route('categories.store') }}" method="POST">
    @include('categories._form')
</form>
@endsection