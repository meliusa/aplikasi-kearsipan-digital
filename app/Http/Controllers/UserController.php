<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\Storage;
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
            'description' => 'Pengguna baru dengan nama "' . $user->name . '" telah ditambahkan',  // Deskripsi aktivitas
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
     // Fungsi untuk mengupdate data user
     public function update(Request $request, $id)
     {
         // Validasi input
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|max:255|unique:users,email,' . $id, // Pastikan email unik kecuali untuk user yang sedang diupdate
             'password' => 'nullable|min:8|confirmed',  // password opsional, jika diisi maka harus minimal 8 karakter
             'role' => 'required|in:admin,staf',  // Role harus admin atau staf
             'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',  // validasi gambar
         ]);
     
         // Ambil data user
         $user = User::findOrFail($id);
     
         // Proses foto jika ada
         if ($request->hasFile('photo')) {
             // Hapus foto lama jika ada
             if ($user->photo && Storage::exists('public/' . $user->photo)) {
                 Storage::delete('public/' . $user->photo);
             }
     
             // Simpan foto baru
             $path = $request->file('photo')->store('photos', 'public');
             $user->photo = $path;
         }
     
         // Jika password baru diisi, hash dan perbarui password
         if ($request->filled('password')) {
             $user->password = Hash::make($request->password);
         }
     
         // Perbarui data lainnya (jika ada perubahan)
         $user->name = $request->name;
         $user->email = $request->email;
         $user->role = $request->role;
         
         // Simpan perubahan
         $user->save();
     
         // Menambahkan log aktivitas
         Log::create([
             'user_id' => Auth::id(),  // ID pengguna yang sedang login
             'activity_type' => 'update',  // Jenis aktivitas
             'description' => 'Pengguna dengan nama "' . $user->name . '" telah diperbarui',  // Deskripsi aktivitas
         ]);
     
         // Redirect atau respon berhasil
         return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
            // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Simpan log penghapusan (jika diinginkan)
        $log = Log::create([
            'user_id' => Auth::id(),  // ID pengguna yang sedang login
            'activity_type' => 'delete',  // Jenis aktivitas
            'description' => 'Pengguna dengan nama "' . $user->name . '" telah dihapus',
        ]);

        // Hapus pengguna
        $user->delete();

        // Redirect ke halaman daftar pengguna dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus!');
    }

    // Fungsi untuk mengupdate status 'is_active'
    public function updateStatus(Request $request, $id)
    {
        // Temukan user berdasarkan ID
        $user = User::findOrFail($id);

        // Simpan status lama untuk keperluan log
        $oldStatus = $user->is_active;

        // Pastikan data yang dikirim adalah status yang valid (0 atau 1)
        $newStatus = $request->is_active == 1 ? 1 : 0;

        // Update status is_active
        $user->is_active = $newStatus;
        $user->save();

        // Menambahkan log aktivitas
        Log::create([
            'user_id' => Auth::id(),  // ID pengguna yang sedang login
            'activity_type' => 'update',  // Jenis aktivitas
            'description' => 'Status user "' . $user->name . '" berubah dari ' . ($oldStatus ? 'Aktif' : 'Tidak Aktif') . ' menjadi ' . ($user->is_active ? 'Aktif' : 'Tidak Aktif') . '.',  // Deskripsi aktivitas
        ]);

        // Mengembalikan response JSON sebagai respon sukses
        return response()->json([
            'status' => 'success', 
            'message' => 'Status berhasil diperbarui',
            'new_status' => $user->is_active
        ]);
    }
}
