<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\User::create([
        //     'username'  => 'user-'.rand(1,100),
        //     'role' => 'Admin',
        //     'password'  => bcrypt('12345678')
        // ]);

        factory(\App\User::class, 4)->create();
        
    }
}
