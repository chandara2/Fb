<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserGroupSeeder::class,
            JobExperienceSeeder::class,
            JobFunctionSeeder::class,
            JobGenderSeeder::class,
            JobIndustrySeeder::class,
            JobLevelSeeder::class,
            JobLocationSeeder::class,
            JobQualificationSeeder::class,
            JobSalarySeeder::class,
            JobTermSeeder::class,
        ]);
    }
}
