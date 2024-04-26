<?php

namespace Tests\Feature;

use App\Models\Destination;
use App\Models\Places;
use App\Models\TypeDestination;
use App\Services\DestinationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class DestinationServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_success(): void
    {
        $service = new DestinationService();
        $this->expectNotToPerformAssertions();

        $typeDestination = TypeDestination::create([
            'name' => 'sekolah'
        ]);

        $place = Places::create([
            'name' => 'Banyuwangi Kota'
        ]);

        $service->create(
            [
                'type_destination_id' => $typeDestination->id,
                'places_id' => $place->id
            ]
        );
    }


    public function test_findAll_success()
    {
        $service = new DestinationService();
        $response = $service->findAll();
        self::assertNotEmpty($response);
    }

    public function test_update_success()
    {
        $service = new DestinationService();
        $this->expectNotToPerformAssertions();

        $typeDestination = TypeDestination::create([
            'name' => 'sekolah'
        ]);

        $place = Places::create([
            'name' => 'Banyuwangi Kota'
        ]);

        $destination = Destination::create(
            ['type_destination_id' => $typeDestination->id, 'places_id' => $place->id]
        );

        $service->update(
            [
                'name' => Str::random(5)
            ],
            $destination->id
        );

    }

    public function test_delete_success()
    {
        $service = new DestinationService();
        $this->expectNotToPerformAssertions();

        $typeDestination = TypeDestination::create([
            'name' => 'sekolah'
        ]);

        $place = Places::create([
            'name' => 'Banyuwangi Kota'
        ]);

        $destination = Destination::create(
            ['type_destination_id' => $typeDestination->id, 'places_id' => $place->id]
        );

        $service->delete(
            $destination->id
        );
    }
}
