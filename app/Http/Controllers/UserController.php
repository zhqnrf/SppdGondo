<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //

    private UserService $UserService;

    public function __construct()
    {
        $this->UserService = new UserService();
    }


    public function index()
    {
        $id = Auth::guard('users')->user()->id;
        $data = $this->UserService->findAllWithoutId($id);
        return view('admin.master.user', ['data' => $data]);
    }

    public function delete(Request $request)
    {
        $rules = ['id' => 'required'];

        $this->validate($request, $rules);

        $this->UserService->delete($request->input('id'));
        Alert::success("Sukses", "Berhasil Menghapus User");
        return back();
    }



    public function store(
        Request
        $request
    ) {
        $rules = [
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'role' => 'required'
        ];
        $messages = [
            'requierd' => ':attribute Tidak Boleh Kosong',
            'name.unique' => 'Nama Pengguna Sudah Digunakan',
            'email.unique' => 'Email Pengguna Sudah Digunakan'
        ];
        $data = $this->validate($request, $rules, $messages);
        $this->UserService->create($data);
        Alert::success("Sukes", "Berhasil Menambahkan Pengguna");
        return redirect("admin/master/user");
    }


    public function edit($id)
    {
        $user = $this->UserService->findById($id);
        return view("admin.edit.user-edit", ['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string',
            'email' => 'required'
        ];

        $messages = [
            'required' => ":attribute Tidak Boleh Kosong"
        ];
        $data = $this->validate($request, $rules, $messages);
        $this->UserService->update($id, $data);
        Alert::success("Sukses", "Berhasil Memperbarui Pengguna");
        return redirect("/admin/master/user");
    }


    public function updatePassword(Request $request)
    {
        $rules = [
            'old_password',
            'new_password',
            'confirm_password'
        ];

        $messages = [
            'required' => ":attribute Tidak Boleh Kosong"
        ];
        $this->validate($request, $rules, $messages);
        // dd($request->all());
        $userId = Auth::guard('users')->user()->id;
        $this->UserService->updatePassword($request['old_password'], $request['new_password'], $request['confirm_password'], $userId);
        Auth::guard('users')->logout();
        Alert::success("Sukses", "Berhasil Mengganti Password Silahkan Login Kembali");
        return back();
    }


}
