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
        Schema::create('visimisis', function (Blueprint $table) {
            $table->id();
            $table->string('visi')->nullable();
            $table->string('misi1')->nullable();
            $table->string('misi2')->nullable();
            $table->string('misi3')->nullable();
            $table->string('misi4')->nullable();
            $table->string('misi5')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visimisis');
    }
};
