<?php


namespace App\Services;

use App\Exceptions\WebException;
use App\Models\Cost;

class CostService implements Service
{

    private Cost $cost;


    public function __construct()
    {
        $this->cost = new Cost();
    }

    public function update($request, $id)
    {
        $cost = $this->findById($id);
        if (!isset($cost)) {
            throw new WebException("Ops , Id Cost Tidak Ditemukan");
        }


        $data = $this->findWithoutId($id);
        $this->validateName($data, $request['name']);
        $updated = $cost->update(
            $request
        );
        if ($updated) {
            return;
        }
        throw new WebException('Ops , Gagal Memperbarui Cost Terjadi Kesalahan');
    }


    public function delete($id)
    {
        $cost = $this->findById($id);
        try {
            //code...
            $cost->delete();
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }

    public function findAll()
    {
        return $this->cost->all();
    }


    public function findById($id)
    {
        $cost = $this->cost->where('id', $id)->first();


        if (!isset($cost)) {
            throw new WebException('Cost Tidak Ditemukan');
        }
        return $cost;
    }

    public function create($request)
    {
        $data = $this->findAll();
        $this->validateName($data , $request['name']);
        $created = $this->cost->create($request);
        return $created;
    }


    public function findWithoutId($id)
    {
        return $this->cost->where('id', '<>', $id)->get();
    }

    public function validateName($data, $name)
    {
        foreach ($data as $key => $value) {
            # code...
            if ($value['name'] == $name) {
                throw new WebException("Ops , Nama Angaran Sudah Digunakan");
            }
        }
    }





}