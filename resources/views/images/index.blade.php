
@extends('layouts.app')

@section('content')
<h1>Aufgabe 1</h1>

<a href="{{ route('images.create') }}" class="btn btn-primary mb-3">+ Neues Image</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Titel</th>
            <th>Beschreibung</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach($images as $image)
        <tr>
            <td><a href="{{ route('images.show', $image) }}">{{ $image->title }}</a></td>
            <td>{{ $image->description }}</td>
            <td>
                @if($image->image)
                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title }}" width="100">
                @endif
            </td>
            <td>
                <a href="{{ route('images.edit', $image) }}" class="btn btn-sm btn-warning">Bearbeiten</a>
                <form action="{{ route('images.destroy', $image) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger px-3" onclick="return confirm('Wirklich löschen?')"> Löschen </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    {{ $images->links() }}
</table>
@endsection
