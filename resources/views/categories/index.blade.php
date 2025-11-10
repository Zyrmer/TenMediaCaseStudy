
@extends('layouts.app')

@section('content')
<h1>Kategorien</h1>

<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">+ Neue Kategorien</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Beschreibung</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></td>
            <td>{{ $category->description ?? '-' }}</td>
            <td>
                <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Bearbeiten</a>
                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger px-3" onclick="return confirm('Wirklich löschen?')">Löschen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    {{ $categories->links() }}
</table>
@endsection

