<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        // Administrador (desarrollador)
        $role = Role::where('name', 'admin')->firstOrFail();

        $permissions = Permission::all();

        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );


        // Administrador (usuario)
        $role = Role::where('name', 'administrador')->firstOrFail();
        $permissions = Permission::whereRaw("   `key` = 'browse_admin' or
                                                `key` = 'browse_media' or
                                                table_name = 'teams' or
                                                table_name = 'customers' or
                                                table_name = 'users' or
                                                table_name = 'settings'")->get();
        $role->permissions()->sync($permissions->pluck('id')->all());
    }
}
