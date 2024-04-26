<?php

namespace App\Services;

use App\Exceptions\WebException;
use App\Models\HeadHealth;

class HeadHealthService
{



    private HeadHealth $headHealth;

    public function __construct()
    {
        $this->headHealth = new HeadHealth();
    }


    public function findAll()
    {
        return $this->headHealth->latest()->get()->toArray();
    }


    public function store($request)
    {
        try {
            //code...
            $this->headHealth->truncate();
            $this->headHealth->create($request);
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }

    public function findById($id)
    {
        try {
            //code...
            return $this->headHealth->where('id', $id)->first();
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());

        }
    }

    public function update($id, $request)
    {
        $headHealth = $this->findById($id);
        try {
            //code...
            $headHealth->update($request);

        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());

        }
    }

}

