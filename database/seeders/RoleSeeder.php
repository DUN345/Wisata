<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Daftar Permissions
        $permissions = [
            'view bookings',
            'edit bookings',
            'delete bookings',
        ];

        // Buat Permissions jika belum ada
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Buat Roles dan assign Permissions
        $roles = [
            'admin' => $permissions, // Admin memiliki semua permissions
            'manager' => ['view bookings'], // Manager hanya memiliki permission tertentu
            'user' => [], // User tidak memiliki permission tambahan
        ];

        foreach ($roles as $roleName => $rolePermissions) {
            // Buat Role jika belum ada
            $role = Role::firstOrCreate(['name' => $roleName]);

            // Assign Permissions ke Role
            $role->syncPermissions($rolePermissions);
        }
    }
}
