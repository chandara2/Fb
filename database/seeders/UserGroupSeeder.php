<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usergroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usergroups')->delete();

        $usergroup = [
            ['name' => 'Admin'],
            ['name' => 'Agency'],
            ['name' => 'User'],
        ];
        Usergroup::insert($usergroup);

        // Admin
        DB::table('users')->delete();

        $user = [
            [
                'gid' => '1',
                'fname'=>'Chan',
                'gname'=>'Dara',
                'username'=>'admin',
                'phone'=>'0885275842',
                'password'=>Hash::make('adminadmin'),
                'visible'=> true,
            ],
        ];
        User::insert($user);
    }
}
