<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PedidosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "venda_id" => mt_rand(1, 50),
            "produto_id" => mt_rand(1, 10),
            "quantity" => mt_rand(1, 5),
            "sale_date" => $this->faker->dateTimeBetween(),
            "created_at" => now()
        ];
    }
}
