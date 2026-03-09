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
        Schema::create('rt_rws', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kelurahan_id')->constrained()->onDelete('cascade');
            $table->string('rt');
            $table->string('rw');
            $table->string('kode_sls')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rt_rw');
    }
};
