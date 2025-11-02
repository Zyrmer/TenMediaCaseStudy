@extends('layouts.app')

@section('content')
<div class="text-center py-5">
    <h1 class="display-4 mb-4">Willkommen beim JobPortal</h1>
    <p class="lead mb-4">Verwalte deine Stellenanzeigen.</p>

</div>
<hr>

<div class="container">
    <h2 class="mb-4">Jobs</h2>
    <div class="row">
        @forelse ($jobs as $job)
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $job->title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($job->description, 100) }}</p>
                        <p><strong>Unternehmen:</strong> {{ $job->company->name ?? 'N/A' }}</p>
                        <p><strong>Kategorie:</strong> {{ $job->category->name ?? 'N/A' }}</p>
                        @auth
                            <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary btn-sm">Details</a>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <p>Keine aktuellen Jobs verfügbar.</p>
        @endforelse
    </div>
</div>
@endsection