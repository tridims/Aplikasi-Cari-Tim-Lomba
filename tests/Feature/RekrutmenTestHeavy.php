<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RekrutmenTestHeavy extends TestCase
{
    use DatabaseMigrations;

    public function test_render_detail_rekrutmen() {
        $response = $this->get(route('detail_rekrutmen', ['rekrutmen' => $this->rekrutmen]));

        $response->assertStatus(200);
    }
}
