<?php

namespace Tests\Feature;

use App\Models\Lomba;
use App\Models\Rekrutmen;
use App\Models\RequestRekrutmen;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_with_user_authenticated()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->withSession(['banned' => false])->get('/dashboard');
        $response->assertStatus(200);
    }

    public function test_dashboard_without_user_authenticated()
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');
    }

    public function test_profile_page()
    {
        $user = User::factory()->has(UserProfile::factory(), 'profile')->create();
        $response = $this->actingAs($user)->withSession(['banned' => false])->get('/dashboard/profile');
        $response->assertStatus(200);
        $response->assertViewIs('user.profile');
        $response->assertSee($user->nama);
    }

    public function test_rekrutmen_list_page()
    {
        $user = User::factory()->has(UserProfile::factory(), 'profile')->create();
        $lomba = Lomba::factory()->create(['user_id' => $user->id]);
        $rekrutmen = Rekrutmen::factory()->create([
            'user_id' => $user->id,
            'lomba_id' => $lomba->id,
        ]);

        $response = $this->actingAs($user)->withSession(['banned' => false])->get('/dashboard/rekrutmen');

        $response->assertStatus(200);
        $response->assertViewIs('user.rekrutmen');
        $response->assertSee($rekrutmen->nama);
    }

    public function test_detail_recruitment_page() {
        $user = User::factory()->has(UserProfile::factory(), 'profile')->create();
        $lomba = Lomba::factory()->create(['user_id' => $user->id]);
        $rekrutmen = Rekrutmen::factory()->create([
            'user_id' => $user->id,
            'lomba_id' => $lomba->id,
        ]);

        $recruitedUser = User::factory()->has(UserProfile::factory(), 'profile')->create();

        RequestRekrutmen::factory()->create([
            'rekrutmen_id' => $rekrutmen->id,
            'user_id' => $recruitedUser->id,
        ]);

        $response = $this->actingAs($user)->withSession(['banned' => false])->get('/dashboard/rekrutmen/' . $rekrutmen->id);

        $response->assertStatus(200);
        $response->assertViewIs('user.pengumuman_rekrutmen');
        $response->assertSee($recruitedUser->profile->nama);
    }
}
