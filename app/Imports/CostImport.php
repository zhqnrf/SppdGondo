<?php

namespace App\Imports;

use App\Services\CostService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CostImport implements ToCollection
{


    private CostService $costService;


    public function __construct()
    {
        $this->costService = new CostService();
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //
        unset($collection[0]);
        foreach ($collection as $value) {
            # code...
            $request['name'] = $value[0];
            $this->costService->create($request);
        }
    }
}
