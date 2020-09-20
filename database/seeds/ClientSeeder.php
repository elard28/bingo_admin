<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $gender = $faker->randomElement(['male', 'female']);

        $payment = ['Efectivo','Yape', 'Lukita', 'Tunqui','VISA'];

    	foreach (range(1,500) as $index) {
            DB::table('clients')->insert([
                'name' => $faker->name($gender),
                'dni' => intval(rand(1,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9)),
                'email' => $faker->email,
                //'cellphone' => $faker->phoneNumber,
                'cellphone' => intval(rand(1,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9)),
                'num_card_purchase' => rand(1, 15),
                'payment_institution' => $payment[rand(0,4)],
                'validated' => '0'
            ]);
        }
    }
}
