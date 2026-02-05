<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['role' => 'admin'],
            ['role' => 'manager'],
            ['role' => 'employee'],
            ['role' => 'customer'],
            ['role' => 'vendor'],
            ['role' => 'supplier'],
            ['role' => 'guest'],
            ['role' => 'moderator'],
            ['role' => 'developer'],
            ['role' => 'analyst'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
