<?php

namespace App\Exports;

use App\Services\AccountService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class AccountExport implements FromView
{


    private AccountService $service;


    public function __construct()
    {
        $this->service = new AccountService();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        //
        return view("exports.account-export", ['data' => [$this->service->findAll()]]);
    }
}
