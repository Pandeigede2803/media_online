<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Berita;

class KategoriController extends Controller
{

    //
    public function index()
    {
        $categories = Kategori::all();
        return view('kategori.index', compact('categories'));
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        $beritas = Berita::where('kategori_berita', $id)->get();
        return view('kategori.show', compact('kategori', 'beritas'));
    }
}
