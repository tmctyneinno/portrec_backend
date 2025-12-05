<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        // Disable foreign key checks for truncation
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate tables (in correct order due to foreign key constraints)
        Skill::truncate();

        // // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $skills = [
            ['name' => 'Active Directory'],
            ['name' => 'Adaptability'],
            ['name' => 'Accounting'],
            ['name' => 'AI/ML'],
            ['name' => 'Analysis skills'],
            ['name' => 'Branding'],
            ['name' => 'CAD/AutoCAD'],
            ['name' => 'Cloud Computing'],
            ['name' => 'Coaching'],
            ['name' => 'Content Creation'],
            ['name' => 'Copywriting'],
            ['name' => 'CSS'],
            ['name' => 'Cybersecurity'],
            ['name' => 'Data Analysis'],
            ['name' => 'Digital Marketing'],
            ['name' => 'Editing'],
            ['name' => 'Film'],
            ['name' => 'Full-stack development'],
            ['name' => 'Git'],
            ['name' => 'GitHub'],
            ['name' => 'Graphic Design'],
            ['name' => 'HSE'],
            ['name' => 'HTML'],
            ['name' => 'iOS'],
            ['name' => 'IT Support'],
            ['name' => 'JavaScript'],
            ['name' => 'Journalism'],
            ['name' => 'jQuery'],
            ['name' => 'Laravel'],
            ['name' => 'Leadership'],
            ['name' => 'Linux'],
            ['name' => 'Mentorship'],
            ['name' => 'Microsoft SQL Server'],
            ['name' => 'Music Production'],
            ['name' => 'MySQL'],
            ['name' => 'Operating systems'],
            ['name' => 'Organizational skills'],
            ['name' => 'Petroleum'],
            ['name' => 'PHP'],
            ['name' => 'Photography'],
            ['name' => 'PostgreSQL'],
            ['name' => 'PR'],
            ['name' => 'Problem-Solving'],
            ['name' => 'Programming'],
            ['name' => 'Project management'],
            ['name' => 'QA/QC'],
            ['name' => 'Risk Management'],
            ['name' => 'SEO/SEM'],
            ['name' => 'SharePoint'],
            ['name' => 'Social Media'],
            ['name' => 'SQL'],
            ['name' => 'Technical support'],
            ['name' => 'Test cases'],
            ['name' => 'Time Management'],
            ['name' => 'UI/UX'],
            ['name' => 'VPN'],
            ['name' => 'Vue.js'],
            ['name' => 'Web/Mobile Development'],
            ['name' => 'Web development'],
            ['name' => 'Windows'],
            ['name' => 'Writing']
        ];


        // foreach ($data as $ss) Skill::create($ss);
        Skill::insert($skills);
    }
}
