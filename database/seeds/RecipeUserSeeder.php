<?php

use Illuminate\Database\Seeder;

class RecipeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\RecipeUser::class, 50)->create();
    }
}
