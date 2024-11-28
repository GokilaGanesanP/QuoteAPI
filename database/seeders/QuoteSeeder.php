<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quote;
use Faker\Factory as Faker;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            quote::insert([               
                'quoteName' => $faker->company,
                'customerName' => $faker->name,
                'customerType' => $faker->randomElement(['New', 'Used']),
                'serialNo' => $faker->randomNumber,
                'planNo' => $faker->randomNumber,
                'warantyTerms' => $faker->randomElement([12, 24, 36, 46]),
                'warantyHrs' => $faker->randomElement([500, 1000, 1500]),
                'customerId' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),


            ]);
        }
    }
}

