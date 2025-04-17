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
        if (!Schema::hasTable('skills')) {
            Schema::create('skills', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->timestamps();
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
                $table->dropForeign('skills_id');
            });
        }
        if (Schema::hasTable('skills')) {
            Schema::dropIfExists('skills');
        }

    }
};
