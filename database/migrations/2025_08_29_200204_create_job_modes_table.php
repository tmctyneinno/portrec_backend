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
        if (!Schema::hasTable('job_modes')) {

            Schema::create('job_modes', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->integer('status')->nullable();
                $table->timestamp("deleted_at")->nullable();
                $table->timestamps();
            });

            $data = [
                ["name" => "internship"],
                ["name" => "contract"],
                ["name" => "hybrid"],
                ["name" => "volunteer"],

            ];

            DB::table("job_modes")->insert($data);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_types');
    }
};
