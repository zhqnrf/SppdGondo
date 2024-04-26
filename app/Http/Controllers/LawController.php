<?php

namespace App\Http\Controllers;

use App\Models\Law;
use App\Services\LawService;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LawController extends Controller
{
    //
    private LawService $lawService;

    public function __construct()
    {
        $this->lawService = new LawService();
    }


    public function index()
    {
        $data = $this->lawService->findAll();
        return view("admin.master.law", ['data' => $data]);
    }


    public function store(Request $request)
    {
        $rules = [
            'law_value' => 'required'
        ];

        $messages = [
            'law_value.required' => 'Peraturan Hukum Tidak Boleh Kosong'
        ];

        $data = $this->validate($request, $rules, $messages);
        $this->lawService->store($data);
        Alert::success("Sukses", "Berhasil Menambahkan Peraturan");
        return redirect("admin/master/law");
    }



    public function edit($id)
    {

        $law = $this->lawService->findById($id);
        return view('admin.edit.law-edit', ['law' => $law]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'law_value' => 'required'
        ];

        $messages = [
            'law_value.required' => 'Peraturan Hukum Tidak Boleh Kosong'
        ];

        $data = $this->validate($request, $rules, $messages);
        $this->lawService->update($id, $data);
        Alert::success("Sukses", "Berhasil Memperbarui Peraturan");
        return redirect("admin/master/law");
    }

}
