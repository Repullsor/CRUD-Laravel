<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'user-list',
           'user-edit',
           'user-block',
           'user-unlock',
           'user-delete',
           'product-list',
           'product-create',
           'product-edit',
           'product-delete',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete'
        ];

        $permissions_name = [
            'Ver Usuário',
            'Editar Usuário',
            'Bloquear Usuário',
            'Desbloquear Usuário',
            'Excluir Usuário',
            'Ver Produto',
            'Criar Produto',
            'Editar Produto',
            'Excluir Produto',
            'Ver Role',
            'Criar Role',
            'Editar Role',
            'Excluir Role'
        ];

        $i = 0;
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission, 'showname' => $permissions_name[$i++]]);
        }
    }
}
