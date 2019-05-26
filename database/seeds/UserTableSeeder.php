<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Admin';
        $user->role_id = 1;
        $user->email = 'administrator@administrator.com';
        $user->password = bcrypt('udg123');
        $user->status = 1;
        $user->email_verified_at = '2019-03-05 06:01:06';
        $user->save();

        $user = new User();
        $user->name = 'Student';
        $user->role_id = 3;
        $user->email = 'student@student.com';
        $user->password = bcrypt('udg123');
        $user->status = 1;
        $user->email_verified_at = '2019-03-05 06:01:06';
        $user->save();

        $user = new User();
        $user->name = 'Tutor';
        $user->role_id = 2;
        $user->email = 'tutor@tutor.com';
        $user->password = bcrypt('udg123');
        $user->status = 1;
        $user->email_verified_at = '2019-03-05 06:01:06';
        $user->save();

    }
}
