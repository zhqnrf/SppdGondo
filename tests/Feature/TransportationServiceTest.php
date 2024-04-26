<?php

namespace Tests\Feature;

use App\Models\Transportation;
use App\Models\TypeTransportation;
use App\Services\TransportationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotEmpty;
use function PHPUnit\Framework\assertSame;

class TransportationServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_success()
    {
        $service = new TransportationService();
        $this->expectNotToPerformAssertions();
        $service->create([
            'type_transportation' => "UDARA",
            'name' => Str::random(12)
        ]);
    }


    public function test_find_all_success()
    {
        $service = new TransportationService();
        $response = $service->findAll();
        assertNotEmpty($response);
    }

    public function test_find_by_id_success()
    {
        $service = new TransportationService();

        $transportation = Transportation::create([
            'type_transportation' => "UDARA",
            'name' => Str::random(12)
        ]);
        $transportationObj = $service->findById($transportation->id);
        assertEquals($transportation->name, "$transportationObj->name");
    }

    public function test_update_success()
    {
        $service = new TransportationService();
        $this->expectNotToPerformAssertions();

        $transportation = Transportation::create([
            'type_transportation' => "UDARA",
            'name' => 'Bus ID'
        ]);
        $service->update($transportation->id, [
            'name' => Str::random(5)
        ]);
    }


    public function test_delete_success()
    {

        $service = new TransportationService();
        $this->expectNotToPerformAssertions();

        $transportation = Transportation::create([
            'type_transportation' => "UDARA",
            'name' => 'Bus ID'
        ]);
        $service->delete($transportation->id);
    }
}
