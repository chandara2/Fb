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
            ['name' => 'Accounting'],
            ['name' => 'Administration'],
            ['name' => 'Architecture Engineering'],
            ['name' => 'Assistant Secretary'],
            ['name' => 'Audit Taxation'],
            ['name' => 'Bank Insurance'],
            ['name' => 'Cashier Receptionist'],
            ['name' => 'Catering Restaurant'],
            ['name' => 'Consultancy'],
            ['name' => 'Cook Cleaner Maid'],
            ['name' => 'Customer Service'],
            ['name' => 'Design'],
            ['name' => 'Driver Security'],
            ['name' => 'Education Training'],
            ['name' => 'Finance'],
            ['name' => 'Hotel Hospitality'],
            ['name' => 'Human Resource'],
            ['name' => 'IT'],
            ['name' => 'Lawyer Legal Service'],
            ['name' => 'Logistics Shipping Deliver Warehouse'],
            ['name' => 'Management'],
            ['name' => 'Manufacturing'],
            ['name' => 'Marketing'],
            ['name' => 'Media Advertising'],
            ['name' => 'Medical Health Nursing'],
            ['name' => 'Merchandising Purchasing'],
            ['name' => 'Operation Production'],
            ['name' => 'Others'],
            ['name' => 'Project Management'],
            ['name' => 'QC QA'],
            ['name' => 'Resort Casino'],
            ['name' => 'Sales'],
            ['name' => 'Technician Maintenance'],
            ['name' => 'Telecommunication'],
            ['name' => 'Translation Interpretation'],
            ['name' => 'Travel Agent Ticket Sales'],
        ];
        JobFunction::insert($job_functions);
    }
}
