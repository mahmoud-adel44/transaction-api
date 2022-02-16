<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'transactions_date' => Carbon::now(),
            'amount' => $this->faker->randomNumber(),
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
