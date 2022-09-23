<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'          => $this->faker->name(),
            'cpfcnpj'       => mt_rand(0, 1) == 1 ? $this->faker->cpf(false) : $this->faker->cnpj(false),
            'birth_date'    => $this->faker->date(),
            'telephone'     => $this->faker->phoneNumberCleared(),
            'address'       => $this->faker->streetAddress(),
            'district'      => 'Bairro '.$this->faker->name(),
            'number'        => mt_rand(1, 1000),
            'complement'    => '',
            'city'          => '3201506',
            'state'         => '32',
            'postal_code'   => '29703576',
            'email'         => $this->faker->unique()->safeEmail(),
            'created_at'    => now(),
            'updated_at'    => now(),
        ];
    }
}
