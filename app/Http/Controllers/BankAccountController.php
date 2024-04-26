<?php

namespace App\Http\Controllers;

use App\Exports\BankAccountExport;
use App\Imports\BankAccountImport;
use App\Services\BankAccountService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class BankAccountController extends Controller
{
    //

    private BankAccountService $bankAccountService;

    public function __construct()
    {
        $this->bankAccountService = new BankAccountService();
    }


    public function index()
    {
        $data = $this->bankAccountService->findAll();
        // dd($data);
        return view('admin.master.bank-account', ['data' => $data]);
    }

    public function delete(Request $request)
    {
        $rules = ['id' => 'required'];

        $this->validate($request, $rules);

        $this->bankAccountService->delete($request->input('id'));
        Alert::success("Sukses", "Berhasil Nomor Rekening Ini");
        return back();
    }


    public function store(Request $request)
    {
        $rules = [
            'account_number' => 'required|unique:bank_account,account_number|numeric',
        ];
        $messages = [
            'account_number.required' => 'Nomor Rekening Tidak Boleh Kosong',
            'account_number.unique' => 'Nomer Rekening Sudah digunakan',
            'account_number.numeric' => 'Nomer Rekening Harus Berupa Angka'
        ];
        $data = $this->validate($request, $rules, $messages);
        $this->bankAccountService->create($data);
        Alert::success('Sukses', 'Berhasil Menambahkan Nomor Rekening');
        return redirect('admin/master/bank-account');
    }

    public function edit($id)
    {
        $bankAccount = $this->bankAccountService->findById($id);
        return view('admin.edit.bank-account-edit', ['bankAccount' => $bankAccount]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'account_number' => 'required|numeric',
        ];
        $messages = [
            'account_number.required' => 'Nomor Rekening Tidak Boleh Kosong',
            'account_number.numeric' => 'Nomer Rekening Harus Berupa Angka'
        ];
        $data = $this->validate($request, $rules, $messages);
        $this->bankAccountService->update($data, $id);
        Alert::success("Sukses", "Berhasil Memperbarui  Nomer Rekening");
        return redirect("/admin/master/bank-account");
    }

    public function import(
        Request
        $request
    ) {
        $rules = [
            'file' => 'required|mimes:xlsx,xls,csv'
        ];
        $messages = [
            'required' => 'Tolong Masukan File Excel'
        ];
        $this->validate($request, $rules, $messages);
        Excel::import(new BankAccountImport(), $request->file('file'));
        Alert::success("Sukses", "Berhasil Menambahkan Nomor Rekening");
        return back();
    }

    public function downloadTemplate()
    {
        $path = storage_path("/app/templates/bank_account_template.xlsx");
        return response()->download($path);
    }

    public function export()
    {
        return Excel::download(new BankAccountExport(), "bank_account.xlsx");
    }


}
