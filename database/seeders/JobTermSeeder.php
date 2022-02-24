<?php

namespace Database\Seeders;

use App\Models\JobTerm;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_terms')->delete();

        $job_terms = [
            ['term_ch' => '合同', 'term_en' => 'Contract', 'term_kh' => 'កិច្ចសន្យា', 'term_th' => 'สัญญา'],
            ['term_ch' => '全职', 'term_en' => 'Full Time', 'term_kh' => 'ពេញ​មោ៉​ង', 'term_th' => 'เต็มเวลา'],
            ['term_ch' => '兼职', 'term_en' => 'Part Time', 'term_kh' => 'ក្រៅ​ម៉ោង', 'term_th' => 'ไม่เต็มเวลา'],
            ['term_ch' => '暂时的', 'term_en' => 'Temporary', 'term_kh' => 'បណ្ដោះអាសន្ន', 'term_th' => 'ชั่วคราว'],
            ['term_ch' => '实习', 'term_en' => 'Internship', 'term_kh' => 'កម្មសិក្សា', 'term_th' => 'ฝึกงาน'],
        ];
        JobTerm::insert($job_terms);
    }
}
