<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\{
    Role,
    Permission
};

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // clientes 
            'properties-list',
            'properties-create',
            'properties-edit',
            'properties-delete',
            // contracts 
            'contracts-list',
            'contracts-create',
            'contracts-edit',
            'contracts-delete',
            // clientes 
            'customer-list',
            'customer-create',
            'customer-edit',
            'customer-delete',
            // Funções e permissões
            'roles-list',
            'roles-create',
            'roles-edit',
            'roles-delete',
            // usuários
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            // activities
            'activity-list',
            'activity-delete'
        ];
 
 
        foreach ($permissions as $permission) {
            $allPermissions[] = Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'Administrador']); // cria o perfil de administrador
        $role->givePermissionTo($allPermissions); // vincula toda as permissões
        $user = User::find(1);
        $user->assignRole($role->name);
    }
}
