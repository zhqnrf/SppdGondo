<?php

namespace App\Imports;

use App\Exceptions\WebException;
use App\Services\BankAccountService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BankAccountImport implements ToCollection
{


    private BankAccountService $bankAccountService;


    public function __construct()
    {
        $this->bankAccountService = new BankAccountService();
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //
        unset($collection[0]);
        foreach ($collection as $bankAccount) {

            if (!is_numeric($bankAccount[0])) {
                throw new WebException("Ops , Kamu Harus Memasukan Nomor Pada Nomor Rekening");
            }
            $request['account_number'] = $bankAccount[0];
            $this->bankAccountService->create($request);

        }
    }
}
