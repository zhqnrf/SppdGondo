<?php

namespace App\Http\Controllers;

use App\Exports\CategoryExport;
use App\Imports\CategoryImport;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    //

    private CategoryService $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }


    public function index()
    {
        $data = $this->categoryService->findAll();
        return view('admin.master.categories', ['data' => $data]);
    }

    public function delete(Request $request)
    {
        $rules = ['id' => 'required'];

        $this->validate($request, $rules);

        $this->categoryService->delete($request->input('id'));
        Alert::success("Sukses", "Berhasil Menghapus Kategori Ini");
        return back();
    }


    public function store(Request $request)
    {
        $rules = ['name' => 'required|unique:category,name'];

        $message = [
            'required' => ':attribute Tidak Boleh Kosong',
            'unique' => 'Nama Sudah Digunakan'
        ];
        $data = $this->validate($request, $rules, $message);
        $this->categoryService->create($data);
        Alert::success('Sukes', 'Berhasil Menambahkan Kategori');
        return redirect("admin/master/categories");
    }
    public function edit($id)
    {
        $category = $this->categoryService->findById($id);
        return view('admin.edit.categories-edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $rules = ['name' => 'required'];

        $message = [
            'required' => ':attribute Tidak Boleh Kosong'
        ];
        $data = $this->validate($request, $rules, $message);
        $this->categoryService->update($data, $id);
        Alert::success('Sukes', 'Berhasil Memperbarui Kategori');
        return redirect("admin/master/categories");
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
        Excel::import(new CategoryImport(), $request->file('file'));
        Alert::success("Sukses", "Berhasil Menambahkan Kategori");
        return back();
    }


    public function downloadTemplate()
    {
        $path = storage_path("/app/templates/category_templates.xlsx");
        return response()->download($path);
    }


    public function export()
    {
        return Excel::download(new CategoryExport(), "categories.xlsx");
    }

}
