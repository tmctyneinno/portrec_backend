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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("employee_id");
            $table->string("company_id");
            $table->string("recruiter_id");
            $table->string("employee_department_id");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("email");
            $table->string("phone");
            $table->string("employee_role_id");
            $table->string("username");
            $table->string("facenook");
            $table->string("twitter");
            $table->string("linkedin");
            $table->string("instagram");
            $table->string("image_path");
            $table->string("password");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
