<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            // UserSeeder::class,
            // AvailabilitySeeder::class,
            // RecruiterSeeder::class,
            // JobIndustrySeeder::class,
            // CompanySeeder::class,
            // CompanyTypeSeeder::class,
            // JobSeeder::class,
            // EducationSeeder::class,
            // ApplicationQuestionSeeder::class,
            // ResumeSeeder::class,
            // ProfilePictureSeeder::class,
            // WorkExperienceSeeder::class,
            // CoverLetterSeeder::class,
            // SkillSeeder::class,
            // UserJobApplicationSeeder::class,
            // HiringStageSeeder::class,
            // ApplicationSeeder::class,
            // InterviewSeeder::class,
            // AdminSeeder::class,
            // CompanySeeder::class,
            // QualificationSeeder::class,
            CountryCurrencySeeder::class
        ]);
    }
}
