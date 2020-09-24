<?php

use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'username' => 'bingoadmin',
        	'name' => 'Solidaridad en Marcha',
        	'email' => 'correoenvio2021@gmail.com',
        	'password' => bcrypt('solidaridad'),
        	//'remember_token' => str_random(10)
        ]);
    }
}
