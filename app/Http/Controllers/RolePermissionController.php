<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\RolePermissionService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    protected $rolePermissionService;

    public function __construct(RolePermissionService $rolePermissionService)
    {
        $this->rolePermissionService = $rolePermissionService;
    }

    /**
     * Display roles and permissions page
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        $permissions = $this->rolePermissionService->getAllPermissionsGrouped();

        return view('roles-permissions.index', compact('roles', 'permissions'));
    }

    /**
     * Store a new role
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'role_name' => 'required|string|max:255|unique:roles,name',
            'role_status' => 'required|in:active,inactive',
        ]);

        try {
            $role = $this->rolePermissionService->createRole($validated);

            return response()->json([
                'success' => true,
                'message' => 'Role created successfully!',
                'role' => $role
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create role: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update role permissions
     */
    public function updatePermissions(Request $request)
    {
        $validated = $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id'
        ]);

        try {
            $role = $this->rolePermissionService->syncRolePermissions(
                $validated['role_id'],
                $validated['permissions']
            );

            return response()->json([
                'success' => true,
                'message' => 'Permissions updated successfully!',
                'role' => $role
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update permissions: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update a role
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'status' => 'required|in:active,inactive',
        ]);

        try {
            $role = $this->rolePermissionService->updateRole($id, $validated);

            return response()->json([
                'success' => true,
                'message' => 'Role updated successfully!',
                'role' => $role
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update role: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete a role
     */
    public function destroy($id)
    {
        try {
            $this->rolePermissionService->deleteRole($id);

            return response()->json([
                'success' => true,
                'message' => 'Role deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete role: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get role with permissions
     */
    public function show($id)
    {
        try {
            $role = $this->rolePermissionService->getRoleWithPermissions($id);

            return response()->json([
                'success' => true,
                'role' => $role
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Role not found'
            ], 404);
        }
    }

    /**
     * Bulk update permissions for multiple roles
     */
    public function bulkUpdatePermissions(Request $request)
    {
        $validated = $request->validate([
            'updates' => 'required|array',
            'updates.*.role_id' => 'required|exists:roles,id',
            'updates.*.permission_id' => 'required|exists:permissions,id',
            'updates.*.action' => 'required|in:grant,revoke'
        ]);

        try {
            $this->rolePermissionService->bulkUpdatePermissions($validated['updates']);

            return response()->json([
                'success' => true,
                'message' => 'Permissions updated successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update permissions: ' . $e->getMessage()
            ], 500);
        }
    }
}
