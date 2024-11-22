<?php

namespace Tests\Feature\Api\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ReadUserTest extends TestCase
{
    /**
     * @test
     */
    public function test_get_users()
    {
        User::factory(5)->create();

        $response = $this->get('/api/users');

        // dd($response->getContent());
        // $response->assertJson([]);

        // $response = $this->get('GET', '/users');

        $response->assertStatus(200);
    }
}
