<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Produk;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'role' => "Admin",
        'username' => $faker->unique()->name,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});


$factory->define(Produk::class, function (Faker $faker) {
    return [
        'produk_kategori_id' => rand(1,4),
        'nama' => $faker->title,
        'harga' => rand(1000,1000000),
        'sub_harga' => rand(1000,1000000),
        'stok' => rand(10,1000),
        'image' => Str::random(30),
        'qrcode' => Str::random(30)
    ];
});
// factory(\App\User::class, 3)->create();