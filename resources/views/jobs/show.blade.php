
@extends('layouts.app')

@section('content')
<h1>{{ $job->title }}</h1>
<p><strong>Unternehmen:</strong> {{ $job->company->name ?? '-' }}</p>
<p><strong>Website:</strong> {{ $job->company->website ?? '-' }}</p>
<p><strong>Kategorie:</strong> {{ $job->category->name ?? '-' }}</p>
<p><strong>Ort:</strong> {{ $job->location }}</p>
<p><strong>Gehalt:</strong> {{ $job->salary }}</p>
<p><strong>Beschreibung:</strong></p>
<p>{{ $job->description }}</p>
    @if(Auth::check() && Auth::user()->role === 'admin')
        <a href="{{ route('jobs.edit', $job) }}" class="btn btn-warning">Bearbeiten</a>
        <a href="{{ route('jobs.index') }}" class="btn btn-secondary">Zurück</a>
    @else
        <a href="{{ route('start') }}" class="btn btn-outline-secondary">Zurück</a>
    @endif
@endsection

