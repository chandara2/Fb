<?php

namespace Database\Seeders;

use App\Models\JobExperience;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_experiences')->delete();

        $job_experiences = [
            ['experience_ch' => '没有经验', 'experience_en' => 'No Experience', 'experience_kh' => 'គ្មានបទពិសោធន៍', 'experience_th' => 'ไม่มีประสบการณ์'],
            ['experience_ch' => '1-3年', 'experience_en' => '1-3 years', 'experience_kh' => '1-3 ឆ្នាំ', 'experience_th' => '1-3 ปี'],
            ['experience_ch' => '3-5年', 'experience_en' => '3-5 years', 'experience_kh' => '3-5 ឆ្នាំ', 'experience_th' => '3-5 ปี'],
            ['experience_ch' => '5-10年', 'experience_en' => '5-10 years', 'experience_kh' => '5-10 ឆ្នាំ', 'experience_th' => '5-10 ปี'],
            ['experience_ch' => '超过10年', 'experience_en' => 'Over 10 years', 'experience_kh' => 'លើស 10 ឆ្នាំ', 'experience_th' => 'กว่า 10 ปี'],
        ];
        JobExperience::insert($job_experiences);
    }
}
