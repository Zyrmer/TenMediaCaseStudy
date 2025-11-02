@csrf
<div class="mb-3">
    <label class="form-label">Titel</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $job->title ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Beschreibung</label>
    <textarea name="description" class="form-control">{{ old('description', $job->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Ort</label>
    <input type="text" name="location" class="form-control" value="{{ old('location', $job->location ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Gehalt</label>
    <input type="number" name="salary" step="0.01" class="form-control" value="{{ old('salary', $job->salary ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Unternehmen</label>
    <select name="company_id" class="form-select">
        @foreach($companies as $company)
            <option value="{{ $company->id }}" 
                @selected(old('company_id', $job->company_id ?? '') == $company->id)>
                {{ $company->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Kategorie</label>
    <select name="category_id" class="form-select">
        @foreach($categories as $category)
           <option value="{{ $category->id }}" 
                @selected(old('category_id', $job->category_id ?? '') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-success">Speichern</button> <a href="{{ route('jobs.index') }}" class="btn btn-success">Abbrechen</a>
