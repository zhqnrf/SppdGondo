<?php


namespace App\Services;

use App\Exceptions\WebException;
use App\Models\Destination;

class DestinationService
{


    private Destination $destination;


    public function __construct()
    {
        $this->destination = new Destination();
    }

    public function create($request)
    {
        try {
            //code...
            $created = $this->destination->create($request);
            return $created;
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
        // return $created;
    }

    public function update($request, $id)
    {
        $destination = $this->findById($id);
        if (!isset($destination)) {
            throw new WebException("Ops , Id Tujuan Tidak Ditemukan");
        }
        $updated = $destination->update(
            $request
        );
        if ($updated) {
            return;
        }
        throw new WebException('Ops , Gagal Memperbarui Tujuan Terjadi Kesalahan');
    }


    public function delete($id)
    {
        $destination = $this->findById($id);
        try {
            //code...
            $destination->delete();
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }

    public function findAll()
    {
        return $this->destination->all();
    }


    public function findById($id)
    {
        $destination = $this->destination->where('id', $id)->first();


        if (!isset($destination)) {
            throw new WebException('Tujuan Tidak Ditemukan');
        }
        return $destination;
    }



}