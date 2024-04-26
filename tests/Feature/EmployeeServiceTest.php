<?php

namespace Tests\Feature;

use App\Exceptions\WebException;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

use function PHPUnit\Framework\assertNotEmpty;
use function PHPUnit\Framework\assertNotNull;

class EmployeeServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_success(): void
    {
        $service = new EmployeeService();

        $create = $service->create([
            'name' => Str::random(12),
            'nip' => '123123123123',
            'rank' => 'asdas',
            'group' => 'asdas',
            'position' => 'ob',
            'daily_money' => 0,
            'food_money' => 1000,
            'transport_money' => 12000,
            'role' => 'cadres'
        ]);

        $create = $service->create([
            'name' => Str::random(12),
            'nip' => '123123123123',
            'rank' => 'asdas',
            'group' => 'asdas',
            'position' => 'ob',
            'daily_money' => 0,
            'food_money' => 1000,
            'transport_money' => 12000,
            'role' => 'employee'
        ]);
        assertNotNull($create);
    }

    public function test_update_success()
    {
        $service = new EmployeeService();
        $this->expectNotToPerformAssertions();
        $employee = Employee::create(
            [
                'name' => 'employe-test',
                'nip' => '123123123123',
                'rank' => 'asdas',
                'group' => 'asdas',
                'position' => 'ob',
                'daily_money' => 0,
                'food_money' => 1000,
                'transport_money' => 12000,
                'role' => 'employee'
            ]
        );
        $service->update(
            [
                'name' => Str::random(5),
                'nip' => '123123123123',
            ],
            $employee->id
        );
    }


    public function test_update_notfound()
    {
        $service = new EmployeeService();

        $this->expectException(WebException::class);
        $service->update(
            [
                'name' => 'employe-test-new',
                'nip' => '123123123123',
            ],
            123213
        );
    }

    public function test_find_all_success()
    {
        $service = new EmployeeService();
        $employee = Employee::create(
            [
                'name' => 'employe-test',
                'nip' => '123123123123',
                'rank' => 'asdas',
                'group' => 'asdas',
                'position' => 'ob',
                'daily_money' => random_int(100000, 100000000000),
                'food_money' => random_int(100000, 100000000000),
                'transport_money' => 2000000000000
            ]
        );
        $response = $service->findAll();
        assertNotEmpty($response);
    }


    public function test_find_all_employee_success()
    {
        $service = new EmployeeService();
        $response = $service->findAllEmployees();
        assertNotEmpty($response);
    }

    public function test_find_all_cadress_success()
    {
        $service = new EmployeeService();
        $response = $service->findAllCadress();
        assertNotEmpty($response);
    }
}
