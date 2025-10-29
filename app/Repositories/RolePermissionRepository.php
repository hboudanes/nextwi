<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionRepository
{
    /**
     * Get all roles with permissions
     */
    public function getAllRolesWithPermissions()
    {
        return Role::with('permissions')
            ->orderBy('name')
            ->get();
    }

    /**
     * Create a new role
     */
    public function createRole(array $data)
    {
        return Role::create($data);
    }

    /**
     * Update a role
     */
    public function updateRole($id, array $data)
    {
        $role = Role::findOrFail($id);
        $role->update($data);

        return $role;
    }

    /**
     * Delete a role
     */
    public function deleteRole($id)
    {
        $role = Role::findOrFail($id);

        // Remove all permissions from role
        $role->syncPermissions([]);

        return $role->delete();
    }

    /**
     * Get role with permissions
     */
    public function getRoleWithPermissions($id)
    {
        return Role::with('permissions')->findOrFail($id);
    }

    /**
     * Get role by name
     */
    public function getRoleByName($name)
    {
        return Role::where('name', $name)->first();
    }

    /**
     * Get all permissions
     */
    public function getAllPermissions()
    {
        return Permission::all();
    }
}
