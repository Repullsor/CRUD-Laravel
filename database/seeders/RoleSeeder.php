<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Admin']);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);


        $role = Role::create(['name' => 'Moderador']);
     
        $permissions = array(1, 2, 3, 4, 5, 7, 8, 9, 11, 12);
   
        $role->syncPermissions($permissions);


        $role = Role::create(['name' => 'Guest']);
     
        $permissions = array(1, 6, 10);
   
        $role->syncPermissions($permissions);
    }
}
