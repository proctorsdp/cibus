<?php

use Illuminate\Database\Seeder;

class DirectionIngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DirectionIngredient::class, 150)->create();
    }
}
