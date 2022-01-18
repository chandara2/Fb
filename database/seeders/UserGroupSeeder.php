<?php

namespace Database\Seeders;

use App\Models\Usergroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usergroup')->delete();

        $usergroup = [
            ['name' => 'Admin'],
            ['name' => 'Agency'],
            ['name' => 'User'],
        ];
        Usergroup::insert($usergroup);
    }
}
