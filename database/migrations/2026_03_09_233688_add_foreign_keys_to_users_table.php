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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('petugas')->after('email');
            $table->foreignId('kelurahan_id')->nullable()->after('role');
            $table->foreignId('rt_rw_id')->nullable()->after('kelurahan_id');

            // Baru tambah foreign key
            $table->foreign('kelurahan_id')->references('id')->on('kelurahans')->nullOnDelete();
            $table->foreign('rt_rw_id')->references('id')->on('rt_rws')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['kelurahan_id']);
            $table->dropForeign(['rt_rw_id']);
            $table->dropColumn(['role', 'kelurahan_id', 'rt_rw_id']);
        });
    }
};
