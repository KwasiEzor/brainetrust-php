<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $roles = [

            'Default user',
            'Moderator',
            'Super admin'
        ];

        foreach ($roles as $role) {

            Role::create([
                'name' => $role
            ]);
        }
    }
}
