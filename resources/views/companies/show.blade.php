@extends('layouts.app')

@section('content')
<h1>{{ $company->name }}</h1>
<p><strong>Name:</strong> {{ $company->name ?? '-' }}</p>
<p><strong>Beschreibung:</strong> {{ $company->description ?? '-' }}</p>
<p><strong>website:</strong> {{ $company->website }}</p>
<a href="{{ route('companies.edit', $company) }}" class="btn btn-warning">Bearbeiten</a> <a href="{{ route('companies.index') }}" class="btn btn-success">Abbrechen</a>
@endsection
