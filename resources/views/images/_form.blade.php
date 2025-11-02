@csrf
<div class="mb-3">
    <label class="form-label">Titel</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $image->title ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Beschreibung</label>
    <textarea name="description" class="form-control">{{ old('description', $image->description ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-success">Speichern</button> <a href="{{ route('images.index') }}" class="btn btn-success">Abbrechen</a>
