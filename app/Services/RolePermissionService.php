<?php

namespace App\Services;

use App\Repositories\RolePermissionRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionService
{
    protected $repository;

    public function __construct(RolePermissionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all roles with their permissions
     */
    public function getAllRolesWithPermissions()
    {
        return Cache::remember('roles_with_permissions', 3600, function () {
            return $this->repository->getAllRolesWithPermissions();
        });
    }

    /**
     * Get all permissions grouped by module
     */
    public function getAllPermissionsGrouped()
    {
        return Cache::remember('permissions_grouped', 3600, function () {
            $permissions = Permission::orderBy('name')->get();

            // Group permissions by module (e.g., users.create -> users)
            $grouped = [];
            foreach ($permissions as $permission) {
                // Extract module name from permission (e.g., "users.create" -> "users")
                $parts = explode('.', $permission->name);

                if (count($parts) >= 2) {
                    $module = $parts[0];
                    $action = $parts[1];

                    if (!isset($grouped[$module])) {
                        $grouped[$module] = [
                            'name' => ucfirst($module),
                            'permissions' => []
                        ];
                    }

                    $grouped[$module]['permissions'][] = [
                        'id' => $permission->id,
                        'name' => $permission->name,
                        'action' => $action,
                        'display_name' => $this->formatActionName($action)
                    ];
                }
            }

            return $grouped;
        });
    }

    /**
     * Format action name for display
     */
    private function formatActionName($action)
    {
        $actionMap = [
            'index' => 'View All',
            'show' => 'View Detail',
            'create' => 'Create',
            'store' => 'Store',
            'edit' => 'Edit',
            'update' => 'Update',
            'destroy' => 'Delete',
        ];

        return $actionMap[$action] ?? ucfirst($action);
    }

    /**
     * Create a new role
     */
    public function createRole(array $data)
    {
        DB::beginTransaction();

        try {
            $role = $this->repository->createRole([
                'name' => $data['role_name'],
                'guard_name' => 'web',
            ]);

            $this->clearCache();

            DB::commit();

            return $role;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Update a role
     */
    public function updateRole($id, array $data)
    {
        DB::beginTransaction();

        try {
            $role = $this->repository->updateRole($id, [
                'name' => $data['name'],
            ]);

            $this->clearCache();

            DB::commit();

            return $role;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Sync role permissions
     */
    public function syncRolePermissions($roleId, array $permissionIds)
    {
        DB::beginTransaction();

        try {
            $role = Role::findOrFail($roleId);

            // Sync permissions using Spatie's method
            $role->syncPermissions($permissionIds);

            $this->clearCache();

            DB::commit();

            return $role->load('permissions');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Delete a role
     */
    public function deleteRole($id)
    {
        DB::beginTransaction();

        try {
            // Check if role is being used by any users
            $role = Role::findOrFail($id);

            if ($role->users()->count() > 0) {
                throw new \Exception('Cannot delete role that is assigned to users');
            }

            $this->repository->deleteRole($id);

            $this->clearCache();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Get role with permissions
     */
    public function getRoleWithPermissions($id)
    {
        return $this->repository->getRoleWithPermissions($id);
    }

    /**
     * Bulk update permissions
     */
    public function bulkUpdatePermissions(array $updates)
    {
        DB::beginTransaction();

        try {
            foreach ($updates as $update) {
                $role = Role::findOrFail($update['role_id']);
                $permission = Permission::findOrFail($update['permission_id']);

                if ($update['action'] === 'grant') {
                    $role->givePermissionTo($permission);
                } else {
                    $role->revokePermissionTo($permission);
                }
            }

            $this->clearCache();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * Clear role and permission cache
     */
    protected function clearCache()
    {
        Cache::forget('roles_with_permissions');
        Cache::forget('permissions_grouped');

        // Clear Spatie permission cache
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
