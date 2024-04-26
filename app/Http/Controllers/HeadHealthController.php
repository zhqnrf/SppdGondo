<?php

namespace App\Http\Controllers;

use App\Services\HeadHealthService;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HeadHealthController extends Controller
{
    //

    private HeadHealthService $service;


    public function __construct()
    {
        $this->service = new HeadHealthService();
    }

    public function index()
    {
        $data = $this->service->findAll();
        return view('admin.master.head-health', ['data' => $data]);
    }


    public function create()
    {
        return view('admin.add.head-health-add');
    }


    public function edit($id)
    {
        $headHealth = $this->service->findById($id);
        // dd($headHealth);
        return view("admin.edit.head-health-edit", ['headHealth' => $headHealth]);
    }



    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'nip' => 'required',
            'rank' => 'required',
            'group' => 'required',
            'daily_money' => 'required|numeric',
            'transport_money' => 'required|numeric',
            'food_money' => 'required|numeric'
        ];

        $messages = [
            'name.required' => 'Nama Kepala Puskesmas Tidak Boleh kosong',
            'nip.required' => 'Nip Tidak Boleh Kosong',
            'rank.required' => 'Pangkat Tidak Boleh Kosong',
            'group.required' => 'Golongan Tidak Boleh Kosong',
            'daily_money.required' => 'Uang Makanan Tidak Boleh kosong',
            'daily_money.numeric' => 'Uang Harian Harus Berupa Angka',
            'transport_money.required' => 'Uang Transportasi Tidak Boleh kosong',
            'transport_money.numeric' => 'Uang Transportasi Harus Berupa Angka',
            'food_money.required' => 'Uang Makanan Tidak Boleh kosong',
            'food_money.numeric' => 'Uang Makanan Harus Berupa Angka',
        ];

        $data = $this->validate($request, $rules, $messages);
        $this->service->store($data);
        Alert::success("Sukses", "Berhasil Menambahkan Kepala Puskesmas");
        return redirect('admin/master/head-health');
    }


    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string',
            'nip' => 'required',
            'rank' => 'required',
            'group' => 'required',
            'daily_money' => 'required|numeric',
            'transport_money' => 'required|numeric',
            'food_money' => 'required|numeric'
        ];

        $messages = [
            'name.required' => 'Nama Kepala Puskesmas Tidak Boleh kosong',
            'nip.required' => 'Nip Tidak Boleh Kosong',
            'rank.required' => 'Pangkat Tidak Boleh Kosong',
            'group.required' => 'Golongan Tidak Boleh Kosong',
            'daily_money.required' => 'Uang Makanan Tidak Boleh kosong',
            'daily_money.numeric' => 'Uang Harian Harus Berupa Angka',
            'transport_money.required' => 'Uang Transportasi Tidak Boleh kosong',
            'transport_money.numeric' => 'Uang Transportasi Harus Berupa Angka',
            'food_money.required' => 'Uang Makanan Tidak Boleh kosong',
            'food_money.numeric' => 'Uang Makanan Harus Berupa Angka',
        ];

        $data = $this->validate($request, $rules, $messages);
        $this->service->update($id, $data);
        Alert::success("Sukses", "Berhasil Memperbarui data Kepala Puskesmas");
        return redirect("admin/master/head-health");
    }

}
