<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // List semua user
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        // Form tambah user
        return view('users.create');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan user baru
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:admin,kasir,customer',
            'password' => 'required|min:6',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function show(User $user)
    {
        // Detail user
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        // Form edit user
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi dan update user
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,kasir,customer',
        ]);
        $user->update($request->only('name', 'email', 'role'));
        return redirect()->route('users.index')->with('success', 'User berhasil diupdate.');
    }

    public function destroy(User $user)
    {
        // Hapus user
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}