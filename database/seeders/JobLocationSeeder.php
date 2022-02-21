<?php

namespace Database\Seeders;

use App\Models\JobLocation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_locations')->delete();

        $job_locations = [
            ['location_ch' => '班迭棉芷', 'location_en' => 'Banteay Meanchey', 'location_kh' => 'បន្ទាយមានជ័យ', 'location_th' => 'บันทายมีชัย'],
            ['location_ch' => '马德望', 'location_en' => 'Battambang', 'location_kh' => 'បាត់ដំបង', 'location_th' => 'พระตะบอง'],
            ['location_ch' => '磅湛', 'location_en' => 'Kampong Cham', 'location_kh' => 'កំពង់ចាម', 'location_th' => 'กำปงจาม'],
            ['location_ch' => '磅清扬', 'location_en' => 'Kampong Chhnang', 'location_kh' => 'កំពង់ឆ្នាំង', 'location_th' => 'กำปงชนัง'],
            ['location_ch' => '磅士卑省', 'location_en' => 'Kampong Speu', 'location_kh' => 'កំពង់ស្ពឺ', 'location_th' => 'กำปงสปือ'],
            ['location_ch' => '磅同', 'location_en' => 'Kampong Thom', 'location_kh' => 'កំពង់ធំ', 'location_th' => 'กำปงธม'],
            ['location_ch' => '贡布', 'location_en' => 'Kampot', 'location_kh' => 'កំពត', 'location_th' => 'กำปอต'],
            ['location_ch' => '坎达尔', 'location_en' => 'Kandal', 'location_kh' => 'កណ្តាល', 'location_th' => 'ศูนย์กลาง'],
            ['location_ch' => '戈公', 'location_en' => 'Koh Kong', 'location_kh' => 'កោះកុង', 'location_th' => 'เกาะกง'],
            ['location_ch' => '桔井', 'location_en' => 'Kratié', 'location_kh' => 'ក្រចេះ', 'location_th' => 'กระแจะ'],
            ['location_ch' => '蒙多基里', 'location_en' => 'Mondulkiri', 'location_kh' => 'មណ្ឌលគិរី', 'location_th' => 'มลฑลคีรี'],
            ['location_ch' => '金边', 'location_en' => 'Phnom Penh', 'location_kh' => 'ភ្នំពេញ', 'location_th' => 'พนมเปญ'],
            ['location_ch' => '柏威夏', 'location_en' => 'Preah Vihear', 'location_kh' => 'ព្រះវិហារ', 'location_th' => 'พระวิหาร'],
            ['location_ch' => '猎物', 'location_en' => 'Prey Veng', 'location_kh' => 'ព្រៃវែង', 'location_th' => 'เหยื่อ veng'],
            ['location_ch' => '菩萨', 'location_en' => 'Pursat', 'location_kh' => 'ពោធិសាត់', 'location_th' => 'Pursat'],
            ['location_ch' => '拉塔纳基里', 'location_en' => 'Ratanak Kiri', 'location_kh' => 'រតនគិរី', 'location_th' => 'รัตนาคีรี'],
            ['location_ch' => '暹粒市', 'location_en' => 'Siem Reap', 'location_kh' => 'សៀមរាប', 'location_th' => 'เสียมราฐ'],
            ['location_ch' => '西哈努克', 'location_en' => 'Preah Sihanouk', 'location_kh' => 'ព្រះសីហនុ', 'location_th' => 'พระสีหนุ'],
            ['location_ch' => '上丁', 'location_en' => 'Stung Treng', 'location_kh' => 'ស្ទឹងត្រែង', 'location_th' => 'สตึงแตรง'],
            ['location_ch' => '柴桢', 'location_en' => 'Svay Rieng', 'location_kh' => 'ស្វាយរៀង', 'location_th' => 'สวาย เรียง'],
            ['location_ch' => '武雄', 'location_en' => 'Takéo', 'location_kh' => 'តាកែវ', 'location_th' => 'O การใช้'],
            ['location_ch' => '奥达棉芷', 'location_en' => 'Oddar Meanchey', 'location_kh' => 'ឧត្តរមានជ័យ', 'location_th' => 'Oddar Meanchey'],
            ['location_ch' => '凯普', 'location_en' => 'Kep', 'location_kh' => 'កែប', 'location_th' => 'Kep'],
            ['location_ch' => '拜林', 'location_en' => 'Pailin', 'location_kh' => 'ប៉ៃលិន', 'location_th' => 'ไพลิน'],
            ['location_ch' => 'Tboung Khmum', 'location_en' => 'Tboung Khmum', 'location_kh' => 'ត្បូងឃ្មុំ', 'location_th' => 'ทบอง คุ้ม'],
        ];
        JobLocation::insert($job_locations);
    }
}
