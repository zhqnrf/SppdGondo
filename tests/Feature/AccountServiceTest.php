<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Services\AccountService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class AccountServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_success(): void
    {
        $service = new AccountService();
        $this->expectNotToPerformAssertions();

        $service->create(
            [
                'name' => 'Banyuwangi'
            ]
        );
    }


    public function test_findAll_success()
    {
        $service = new AccountService();
        $response = $service->findAll();
        self::assertNotEmpty($response);
    }

    public function test_update_success()
    {
        $service = new AccountService();
        $this->expectNotToPerformAssertions();

        $place = Account::create(
            ['name' => 'Banyuwangi Kota']
        );

        $service->update(
            [
                'name' => Str::random(5)
            ],
            $place->id
        );

    }

    public function test_delete_success()
    {
        $service = new AccountService();
        $this->expectNotToPerformAssertions();

        $place = Account::create(
            ['name' => 'Banyuwangi Kota']
        );

        $service->delete(
            $place->id
        );
    }


}
