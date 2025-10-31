<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\UserConfig;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    /**
     * Create a new user with role and configuration
     *
     * @param array $userData
     * @param string $role
     * @param array $configData
     * @return User
     */
    public function create(array $userData, string $role, array $configData = []): User
    {
        return DB::transaction(function () use ($userData, $role, $configData) {
            // Create user
            $userData['password'] = Hash::make($userData['password']);
            $user = User::create($userData);

            // Assign role
            $user->assignRole($role);

            // Create user config if role is admin
            if ($role === 'Admin' && !empty($configData)) {
                $user->config()->create($configData);
            }

            return $user;
        });
    }

    /**
     * Get all available roles
     *
     * @return array
     */
    public function getAllRoles(): array
    {
        return DB::table('roles')->pluck('name')->toArray();
    }
    public function getUsersQuery()
    {
        return User::with(['roles', 'config'])
            ->select('users.*');
    }
}