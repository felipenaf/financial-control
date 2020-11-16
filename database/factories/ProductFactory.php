<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'group_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->numberBetween(1, 2),
            'description' => $this->faker->sentence(),
            'amount' => $this->faker->randomFloat(2, 1, 100000),
            'detail' => $this->faker->text,
            'consumption_at' => $this->faker->dateTimeBetween('-1 year', now())
        ];

    }

}
