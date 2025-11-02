
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Neues Konzept hochladen</h1>

    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Titel</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Beschreibung</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Bild</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Hochladen</button> <a href="{{ route('images.index') }}" class="btn btn-success">Abbrechen</a>
    </form>
</div>
@endsection
