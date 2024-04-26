<?php

namespace App\Http\Controllers;

use App\Exports\TransportationExport;
use App\Imports\TransportationImport;
use App\Services\BankAccountService;
use App\Services\TransportationService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class TransportationController extends Controller
{
    //

    private TransportationService $service;


    public function __construct()
    {
        $this->service = new TransportationService();
        // $this->bankAccountService = new BankAccountService();
    }


    public function index()
    {
        $data = $this->service->findAll();
        return view('admin.master.transportation', ['data' => $data]);
    }

    public function delete(Request $request)
    {
        $rules = ['id' => 'required'];

        $this->validate($request, $rules);

        $this->service->delete($request->input('id'));
        Alert::success("Sukses", "Berhasil Menghapus Transportasi Ini");
        return back();
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:transportation,name',
            'type_transportation' => 'required'
        ];
        $messages = [
            'required' => ':attribute field tidak boleh kosong.',
            'name.unique' => 'Nama Transportasi Tidak Boleh Sama'
        ];
        $data = $this->validate($request, $rules, $messages);
        $this->service->create($data);
        Alert::success("Sukes", "Berhasil Menambahkan Alat Transportasi");
        return redirect("admin/master/transportation");
    }



    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'type_transportation' => 'required'
        ];
        $messages = [
            'required' => ':attribute field tidak boleh kosong.',
        ];
        $data = $this->validate($request, $rules, $messages);
        $this->service->update($id, $data);
        Alert::success("Sukes", "Berhasil Memperbarui  Alat Transportasi");
        return redirect("admin/master/transportation");
    }


    public function edit($id)
    {
        $data = $this->service->findById($id);
        return view('admin.edit.transportation-edit', ['transportation' => $data]);
    }


    public function import(Request $request)
    {
        $rules = [
            'file' => 'required|mimes:xlsx,xls,csv'
        ];
        $messages = [
            'required' => 'Tolong Masukan File Excel'
        ];
        $this->validate($request, $rules, $messages);
        Excel::import(new TransportationImport(), $request->file('file'));
        Alert::success("Sukses", "Berhasil Menambahkan Alat Transportasi");
        return back();
    }


    public function downloadTemplate()
    {
        $path = storage_path("/app/templates/transportation_templates.xlsx");
        return response()->download($path);
    }


    public function export()
    {
        return Excel::download(new TransportationExport(), 'transportation.xlsx');
    }

    

}
