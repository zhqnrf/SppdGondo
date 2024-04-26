<?php


namespace App\Services;

use App\Exceptions\WebException;
use App\Models\Employee;
use App\Models\Instructions;
use App\Models\InstructionsEmployees;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class InstructionService
{

    private Instructions $instructions;

    private DestinationService $destinationService;

    private InstructionsEmployeesService $employeeService;

    private Employee $employee;





    public function __construct()
    {

        $this->instructions = new Instructions();
        $this->destinationService = new DestinationService();
        $this->employeeService = new InstructionsEmployeesService();
        $this->employee = new Employee();

    }



    public function create($request)
    {

        $this->employeeService->validateRole($request['users']);

        foreach ($request['users'] as $key => $value) {
            # code...
            $this->employeeService->validateEmployees($value);
        }

        $destinationFrom = $this->createDestinationFrom($request['place_from'], $request['type_destinations_id']);
        $destinationTo = $this->createDestinationTo($request['place_to'], $request['type_destinations_id']);
        Db::beginTransaction();
        try {
            //code...
            $created = $this->instructions->create([
                'activity_name' => $request['activity_name'],
                'sub_activity_name' => $request['sub_activity_name'],
                'category_id' => $request['category_id'],
                'departure_date' => Carbon::parse($request['departure_date']),
                'return_date' => Carbon::parse($request['return_date']),
                'transportation_id' => $request['transportation_id'],
                'destination_to_id' => $destinationTo->id,
                'destination_from_id' => $destinationFrom->id,
                'travel_time' => $request['travel_time'],
                'budget_account_id' => $request['account_id'],
                'bank_account_id' => $request['bank_account_id'],
                'present_in' => $request['present_in'],
                'accept_from' => $request['accept_from'],
                'sub_component' => $request['sub_component'],
                'amount_money' => $request['ammount_money'],
                'briefings' => $request['briefings'],
                'problem' => $request['problem'],
                'advice' => $request['advice'],
                'other' => $request['other'],
                'description' => $request['description'],
                'treasurer_id' => $request['tresurer_id']
            ]);
            // dd($created->id);
            if ($created) {
                DB::commit();
                $this->createEmployeesInstruction($request['users'], $created->id);
                return $created;
            }
            throw new WebException("Terjadi Kesalahan Saat Menambahkan Petugas");
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }



    public function update($request, $id)
    {
        $instructions = $this->instructions->where('id', $id)->first();
        if (!isset($instructions)) {
            dd($id);
            throw new WebException("Spt tidak ditemukan");
        }


        $this->employeeService->deleteEmployeesInstructions($id);


        $destinationFrom = $this->createDestinationFrom($request['place_from'], $request['type_destinations_id']);
        $destinationTo = $this->createDestinationTo($request['place_to'], $request['type_destinations_id']);



        try {
            //code...
            $created = $instructions->update([
                'activity_name' => $request['activity_name'],
                'sub_activity_name' => $request['sub_activity_name'],
                'category_id' => $request['category_id'],
                'departure_date' => Carbon::parse($request['departure_date']),
                'return_date' => Carbon::parse($request['return_date']),
                'transportation_id' => $request['transportation_id'],
                'destination_to_id' => $destinationTo->id,
                'destination_from_id' => $destinationFrom->id,
                'travel_time' => $request['travel_time'],
                'budget_account_id' => $request['account_id'],
                'bank_account_id' => $request['bank_account_id'],
                'present_in' => $request['present_in'],
                'accept_from' => $request['accept_from'],
                'sub_component' => $request['sub_component'],
                'amount_money' => $request['ammount_money'],
                'briefings' => $request['briefings'],
                'problem' => $request['problem'],
                'advice' => $request['advice'],
                'other' => $request['other'],
                'description' => $request['description'],
                'treasurer_id' => $request['tresurer_id']
            ]);
            $this->createEmployeesInstruction($request['users'], $id);
            return;
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }


    private function createDestinationTo($placeId, $typeId)
    {
        $request = [
            'places_id' => $placeId,
            'type_destination_id' => $typeId,
            'type' => 'to'
        ];
        return $this->destinationService->create($request);
    }

    private function createDestinationFrom($placeId, $typeId)
    {
        $request = [
            'places_id' => $placeId,
            'type_destination_id' => $typeId,
            'type' => 'from'
        ];
        return $this->destinationService->create($request);
    }




    private function createEmployeesInstruction($users, $instructionsId)
    {

        foreach ($users as $key => $value) {
            # code...

            $request['users'] = $value;
            $request['instructions'] = $instructionsId;
            $this->employeeService->create($request);
        }
    }


    public function findAll()
    {
        return $this->instructions->with(['employees', 'employees.employee'])->get()->toArray();
    }


    public function bkuFindAll()
    {

        $data = $this->employee
            ->whereHas('instructions')
            ->with('instructions', 'instructions.instructions', 'instructions.instructions.categories', 'instructions.instructions.transportation', 'instructions.instructions.destination_to', 'instructions.instructions.destination_from', 'instructions.instructions.destination_from.place', 'instructions.instructions.destination_to.place', 'instructions.instructions.bank_account', 'instructions.instructions.account', 'instructions.instructions.destination_from.type_destination', 'instructions.instructions.destination_to.type_destination', 'instructions.instructions.transportation')
            ->get()
            ->toArray();

        $newData = [];

        foreach ($data as $user) {
            foreach ($user['instructions'] as $instruction) {
                $newUser = $user;
                $newUser['instructions'] = [$instruction];
                $newData[] = $newUser;
            }
        }
        return $newData;
    }


    public function findById($id)
    {
        return $this->instructions->with(['employees', 'treasurer', 'employees.employee', 'categories', 'transportation', 'destination_to.place', 'destination_from.place', 'bank_account', 'account'])->where('id', $id)->first();
    }

    public function findByIdAndEmployeeId($id, $employeeId)
    {
        return $this->instructions->with(['employees', 'treasurer', 'employees.employee', 'categories', 'transportation', 'destination_to.place', 'destination_from.place', 'bank_account', 'account'])->where('id', $id)->first();
    }


    public function delete($id)
    {
        try {
            //code...
            $instructions = $this->findById($id);
            $instructions->delete();
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }

    public function count()
    {
        return $this->instructions->count();
    }

}