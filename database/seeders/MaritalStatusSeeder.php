<?php

namespace Database\Seeders;

use App\Models\MaritalStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Usergroup
        DB::table('marital_statuses')->delete();

        $status = [
            ['status' => 'Single'],
            ['status' => 'Married'],
            ['status' => 'Divorced'],
        ];
        MaritalStatus::insert($status);
    }
}
