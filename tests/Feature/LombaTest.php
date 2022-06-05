<?php

namespace Tests\Feature;

use App\Models\Lomba;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LombaTest extends TestCase
{
    use RefreshDatabase;

    public function test_render_halaman_daftar_lomba()
    {
        $response = $this->get(route('daftar_lomba'));
        $response->assertStatus(200);
    }

    public function test_render_form_add_lomba()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('add_lomba'));
        $response->assertStatus(200);
    }

    public function test_store_lomba() {
        $user = User::factory()->create();

        $data_lomba = [
            'nama' => 'test',
            'deadline_pendaftaran' => '2020-01-01',
            'kategori' => 'testing',
            'penyelenggara' => 'testing',
            'tingkat' => 'testing',
            'website' => 'testing',
            'deskripsi' => 'testing',
        ];

        $response = $this->actingAs($user)->post(route('store_lomba'), $data_lomba);

        $response->assertStatus(302);
        $this->assertDatabaseHas('lombas', $data_lomba);
        $response->assertRedirect(route('detail_lomba', ['lomba' => $user->lomba->last()]));
    }

    public function test_render_form_edit_lomba() {
        $user = User::factory()->has(Lomba::factory())->create();
        $lomba = $user->lomba->last();
        $response = $this->actingAs($user)->get(route('edit_lomba', ['lomba' => $lomba]));
        $response->assertStatus(200);
    }

    public function test_edit_lomba() {
        $user = User::factory()->has(Lomba::factory())->create();
        $lomba = $user->lomba->last();

        $data_lomba = [
            'nama' => 'test',
            'deadline_pendaftaran' => '2020-01-01',
            'kategori' => 'testing',
            'penyelenggara' => 'testing',
            'tingkat' => 'testing',
            'website' => 'testing',
            'deskripsi' => 'testing',
        ];

        $response = $this->actingAs($user)->put(route('update_lomba', ['lomba' => $lomba]), $data_lomba);

        $response->assertStatus(302);
        $this->assertDatabaseHas('lombas', $data_lomba);
        $response->assertRedirect(route('detail_lomba', ['lomba' => $lomba]));
    }

    public function test_delete_lomba() {
        $user = User::factory()->has(Lomba::factory())->create();
        $lomba = $user->lomba->last();

        $response = $this->actingAs($user)->delete(route('delete_lomba', ['lomba' => $lomba]));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('lombas', $lomba->toArray());
        $response->assertRedirect(route('daftar_lomba'));
    }

    public function test_delete_lomba_when_user_is_not_the_author() {
        $user = User::factory()->has(Lomba::factory())->create();
        $lomba = $user->lomba->last();

        $anotherUser = User::factory()->create();
        $response = $this->actingAs($anotherUser)->delete(route('delete_lomba', ['lomba' => $lomba]));

        $this->assertDatabaseHas('lombas', $lomba->toArray());
        $response->assertRedirect(route('daftar_lomba'));
    }

    public function test_halaman_detail_lomba() {
        $user = User::factory()->has(Lomba::factory())->create();
        $lomba = $user->lomba->last();
        $response = $this->actingAs($user)->get(route('detail_lomba', ['lomba' => $lomba]));
        $response->assertStatus(200);
    }

}
