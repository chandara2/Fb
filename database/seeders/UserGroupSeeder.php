<?php

namespace Database\Seeders;

use App\Models\Status;
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
        // Usergroup
        DB::table('usergroups')->delete();

        $usergroup = [
            ['name' => 'Admin'],
            ['name' => 'Supervisor'],
            ['name' => 'User'],
        ];
        Usergroup::insert($usergroup);

        // Admin, Agency, User
        DB::table('users')->delete();

        $user = [
            [
                'gid' => '1',
                'fname'=>'Admin',
                'gname'=>'Dara',
                'username'=>'admindara',
                'phone'=>'0885275842',
                'password'=>Hash::make('admindaraadmindara'),
                'visible'=> true,
            ],
            [
                'gid' => '2',
                'fname'=>'Supervisor',
                'gname'=>'Dara',
                'username'=>'supervisordara',
                'phone'=>'0885275843',
                'password'=>Hash::make('supervisordarasupervisordara'),
                'visible'=> true,
            ],
            [
                'gid' => '3',
                'fname'=>'User',
                'gname'=>'Dara',
                'username'=>'userdara',
                'phone'=>'0885275844',
                'password'=>Hash::make('userdarauserdara'),
                'visible'=> true,
            ],
        ];
        User::insert($user);

        // FB Status
        DB::table('statuses')->delete();

        $status = [
            ['status' => 'Normal'],
            ['status' => 'Checkpoint'],
            ['status' => 'Block ads'],
        ];
        Status::insert($status);

    }
}
