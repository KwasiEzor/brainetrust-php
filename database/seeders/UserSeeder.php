<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::factory(30)->create()->each(function ($user) {
            $role = Role::find(2);

            $permission = Permission::first();

            $role->syncPermissions($permission);
            $user->assignRole([$role->id]);
            UserInfo::factory()->create([
                'user_id' => $user->id
            ]);
        });
    }
}
