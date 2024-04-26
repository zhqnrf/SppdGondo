<?php

namespace Tests\Feature;

use App\Exceptions\WebException;
use App\Models\Cost;
use App\Services\CostService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class CostServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_success(): void
    {
        $service = new CostService();

        $create = $service->create([
            'name' => Str::random(12),

        ]);
        self::assertNotNull($create);
    }

    public function test_update_success()
    {
        $service = new CostService();
        $this->expectNotToPerformAssertions();
        $Cost = Cost::create(
            [
                'name' => Str::random(12),

            ]
        );
        $service->update(
            [
                'name' => Str::random(2),

            ],
            $Cost->id
        );
    }


    public function test_update_notfound()
    {
        $service = new CostService();

        $this->expectException(WebException::class);
        $service->update(
            [
                'name' => 'employe-test-new',
            ],
            123213
        );
    }

    public function test_find_all_success()
    {
        $service = new CostService();
        $Cost = Cost::create(
            [
                'name' => 'employe-test'
            ]
        );
        $response = $service->findAll();
        self::assertNotEmpty($response);
    }



}
