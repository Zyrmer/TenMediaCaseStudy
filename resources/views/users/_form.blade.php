@csrf
<div class="mb-3">
    <label class="form-label">Username</label>
    <input type="text" name="username" class="form-control" value="{{ old('username', $user->username ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">E-Mail</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Mobile</label>
    <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $user->mobile ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Password</label>
    <input type="text" name="password" step="0.01" class="form-control" placeholder="{{ old('password', $user->password ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">Role</label>
    <select name="role" class="form-control">
        <option value="user" {{ old('role', $user->role ?? '') === 'user' ? 'selected' : '' }}>User</option>
        <option value="admin" {{ old('role', $user->role ?? '') === 'admin' ? 'selected' : '' }}>Admin</option>
    </select>
</div>

{{-- <div class="mb-3">
    <label class="form-label">E-Mail bestätigt am</label>
    <input type="datetime-local" name="email_verified_at" class="form-control"
           value="{{ old('email_verified_at', isset($user->email_verified_at) ? $user->email_verified_at->format('Y-m-d\TH:i') : '') }}">
</div> --}}




<button type="submit" class="btn btn-success">Speichern</button> <a href="{{ route('users.index') }}" class="btn btn-success">Abbrechen</a>
