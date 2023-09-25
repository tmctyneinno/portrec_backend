<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    protected $model = Company::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recruiter_id' => 1,
            "industry_id" => rand(1, 500),
            "company_type_id" => rand(1, 40),
            "name" => Str::random(8),
            "description" => Str::random(200),
            "address" => Str::random(40),
            "website" => Str::random(8) . ".com",
            "email" => Str::random(8) . "@gmail.com",
            "image" => "https://picsum.photos/100/100"
        ];
    }
}
