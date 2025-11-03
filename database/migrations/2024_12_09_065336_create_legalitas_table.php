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
        Schema::create('legalitas', function (Blueprint $table) {
            $table->id();
            $table->string('perusahaan');
            $table->string('pimpinan');
            $table->string('notaris');
            $table->string('akta_notaris');
            $table->string('ahu_nomor');
            $table->string('skep_ppjk');
            $table->text('alamat');
            $table->string('kontak');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legalitas');
    }
};
