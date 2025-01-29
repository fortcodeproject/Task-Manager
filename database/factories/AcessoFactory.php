<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Acesso;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acesso>
 */
class AcessoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipo = $this->retornarTipo();
        return [
            'tipo' => $tipo
        ];
    }

    public function retornarTipo(){
       $acesso = Acesso::where("tipo", "super_admin")->first();
        if($acesso){
            return "normal";
        }else{
            return "super_admin";
        }
    }
}
