<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RiwayatPerlombaan>
 */
class RiwayatPerlombaanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nama" => $this->faker->numerify('Lomba ###'),
            "tingkat" => $this->faker->randomElement(['Internasional', 'Nasional', 'Lokal']),
            "penyelenggara" => $this->faker->company,
            "tahun" => $this->faker->numberBetween(2000, 2020),
            "peringkat" => $this->faker->randomElement(['1', '2', '3', '4', '5']),
        ];
    }
}
