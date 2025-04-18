<?php

namespace Database\Seeders;

use App\Models\Acesso;
use App\Models\User;
use Database\Factories\AcessoFactory;
use Database\Factories\UserFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => "Super Admin",
            'email' => "superadmin@task.com",
            'email_verified_at' => now(),
            'password' => Hash::make('123456')
        ]);
    }
}
