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
    	/*
        factory(App\Users::class)->create(['email' => 'testing@test']);
        */

        DB::table('users')->insert([
        'name' => str_random(10),
        'email' => str_random(10),
        'password' => str_random(10),
        'remember_token' => str_random(10),
        /*
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        */
        ]);

    }
}
