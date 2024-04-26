<?php


namespace App\Services;

use App\Exceptions\WebException;
use App\Models\Employee;
use Carbon\Carbon;

use function PHPUnit\Framework\isNull;

class EmployeeService implements Service
{

    private Employee $employee;

    public function __construct()
    {
        $this->employee = new Employee();
    }

    public function create($request)
    {
        $data = $this->findAllEmployees();
        $this->validateName($data, $request['name']);
        $created = $this->employee->create($request);
        return $created;
    }

    public function createCadress($request)
    {
        $data = $this->findAllCadress();
        $this->validateName($data, $request['name']);
        $created = $this->employee->create($request);
        return $created;
    }


    public function update($request, $id)
    {
        $employee = $this->findById($id);
        if (!isset($employee)) {
            throw new WebException("Ops , Id Pegawai Tidak Ditemukan");
        }
        $data = $this->findWithoutId($id);
        $this->validateName($data, $request['name']);
        $updated = $employee->update(
            $request
        );
        if ($updated) {
            return;
        }
        throw new WebException('Ops , Gagal Memperbarui Pegawai Terjadi Kesalahan');
    }


    public function delete($id)
    {
        $employee = $this->findById($id);
        try {
            //code...
            $employee->delete();
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }

    public function findAll()
    {
        return $this->employee->all();
    }


    public function findAllEmployees()
    {
        $data = $this->employee
            ->where('role', 'employee')
            ->with([
                'instructions' => function ($query) {
                    $query->latest()->first();
                },
                'instructions.instructions' => function ($query) {
                    $query->latest()->first();
                }
            ])
            ->get()
            ->toArray();

        foreach ($data as $key => $value) {
            # code...
            $isInstructions = false;
            foreach ($value['instructions'] as $keyInstructions => $valueInstructions) {
                # code...
                if (Carbon::now()->isBefore(Carbon::parse($valueInstructions['instructions']['return_date'])->addDay())) {
                    $isInstructions = true;
                }
            }
            $data[$key]['isInstructions'] = $isInstructions;
        }
        return $data;
    }

    public function findAllEmployeesWithoutTresurer()
    {
        $data = $this->employee
            // ->where('role', 'employee')
            ->where('position', '<>', 'Bendahara')
            ->with([
                'instructions' => function ($query) {
                    $query->latest()->first();
                },
                'instructions.instructions' => function ($query) {
                    $query->latest()->first();
                }
            ])
            ->get()
            ->toArray();

        foreach ($data as $key => $value) {
            # code...
            $isInstructions = false;
            foreach ($value['instructions'] as $keyInstructions => $valueInstructions) {
                # code...
                if (Carbon::now()->isBefore(Carbon::parse($valueInstructions['instructions']['return_date']))) {
                    $isInstructions = true;
                }
            }
            $data[$key]['isInstructions'] = $isInstructions;
        }
        return $data;
    }

    public function findAllCadress()
    {
        $data = $this->employee
            ->where('role', 'cadres')
            ->with([
                'instructions' => function ($query) {
                    $query->latest()->first();
                },
                'instructions.instructions' => function ($query) {
                    $query->latest()->first();
                }
            ])
            ->get()
            ->toArray();

        foreach ($data as $key => $value) {
            # code...
            $isInstructions = false;
            foreach ($value['instructions'] as $keyInstructions => $valueInstructions) {
                # code...
                if (Carbon::now()->isBefore(Carbon::parse($valueInstructions['instructions']['return_date']))) {
                    $isInstructions = true;
                }
            }
            $data[$key]['isInstructions'] = $isInstructions;
        }
        // dd($data);
        return $data;
    }


    public function findById($id)
    {
        $employee = $this->employee->where('id', $id)->first();


        if (!isset($employee)) {
            throw new WebException('Pegawai Tidak Ditemukan');
        }
        return $employee;
    }


    public function findWithoutId($id)
    {
        return $this->employee->where("id", "<>", $id)->get()->toArray();
    }

    public function validateName($data, $name)
    {
        foreach ($data as $key => $value) {
            if ($value['name'] == $name) {
                throw new WebException("Ops , Nampaknya Ada Nama Yang Sama");
            }
        }
    }


    public function findAllTresurer()
    {
        return $this->employee
            ->where('role', 'employee')
            ->where('position', 'Bendahara')
            ->get()
            ->toArray();

    }

}
