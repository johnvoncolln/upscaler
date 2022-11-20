<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReplicateScaleRepsonseTest extends TestCase
{
    /** @test */
    public function it_makes_request_to_webhook_endpoint()
    {
        $path = base_path().'/tests/fixtures/replicate_scale_response.json';
        $json = json_decode(file_get_contents($path), true);

        $response = $this->post('/api/webhook', $json);

        $response->assertStatus(200);
    }
}
