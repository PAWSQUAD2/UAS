<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        //
        'id_user'=>App\User::inRandomOrder()->first()->id,
        'id_berita'=>App\News::inRandomOrder()->first()->id,
        'isi'=>$faker->realText($maxNbChars = 500, $indexSize = 2)
    ];
});
