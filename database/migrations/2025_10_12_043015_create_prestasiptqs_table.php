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
        Schema::create('prestasiptqs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->foreignId('siswa_id')->constrained();
            $table->foreignId('surat_id')->constrained()->cascadeOnDelete();
            $table->string('ayat');
            $table->string('nilai');
            $table->string('tugas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasiptqs');
    }
};
