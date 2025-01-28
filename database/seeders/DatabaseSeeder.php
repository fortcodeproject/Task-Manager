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
        Acesso::create(['tipo' => "super_admin"]);
        Acesso::create(['tipo' => "normal"]);
        User::create([
            'name' => "Super Admin",
            'email' => "superadmin@task.com",
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'id_acesso' => 1,
            'criacao_tarefa' => "permitido"
        ]);
    }
}
