@extends('layouts.app')

@section('content')
<h1>Unternehmen bearbeiten</h1>
<form action="{{ route('companies.update', $company) }}" method="POST">
    @method('PUT')
    @include('companies._form')
</form>
@endsection
