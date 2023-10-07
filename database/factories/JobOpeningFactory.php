<?php

namespace Database\Factories;

use App\Models\JobOpening;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobOpening>
 */
class JobOpeningFactory extends Factory
{
    protected $model = JobOpening::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $qualification = collect([1, 2, 3, 4, 5]);
        return [
            "title" => Str::random(10),
            "description" =>  Str::random(100),
            "required_skills" => json_encode($qualification->map(function ($skill, $key) {
                return ["name" => Str::random(8), "id" => $key];
            })),
            "job_functions" => rand(1, 10),
            "recruiter_id" => rand(1, 500),
            "company_id" => rand(1, 500),
            "job_type_id" => rand(1, 5),
            "experience" => Str::random(100),
            "min_salary" => rand(200, 600),
            "max_salary" => rand(700, 10000),
            "benefits" => json_encode($qualification->map(function ($item) {
                return ["title" => Str::random(8), "icon" => "", "description" => Str::random(30)];
            })),
            "deadline" => Carbon::now()->addDays(rand(5, 30)),
            "status" => 0,
            "location" => "",
            "total_view" => rand(1, 10),
            "capacity" => rand(1, 10),
            "total_applied" => rand(1, 5),
            "other_qualifications" => json_encode($qualification->map(function ($item) {
                return ["title" => Str::random(8),  "descriptions" => collect([1, 2, 3, 4])->map(function ($dt) {
                    return Str::random(30);
                })];
            }))
        ];
    }
}
