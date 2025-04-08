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
        Schema::create('job_details', function(Blueprint $table){
            $table->unsignedBigInteger('job_details_id', true);
            $table->string('job_name');
            $table->text('job_des');
            $table->text('job_requirements');
            $table->text('exp_from_cand');
            $table->string('skills');
            $table->string('qualification');
            $table->string('vacancy');
            $table->enum('status', ['A', 'IA', 'D']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_details');
    }
};
