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
        Schema::create('application_details', function(Blueprint $table){
            $table->unsignedBigInteger('application_details_id', true);
            $table->string('name');
            $table->string('email');
            $table->string('mobile_no', 10);
            $table->string('position_applied');
            $table->string('experience');
            $table->string('designation');
            $table->string('current_ctc');
            $table->string('expected_ctc');
            $table->string('notice_period');
            $table->string('resume');
            $table->string('cover_letter');
            $table->enum('status', ['A', 'IA', 'D']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_details');
    }
};
