<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(\App\Models\ShopItem::class, function (Faker $faker) {

    $title = $faker->sentence(rand(3, 8), true);
    $txt = $faker->realText(rand(100, 1000));
    $is_active = rand(1, 5) > 1;
    $price = rand(1, 1000);

    $createdAt = $faker->dateTimeBetween('-3 months', '-2 months');

    $data = [
        'category_id' => rand(1, 11),
        'title' => $title,
        'slug' => Str::slug($title),
        'description' => $txt,
        'price' => $price,
        'is_active' => $is_active,
        'created_at' => $createdAt,
        'updated_at' => $createdAt,
    ];

    return $data;
});
