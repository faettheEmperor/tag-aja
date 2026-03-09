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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('family_id')->constrained(
                table: 'families', indexName: 'families_family_member_id'
            );
            $table->string('full_name')->nullable();
            $table->string('nik')->nullable();
            $table->string('status_in_family')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('ethnic')->nullable();
            $table->string('highest_education_level')->nullable();
            $table->string('highest_education_certificate')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('employment_position')->nullable();
            $table->string('main_occupation')->nullable();
            $table->string('health_insurance')->nullable();
            $table->string('stunting')->nullable();
            $table->string('disability')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};
