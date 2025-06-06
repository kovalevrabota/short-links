<?php

namespace Tests\Unit\Http\Controllers\AuthController;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateTokenTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test create token success data.
     */
    public function test_create_token_success()
    {
        // Create user test
        $user = User::factory()->create([
            'name' => 'test4',
            'email' => 'test4@test.com',
            'password' => 'password',
        ]);

        // Send a request to create a token
        $response = $this->postJson('/api/v1/create-token', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        // Checking the answer
        $response->assertStatus(200);
        $response->assertJsonStructure(['user', 'token']);
        $this->assertNotNull($response->json()['token']);
    }

    /**
     * Test create token failure data.
     */
    public function test_create_token_failure()
    {
        //Send a request to create a token
        $response = $this->postJson('/api/v1/create-token', [
            'email' => 'wrong@email.com',
            'password' => 'wrongpassword',
        ]);

        // Checking the answer
        $response->assertStatus(401);
        $response->assertJson(['errors' => ['Wrong Email or Password']]);
    }
}
