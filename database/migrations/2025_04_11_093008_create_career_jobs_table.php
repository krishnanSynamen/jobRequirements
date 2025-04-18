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
        Schema::create('career_jobs', function (Blueprint $table) {
            $table->unsignedBigInteger('career_jobs_id', true);
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('description');
            $table->string('qualification');
            $table->string('vaccancy');
            $table->enum('type', ['F', 'E']);
            $table->enum('is_active', ['A', 'IA']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_jobs');
    }
};
