<?php

namespace App\Exports;

use App\Services\EmployeeService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EmployeeExport implements FromView
{

    private $role;

    private EmployeeService $employeeService;

    public function __construct($role)
    {
        $this->employeeService = new EmployeeService();
        $this->role = $role;
    }

    public function view(): View
    {
        $data = [];

        switch ($this->role) {
            case 'cadress':
                # code...
                $data = $this->employeeService->findAllCadress();
                break;
            case 'employee':
                $data = $this->employeeService->findAllEmployees();
                break;
            default:
                # code...
                break;
        }

        return view('exports.employee-export', [
            'data' => $data
        ]);
    }


}
