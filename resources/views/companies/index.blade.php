@extends('layouts.app')

@section('content')
<h1>Unternehmen</h1>

<a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">+ Neues Unternehmen</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Beschreibung</th>
            <th>Website</th>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
        <tr>
            <td><a href="{{ route('companies.show', $company) }}">{{ $company->name }}</a></td>
            {{-- <td>{{ $company->name ?? '-' }}</td> --}}
            <td>{{ $company->description ?? '-' }}</td>
            <td>{{ $company->website }}</td>
            <td>
                <a href="{{ route('companies.edit', $company) }}" class="btn btn-sm btn-warning">Bearbeiten</a>
                <form action="{{ route('companies.destroy', $company) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger px-3" onclick="return confirm('Wirklich löschen?')">Löschen</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    {{ $companies->links() }}
</table>
@endsection
