<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('updated_at', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi form
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|in:admin,staf',
        ]);

        // Jika ada foto yang diupload
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        } else {
            $avatarPath = null;
        }

        // Membuat pengguna baru
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],  // Menyimpan nilai role yang dipilih
            'is_active' => 1,
            'photo' => $avatarPath,
        ]);

        // Menambahkan log aktivitas
        Log::create([
            'user_id' => Auth::id(),  // Menyimpan ID pengguna yang membuat log ini, jika user yang logged in membuatnya
            'activity_type' => 'create',  // Jenis aktivitas
            'description' => 'Pengguna baru dengan nama ' . $user->name . ' telah ditambahkan',  // Deskripsi aktivitas
        ]);

        // Redirect atau memberikan response yang sesuai
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
