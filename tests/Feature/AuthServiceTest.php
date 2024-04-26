<?php

namespace Tests\Feature;

use App\Services\AuthService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertFalse;
use function PHPUnit\Framework\assertTrue;

class AuthServiceTest extends TestCase
{

    /**
     * A basic feature test example.
     */
    public function test_login_success(): void
    {
        $service = new AuthService();

        $isLogin = $service->login('admin@gmail.com', 'rahasia');
        assertTrue($isLogin);
    }
    public function test_login_failed(): void
    {
        $service = new AuthService();

        $isLogin = $service->login('admins@gmail.com', 'rahasia');
        assertFalse($isLogin);
    }
}
