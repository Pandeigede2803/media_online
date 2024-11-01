<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    // Specify the table name
    protected $table = 'kategori';
    //

    // cara agar model bisa diisi

    protected $fillable = ['nama_kategori', 'slug','image', 'created_at', 'updated_at'];
}
