<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $admin_permissions = Permission::all();
        $doctor_permissions = Permission::whereBetween('id', [1, 18]);
        $vendedor_permissions = Permission::whereBetween('id', [1, 26]);

        // Admin
            Role::findOrFail(1)->permissions()->sync($admin_permissions->pluck('id'));
        // doctor
            Role::findOrFail(2)->permissions()->sync($doctor_permissions->pluck('id'));
        //vendedor
            Role::findOrFail(3)->permissions()->sync($vendedor_permissions->pluck('id'));


    }
}
