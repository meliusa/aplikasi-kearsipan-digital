<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        // Validasi form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg|max:1024', // file maksimal 1MB
            'user_role' => 'required|in:0,1', // Public/Private status
        ]);

        // Mengambil user yang sedang login
        $userId = Auth::id();

        // Jika ada file yang diupload, simpan ke storage
        if ($request->hasFile('file_path')) {
            // Menyimpan file ke dalam folder 'documents' di storage public
            $filePath = $request->file('file_path')->store('documents', 'public');
        } else {
            $filePath = null;
        }

        // Menyimpan data dokumen ke database
        $document = Document::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'file_path' => $filePath,
            'status' => $validated['user_role'] == 1 ? 'public' : 'private', // Public jika 1, private jika 0
            'user_id' => $userId, // Menyimpan user_id yang sedang login
        ]);

         // Menambahkan entri log setelah menyimpan dokumen
        $log = Log::create([
        'user_id' => $userId,  // Menyimpan ID pengguna yang sedang login
        'activity_type' => 'create',  // Jenis aktivitas
        'description' => 'Dokumen dengan judul "' . $document->title . '" telah ditambahkan',
    ]);

        // Redirect setelah menyimpan data
        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil disimpan!');
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
    public function destroy($id)
    {
        // Temukan dokumen berdasarkan ID
        $document = Document::findOrFail($id);

        // Simpan log penghapusan (jika diinginkan)
        Log::create([
            'user_id' => Auth::id(),  // ID pengguna yang sedang login
            'activity_type' => 'delete',  // Jenis aktivitas
            'description' => 'Dokumen dengan judul "' . $document->title . '" telah dihapus',
        ]);

        // Hapus dokumen
        $document->delete();

        // Redirect ke halaman daftar dokumen dengan pesan sukses
        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil dihapus!');
    }

    public function fileManager()
    {
        // Retrieve only documents with status 'Public', ordered by 'updated_at'
        $documents = Document::where('status', 'Public')
                             ->orderBy('updated_at', 'desc')
                             ->get();
    
        return view('admin.file-managers.index', compact('documents'));
    }

    public function getDocumentDetail($id)
    {
        // Ambil dokumen beserta informasi pengguna
        $document = Document::with('user')->find($id);

        // Pastikan dokumen ditemukan
        if (!$document) {
            return response()->json(['error' => 'Dokumen tidak ditemukan'], 404);
        }

        // Ambil nama dan email pengguna
        $user_name = $document->user->name;
        $user_email = $document->user->email;

        // Mengembalikan hanya path relatif file (tanpa base URL)
        $file_path = $document->file_path;  // Ini adalah path relatif

        // Mengembalikan data dokumen beserta informasi pengguna dan file path
        return response()->json([
            'title' => $document->title,
            'description' => $document->description,
            'file_path' => $file_path,  // Path relatif
            'status' => $document->status,
            'user_name' => $user_name,
            'user_email' => $user_email,
            'created_at' => $document->created_at->format('d M Y H:i')
        ]);
    }
    
}
