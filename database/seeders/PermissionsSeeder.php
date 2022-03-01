<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Permission;
use App\Models\Role;

use Laratrust\Checkers\Role\LaratrustRoleDefaultChecker;



class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'list-qualifica',
            'create-qualifica',
            'edit-qualifica',
            'delete-qualifica'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $roles = [
            'super-admin',
            'dirigente',
            'dipendente',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
