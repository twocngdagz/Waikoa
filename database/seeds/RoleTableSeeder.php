<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder {

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();

        Role::create([
            'name' => 'Superadmin',
        ]);

        Role::create([
            'name' => 'Admin',
        ]);


        Role::create([
            'name' => 'Member',
        ]);
    }

}