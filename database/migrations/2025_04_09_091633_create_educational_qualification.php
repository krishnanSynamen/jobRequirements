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
        Schema::create('educational_qualification', function (Blueprint $table) {
            $table->unsignedBigInteger('educational_qualification_id' ,true);
            $table->unsignedBigInteger('job_details_id');
            $table->string('qualification');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educational_qualification');
    }
};
