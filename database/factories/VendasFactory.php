<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VendasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "cliente_id" => mt_rand(1, 100),
        ];
    }
}
