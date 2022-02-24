<?php

namespace Database\Seeders;

use App\Models\JobEducation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_educations')->delete();

        $job_educations = [
            ['education_ch' => '没有限制', 'education_en' => 'No limitations', 'education_kh' => 'មិនកំណត់', 'education_th' => 'ไม่มีข้อจำกัด'],
            ['education_ch' => '中学', 'education_en' => 'High School', 'education_kh' => 'វិទ្យាល័យ', 'education_th' => 'มัธยม'],
            ['education_ch' => '副学士学位', 'education_en' => 'Associate Degree', 'education_kh' => 'បរិញ្ញាបត្ររង', 'education_th' => 'อนุปริญญา'],
            ['education_ch' => '学士文凭', 'education_en' => 'Bachelor Degree', 'education_kh' => 'បរិញ្ញាប័ត្រ', 'education_th' => 'ปริญญาตรี'],
            ['education_ch' => '硕士学位', 'education_en' => 'Master Degree', 'education_kh' => 'កម្រិត​អនុបណ្ឌិត', 'education_th' => 'ปริญญาโท'],
            ['education_ch' => '专业学位', 'education_en' => 'Professional Degree', 'education_kh' => 'សញ្ញាបត្រវិជ្ជាជីវៈ', 'education_th' => 'ระดับมืออาชีพ'],
            ['education_ch' => '博士学位', 'education_en' => 'Doctor Degree', 'education_kh' => 'សញ្ញាប័ត្របណ្ឌិត', 'education_th' => 'ปริญญาเอก'],
        ];
        JobEducation::insert($job_educations);
    }
}
