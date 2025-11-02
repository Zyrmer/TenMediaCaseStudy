
@extends('layouts.app')

@section('content')
<h1>Stelle bearbeiten</h1>
<form action="{{ route('images.update', $image) }}" method="POST">
    @method('PUT')
    @include('images._form')
</form>
@endsection
