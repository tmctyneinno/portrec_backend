<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApplicationQuestion>
 */
class ApplicationQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "recruiter_id" => rand(1, 5),
            "job_id" => rand(1, 5),
            "questions" => $this->faker->paragraph(4)
        ];
    }
}
