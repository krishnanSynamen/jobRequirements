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
        if (!Schema::hasTable('career_applications')) {
            Schema::create('career_applications', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->constrained(table: 'users');
                $table->foreignId('job_id')->constrained(table: 'career_jobs');
                $table->unsignedMediumInteger('track_id');
                $table->string('name');
                $table->string('email');
                $table->text('cover_letter');
                $table->float('current_ctc', 3, 1)->nullable();
                $table->float('expected_ctc', 3, 1)->nullable();
                $table->integer('notice_period')->nullable();
                $table->enum('status', ['New', 'Under Review', 'Selected', 'Rejected']);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('career_applications')) {
            Schema::dropIfExists('career_applications');
        }
    }
};
