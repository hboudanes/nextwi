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

            // Create user config if role is admin (case-insensitive)
            if (strtolower($role) === 'admin' && !empty($configData)) {
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

    /**
     * Update an existing user with role and configuration
     *
     * @param \App\Models\User $user
     * @param array $data
     * @param string|null $role
     * @param array $configData
     * @return bool
     */
    public function update(User $user, array $data, ?string $role = null, array $configData = []): bool
    {
        return DB::transaction(function () use ($user, $data, $role, $configData) {
            if (isset($data['password']) && $data['password']) {
                $data['password'] = Hash::make($data['password']);
            } else {
                unset($data['password']);
            }

            $saved = $user->update($data);

            if ($role) {
                $user->syncRoles([$role]);
            }

            if (strtolower($role) === 'admin' && !empty($configData)) {
                if ($user->config) {
                    $user->config->update($configData);
                } else {
                    $user->config()->create($configData);
                }
            }

            return $saved;
        });
    }
}