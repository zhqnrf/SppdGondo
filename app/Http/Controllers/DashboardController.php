<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use App\Services\InstructionService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    private EmployeeService $employeeService;
    private InstructionService $instructionService;



    public function __construct()
    {
        $this->employeeService = new EmployeeService();
        $this->instructionService = new InstructionService();
    }

    public function index()
    {
        $totalEmployee = sizeof($this->employeeService->findAllEmployees());
        $totalCadress = sizeof($this->employeeService->findAllCadress());
        $totalInstructions = $this->instructionService->count();

        return view('admin.dashboard', ['totalEmployee' => $totalEmployee, 'totalCadress' => $totalCadress , 'spt' => $totalInstructions]);
    }

}
