<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Faker 인스턴스에 한국 로케일을 설정
        $faker = \Faker\Factory::create('ko_KR');

        return [
            'beds' => $faker->numberBetween(1, 7),
            'baths' => $faker->numberBetween(1, 7),
            'area' => $faker->numberBetween(30, 400),
            'city' => $faker->city(),
            'code' => $faker->postcode(),
            'street' => $faker->streetName(),
            'street_nr' => $faker->numberBetween(10, 200),
            'price' => $faker->numberBetween(50_000, 2_000_000)
        ];
    }
}
