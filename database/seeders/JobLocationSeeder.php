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
            ['name' => 'Banteay Meanchey'],
            ['name' => 'Battambang'],
            ['name' => 'Kampong Cham'],
            ['name' => 'Kampong Chhnang'],
            ['name' => 'Kampong Speu'],
            ['name' => 'Kampong Thom'],
            ['name' => 'Kampot'],
            ['name' => 'Kandal'],
            ['name' => 'Koh Kong'],
            ['name' => 'Kratié'],
            ['name' => 'Mondulkiri'],
            ['name' => 'Phnom Penh'],
            ['name' => 'Preah Vihear'],
            ['name' => 'Prey Veng'],
            ['name' => 'Pursat'],
            ['name' => 'Ratanak Kiri'],
            ['name' => 'Siem Reap'],
            ['name' => 'Preah Sihanouk'],
            ['name' => 'Stung Treng'],
            ['name' => 'Svay Rieng'],
            ['name' => 'Takéo'],
            ['name' => 'Oddar Meanchey'],
            ['name' => 'Kep'],
            ['name' => 'Pailin'],
            ['name' => 'Tboung Khmum'],
        ];
        JobLocation::insert($job_locations);
    }
}
