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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('recruiter_id')->nullable();
            $table->integer('company_type_id')->nullable();
            $table->string('industry_id')->nullable();
            $table->string("name")->nullable();
            $table->string("company_size_id")->nullable();
            $table->string("country")->nullable();
            $table->string("city")->nullable();
            $table->string('cac')->nullable();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->string("about")->unique()->nullable();
            $table->string("employee")->nullable();
            $table->string("date_founded")->nullable();
            $table->string("tech_stack")->nullable();
            $table->text("instagram")->nullable();
            $table->text("twitter")->nullable();
            $table->text("facebook")->nullable();
            $table->text("youtube")->nullable();
            $table->text("linkedin")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
