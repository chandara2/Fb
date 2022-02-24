<?php

namespace Database\Seeders;

use App\Models\JobLevel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_levels')->delete();

        $job_levels = [
            ['level_ch' => '入门级', 'level_en' => 'Entry Level', 'level_kh' => 'កម្រិតចូល', 'level_th' => 'ระดับเริ่มต้น'],
            ['level_ch' => '中间', 'level_en' => 'Middle', 'level_kh' => 'កណ្តាល', 'level_th' => 'กลาง'],
            ['level_ch' => '高级的', 'level_en' => 'Senior', 'level_kh' => 'ជាន់ខ្ពស់', 'level_th' => 'อาวุโส'],
            ['level_ch' => '最佳', 'level_en' => 'Top', 'level_kh' => 'កំពូល', 'level_th' => 'สูงสุด'],
            ['level_ch' => '应届毕业生', 'level_en' => 'Fresh Graduate', 'level_kh' => 'និស្សិតបញ្ចប់ការសិក្សា', 'level_th' => 'บัณฑิตใหม่'],
        ];
        JobLevel::insert($job_levels);
    }
}
