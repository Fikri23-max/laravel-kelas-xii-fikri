<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{User, Role, Profile, Kritik};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->orderByDesc('id')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        DB::transaction(function () use ($validated) {
            $profile = Profile::create([
                'umur' => 0,
                'bio' => '-',
                'alamat' => '-',
            ]);

            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role_id' => $validated['role_id'],
                'profile_id' => $profile->id,
            ]);
        });

        return redirect()->route('admin.users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function show(User $user)
    {
        $user->load('role', 'profile');
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        // Prevent admin from downgrading their own role
        if ($user->id === Auth::id() && $request->input('role_id') != 2) {
            return redirect()->route('admin.users.edit', $user)->with('error', 'Anda tidak bisa menurunkan role admin Anda sendiri.');
        }

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable', 'string', 'min:8'],
            'role_id' => ['required', 'exists:roles,id'],
        ]);

        $data = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'role_id' => $validated['role_id'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = $validated['password'];
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return redirect()->route('admin.users.index')->with('error', 'Anda tidak bisa menghapus akun Anda sendiri.');
        }

        DB::transaction(function () use ($user) {
            Kritik::where('user_id', $user->id)->delete();
            $profileId = $user->profile_id;
            $user->delete();
            if ($profileId) {
                Profile::where('id', $profileId)->delete();
            }
        });

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus.');
    }
}
