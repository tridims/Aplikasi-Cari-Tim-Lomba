<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_render_page_edit_profil()
    {
        $user = User::factory()->has(UserProfile::factory(), 'profile')->create();
;
        $response = $this->actingAs($user)->get(route('edit_profil'));

        $response->assertStatus(200);
    }

    public function test_add_prestasi() {
        $user = User::factory()->has(UserProfile::factory(), 'profile')->create();

        $data = [
            'nama' => 'test',
            'tahun' => '2020',
            'tingkat' => 'test',
            'penyelenggara' => 'test',
            'peringkat' => 'test',
        ];

        $response = $this->actingAs($user)->post(route('store_prestasi'), $data);
        $response->assertStatus(302);
//        $this->assertDatabaseHas('riwayat_perlombaans', $data);
    }
}
