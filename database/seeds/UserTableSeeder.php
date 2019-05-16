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
        $role_admin = Role::where('name', 'admin')->first();
        $user->name = 'Admin';
        $user->email = 'administrator@administrator.com';
        $user->password = bcrypt('udg123');
        $user->status = 1;
        $user->email_verified_at = '2019-03-05 06:01:06';
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $role_student = Role::where('name', 'student')->first();
        $user->name = 'Student';
        $user->email = 'student@student.com';
        $user->password = bcrypt('udg123');
        $user->status = 1;
        $user->email_verified_at = '2019-03-05 06:01:06';
        $user->save();
        $user->roles()->attach($role_student);

        $user = new User();
        $role_tutor = Role::where('name', 'tutor')->first();
        $user->name = 'Tutor';
        $user->email = 'tutor@tutor.com';
        $user->password = bcrypt('udg123');
        $user->status = 1;
        $user->email_verified_at = '2019-03-05 06:01:06';
        $user->save();
        $user->roles()->attach($role_tutor);

    }
}
