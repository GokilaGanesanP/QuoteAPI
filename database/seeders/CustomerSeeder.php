<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\customer;
use Faker\Factory as Faker;



class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            customer::insert([               
               
               'customerName' => $faker->name,
               'serialNo' => $faker->randomNumber,
               'planNo' => $faker->randomNumber,
                
            ]);
        }
    }
}
