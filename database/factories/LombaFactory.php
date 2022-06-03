<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lomba>
 */
class LombaFactory extends Factory
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
            "deadline_pendaftaran" => $this->faker->dateTimeBetween('-1 years', '+1 years'),
            "kategori" => $this->faker->randomElement(['CTF', 'App Development', 'CTF, App Development']),
            "poster" => $this->faker->imageUrl(),
            "penyelenggara" => $this->faker->company,
            "tingkat" => $this->faker->randomElement(['Internasional', 'Nasional', 'Lokal']),
            "website" => $this->faker->url,
            "deskripsi" => $this->faker->paragraph,
        ];
    }
}
