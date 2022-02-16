<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'description' => $this->faker->paragraph,
            'price' => random_int(1000 , 99999)
        ];
    }
}
