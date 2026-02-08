<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sambutans', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->text('deskripsi1');
            $table->text('deskripsi2');
            $table->text('deskripsi3');
            $table->text('deskripsi4');
            $table->text('deskripsi5');
            $table->text('deskripsi6');
            $table->text('deskripsi7');
            $table->text('deskripsi8');
            $table->text('deskripsi9');
            $table->text('deskripsi10');
            $table->text('nama_pemilik');
            $table->text('jabatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sambutans');
    }
};
