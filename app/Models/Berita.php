<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
       // Specify the table name
       protected $table = 'berita';

    //    membuat relastion dari table ke tabel
        // cara agar model bisa diisi

        protected $fillable = ['judul_berita',
        'konten_berita',
        'kategori_berita',  // Foreign key for the kategori relationship
        'gambar',
        'jumlah_views',
        'author',
        'is_headline',
        'is_berita_pilihan',
        'slug',];

// mendefisinikan relasi antar tabel
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_berita', 'id');
    }
    //
}
