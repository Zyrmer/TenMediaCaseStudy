@extends('layouts.app')

@section('content')
<h1>{{ $category->Name }}</h1>
<p><strong>Name:</strong> {{ $category->name ?? '-' }}</p>
<p><strong>Beschreibung:</strong> {{ $category->description ?? '-' }}</p>
<a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Bearbeiten</a> <a href="{{ route('categories.index') }}" class="btn btn-success">Abbrechen</a>
@endsection