<?php

namespace App\Services;

use App\Exceptions\WebException;
use App\Models\Category;

class CategoryService implements Service
{

    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }


    public function create($request)
    {
        $data = $this->findAll();
        $this->validateName($data, $request['name']);
        try {
            //code...
            $created = $this->category->create($request);
            return $created;

        } catch (\Throwable $th) {
            //throw $th;

            throw new WebException($th->getMessage());
        }
    }

    public function update($request, $id)
    {
        $category = $this->findById($id);
        if (!isset($category)) {
            throw new WebException("Ops , Id Category Tidak Ditemukan");
        }
        $data = $this->findWithoutId($id);
        $this->validateName($data, $request['name']);
        $updated = $category->update(
            $request
        );
        if ($updated) {
            return;
        }
        throw new WebException('Ops , Gagal Memperbarui Category Terjadi Kesalahan');
    }


    public function delete($id)
    {
        $category = $this->findById($id);
        try {
            //code...
            $category->delete();
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }

    public function findAll()
    {
        return $this->category->all();
    }


    public function findById($id)
    {
        $category = $this->category->where('id', $id)->first();


        if (!isset($category)) {
            throw new WebException('Category Tidak Ditemukan');
        }
        return $category;
    }

    public function findWithoutId($id)
    {
        return $this->category->where('id', '<>', $id)->get();
    }

    public function validateName($data, $name)
    {
        foreach ($data as $key => $value) {
            # code...
            if ($value['name'] == $name) {
                throw new WebException("Ops , Nama Kategori Sudah Digunakan");
            }
        }
    }




}