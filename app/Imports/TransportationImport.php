<?php

namespace App\Imports;

use App\Exceptions\WebException;
use App\Services\TransportationService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TransportationImport implements ToCollection
{


    private TransportationService $transportationService;

    public function __construct()
    {
        $this->transportationService = new TransportationService();
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //
        unset($collection[0]);
        foreach ($collection as $key => $value) {
            # code...

            $type = $value[1];

            if ($type != "UDARA" && $type != "LAUT" && $type != "DARAT") {
                throw new WebException("Ops, Kamu Harus Memasukan UDARA , LAUT , ATAU DARAT pada tipe transportasi");
            }
            $request['name'] = $value[0];
            $request['type_transporation'] = $type;
            $this->transportationService->create($request);
        }
    }
}
