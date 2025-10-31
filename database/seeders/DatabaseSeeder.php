<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        User::factory()->create([
            'name' => 'Test User',
            'first_name' => 'Test',
            'last_name' => 'User',
            'phone' => '123-456-7890',
            'email' => 'test@example.com',
        ]);
        User::factory(20)->create();
        $this->call(RolePermissionSeeder::class);

        // Assign Super Admin role to the seeded test user
        $user = User::where('email', 'test@example.com')->first();
        if ($user) {
            $user->assignRole('Super Admin');
        }
    }
}
