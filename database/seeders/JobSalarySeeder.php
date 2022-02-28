<?php

namespace Database\Seeders;

use App\Models\JobSalary;
use Carbon\Carbon;
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
            ['salary_ch' => '面议', 'salary_en' => 'Negotiable', 'salary_kh' => 'អាចចរចារបាន', 'salary_th' => 'ต่อรองได้'],
            ['salary_ch' => '<$200', 'salary_en' => '<$200', 'salary_kh' => '<$200', 'salary_th' => '<$200'],
            ['salary_ch' => '$200-$500', 'salary_en' => '$200-$500', 'salary_kh' => '$200-$500', 'salary_th' => '$200-$500'],
            ['salary_ch' => '$500-$999', 'salary_en' => '$500-$999', 'salary_kh' => '$500-$999', 'salary_th' => '$500-$999'],
            ['salary_ch' => '$1000-$2000', 'salary_en' => '$1000-$2000', 'salary_kh' => '$1000-$2000', 'salary_th' => '$1000-$2000'],
            ['salary_ch' => '>$2000', 'salary_en' => '>$2000', 'salary_kh' => '>$2000', 'salary_th' => '>$2000'],
            ['salary_ch' => '>$6000', 'salary_en' => '>$6000', 'salary_kh' => '>$6000', 'salary_th' => '>$6000'],
        ];
        JobSalary::insert($job_salaries);
    }
}
