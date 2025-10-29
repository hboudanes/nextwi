<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Get all routes with 'admin' prefix
        $routeCollection = Route::getRoutes();
        $permissions = [];

        foreach ($routeCollection as $route) {

            $name = $route->getName();

            // Only process routes with '/admin' prefix
            if ($name && $route->getPrefix() && $route->getPrefix() == '/admin') {

                // Extract permission name (e.g., 'admin.users.create' -> 'users.create')
                $permissionName = $name;

                // Skip the main admin route and roles-permissions routes
                if ($permissionName !== '') {

                    $permissions[] = $permissionName;

                }
            }

        }

        // Remove duplicates and sort
        $permissions = array_unique($permissions);
        sort($permissions);

        // Create permissions in database
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
        }

        // Create default roles with permissions
        $this->createDefaultRoles($permissions);
    }

    /**
     * Create default roles with specific permissions
     */
    private function createDefaultRoles(array $allPermissions)
    {
        // Super Admin - has all permissions
        $superAdmin = Role::firstOrCreate([
            'name' => 'Super Admin',
            'guard_name' => 'web'
        ]);
        $superAdmin->syncPermissions(Permission::all());

        // Admin - has most permissions except delete
        $admin = Role::firstOrCreate([
            'name' => 'Admin',
            'guard_name' => 'web'
        ]);

        $adminPermissions = collect($allPermissions)->filter(function ($permission) {
            return !str_contains($permission, '.destroy');
        })->toArray();

        $admin->syncPermissions($adminPermissions);

        // Manager - has view, create, edit permissions
        $manager = Role::firstOrCreate([
            'name' => 'Manager',
            'guard_name' => 'web'
        ]);

        $managerPermissions = collect($allPermissions)->filter(function ($permission) {
            return (str_contains($permission, 'businesses.') ||
                str_contains($permission, 'locations.') ||
                str_contains($permission, 'vouchers.')) &&
                !str_contains($permission, '.destroy');
        })->toArray();

        $manager->syncPermissions($managerPermissions);

        // Operateur - has only view permissions
        $operateur = Role::firstOrCreate([
            'name' => 'Operateur',
            'guard_name' => 'web'
        ]);

        $operateurPermissions = collect($allPermissions)->filter(function ($permission) {
            return str_contains($permission, '.index') || str_contains($permission, '.show');
        })->toArray();

        $operateur->syncPermissions($operateurPermissions);
    }
}
