
@extends('layouts.app')

@section('content')
<h1>Stelle bearbeiten</h1>
<form action="{{ route('jobs.update', $job) }}" method="POST">
    @method('PUT')
    @include('jobs._form', [
        'job' => $job,
        'companies' => $companies,
        'categories' => $categories
    ])
</form>
@endsection
