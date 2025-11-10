<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class UserController extends Controller
{
    use AuthorizesRequests;
   public function index()
    {
        $this->authorize('viewAny', User::class);
        $users = User::orderBy("id","desc")->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'nullable|email',
            'mobile' => 'nullable|string',
            'role' => 'nullable|string',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Benutzer erfolgreich erstellt!');

    }

    public function show(User $user)
    {
         return view('users.show', compact('user'));
    }


    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'nullable|email',
            'mobile' => 'nullable|string',
            'role' => 'nullable|string',
            'password' => 'nullable|string|min:6',
        ]);
        
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        } else {
            unset($validated['password']);
        }

         $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Benutzer updated successfully!');
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Benutzer deleted successfully!');
    }

}
