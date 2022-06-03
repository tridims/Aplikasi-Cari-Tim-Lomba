<?php

namespace Database\Seeders;

use App\Models\RiwayatPerlombaan;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create()->each(function ($user) {
            $profile = UserProfile::factory()->make();
            $user->profile()->save($profile);

            $riwayat_lomba = RiwayatPerlombaan::factory(rand(0, 4))->make();
            $profile->riwayat_lomba()->saveMany($riwayat_lomba);
        });
    }
}
