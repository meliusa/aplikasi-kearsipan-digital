<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cek apakah pengguna yang login adalah admin
        if (Auth::user()->role == "admin") {
            // Jika admin, tampilkan semua dokumen
            $documents = Document::orderBy('updated_at', 'desc')->get();
        } else {
            // Jika bukan admin (misalnya staf), hanya tampilkan dokumen yang user_id-nya sama dengan id pengguna yang login
            $documents = Document::where('user_id', Auth::id())  // Filter berdasarkan user_id yang sesuai dengan pengguna yang login
                                  ->orderBy('updated_at', 'desc')  // Urutkan berdasarkan updated_at
                                  ->get();
        }
    
        // Kirim data dokumen ke view
        return view('admin.documents.index', compact('documents'));
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
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        //
    }

    public function fileManager()
    {
        // Retrieve only documents with status 'Public', ordered by 'updated_at'
        $documents = Document::where('status', 'Public')
                             ->orderBy('updated_at', 'desc')
                             ->get();
    
        return view('admin.file-managers.index', compact('documents'));
    }
}
