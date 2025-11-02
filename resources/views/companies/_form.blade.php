@csrf
<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $companies->name ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Website</label>
    <input type="text" name="website" class="form-control" value="{{ old('website', $companies->website ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Beschreibung</label>
    <textarea name="description" class="form-control">{{ old('description', $companies->description ?? '') }}</textarea>
</div>

<button type="submit" class="btn btn-success">Speichern</button> <a href="{{ route('companies.index') }}" class="btn btn-success">Abbrechen</a>
