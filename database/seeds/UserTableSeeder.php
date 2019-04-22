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
        $user->avatar = 'public/avatars/user.png';
        $user->status = 1;
        $user->email_verified_at = '2019-03-05 06:01:06';
        $user->save();
        $user->roles()->attach($role_admin);

    }
}
