<?php

namespace App\Services;

use App\Exceptions\WebException;
use App\Models\Employee;
use App\Models\InstructionsEmployees;
use Carbon\Carbon;

class InstructionsEmployeesService
{

    private InstructionsEmployees $employees;

    private Employee $employee;
    public function __construct()
    {
        $this->employees = new InstructionsEmployees();
        $this->employee = new Employee();
    }

    public function create($request)
    {
        // dd($request);
        try {
            //code...
            // dd($request);
            return $this->employees->create($request);
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }

    public function deleteEmployeesInstructions($idInstructions)
    {
        $this->employees->where('instructions', $idInstructions)->delete();
    }


    public function validateEmployees($userId)
    {
        $users = $this->employees
            ->with([
                'instructions' => function ($query) {
                    $query->latest()->first(); // Fetch the latest instruction
                },
                'employee'
            ])
            ->where('users', $userId)
            ->get()
            ->toArray();




        foreach ($users as $key => $value) {
            # code...
            // dd($value['employee']['role']);


            if (!isset($value['instructios'])) {
            } else {
                $returnDate = Carbon::parse($value['instructions']['return_date'])->addDay();
                if (Carbon::now()->isBefore($returnDate)) {
                    throw new WebException("Maaf Pegawai Masih Dalam Status Bertugas.");
                }
            }
        }
    }


    public function validateRole($userIdArrays)
    {
        $users = $this->employee->whereIn('id', $userIdArrays)->get();
        $isValid = false;
        foreach ($users as $key => $value) {
            # code...
            if ($value->role == 'employee') {
                $isValid = true;
            }
        }
        if (!$isValid) {
            throw new WebException("Harap pilih setidaknya satu pegawai untuk ditugaskan");
        }
    }


}