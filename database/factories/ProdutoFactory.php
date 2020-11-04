<?php

namespace Database\Factories;

use App\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_grupo' => $this->faker->numberBetween(1, 22),
            'id_usuario' => 1,
            'descricao' => $this->faker->sentence(),
            'valor' => $this->faker->randomFloat(2, 1, 100000),
            'observacao' => $this->faker->text,
            'data_consumo' => $this->faker->dateTimeBetween('-1 year', now())
        ];

    }

}
