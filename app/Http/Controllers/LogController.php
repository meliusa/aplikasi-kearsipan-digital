<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      // Cek apakah pengguna yang login adalah admin
    if (Auth::user()->role == "admin") {
        // Jika admin, ambil semua log dan semua user
        $logs = Log::orderBy('created_at', 'desc')->get();
        $users = User::all(); // Ambil semua pengguna
    } else {
        // Jika bukan admin (misalnya staf), ambil log berdasarkan user_id yang login
        $logs = Log::where('user_id', Auth::id())
                   ->orderBy('created_at', 'desc')
                   ->get();
        $users = User::where('id', Auth::id())->get(); // Ambil hanya pengguna yang sedang login
    }

    return view('admin.logs.index', compact('logs', 'users'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Log $log)
    {
        //
    }
}
