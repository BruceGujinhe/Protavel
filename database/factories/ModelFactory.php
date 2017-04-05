<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'nickname'       => $faker->name,
        'email'          => $faker->safeEmail,
        'password'       => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'avatar'         => $faker->imageUrl(300, 300, 'people'),
        'phone'          => $faker->phoneNumber(),
        'created_at'     => $faker->dateTimeThisMonth(),
        'updated_at'     => $faker->dateTimeThisMonth(),
    ];
});

$factory->define(App\Admin::class, function (Faker\Generator $faker) {
    return [
        'nickname'       => $faker->name,
        'email'          => $faker->safeEmail,
        'password'       => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'avatar'         => $faker->imageUrl(300, 300, 'people'),
        'phone'          => $faker->phoneNumber(),
        'created_at'     => $faker->dateTimeThisMonth(),
        'updated_at'     => $faker->dateTimeThisMonth(),
        'is_admin'       => 1,
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {
    return [
        'title'      => $faker->sentence(6),
        'content'    => implode('', $faker->paragraphs(random_int(1, 5))),
        'created_at' => $faker->dateTimeThisMonth(),
        'updated_at' => $faker->dateTimeThisMonth(),
    ];
});
