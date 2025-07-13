<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin (no parent_id)
        $admin = User::create([
            'name' => 'Admin A',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'parent_id' => null,
        ]);

        // Employees under Admin
        $employee1 = User::create([
            'name' => 'Employee A1',
            'email' => 'employee1@example.com',
            'password' => Hash::make('password'),
            'parent_id' => $admin->id,
        ]);

        $employee2 = User::create([
            'name' => 'Employee A2',
            'email' => 'employee2@example.com',
            'password' => Hash::make('password'),
            'parent_id' => $admin->id,
        ]);

        // Persons under Employee A1
        User::create([
            'name' => 'Person A1a',
            'email' => 'person1@example.com',
            'password' => Hash::make('password'),
            'parent_id' => $employee1->id,
        ]);

        User::create([
            'name' => 'Person A1b',
            'email' => 'person2@example.com',
            'password' => Hash::make('password'),
            'parent_id' => $employee1->id,
        ]);

        // Persons under Employee A2
        User::create([
            'name' => 'Person A2a',
            'email' => 'person3@example.com',
            'password' => Hash::make('password'),
            'parent_id' => $employee2->id,
        ]);
    }
}
