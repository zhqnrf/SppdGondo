<?php

namespace App\Services;

use App\Exceptions\WebException;
use App\Models\Transportation;

/**
 * Summary of TransportationService
 */
class TransportationService implements Service
{


    private Transportation $transportation;



    public function __construct()
    {
        $this->transportation = new Transportation();
    }


    public function create(array $request)
    {


        $data = $this->findAll();
        $this->validateName($data, $request['name']);
        try {
            //code...
            $this->transportation->create($request);

        } catch (\Throwable $th) {
            //throw $th;

            throw new WebException($th->getMessage());
        }
    }

    public function findById($id)
    {
        $result = $this->transportation->where('id', $id)->first();
        if (!isset($result)) {
            throw new WebException("Ops , id Transportasi Tidak Ditemukan");
        }
        return $result;
    }
    public function update($id, array $request)
    {
        $transporation = $this->findById($id);
        $data = $this->findWithoutId($id);
        $this->validateName($data, $request['name']);
        try {
            //code...
            $transporation->update($data);
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }


    public function delete($id)
    {
        $transporation = $this->findById($id);
        try {
            //code...
            $transporation->delete();
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }


    public function findAll()
    {
        return $this->transportation->get()->toArray();
    }

    public function findWithoutId($id)
    {
        return $this->transportation->where("id", '<>', $id)->get()->toArray();
    }

    public function validateName($data, $name)
    {
        foreach ($data as $key => $value) {
            # code...
            if ($value['name'] == $name) {
                throw new WebException("Ops, Nama Transportasi Sudah Digunakan");
            }
        }
    }

}