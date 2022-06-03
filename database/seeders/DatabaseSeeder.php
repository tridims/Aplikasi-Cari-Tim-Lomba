<?php

namespace Database\Seeders;

use App\Models\Lomba;
use App\Models\Rekrutmen;
use App\Models\RequestRekrutmen;
use App\Models\RiwayatPerlombaan;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LombaSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RekrutmenSeeder::class);
    }
}
