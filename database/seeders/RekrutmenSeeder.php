<?php

namespace Database\Seeders;

use App\Models\Lomba;
use App\Models\Rekrutmen;
use App\Models\RequestRekrutmen;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RekrutmenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # create 6 Rekrutmen with random request_rekrutmen
        for ($i = 0; $i < 6; $i++) {
            Rekrutmen::factory(1)->create([
                "user_id" => User::all()->random()->id,
                "lomba_id" => Lomba::all()->random()->id,
            ])->each(function ($rekrutmen) {
                for ($i = 0; $i < rand(1, 5); $i++) {
                    RequestRekrutmen::factory(1)->create([
                        'rekrutmen_id' => $rekrutmen->id,
                        'user_id' => User::all()->random()->id,
                    ])->each(function ($request) use ($rekrutmen) {
                        $request->rekrutmen()->associate($rekrutmen);
                    });
                }
            });
        }
    }
}
