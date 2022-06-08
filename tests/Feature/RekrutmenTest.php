<?php

namespace Tests\Feature;

use App\Models\Lomba;
use App\Models\Rekrutmen;
use App\Models\RequestRekrutmen;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RekrutmenTest extends TestCase
{
    protected function setUp():void
    {
        parent::setUp();
        $this->user = User::factory()->has(Lomba::factory(), 'lomba')->create();
        $this->lomba = $this->user->lomba->first();

        $this->rekrutmen = Rekrutmen::factory()->create([
            'user_id' => $this->user->id,
            'lomba_id' => $this->lomba->id,
        ]);

        $this->anotherUser = User::factory()->create();

        RequestRekrutmen::factory()->create([
            'rekrutmen_id' => $this->rekrutmen->id,
            'user_id' => $this->anotherUser->id,
        ]);
    }

    use RefreshDatabase;

    public function test_render_daftar_rekrutmen()
    {
        $response = $this->get(route('daftar_rekrutmen'));
        $response->assertStatus(200);
    }

    public function test_render_form_add_rekrutmen() {
        $response = $this->actingAs($this->user)->get(route('add_rekrutmen', ['lomba' => $this->lomba]));
        $response->assertStatus(200);
    }

    public function test_render_form_add_rekrutmen_without_logged_in() {
        $response = $this->get(route('add_rekrutmen', ['lomba' => $this->lomba]));
        $response->assertStatus(302);
    }

    public function test_store_rekrutmen() {
        $data_rekrutmen = [
            'judul' => 'test',
            'jumlah' => 10,
            'deskripsi' => 'test',
        ];

        $response = $this->actingAs($this->user)->post(route('store_rekrutmen', ['lomba' => $this->lomba]), $data_rekrutmen);

        $response->assertStatus(302);
        $this->assertDatabaseHas('rekrutmens', $data_rekrutmen);
        $response->assertRedirect(route('detail_rekrutmen_user', ['rekrutmen' => $this->user->rekrutmen->last()]));
    }

    public function test_render_form_edit_rekrutmen() {
        $response = $this->actingAs($this->user)->get(route('edit_rekrutmen', ['rekrutmen' => $this->rekrutmen]));
        $response->assertStatus(200);
    }

    public function test_render_form_edit_rekrutmen_without_logged_in() {
        $response = $this->get(route('edit_rekrutmen', ['rekrutmen' => $this->rekrutmen]));
        $response->assertStatus(302);
    }

    public function test_update_rekrutmen() {
        $data_rekrutmen = [
            'judul' => 'testtest',
            'jumlah' => 20,
            'deskripsi' => 'testtest',
        ];

        $response = $this->actingAs($this->user)->put(route('update_rekrutmen', ['rekrutmen' => $this->rekrutmen]), $data_rekrutmen);

        $response->assertStatus(302);
        $this->assertDatabaseHas('rekrutmens', $data_rekrutmen);
        $response->assertRedirect(route('detail_rekrutmen_user', ['rekrutmen' => $this->rekrutmen]));
    }

    public function test_delete_rekrutmen() {
        $response = $this->actingAs($this->user)->delete(route('delete_rekrutmen', ['rekrutmen' => $this->rekrutmen]));

        $response->assertStatus(302);
        $this->assertDatabaseMissing('rekrutmens', ['id' => $this->rekrutmen->id]);
        $response->assertRedirect(route('rekrutmen'));
    }
}
