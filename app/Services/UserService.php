<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Create a new user with role and configuration
     *
     * @param array $userData
     * @param string $role
     * @param array $configData
     * @return User
     */
    public function createUser(array $userData, string $role, array $configData = []): User
    {
        return $this->userRepository->create($userData, $role, $configData);
    }

    /**
     * Get all available roles
     *
     * @return array
     */
    public function getAllRoles(): array
    {
        return $this->userRepository->getAllRoles();
    }
    public function getUsersForDataTable()
    {
        return $this->userRepository->getUsersQuery();
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
    public function updateUser(User $user, array $data, ?string $role = null, array $configData = []): bool
    {
        return $this->userRepository->update($user, $data, $role, $configData);
    }
}