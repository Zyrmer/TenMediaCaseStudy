
@extends('layouts.app')

@section('content')
<h1>Stellenanzeigen</h1>

<a href="{{ route('jobs.create') }}" class="btn btn-primary mb-3">+ Neue Stelle</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Titel</th>
            <th>Unternehmen</th>
            <th>Kategorie</th>
            <th>Location</th>
            <th>Gehalt</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobs as $job)
        <tr>
            <td><a href="{{ route('jobs.show', $job) }}">{{ $job->title }}</a></td>
            <td>{{ $job->company->name ?? '-' }}</td>
            <td>{{ $job->category->name ?? '-' }}</td>
            <td>{{ $job->location }}</td>
            <td>{{ $job->salary }}</td>
            <td>
                <a href="{{ route('jobs.edit', $job) }}" class="btn btn-sm btn-warning">Bearbeiten</a>
                <form action="{{ route('jobs.destroy', $job) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger px-3" onclick="return confirm('Wirklich löschen?')"> Löschen </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    {{ $jobs->links() }}
</table>
@endsection
