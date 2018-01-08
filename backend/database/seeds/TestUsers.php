<?php

use Illuminate\Database\Seeder;

class TestUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*
        factory(App\Users::class)->create(['email' => 'testing@test']);
        */

        DB::table('users')->insert([
        'role' => "maker",
        'first_name' => "user",
        'last_name' => "user",
        'email' => "prova@mail.com",
        'password' => "prova"
        /*
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        */
        ]);

    }
}
