<?php

namespace Tests\Unit\Http\Controllers\ShortLinkController;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test create short link valid data.
     */
    public function test_store_short_link_with_valid_data()
    {
        // Preparing data to create a short link
        $data = [
            'link' => 'https://test.com',
        ];

        // Send post request create short link
        $response = $this->postJson('/api/v1/short-links', $data);

        // Checking the response status
        $response->assertStatus(201);

        // Check that the short link is created on the database
        $this->assertDatabaseHas('short_links', [
            'link' => $data['link'],
        ]);

        // Checking the structure of the response
        $response->assertJsonStructure(['url']);
    }

    /**
     * Test create short link invalid data.
     */
    public function test_store_short_link_with_invalid_data()
    {
        // Preparing data to create a short link
        $data = [];

        // Send post request create short link
        $response = $this->postJson('/api/v1/short-links', $data);

        // Checking the response status (expecting a validation error)
        $response->assertStatus(422);

        // Check for a validation error message
        $response->assertJsonValidationErrors('link');
    }
}
