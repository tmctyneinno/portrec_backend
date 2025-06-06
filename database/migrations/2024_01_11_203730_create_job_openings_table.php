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
        Schema::create('job_openings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recruiter_id')->constraine();
            $table->foreignId("company_id")->constrained();
            $table->string("job_level_id")->constrained();
            $table->string("country_id")->nullable();
            $table->integer('job_function_id')->nullable();
            $table->integer('industry_id')->nullable();
            $table->string("job_type_id")->constrained();
            $table->string("job_url")->nullable();
            $table->string('title');
            $table->text("description");
            $table->text("required_skills");
            $table->string('min_salary')->nullable();
            $table->string('max_salary')->nullable();
            $table->dateTime('deadline')->nullable();
            $table->string('qualifications')->nullable();
            $table->string('location')->nullable();
            $table->text("experience");
            $table->integer("total_view")->default(0);
            $table->json("other_qualifications")->nullable();
            $table->json("benefits")->nullable();
            $table->string("status")->default(0);
            $table->text("responsibilities");
            $table->string('capacity');
            $table->integer('total_applied')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_openings');
    }
};
