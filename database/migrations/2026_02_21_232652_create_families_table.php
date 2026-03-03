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
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('number_kk')->nullable();
            $table->string('ownership_kk')->nullable();
            $table->string('rt_address')->nullable();
            $table->string('ktp_address')->nullable();
            $table->string('city_address')->nullable();
            $table->string('number_of_family_member')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('house_photo', 2048)->nullable();
            $table->string('bpnt')->nullable();
            $table->string('pkh')->nullable();
            $table->string('blt_elderly')->nullable();
            $table->string('blt_village')->nullable();
            $table->string('other_assistance')->nullable();
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('families');
    }
};
