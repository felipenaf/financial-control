<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produto;
use Faker\Generator as Faker;

$factory->define(Produto::class, function (Faker $faker) {
    return [
        'id_grupo' => $faker->numberBetween(1, 22),
        'id_usuario' => 1,
        'descricao' => $faker->sentence(),
        'valor' => $faker->randomFloat(2, 1, 100000),
        'observacao' => $faker->text,
        'data_consumo' => $faker->dateTimeBetween('-1 year', now()),
    ];
});
