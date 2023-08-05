<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminLoginControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_admin_dashboard(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
// php artisan test --coverage --filter=ImportPartnerSpendingsJobTest