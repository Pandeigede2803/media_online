<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaController extends Controller
{
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }
}
