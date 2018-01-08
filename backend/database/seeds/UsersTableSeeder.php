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
        'role' => "admin",
        'first_name' => "admin",
        'last_name' => "admin",
        'email' => "tech@makersvalley.net",
        'password' => "mvbootcamp,"
        /*
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        */
        ]);

    }
}
