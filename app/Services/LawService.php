<?php


namespace App\Services;

use App\Exceptions\WebException;
use App\Models\Law;

class LawService
{



    private Law $law;

    public function __construct()
    {
        $this->law = new Law();
    }



    public function findAll()
    {
        return $this->law->all()->toArray();
    }


    public function store($data)
    {
        try {
            //code...
            $this->law->create($data);
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }

    public function findById($id)
    {
        $law = $this->law->where('id', $id)->first();
        if (!isset($law)) {
            throw new WebException("Hukum Tidak Ditemukan");
        }
        return $law;
    }


    public function update($id, $data)
    {
        $law = $this->findById($id);
        try {
            //code...
            $law->update($data);
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }

}