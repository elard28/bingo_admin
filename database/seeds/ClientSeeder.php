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
        $payment = ['Yape', 'Lukita', 'Blim', 'Tarjeta de credito', 'Deposito Bancario'];

    	foreach (range(1,800) as $index) {
            $fakermail = $faker->email;
            $fakermail = str_replace(strrchr($fakermail,'@'), "@yopmail.com", $fakermail);
            
            DB::table('clients')->insert([
                'name' => $faker->name($gender),
                'dni' => intval(rand(1,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9)),
                'foreign' => rand(0,1),
                'email' => $fakermail,
                //'cellphone' => $faker->phoneNumber,
                'cellphone' => intval(rand(1,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9)),
                'num_card_purchase' => rand(1, 15),
                'payment_institution' => $payment[rand(0,4)],
                'validated' => '0'
            ]);
        }
    }
}
