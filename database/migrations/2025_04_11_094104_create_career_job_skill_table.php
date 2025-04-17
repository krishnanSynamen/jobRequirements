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
        if (!Schema::hasTable('career_job_skill')) {
            Schema::create('career_job_skill', function (Blueprint $table) {
                $table->id();
                $table->foreignId('skills_id')->constrained(table: 'skills');
                $table->foreignId('job_id')->constrained(table: 'career_jobs');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('career_job_skill')) {
            Schema::table('career_job_skill', function (Blueprint $table) {
                $table->dropForeign(['skills_id']); 
                $table->dropForeign(['job_id']); 
    
            });
        }
        if (Schema::hasTable('career_job_skill')) {
            Schema::dropIfExists('career_job_skill');
        }
    }
};
