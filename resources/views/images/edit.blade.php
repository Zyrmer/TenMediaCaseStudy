
@extends('layouts.app')

@section('content')
<h1>Bild bearbeiten</h1>
<form action="{{ route('images.update', $image) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @include('images._form')
</form>
@endsection
