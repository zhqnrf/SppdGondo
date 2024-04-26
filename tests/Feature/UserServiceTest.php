<?php

namespace Tests\Feature;

use App\Exceptions\WebException;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class UserServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_update_password_notfound(): void
    {
        $service = new UserService();
        $this->expectException(WebException::class);
        $service->updatePassword("", "", " ", "");
    }

    public function test_update_password_success()
    {
        $service = new UserService();
        $user = User::all()->first();
        $updated = $service->updatePassword("rahasia", "rahasia", "rahasia", $user->id);
        assertTrue($updated);
    }

    public function test_update_password_wrong_old_password()
    {
        $service = new UserService();
        $user = User::all()->first();
        $this->expectException(WebException::class);

        $updated = $service->updatePassword("asdas", "rahasia", "rahasia", $user->id);
    }
}
