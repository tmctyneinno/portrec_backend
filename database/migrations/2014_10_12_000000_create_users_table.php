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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique()->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->text("address")->nullable();
            $table->string('allow_search')->nullable();
            $table->string('user_level_id')->nullable();
            $table->text('description')->nullable();
            $table->string("linkedin")->nullable();
            $table->string("twitter")->nullable();
            $table->string("facebook")->nullable();
            $table->string("avatar")->nullable();
            $table->string('googleplus')->nullable();
            $table->string("languages")->nullable();
            $table->string('title')->nullable();
            $table->string('location')->nullable();
            // $table->string("account_type")->default("seeker");
            $table->text("about_me")->nullable();
            $table->text("skills")->nullable();
            $table->string("industries_id")->nullable();
            $table->string("role")->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
