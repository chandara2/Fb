<?php

namespace Database\Seeders;

use App\Models\JobSalary;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_salaries')->delete();

        $job_salaries = [
            ['name' => 'Negotiable'],
            ['name' => '<$200'],
            ['name' => '$200-$500'],
            ['name' => '$500-$999'],
            ['name' => '$1000-$2000'],
            ['name' => '>$2000'],
            ['name' => '>$6000'],
        ];
        JobSalary::insert($job_salaries);
    }
}
