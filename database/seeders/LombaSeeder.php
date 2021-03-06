<?php

namespace Database\Seeders;

use App\Models\Lomba;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lomba::factory(3)->create(["user_id" => User::all()->random()->id]);
    }
}
