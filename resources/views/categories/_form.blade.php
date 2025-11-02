@csrf
<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $category->name ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Beschreibung</label>
    <textarea name="description" class="form-control">{{ old('description', $category->description ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-success">Speichern</button> <a href="{{ route('categories.index') }}" class="btn btn-success">Abbrechen</a>
