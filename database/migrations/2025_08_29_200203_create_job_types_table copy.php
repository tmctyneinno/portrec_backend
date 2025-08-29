<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('job_types')) {

            DB::table("job_types")->truncate();

            $data = [
                ["name" => "full-time"],
                ["name" => "part-time"],
                ["name" => "remote"],
                ["name" => "internship"],
                ["name" => "contract"],
                ["name" => "volunteer"],
            ];

            DB::table("job_types")->insert($data);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('job_types');
    }
};
