<?php

namespace App\Http\Controllers;

use App\Exports\TypeDestinationExport;
use App\Imports\TypeDestinationImport;
use App\Services\TypeDestinationService;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class TypeDestinationController extends Controller
{
    //  


    private TypeDestinationService $typeDestinationService;

    public function __construct()
    {
        $this->typeDestinationService = new TypeDestinationService();
    }


    public function index()
    {
        $data = $this->typeDestinationService->findAll();
        return view('admin.master.type-destination', ['data' => $data]);
    }

    public function delete(Request $request)
    {
        $rules = ['id' => 'required'];

        $this->validate($request, $rules);

        $this->typeDestinationService->delete($request->input('id'));
        Alert::success("Sukses", "Berhasil Menghapus Tipe Tujuan");
        return back();
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:type_destination,name'
        ];
        $messages = [
            'name.required' => 'Nama Tipe Tujuan Tidak Boleh Kosong',
            'name.unique' => 'Nama Tipe tujuan Sudah Digunakan'
        ];
        $data = $this->validate($request, $rules, $messages);
        $this->typeDestinationService->create($data);
        Alert::success("Sukses", "Berhasil Menambahkan Tipe Tujuan");
        return redirect("/admin/master/type-destination");
    }

    public function edit($id)
    {
        $typeDestination = $this->typeDestinationService->findById($id);
        return view("admin.edit.type-destination-edit", ['typeDestination' => $typeDestination]);
    }



    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required'
        ];
        $messages = [
            'name.required' => 'Nama Tipe Tujuan Tidak Boleh Kosong',
        ];
        $data = $this->validate($request, $rules, $messages);
        $this->typeDestinationService->update($data, $id);
        Alert::success('Sukses', 'Berhasil Memperbarui Data Tipe Tujuan');
        return redirect("admin/master/type-destination");
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
        Excel::import(new TypeDestinationImport(), $request->file('file'));
        Alert::success("Sukses", "Berhasil Menambahkan Tipe Tujuan");
        return back();
    }


    public function downloadTemplate()
    {
        $path = storage_path("/app/templates/type_destination_templates.xlsx");
        return response()->download($path);
    }

    public function export()
    {
        return Excel::download(new TypeDestinationExport, 'type-destination.xlsx');
    }

}
