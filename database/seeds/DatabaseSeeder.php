<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(UnitOfSeeder::class);
        $this->call(SystemSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(RecipeSeeder::class);
        $this->call(RecipeTagSeeder::class);
        $this->call(DirectionSeeder::class);
        $this->call(IngredientSeeder::class);
        $this->call(DirectionIngredientSeeder::class);
        $this->call(RatingSeeder::class);
        $this->call(IngredientRecipeSeeder::class);
        $this->call(RecipeUserSeeder::class);
    }
}
