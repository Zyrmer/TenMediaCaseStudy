<form action="{{ isset($image) ? route('images.update', $image) : route('images.store') }}" 
      method="POST" 
      enctype="multipart/form-data">
    
    @csrf

    @if(isset($image))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label">Titel</label>
        <input type="text" name="title" class="form-control" 
               value="{{ old('title', $image->title ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Beschreibung</label>
        <textarea name="description" class="form-control">{{ old('description', $image->description ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Bild</label>
        <input type="file" name="image" class="form-control" {{ isset($image) ? '' : 'required' }}>
        
        @if(isset($image) && $image->image)
            <p class="mt-2">Aktuelles Bild:</p>
            <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->title }}" style="max-width: 150px;">
        @endif
    </div>

    <button type="submit" class="btn btn-primary">{{ isset($image) ? 'Speichern' : 'Hochladen' }}</button>  <a href="{{ route('images.index') }}" class="btn btn-success">Abbrechen</a>
</form>
