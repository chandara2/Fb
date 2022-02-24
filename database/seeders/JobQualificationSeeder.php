<?php

namespace Database\Seeders;

use App\Models\JobQualification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobQualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_qualifications')->delete();

        $job_qualifications = [
            ['qualification_ch' => '没有限制', 'qualification_en' => 'No limitations', 'qualification_kh' => 'មិនកំណត់', 'qualification_th' => 'ไม่มีข้อจำกัด'],
            ['qualification_ch' => '中学', 'qualification_en' => 'High School', 'qualification_kh' => 'វិទ្យាល័យ', 'qualification_th' => 'มัธยม'],
            ['qualification_ch' => '副学士学位', 'qualification_en' => 'Associate Degree', 'qualification_kh' => 'បរិញ្ញាបត្ររង', 'qualification_th' => 'อนุปริญญา'],
            ['qualification_ch' => '学士文凭', 'qualification_en' => 'Bachelor Degree', 'qualification_kh' => 'បរិញ្ញាប័ត្រ', 'qualification_th' => 'ปริญญาตรี'],
            ['qualification_ch' => '硕士学位', 'qualification_en' => 'Master Degree', 'qualification_kh' => 'កម្រិត​អនុបណ្ឌិត', 'qualification_th' => 'ปริญญาโท'],
            ['qualification_ch' => '专业学位', 'qualification_en' => 'Professional Degree', 'qualification_kh' => 'សញ្ញាបត្រវិជ្ជាជីវៈ', 'qualification_th' => 'ระดับมืออาชีพ'],
            ['qualification_ch' => '博士学位', 'qualification_en' => 'Doctor Degree', 'qualification_kh' => 'សញ្ញាប័ត្របណ្ឌិត', 'qualification_th' => 'ปริญญาเอก'],
        ];
        JobQualification::insert($job_qualifications);
    }
}
