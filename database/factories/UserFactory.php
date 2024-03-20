<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

/*
* Untuk menjalankan nya buka terminal "php artisan tinker"
* Untuk menambahkan data dummy ke database jalankan perintah
* $user = factory(App\User::class, 100)->create();
*  100 = Jumlah data yang ingin dibuat
*/

$factory->define(User::class, function (Faker $faker) {
    $name = $faker->name;
    return [
        'name' => $name,
        'username' => Str::slug($name),
        'email' => $faker->unique()->safeEmail,
        'role' => 'user',
        'email_verified_at' => now(),
        'password' => bcrypt('password123'), // password
        'remember_token' => Str::random(10),
    ];
});
