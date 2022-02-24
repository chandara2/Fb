<?php

namespace Database\Seeders;

use App\Models\JobGender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobGenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_genders')->delete();

        $job_genders = [
            ['gender_ch' => '男性', 'gender_en' => 'Male', 'gender_kh' => 'ប្រុស', 'gender_th' => 'ชาย'],
            ['gender_ch' => '女性', 'gender_en' => 'Female', 'gender_kh' => 'ស្រី', 'gender_th' => 'หญิง'],
            ['gender_ch' => '男性/女性', 'gender_en' => 'Male/Female', 'gender_kh' => 'ប្រុស/ស្រី', 'gender_th' => 'ชาย/หญิง'],
        ];
        JobGender::insert($job_genders);
    }
}
