<?php

namespace App\Http\Controllers;

use App\Exports\CostExport;
use App\Imports\CostImport;
use App\Services\CostService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class CostController extends Controller
{
    //

    private CostService $costService;

    public function __construct()
    {
        $this->costService = new CostService();
    }


    public function index()
    {
        $data = $this->costService->findAll();
        return view('admin.master.cost', ['data' => $data]);
    }

    public function delete(Request $request)
    {
        $rules = ['id' => 'required'];

        $this->validate($request, $rules);

        $this->costService->delete($request->input('id'));
        Alert::success("Sukses", "Berhasil Menghapus Biaya Ini");
        return back();
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:cost,name'
        ];
        $messages = [
            'name.required' => 'Nama Biaya Tidak Boleh Kosong'
        ];
        $data = $this->validate($request, $rules, $messages);
        $this->costService->create($data);
        Alert::success("Sukses", "Berhasil Menambahkan Biaya");
        return redirect('admin/master/cost');
    }


    public function edit($id)
    {
        $cost = $this->costService->findById($id);
        return view('admin.edit.cost-edit', ['cost' => $cost]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required'
        ];
        $messages = [
            'name.required' => 'Nama Biaya Tidak Boleh Kosong'
        ];
        $data = $this->validate($request, $rules, $messages);
        $this->costService->update($data, $id);
        Alert::success("Sukses", "Berhasil Memperbarui Nama Biaya");
        return redirect('admin/master/cost');
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
        Excel::import(new CostImport(), $request->file('file'));
        Alert::success("Berhasil Menambahkan Biaya");
        return back();
    }

    public function downloadTemplate()
    {
        $path = storage_path("/app/templates/cost_template.xlsx");
        return response()->download($path);
    }

    public function export()
    {
        return Excel::download(new CostExport(), "cost.xlsx");
    }
}
