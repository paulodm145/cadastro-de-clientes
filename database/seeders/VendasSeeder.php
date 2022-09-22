<?php

namespace Database\Seeders;

use App\Models\Vendas;
use Illuminate\Database\Seeder;

class VendasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendas::factory()->count(100)->create();
    }
}
