
@extends('layouts.app')

@section('content')
<h1>Neue Stelle anlegen</h1>
<form action="{{ route('jobs.store') }}" method="POST">
    @include('jobs._form', [
        'job' => new App\Models\Job(),
        'companies' => $companies,
        'categories' => $categories
    ])
</form>
@endsection