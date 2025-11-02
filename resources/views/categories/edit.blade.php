
@extends('layouts.app')

@section('content')
<h1>Kategorie bearbeiten</h1>
<form action="{{ route('categories.update', $category) }}" method="POST">
    @method('PUT')
    @include('categories._form')
</form>
@endsection
