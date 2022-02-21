<?php

namespace Database\Seeders;

use App\Models\JobIndustry;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobIndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_industries')->delete();

        $job_industries = [
            ['industry_ch' => '会计/审计/税务服务', 'industry_en' => 'Accounting/Audit/Tax Services', 'industry_kh' => 'គណនេយ្យ/សវនកម្ម/សេវាពន្ធ', 'industry_th' => 'การบัญชี/ตรวจสอบ/บริการด้านภาษี'],
            ['industry_ch' => '农业/林业/钓鱼', 'industry_en' => 'Agriculture/Foresty/Fishing', 'industry_kh' => 'កសិកម្ម/ព្រៃឈើ/ការនេសាទ', 'industry_th' => 'เกษตรกรรม/ป่าไม้/ตกปลา'],
            ['industry_ch' => '航空公司', 'industry_en' => 'Airline', 'industry_kh' => 'ក្រុមហ៊ុនអាកាសចរណ៍', 'industry_th' => 'สายการบิน'],
            ['industry_ch' => '化学/塑料/纸/石化', 'industry_en' => 'Chemical/Plastic/Paper/Petrochemical', 'industry_kh' => 'គីមី/ផ្លាស្ទិច/ក្រដាស/គីមីឥន្ធនៈ', 'industry_th' => 'เคมี/พลาสติก/กระดาษ/ปิโตรเคมี'],
            ['industry_ch' => '公务员', 'industry_en' => 'Civil Services', 'industry_kh' => 'សេវាកម្មស៊ីវិល', 'industry_th' => 'ราชการ'],
            ['industry_ch' => '化妆品与美容', 'industry_en' => 'Cosmetics & Beauty', 'industry_kh' => 'គ្រឿងសម្អាង និងសម្រស់', 'industry_th' => 'เครื่องสำอางและความงาม'],
            ['industry_ch' => '电子产品/电气/机械设备', 'industry_en' => 'Electronics/Electrical/Mechanical Equipment', 'industry_kh' => 'អេឡិចត្រូនិក/អគ្គិសនី/ឧបករណ៍មេកានិច', 'industry_th' => 'อิเล็กทรอนิกส์/ไฟฟ้า/อุปกรณ์เครื่องกล'],
            ['industry_ch' => '活力/力量/水/石油和天然气', 'industry_en' => 'Energy/Power/Water/Oil & Gas', 'industry_kh' => 'ថាមពល/ថាមពល/ទឹក/ប្រេង និងឧស្ម័ន', 'industry_th' => 'พลังงาน/พลัง/น้ำ/น้ำมันก๊าซ'],
            ['industry_ch' => '工程', 'industry_en' => 'Engineering', 'industry_kh' => 'វិស្វកម្ម', 'industry_th' => 'วิศวกรรม'],
            ['industry_ch' => '酒店/款待', 'industry_en' => 'Hotel/Hospitality', 'industry_kh' => 'សណ្ឋាគារ/បដិសណ្ឋារកិច្ច', 'industry_th' => 'โรงแรม/การต้อนรับขับสู้'],
            ['industry_ch' => '人力资源', 'industry_en' => 'Human Resource', 'industry_kh' => 'ធនធានមនុស្ស', 'industry_th' => 'ทรัพยากรบุคคล'],
            ['industry_ch' => '工业机械/自动化设备', 'industry_en' => 'Industrial Machinery/Automation Equipment', 'industry_kh' => 'គ្រឿងម៉ាស៊ីនឧស្សាហកម្ម/ឧបករណ៍ស្វ័យប្រវត្តិកម្ម', 'industry_th' => 'เครื่องจักรอุตสาหกรรม/อุปกรณ์อัตโนมัติ'],
            ['industry_ch' => '信息技术', 'industry_en' => 'Information Technology', 'industry_kh' => 'ព​ត៌​មាន​វិទ្យា', 'industry_th' => 'เทคโนโลยีสารสนเทศ'],
            ['industry_ch' => '保险', 'industry_en' => 'Insurance', 'industry_kh' => 'ធានារ៉ាប់រង', 'industry_th' => 'ประกันภัย'],
            ['industry_ch' => '首饰/宝石/手表', 'industry_en' => 'Jewellery/Gems/Watches', 'industry_kh' => 'គ្រឿងអលង្ការ/ត្បូង/នាឡិកា', 'industry_th' => 'เครื่องประดับ/อัญมณี/นาฬิกา'],
            ['industry_ch' => '法律服务', 'industry_en' => 'Legal Services', 'industry_kh' => 'សេវាច្បាប់', 'industry_th' => 'บริการด้านกฎหมาย'],
            ['industry_ch' => '制造业', 'industry_en' => 'Manufacturing', 'industry_kh' => 'ការផលិត', 'industry_th' => 'การผลิต'],
            ['industry_ch' => '包装', 'industry_en' => 'Packaging', 'industry_kh' => 'ការវេចខ្ចប់', 'industry_th' => 'บรรจุภัณฑ์'],
            ['industry_ch' => '表现/音乐/艺术的', 'industry_en' => 'Performance/Musical/Artistic', 'industry_kh' => 'ការសម្តែង/តន្ត្រី/សិល្បៈ', 'industry_th' => 'ผลงาน/ดนตรี/ศิลปะ'],
            ['industry_ch' => '房地产开发/管理', 'industry_en' => 'Property Development/Management', 'industry_kh' => 'ការអភិវឌ្ឍន៍អចលនទ្រព្យ/ការគ្រប់គ្រង', 'industry_th' => 'พัฒนาอสังหาริมทรัพย์/การจัดการ'],
            ['industry_ch' => '房地产', 'industry_en' => 'Real Estate', 'industry_kh' => 'អចលន​ទ្រព្យ', 'industry_th' => 'อสังหาริมทรัพย์'],
            ['industry_ch' => '房地产租赁/获得', 'industry_en' => 'Real Estate Leasing/Acquisition', 'industry_kh' => 'ការជួលអចលនទ្រព្យ/ការទិញយក', 'industry_th' => 'ลิสซิ่งอสังหาริมทรัพย์/การเข้าซื้อกิจการ'],
            ['industry_ch' => '招聘服务', 'industry_en' => 'Recruiting Services', 'industry_kh' => 'សេវាកម្មជ្រើសរើសបុគ្គលិក', 'industry_th' => 'บริการจัดหางาน'],
            ['industry_ch' => '安全/火/电子门禁控制', 'industry_en' => 'Security/Fire/Electronic Access Controls', 'industry_kh' => 'សុវត្ថិភាព/ភ្លើង/ការគ្រប់គ្រងការចូលប្រើអេឡិចត្រូនិច', 'industry_th' => 'ความปลอดภัย/ไฟ/ระบบควบคุมการเข้าออกด้วยระบบอิเล็กทรอนิกส์'],
            ['industry_ch' => '车辆维修与保养', 'industry_en' => 'Vehicle Repair & Maintenance', 'industry_kh' => 'ជួសជុល និងថែទាំយានយន្ត', 'industry_th' => 'การซ่อมแซมและบำรุงรักษายานพาหนะ'],
            ['industry_ch' => '其他', 'industry_en' => 'Others', 'industry_kh' => 'ផ្សេងៗ', 'industry_th' => 'คนอื่น'],
            ['industry_ch' => '娱乐', 'industry_en' => 'Entertainment', 'industry_kh' => 'ការកំសាន្ត', 'industry_th' => 'ความบันเทิง'],
            ['industry_ch' => '一般商业服务', 'industry_en' => 'General Business Services', 'industry_kh' => 'សេវាកម្មអាជីវកម្មទូទៅ', 'industry_th' => 'บริการธุรกิจทั่วไป'],
            ['industry_ch' => '教育', 'industry_en' => 'Education', 'industry_kh' => 'ការអប់រំ', 'industry_th' => 'การศึกษา'],
            ['industry_ch' => '银行与金融', 'industry_en' => 'Banking & Finance', 'industry_kh' => 'ធនាគារ និងហិរញ្ញវត្ថុ', 'industry_th' => 'การธนาคารและการเงิน'],
            ['industry_ch' => '医疗的/制药', 'industry_en' => 'Medical/Pharmaceutical', 'industry_kh' => 'វេជ្ជសាស្ត្រ/ឱសថ', 'industry_th' => 'ทางการแพทย์/เภสัชกรรม'],
            ['industry_ch' => '建筑学/建筑/建造', 'industry_en' => 'Architecture/Building/Construction', 'industry_kh' => 'ស្ថាបត្យកម្ម/អគារ/សំណង់', 'industry_th' => 'สถาปัตยกรรม/อาคาร/การก่อสร้าง'],
            ['industry_ch' => '服装/服装/纺织品', 'industry_en' => 'Clothing/Garment/Textile', 'industry_kh' => 'សម្លៀកបំពាក់/សម្លៀកបំពាក់/វាយនភណ្ឌ', 'industry_th' => 'เสื้อผ้า/เสื้อผ้า/สิ่งทอ'],
            ['industry_ch' => '贸易', 'industry_en' => 'Trading', 'industry_kh' => 'ការជួញដូរ', 'industry_th' => 'การซื้อขาย'],
            ['industry_ch' => '静止的/图书/玩具', 'industry_en' => 'Stationery/Books/Toys', 'industry_kh' => 'សម្ភារៈការិយាល័យ/សៀវភៅ/ប្រដាប់ក្មេងលេង', 'industry_th' => 'เครื่องเขียน/หนังสือ/ของเล่น'],
            ['industry_ch' => '非政府组织/慈善机构/社会服务', 'industry_en' => 'NGO/Charity/Social Services', 'industry_kh' => 'អង្គការក្រៅរដ្ឋាភិបាល/សប្បុរសធម៌/សេវា​សង្គម', 'industry_th' => 'เอ็นจีโอ/การกุศล/บริการสังคม'],
            ['industry_ch' => '广告/媒体/出版/印刷', 'industry_en' => 'Advertising/Media/Publishing/Printing', 'industry_kh' => 'ការផ្សាយពាណិជ្ជកម្ម/ប្រព័ន្ធផ្សព្វផ្សាយ/ការបោះពុម្ព/ការបោះពុម្ព', 'industry_th' => 'การโฆษณา/สื่อ/เผยแพร่/การพิมพ์'],
            ['industry_ch' => '批发的/零售', 'industry_en' => 'Wholesale/Retail', 'industry_kh' => 'លក់ដុំ/លក់​រាយ', 'industry_th' => 'ขายส่ง/ค้าปลีก'],
            ['industry_ch' => '健康/个人护理', 'industry_en' => 'Health/Personal Care', 'industry_kh' => 'សុខភាព/ការថែទាំផ្ទាល់ខ្លួន', 'industry_th' => 'สุขภาพ/การดูแลส่วนบุคคล'],
            ['industry_ch' => '后勤/货运/船运/送货/仓库', 'industry_en' => 'Logistics/Freight/Shipping/Delivery/Warehouse', 'industry_kh' => 'ភស្តុភារ/ទំនិញ/ការដឹកជញ្ជូន/ការដឹកជញ្ជូន/ឃ្លាំង', 'industry_th' => 'โลจิสติกส์/ค่าขนส่ง/การส่งสินค้า/จัดส่ง/คลังสินค้า'],
            ['industry_ch' => '旅游', 'industry_en' => 'Tourism', 'industry_kh' => 'ទេសចរណ៍', 'industry_th' => 'การท่องเที่ยว'],
            ['industry_ch' => '食品和饮料', 'industry_en' => 'Food & Beverages', 'industry_kh' => 'អាហារ និងភេសជ្ជៈ', 'industry_th' => 'อาหารและเครื่องดื่ม'],
            ['industry_ch' => '运动与休闲', 'industry_en' => 'Sports & Recreation', 'industry_kh' => 'កីឡា និងការកម្សាន្ត', 'industry_th' => 'กีฬาและสันทนาการ'],
            ['industry_ch' => '电信', 'industry_en' => 'Telecommunications', 'industry_kh' => 'ទូរគមនាគមន៍', 'industry_th' => 'โทรคมนาคม'],
            ['industry_ch' => '餐饮', 'industry_en' => 'Catering', 'industry_kh' => 'ការផ្តល់ម្ហូបអាហារ', 'industry_th' => 'จัดเลี้ยง'],
            ['industry_ch' => '汽车/车辆', 'industry_en' => 'Automotive/Vehicle', 'industry_kh' => 'រថយន្ត/យានជំនិះ', 'industry_th' => 'ยานยนต์/ยานพาหนะ'],
            ['industry_ch' => '政府', 'industry_en' => 'Government', 'industry_kh' => 'រដ្ឋាភិបាល', 'industry_th' => 'รัฐบาล'],
            ['industry_ch' => '顾问/咨询', 'industry_en' => 'Advisor/Consultancy', 'industry_kh' => 'ទីប្រឹក្សា/ប្រឹក្សាយោបល់', 'industry_th' => 'ที่ปรึกษา/ที่ปรึกษา'],
        ];
        JobIndustry::insert($job_industries);
    }
}
