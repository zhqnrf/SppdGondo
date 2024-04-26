<?php

namespace App\Http\Controllers;

use App\Exceptions\WebException;
use App\Services\AuthService;
// use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    //

    private AuthService $authService;


    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $data = $this->validate($request, $rules);
        $successLogin = $this->authService->login($data['email'], $data['password']);
        if ($successLogin) {
            Alert::success("Sukses", "Berhasil Login");
            return redirect('admin/index');
        }
        throw new WebException('Email Atau Password Anda Salah');
    }

    public function logout(Request $request)
    {
        Auth::guard('users')->logout();
        return redirect('/login');
    }

}
