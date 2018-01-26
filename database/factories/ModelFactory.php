<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Song::class, function (Faker $faker) {
    return [
      'name' => $faker->sentence(3),
      'description' => $faker->sentence,
      'image' =>'public/elfary.png',
      'audio' => 'public/lamandanga.mp3',
      'released_at' => $faker->date,
      'public_link' => $faker->sentence(3),
      'private' => $faker->boolean,
      'user_id' => rand(1, 3),
      'plays' => rand(0, 20000)
    ];
});

$factory->define(App\SongPlaylist::class, function (Faker $faker) {
  return [
    'playlist_id' => rand(1, 2),
    'song_id' => rand(1, 50)
  ];
});
