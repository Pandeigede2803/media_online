<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // /**
    //  * Run the migrations.
    //  */
    // public function up(): void
    // {
    //     Schema::create('berita', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('judul_berita');
    //         $table->text('konten_berita');
    //         $table->foreignId('kategori_berita')->constrained('kategori'); // Ensure 'kategori' table exists
    //         $table->string('gambar')->nullable();
    //         $table->integer('jumlah_views')->default(0);
    //         $table->string('author');
    //         $table->enum('is_headline', ['yes', 'no'])->default('no');
    //         $table->enum('is_berita_pilihan', ['yes', 'no'])->default('no');
    //         $table->string('slug')->unique();
    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  */
    // public function down(): void
    // {
    //     Schema::dropIfExists('beritas');
    // }
};
