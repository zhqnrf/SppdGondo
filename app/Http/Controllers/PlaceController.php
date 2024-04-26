<?php

namespace App\Http\Controllers;

use App\Exports\PlaceExport;
use App\Imports\PlaceImport;
use App\Services\PlacesService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PlaceController extends Controller
{
    //

    private PlacesService $placeService;



    public function __construct()
    {
        $this->placeService = new PlacesService();
    }



    public function index()
    {
        $data = $this->placeService->findAll();
        return view('admin.master.place', ['data' => $data]);
    }


    public function delete(Request $request)
    {
        $rules = ['id' => 'required'];

        $this->validate($request, $rules);

        $this->placeService->delete($request->input('id'));
        Alert::success("Sukses", "Berhasil Menghapus Tempat Ini");
        return back();
    }

    public function edit($id)
    {
        $place = $this->placeService->findById($id);

        return view('admin/edit/place-edit', ['place' => $place]);
    }


    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required'
        ];
        $messages = [
            'name.required' => 'Nama Tempat Tidak Boleh Kosong',
        ];
        $data = $this->validate($request, $rules, $messages);
        $this->placeService->update($data, $id);
        Alert::success('Sukses', 'Berhasil Memperbarui Nama Tempat');
        return redirect("/admin/master/place");
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:places,name'
        ];
        $messages = [
            'name.required' => 'Nama Tempat Tidak Boleh Kosong',
            'name.unique' => 'Nama Tempat Sudah digunakan'
        ];
        $data = $this->validate($request, $rules, $messages);
        $this->placeService->create($data);
        Alert::success('Sukses', 'Berhasil Menambahkan Tempat');
        return redirect('admin/master/place');
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
        Excel::import(new PlaceImport(), $request->file('file'));
        Alert::success("Berhasil Menambahkan Tempat");
        return back();
    }


    public function downloadTemplate()
    {
        $path = storage_path("/app/templates/place_templates.xlsx");
        return response()->download($path);
    }

    public function export()
    {
        return Excel::download(new PlaceExport(), "place.xlsx");
    }

}
