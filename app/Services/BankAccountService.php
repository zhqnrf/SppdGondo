<?php


namespace App\Services;

use App\Exceptions\WebException;
use App\Models\BankAccount;

class BankAccountService implements Service
{

    private BankAccount $bankAccount;

    public function __construct()
    {
        $this->bankAccount = new BankAccount();
    }


    public function create($request)
    {
        $data = $this->findAll();
        $this->validateAccountNumber($data , $request['account_number']);
        $created = $this->bankAccount->create($request);
        return $created;
    }

    public function update($request, $id)
    {
        $bankAccount = $this->findById($id);
        if (!isset($bankAccount)) {
            throw new WebException("Ops , Id Bank Account Tidak Ditemukan");
        }

        $data = $this->findWithoutId($id);

        $this->validateAccountNumber($data, $request['account_number']);

        $updated = $bankAccount->update(
            $request
        );
        if ($updated) {
            return;
        }
        throw new WebException('Ops , Gagal Memperbarui Bank Account Terjadi Kesalahan');
    }


    public function delete($id)
    {
        $bankAccount = $this->findById($id);
        try {
            //code...
            $bankAccount->delete();
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }

    public function findAll()
    {
        return $this->bankAccount->all();
    }


    public function findById($id)
    {
        $bankAccount = $this->bankAccount->where('id', $id)->first();


        if (!isset($bankAccount)) {
            throw new WebException('Bank Account Tidak Ditemukan');
        }
        return $bankAccount;
    }

    private function validateAccountNumber($data, $name)
    {
        foreach ($data as $key => $value) {
            # code...
            if ($value['account_number'] == $name) {
                throw new WebException("Ops , Nomor Rekening Sudah Digunakan");
            }
        }
    }


    private function findWithoutId($id)
    {
        return $this->bankAccount->where('id', '<>', $id)->get();
    }





}