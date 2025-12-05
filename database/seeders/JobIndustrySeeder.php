<?php

namespace Database\Seeders;

use App\Models\Industry;
use App\Models\JobFunction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        // Disable foreign key checks for truncation
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate tables (in correct order due to foreign key constraints)
        JobFunction::truncate();
        Industry::truncate();

        // // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');



        $data = [
            // ========== FINANCIAL & BUSINESS SERVICES ==========
            ['name' => 'Accounting, Auditing & Finance'],
            ['name' => 'Banking & Finance'],
            ['name' => 'Finance'],
            ['name' => 'Insurance'],
            ['name' => 'Consulting & Strategy'],
            ['name' => 'Management & Business Development'],

            // ========== TECHNOLOGY & DIGITAL ==========
            ['name' => 'Software & Data'],
            ['name' => 'Engineering & Technology'],
            ['name' => 'ICT'],
            ['name' => 'Telecommunications'],
            ['name' => 'Health Technology'],
            ['name' => 'E-commerce'],

            // ========== INDUSTRIAL & MANUFACTURING ==========
            ['name' => 'Manufacturing'],
            ['name' => 'Oil and Gas'],
            ['name' => 'Energy and Power'],
            ['name' => 'Mining and Solid Minerals'],
            ['name' => 'Construction'],
            ['name' => 'Supply Chain & Procurement'],
            ['name' => 'Quality Control & Assurance'],
            ['name' => 'Trades & Services'],

            // ========== PROFESSIONAL SERVICES ==========
            ['name' => 'Legal and Professional Services'],
            ['name' => 'Human Resources'],
            ['name' => 'Product & Project Management'],
            ['name' => 'Sales'],

            // ========== REAL ESTATE & PROPERTY ==========
            ['name' => 'Real Estate'],
            ['name' => 'Estate Agents & Property Management'],

            // ========== TRANSPORT & LOGISTICS ==========
            ['name' => 'Driver & Transport Services'],
            ['name' => 'Aviation'],
            ['name' => 'Maritime and Shipping'],

            // ========== SECURITY & LAW ENFORCEMENT ==========
            ['name' => 'Enforcement & Security'],
            ['name' => 'Security and Law Enforcement'],
            ['name' => 'Health & Safety'],

            // ========== HEALTHCARE & PHARMACEUTICALS ==========
            ['name' => 'Medical & Pharmaceutical'],

            // ========== AGRICULTURE ==========
            ['name' => 'Farming & Agriculture'],

            // ========== HOSPITALITY & FOOD SERVICES ==========
            ['name' => 'Hospitality'],
            ['name' => 'Food Services & Catering'],

            // ========== CREATIVE & MEDIA ==========
            ['name' => 'Creative & Design'],
            ['name' => 'Fashion and Design'],
            ['name' => 'Media, Printing and Publishing'],
            ['name' => 'Advertising and Marketing'],
            ['name' => 'Arts and Culture'],
            ['name' => 'Entertainment'],
            ['name' => 'Events & Sport'],

            // ========== EDUCATION & TRAINING ==========
            ['name' => 'Education and Training'],
            ['name' => 'Vocational and Technical Training'],

            // ========== PUBLIC & SOCIAL SECTOR ==========
            ['name' => 'Public Sector and Government'],
            ['name' => 'NGO'],
            ['name' => 'Religion and Faith-Based Organizations'],
            ['name' => 'Community & Social Services'],

            // ========== CUSTOMER & SUPPORT SERVICES ==========
            ['name' => 'Customer Service & Support'],
        ];

        // foreach ($data as $dats) Industry::create($dats);
        Industry::insert($data);


        $createdIndustries = Industry::all();

        if (count($createdIndustries) > 0) {

            foreach ($createdIndustries as $dar) {
                JobFunction::create([
                    'name' => $dar->name,
                    'industry_id' => $dar->id
                ]);
            }
        }
    }
}
