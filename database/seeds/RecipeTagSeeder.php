<?php

use Illuminate\Database\Seeder;

class RecipeTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\RecipeTag::class, 50)->create();
    }
}
