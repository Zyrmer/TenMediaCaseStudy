@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Neues Unternehmen hinzufügen</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('companies.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Unternehmensname</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Standort</label>
            <input type="text" name="location" class="form-control" id="location">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Beschreibung</label>
            <textarea name="description" class="form-control" id="description" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Speichern</button> <a href="{{ route('companies.index') }}" class="btn btn-success">Abbrechen</a>
    </form>
</div>
@endsection
