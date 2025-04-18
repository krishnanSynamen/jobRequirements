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
        // Schema::create('career_applications', function (Blueprint $table) {
        //     $table->unsignedBigInteger('career_applications_id', true);
        //     $table->unsignedBigInteger('career_job_id');
        //     $table->unsignedBigInteger('track_id');
        //     $table->string('name');
        //     $table->string('email');
        //     $table->text('cover_letter');
        //     $table->string('current_ctc');
        //     $table->string('expected_ctc');
        //     $table->string('email');
        //     $table->string('notice_period');
        //     $table->enum('status', ['A', 'UR', 'S', 'R']);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_applications');
    }
};
