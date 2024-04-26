<?php

namespace Tests\Feature;

use App\Services\HeadHealthService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotEmpty;

class HeadHealthServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_success(): void
    {
        $service = new HeadHealthService();
        $this->expectNotToPerformAssertions();

        $service->store([
            'name' => 'Dr. Fitriani Rahayu',
            'nip' => '1234567890123456',
            'rank' => 'Dr',
            'group' => '(III)',
            'daily_money' => 200000,
            'transport_money' => 200000,
            'food_money' => 20000
        ]);
    }

    public function test_find_all_success(){
        $service = new HeadHealthService();
        // $this->expectNotToPerformAssertions();

        $service->store([
            'name' => 'Dr. Fitriani Rahayu',
            'nip' => '1234567890123456',
            'rank' => 'Dr',
            'group' => '(III)',
            'daily_money' => 200000,
            'transport_money' => 200000,
            'food_money' => 20000
        ]);

        $data =  $service->findAll();
        assertNotEmpty($data);
    }
}
