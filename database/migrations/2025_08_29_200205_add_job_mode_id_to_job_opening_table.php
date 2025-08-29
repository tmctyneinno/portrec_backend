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
        if (!Schema::hasColumn('job_openings', 'job_mode_id')) {
            Schema::table('job_openings', function (Blueprint $table) {
                $table->string("job_mode_id")->constrained();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_openings', function (Blueprint $table) {
            //
        });
    }
};
