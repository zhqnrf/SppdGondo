<?php

namespace Tests\Feature;

use App\Models\TypeDestination;
use App\Services\TypeDestinationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotEmpty;

class TypeDestinationServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_success(): void
    {
        $service = new TypeDestinationService();
        $this->expectNotToPerformAssertions();

        $service->create(
            [
                'name' => Str::random(12)
            ]
        );
    }


    public function test_findAll_success()
    {
        $service = new TypeDestinationService();
        $response = $service->findAll();
        assertNotEmpty($response);
    }

    public function test_update_success()
    {
        $service = new TypeDestinationService();
        $this->expectNotToPerformAssertions();

        $place = TypeDestination::create(
            ['name' => Str::random(12)]
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
        $service = new TypeDestinationService();
        $this->expectNotToPerformAssertions();

        $place = TypeDestination::create(
            ['name' => Str::random(12)]
        );

        $service->delete(
            $place->id
        );
    }
}
