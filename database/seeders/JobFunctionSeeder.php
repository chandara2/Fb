<?php

namespace Database\Seeders;

use App\Models\JobFunction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobFunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_functions')->delete();

        $job_functions = [
            ['function_ch' => '事业无限', 'function_en' => 'Career Unlimited', 'function_kh' => 'អាជីពគ្មានដែនកំណត់', 'function_th' => 'อาชีพไม่จำกัด'],
            ['function_ch' => '助手/秘书', 'function_en' => 'Assistant/Secretary', 'function_kh' => 'ជំនួយការ/លេខាធិការ', 'function_th' => 'ผู้ช่วย/เลขานุการ'],
            ['function_ch' => '会计', 'function_en' => 'Accounting', 'function_kh' => 'គណនេយ្យ', 'function_th' => 'การบัญชี'],
            ['function_ch' => '行政', 'function_en' => 'Administration', 'function_kh' => 'រដ្ឋបាល', 'function_th' => 'การบริหาร'],
            ['function_ch' => '营销', 'function_en' => 'Marketing', 'function_kh' => 'ទីផ្សារ', 'function_th' => 'การตลาด'],
            ['function_ch' => '信息技术', 'function_en' => 'IT', 'function_kh' => 'ព​ត៌​មាន​វិទ្យា', 'function_th' => 'เทคโนโลยีสารสนเทศ'],
            ['function_ch' => '司机/安全', 'function_en' => 'Driver/Security', 'function_kh' => 'អ្នកបើកបរ/សន្តិសុខ', 'function_th' => 'คนขับรถ/ความปลอดภัย'],
            ['function_ch' => '建筑学/工程', 'function_en' => 'Architecture/Engineering', 'function_kh' => 'ស្ថាបត្យកម្ម/វិស្វកម្ម', 'function_th' => 'สถาปัตยกรรม/วิศวกรรม'],
            ['function_ch' => '媒体/广告', 'function_en' => 'Media/Advertising', 'function_kh' => 'ប្រព័ន្ធផ្សព្វផ្សាយ/ការផ្សាយពាណិជ្ជកម្ម', 'function_th' => 'สื่อ/การโฆษณา'],
            ['function_ch' => '咨询', 'function_en' => 'Consultancy', 'function_kh' => 'ប្រឹក្សាយោបល់', 'function_th' => 'ที่ปรึกษา'],
            ['function_ch' => '翻译/解释', 'function_en' => 'Translation/Interpretation', 'function_kh' => 'ការបកប្រែ/ការបកស្រាយ', 'function_th' => 'การแปล/การตีความ'],
            ['function_ch' => '教育/训练', 'function_en' => 'Education/Training', 'function_kh' => 'ការអប់រំ/ការបណ្តុះបណ្តាល', 'function_th' => 'การศึกษา/การฝึกอบรม'],
            ['function_ch' => '律师/法律服务', 'function_en' => 'Lawyer/Legal Service', 'function_kh' => 'មេធាវី/សេវាច្បាប់', 'function_th' => 'ทนายความ/บริการทางกฎหมาย'],
            ['function_ch' => '客户服务', 'function_en' => 'Customer Service', 'function_kh' => 'សេវាកម្ម​អតិថិជន', 'function_th' => 'บริการลูกค้า'],
            ['function_ch' => '技术员/维护', 'function_en' => 'Technician/Maintenance', 'function_kh' => 'អ្នកបច្ចេកទេស/ថែទាំ', 'function_th' => 'ช่าง/การซ่อมบำรุง'],
            ['function_ch' => '后勤/船运/递送/仓库', 'function_en' => 'Logistics/Shipping/Deliver/Warehouse', 'function_kh' => 'ភស្តុភារ/ការដឹកជញ្ជូន/ចែកចាយ/ឃ្លាំង', 'function_th' => 'โลจิสติกส์/การส่งสินค้า/ส่งมอบ/คลังสินค้า'],
            ['function_ch' => 'QC/QA', 'function_en' => 'QC/QA', 'function_kh' => 'QC/QA', 'function_th' => 'QC/QA'],
            ['function_ch' => '推销/购买', 'function_en' => 'Merchandising/Purchasing', 'function_kh' => 'ការ​លក់​ទំនិញ/ការទិញ', 'function_th' => 'การขายสินค้า/การจัดซื้อ'],
            ['function_ch' => '电信', 'function_en' => 'Telecommunications', 'function_kh' => 'ទូរគមនាគមន៍', 'function_th' => 'โทรคมนาคม'],
            ['function_ch' => '餐饮/餐厅', 'function_en' => 'Catering/Restaurant', 'function_kh' => 'អាហារដ្ឋាន/ភោជនីយដ្ឋាន', 'function_th' => 'จัดเลี้ยง/ร้านอาหาร'],
            ['function_ch' => '采取/赌场', 'function_en' => 'Resort/Casino', 'function_kh' => 'រមណីយដ្ឋាន/កាស៊ីណូ', 'function_th' => 'รีสอร์ท/คาสิโน'],
            ['function_ch' => '医疗的/健康/护理', 'function_en' => 'Medical/Health/Nursing', 'function_kh' => 'វេជ្ជសាស្ត្រ/សុខភាព/គិលានុបដ្ឋាយិកា', 'function_th' => 'ทางการแพทย์/สุขภาพ/การพยาบาล'],
            ['function_ch' => '银行/保险', 'function_en' => 'Bank/Insurance', 'function_kh' => 'ធនាគារ/ធានារ៉ាប់រង', 'function_th' => 'ธนาคาร/ประกันภัย'],
            ['function_ch' => '制造业', 'function_en' => 'Manufacturing', 'function_kh' => 'ការផលិត', 'function_th' => 'การผลิต'],
            ['function_ch' => '旅行社/售票', 'function_en' => 'Travel Agent/Ticket Sales', 'function_kh' => 'ភ្នាក់ងារ​ធ្វើ​ដំណើរ/ការលក់សំបុត្រ', 'function_th' => 'ตัวแทนท่องเที่ยว/ขายตั๋ว'],
            ['function_ch' => '其他', 'function_en' => 'Others', 'function_kh' => 'ផ្សេងៗ', 'function_th' => 'คนอื่น'],
            ['function_ch' => '审计/税收', 'function_en' => 'Audit/Taxation', 'function_kh' => 'សវនកម្ម/ការបង់ពន្ធ', 'function_th' => 'ตรวจสอบ/การเก็บภาษี'],
            ['function_ch' => '金融', 'function_en' => 'Finance', 'function_kh' => 'ហិរញ្ញវត្ថុ', 'function_th' => 'การเงิน'],
            ['function_ch' => '酒店/款待', 'function_en' => 'Hotel/Hospitality', 'function_kh' => 'សណ្ឋាគារ/បដិសណ្ឋារកិច្ច', 'function_th' => 'โรงแรม/การต้อนรับขับสู้'],
            ['function_ch' => '人力资源', 'function_en' => 'Human Resource', 'function_kh' => 'ធនធានមនុស្ស', 'function_th' => 'ทรัพยากรบุคคล'],
            ['function_ch' => '设计', 'function_en' => 'Design', 'function_kh' => 'រចនា', 'function_th' => 'ออกแบบ'],
            ['function_ch' => '管理', 'function_en' => 'Management', 'function_kh' => 'ការគ្រប់គ្រង', 'function_th' => 'การจัดการ'],
            ['function_ch' => '手术/生产', 'function_en' => 'Operation/Production', 'function_kh' => 'ប្រតិបត្តិការ/ផលិតផល', 'function_th' => 'การดำเนินการ/การผลิต'],
            ['function_ch' => '项目管理', 'function_en' => 'Project Management', 'function_kh' => 'ការ​គ្រប់គ្រង​គម្រោង', 'function_th' => 'การบริหารโครงการ'],
            ['function_ch' => '销售量', 'function_en' => 'Sales', 'function_kh' => 'ការលក់', 'function_th' => 'ฝ่ายขาย'],
            ['function_ch' => '厨师/清洁器/女佣', 'function_en' => 'Cook/Cleaner/Maid', 'function_kh' => 'ចម្អិន/អ្នកសម្អាត/អ្នកបំរើ', 'function_th' => 'ทำอาหาร/คนทำความสะอาด/แม่บ้าน'],
            ['function_ch' => '出纳员/接待员', 'function_en' => 'Cashier/Receptionist', 'function_kh' => 'អ្នកគិតលុយ/អ្នកទទួលភ្ញៀវ', 'function_th' => 'แคชเชียร์/พนักงานต้อนรับ'],

        ];
        JobFunction::insert($job_functions);
    }
}
