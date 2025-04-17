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
        if (!Schema::hasTable('career_jobs')) {
            Schema::create('career_jobs', function (Blueprint $table) {
                $table->id();
                $table->enum('type', ['Fresher', 'Experience']);
                $table->string('title');
                $table->string('slug');
                $table->text('description');
                $table->string('qualification');
                $table->integer('vacancy');
                $table->boolean('is_active');
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
                    $table->dropForeign(['job_id']);
                });
        }

        if (Schema::hasTable('career_applications')) {
            Schema::table('career_applications', function(Blueprint $table) {
                $table->dropForeign(['job_id']);
            });
        }
        if (Schema::hasTable('career_jobs')) {
            Schema::dropIfExists('career_jobs');
        }
    }
};
