<?php

namespace Tests\Unit\Http\Controllers\AuthController;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test register user valid data.
     */
    public function test_register_with_valid_data()
    {
        // User data
        $data = [
            'name' => 'Test Name',
            'email' => 'test@test.com',
            'password' => 'password',
        ];

        // Send post request register user
        $response = $this->postJson('/api/v1/register', $data);

        // Checking the response status
        $response->assertStatus(201);

        // Check that the user has been created in the database
        $this->assertDatabaseHas('users', [
            'name' => $data['name'],
            'email' => $data['email'],
        ]);
    }

    /**
     * Test register user invalid data.
     */
    public function test_register_with_invalid_data()
    {
        // User data
        $data = [
            'name' => 'Test Name',
            'email' => 'test@test.com',
        ];

        // Send post request register user
        $response = $this->postJson('/api/v1/register', $data);

        // Checking the response status
        $response->assertStatus(422);

        // Check for a validation error message
        $response->assertJsonValidationErrors('password');
    }
}
