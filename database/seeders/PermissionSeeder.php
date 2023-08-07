<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionsArray = $this->permissions();

        foreach ($permissionsArray as $permission) {
            Permission::create(['name' => $permission]);
        }

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }

    public function permissions()
    {
        return [
            'view dashboard',
            'create atolls',
            'edit atolls',
            'delete atolls',
            'create island categories',
            'edit island categories',
            'delete islands categories',
            'create islands',
            'edit islands',
            'delete islands',
            'create population entry',
            'edit population entry',
            'delete population entry',

            'create zones',
            'edit zones',
            'delete zones',
            'create plots',
            'edit plots',
            'delete plots',
            'create plot usages',
            'edit plot usages',
            'delete plot usages',


            'create ecosystems',
            'edit ecosystems',
            'delete ecosystems',

            'create case reports',
            'edit case reports',
            'delete case reports',
            'verify case reports',
            'unpublish case reports',

            'create case report links',
            'edit case report links',
            'delete case report links',
        ];
    }
}
