<?php

namespace App\Imports;

use App\Services\EmployeeService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class EmployeeImport implements ToCollection
{


    private EmployeeService $employeeService;
    private string $role;

    public function __construct($role)
    {
        $this->employeeService = new EmployeeService();
        $this->role = $role;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //
        unset($collection[0]); // remove template header
        foreach ($collection as $employee) {

            $data['name'] = $employee[0];
            $data['nip'] = $employee[1];
            $data['rank'] = $employee[2];
            $data['group'] = $employee[3];
            $data['position'] = $employee[4];
            $data['daily_money'] = $employee[5];
            $data['transport_money'] = $employee[6];
            $data['food_money'] = $employee[7];
            $data['role'] = $this->role;
            $this->employeeService->create($data);
        }
    }
}
