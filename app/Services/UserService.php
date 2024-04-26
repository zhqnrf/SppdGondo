<?php


namespace App\Services;

use App\Exceptions\WebException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService implements Service
{

    private User $user;


    public function __construct()
    {
        $this->user = new User();
    }

    public function updatePassword($oldPassword, $newPassword, $confirmPassword, $id)
    {
        $user = $this->findById($id);
        if (!isset($user)) {
            throw new WebException("User Tidak Ditemukan");
        }

        if ($newPassword != $confirmPassword) {
            throw new WebException('Ops , Password Dan Konfirmasi Password Tidak Sesuai');
        }

        if (Hash::check($oldPassword, $user->password)) {

            $updated = $user->update([
                'password' => Hash::make($newPassword)
            ]);

            if ($updated) {
                return true;
            }
            throw new WebException('Ops, Gagal Mengupdate Password Terjadi Kesalahan');
        }
        throw new WebException('Ops , Password Lama Tidak Sesuai');
    }

    public function create(array $data)
    {
        try {
            //code...
            $this->user->create([
                'name' => $data['name'],
                'password' => Hash::make($data['password']),
                'email' => $data['email'],
                'role' => $data['role']
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }

    public function update($id, $request)
    {
        $user = $this->findById($id);
        $data = $this->findAllWithoutId($id);
        $this->validate($data, $request);
        try {
            $user->update(
                [
                    'name' => $request['name'],
                    'email' => $request['email'],
                ]
            );
         
            return;
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }

    public function delete($id)
    {
        $user = $this->findById($id);
        try {
            //code...
            $user->delete();
        } catch (\Throwable $th) {
            //throw $th;
            throw new WebException($th->getMessage());
        }
    }

    public function findAll()
    {
        return $this->user->all();
    }

    public function findAllWithoutId($id)
    {
        return $this->user->where('id', '<>', $id)->get()->toArray();

    }


    public function validate($data, $request)
    {
        foreach ($data as $key => $value) {
            # code...
            if ($value['email'] == $request['email']) {
                throw new WebException("Ops, Email Sudah Digunakan Oleh Pengguna Yang Lain");
            }
            if ($value['name'] == $request['name']) {
                throw new WebException("Ops, Nama Sudah Digunakan Oleh Pengguna Yang Lain");
            }
        }
    }



    public function findById($id)
    {
        $user = $this->user->where('id', $id)->first();
        if (!isset($user)) {
            throw new WebException("Ops , Id Pengguna Tidak Ditemukan");
        }
        return $user;
    }



}