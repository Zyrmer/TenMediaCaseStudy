
@extends('layouts.app')

@section('content')

@if($image->image)
    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title }}" style="max-width: 300px;">
@else
    <p>Kein Bild vorhanden</p>
@endif

<h1>{{ $image->title }}</h1>

<p><strong>Beschreibung:</strong></p>
<p>{{ $image->description }}</p>
<a href="{{ route('images.edit', $image) }}" class="btn btn-warning">Bearbeiten</a>
<a href="{{ route('images.index') }}" class="btn btn-secondary">Zurück</a>
@endsection

