<?php

namespace App\Exports;

use App\Models\BankAccount;
use App\Services\BankAccountService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BankAccountExport implements FromView
{
    private BankAccountService $service;


    public function __construct()
    {
        $this->service = new BankAccountService();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('exports.bank-account-export', [
            'data' => $this->service->findAll()
        ]);
    }
}
