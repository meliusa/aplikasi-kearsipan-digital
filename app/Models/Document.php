<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'documents'; // Misalnya jika tabelnya bukan 'document', sesuaikan dengan nama tabel yang benar

    // Tentukan atribut yang bisa diisi
    protected $fillable = [
        'title',
        'description',
        'file_path',
        'status',
        'user_id',
    ];

    // Tentukan atribut yang tidak boleh diisi
    protected $guarded = [];

    // Definisikan relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
