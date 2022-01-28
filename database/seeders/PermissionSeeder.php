<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // spatie documentation
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'registrar_edit',
            'usuario_show',
            'inventarios',
            'inventario_create',
            'inventario_show',
            'clientes',
            'cliente_create1',
            'cliente_create2',
            'cliente_show',
            'cliente_edit',
            'productos',
            'producto_create',
            'producto_show',
            'producto_edit',
            'venta_destroy',
            'venta_ver',
            'venta_create',
            'ventas',
            'compras',
            'compra_create',
            'compra_ver',
            'compra_destroy',
            'proveedores',
            'proveedor_create',
            'proveedor_ver',
            'proveedor_edit',
            'empleado_editar',
            'empleado_ver',
            'empleado_create',
            'empleados',
            'permission_index',
            'permission_create',
            'permission_show',
            'permission_edit',
            'permission_delete',
            'post_destroy',
            'post_edit',
            'post_show',
            'post_create',
            'post_index',
            'registrar_create',
            'registrar_show',
            'role_index',
            'role_create',
            'role_show',
            'role_edit',
            'role_destroy',
            'usuarios',

        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
