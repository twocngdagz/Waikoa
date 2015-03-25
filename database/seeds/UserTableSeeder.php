<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Waikoa\Model\Role\Role;
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();

        $user = User::create([
            'name' => 'Super Duper Admin',
            'email' => 'superadmin@superadmin.com',
            'password' => 'admin'
        ]);
        $superadmin = Role::findOrFail(1);
        $user->assignRole($superadmin);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'admin'
        ]);

        $admin = Role::findOrFail(2);
        $user->assignRole($admin);

        $user = User::create([
            'name' => 'Member',
            'email' => 'member@member.com',
            'password' => 'pass1234'
        ]);

        $member = Role::findOrFail(3);
        $user->assignRole($member);
    }

}