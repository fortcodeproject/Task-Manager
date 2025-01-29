<?php

namespace Database\Factories;

use App\Models\Acesso;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /* return [
        'name' => fake()->name(),
        'email' => fake()->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => static::$password ??= Hash::make('password'),
        'remember_token' => Str::random(10),
        ];*/
        $idAcesso = $this->retornarIdAcessoAdmin();

        return [
            'name' => "Super Admin",
            'email' => "superadmin@task.com",
            'email_verified_at' => now(),
            'password' => Hash::make('123456'),
            'id_acesso' => $idAcesso,
            'criacao_tarefa' => "permitido"
        ];
    }

    public function retornarIdAcessoAdmin(){
        $acesso = Acesso::where("tipo", "super_admin")->first();
        return $acesso->id;
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
