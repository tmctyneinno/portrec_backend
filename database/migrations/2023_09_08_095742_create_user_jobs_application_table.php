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
        Schema::create('user_job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId("job_id")->references("id")->on("users");
            $table->string("status")->default("penidng");
            $table->string("resume_link");
            $table->text("cover_letter")->nullable();
            $table->string("cover_letter_link")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_job_applications');
    }
};
