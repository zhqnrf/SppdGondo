<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class CategoryServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_success(): void
    {
        $service = new CategoryService();
        $this->expectNotToPerformAssertions();

        $service->create(
            [
                'name' => Str::Random(12)
            ]
        );
    }


    public function test_findAll_success()
    {
        $service = new CategoryService();
        $response = $service->findAll();
        self::assertNotEmpty($response);
    }

    public function test_update_success()
    {
        $service = new CategoryService();
        $this->expectNotToPerformAssertions();

        $place = Category::create(
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
        $service = new CategoryService();
        $this->expectNotToPerformAssertions();

        $place = Category::create(
            ['name' => Str::random(12)]
        );

        $service->delete(
            $place->id
        );
    }
}
