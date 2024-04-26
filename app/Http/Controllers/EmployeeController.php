<?php

namespace App\Http\Controllers;

use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    //

    private EmployeeService $employeeService;

    public function __construct()
    {
        $this->employeeService = new EmployeeService();
    }

    public function employees()
    {
        $data = $this->employeeService->findAllEmployees();
        return view('admin.master.employee', ['data' => $data]);
    }

    public function cadress()
    {
        $data = $this->employeeService->findAllCadress();

        return view('admin.master.cadress', ['data' => $data]);
    }


    public function deleteEmployee(Request $request)
    {

        $rules = ['id' => 'required'];

        $this->validate($request, $rules);

        $this->employeeService->delete($request->input('id'));
        Alert::success("Sukses", "Berhasil Menghapus Pegawai");
        return back();
    }


    public function storeEmployee(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required|unique:employee,name',
            'nip' => 'required',
            'rank' => 'required',
            'group' => 'required',
            'position' => 'required',
            'daily_money' => 'required|numeric',
            'transport_money' => 'required|numeric',
            'food_money' => 'required|numeric',
            'role' => 'required'
        ];

        $message = [
            'name.required' => 'Nama Tidak Boleh Kosong',
            'nip.required' => 'Nip Tidak Boleh Kosong',
            'rank.required' => 'Pangkat Tidak Boleh Kosong',
            'group.required' => "Golongan Tidak Boleh Kosong",
            'position.required' => 'Jabatan Tidak Boleh Kosong',
            'daily_money.required' => 'Uang Harian Tidak Boleh Kosong',
            'food_money.required' => 'Uang Makan Tidak Boleh Kosong',
            'transport_money.required' => 'Uang Transportasi tidak boleh kosong',
            'daily_money.numeric' => 'Uang Harian Harus Berupa number',
            'food_money.numeric' => 'Uang Makan Harus Berupa Number',
            'transport_money.numeric' => 'Uang Transportasi Harus Berupa Number',
            'name.unique' => 'Ops, Nama sudah digunakan oleh yang lain'

        ];

        $data = $this->validate($request, $rules, $message);
        $this->employeeService->create($data);
        Alert::success("Sukses", "Berhasil Menambahkan Pegawai");
        return redirect('/admin/master/employee');
    }


    public function storeCadress(Request $request)
    {
        $rules = [
            'name' => 'required|unique:employee,name',
            'nip' => 'required',
            'rank' => 'required',
            'group' => 'required',
            'position' => 'required',
            'daily_money' => 'required|numeric',
            'transport_money' => 'required|numeric',
            'food_money' => 'required|numeric',
            'role' => 'required'
        ];

        $message = [
            'name.required' => 'Nama Tidak Boleh Kosong',
            'nip.required' => 'Nip Tidak Boleh Kosong',
            'rank.required' => 'Pangkat Tidak Boleh Kosong',
            'group.required' => "Golongan Tidak Boleh Kosong",
            'position.required' => 'Jabatan Tidak Boleh Kosong',
            'daily_money.required' => 'Uang Harian Tidak Boleh Kosong',
            'food_money.required' => 'Uang Makan Tidak Boleh Kosong',
            'transport_money.required' => 'Uang Transportasi tidak boleh kosong',
            'daily_money.numeric' => 'Uang Harian Harus Berupa number',
            'food_money.numeric' => 'Uang Makan Harus Berupa Number',
            'transport_money.numeric' => 'Uang Transportasi Harus Berupa Number',
            'name.unique' => 'Ops, Nama sudah digunakan oleh yang lain'
        ];

        $data = $this->validate($request, $rules, $message);
        $this->employeeService->createCadress($data);
        Alert::success("Sukses", "Berhasil Menambahkan Kader");
        return redirect("/admin/master/cadress");
    }


    public function editEmployee($id)
    {
        $employee = $this->employeeService->findById($id);
        return view('admin.edit.employee-edit', ['employee' => $employee]);
    }

    public function editCadress($id)
    {
        $employee = $this->employeeService->findById($id);
        return view('admin.edit.cadress-edit', ['cadress' => $employee]);
    }

    public function updateEmployee(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'nip' => 'required',
            'rank' => 'required',
            'group' => 'required',
            'position' => 'required',
            'daily_money' => 'required|numeric',
            'transport_money' => 'required|numeric',
            'food_money' => 'required|numeric',
        ];

        $message = [
            'name.required' => 'Nama Tidak Boleh Kosong',
            'nip.required' => 'Nip Tidak Boleh Kosong',
            'rank.required' => 'Pangkat Tidak Boleh Kosong',
            'group.required' => "Golongan Tidak Boleh Kosong",
            'position.required' => 'Jabatan Tidak Boleh Kosong',
            'daily_money.required' => 'Uang Harian Tidak Boleh Kosong',
            'food_money.required' => 'Uang Makan Tidak Boleh Kosong',
            'transport_money.required' => 'Uang Transportasi tidak boleh kosong',
            'daily_money.numeric' => 'Uang Harian Harus Berupa number',
            'food_money.numeric' => 'Uang Makan Harus Berupa Number',
            'transport_money.numeric' => 'Uang Transportasi Harus Berupa Number'
        ];

        $data = $this->validate($request, $rules, $message);
        $this->employeeService->update($data, $id);
        Alert::success('Sukses', 'Berhasil Memperbarui Data Pegawai');
        return redirect("/admin/master/employee");
    }

    public function updateCadress(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'nip' => 'required',
            'rank' => 'required',
            'group' => 'required',
            'position' => 'required',
            'daily_money' => 'required|numeric',
            'transport_money' => 'required|numeric',
            'food_money' => 'required|numeric',
        ];

        $message = [
            'name.required' => 'Nama Tidak Boleh Kosong',
            'nip.required' => 'Nip Tidak Boleh Kosong',
            'rank.required' => 'Pangkat Tidak Boleh Kosong',
            'group.required' => "Golongan Tidak Boleh Kosong",
            'position.required' => 'Jabatan Tidak Boleh Kosong',
            'daily_money.required' => 'Uang Harian Tidak Boleh Kosong',
            'food_money.required' => 'Uang Makan Tidak Boleh Kosong',
            'transport_money.required' => 'Uang Transportasi tidak boleh kosong',
            'daily_money.numeric' => 'Uang Harian Harus Berupa number',
            'food_money.numeric' => 'Uang Makan Harus Berupa Number',
            'transport_money.numeric' => 'Uang Transportasi Harus Berupa Number'
        ];

        $data = $this->validate($request, $rules, $message);
        $this->employeeService->update($data, $id);
        Alert::success('Sukses', 'Berhasil Memperbarui Data Kader');
        return redirect("/admin/master/cadress");
    }


    public function importEmployee(Request $request)
    {
        $rules = [
            'file' => 'required|mimes:xlsx,xls,csv'
        ];
        $messages = [
            'required' => 'Tolong Masukan File Excel'
        ];
        $this->validate($request, $rules, $messages);
        Excel::import(new EmployeeImport('employee'), $request->file('file'));
        Alert::success("Sukses", "Berhasil Mengupload data");
        return back();
    }


    public function importCadress(Request $request)
    {
        $rules = [
            'file' => 'required|mimes:xlsx,xls,csv'
        ];
        $messages = [
            'required' => 'Tolong Masukan File Excel'
        ];
        $this->validate($request, $rules, $messages);
        Excel::import(new EmployeeImport('cadres'), $request->file('file'));
        Alert::success("Sukses", "Berhasil Mengupload data");
        return back();
    }


    public function downloadTemplate()
    {
        $path = storage_path("/app/templates/pegawai_template.xls");
        return response()->download($path);
    }

    public function export()
    {
        return Excel::download(new EmployeeExport("employee"), "employees.xlsx");
    }


    public function export_cadress()
    {
        return Excel::download(new EmployeeExport("cadress"), "employees.xlsx");
    }
}
