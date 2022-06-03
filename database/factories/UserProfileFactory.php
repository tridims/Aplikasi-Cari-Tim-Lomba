<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nama" => $this->faker->name,
            "nim" => $this->faker->numerify('#########'),
            "jenis_kelamin" => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            "telepon" => $this->faker->phoneNumber,
            "linkedin" => $this->faker->url,
            "angkatan" => $this->faker->numberBetween(2000, 2020),
            "prodi" => $this->faker->numerify('Prodi ###'),
            "fakultas" => $this->faker->numerify('Fakultas ###'),
            "deskripsi" => $this->faker->paragraph,
        ];
    }
}
