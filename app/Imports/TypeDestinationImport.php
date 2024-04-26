<?php

namespace App\Imports;

use App\Services\TypeDestinationService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class TypeDestinationImport implements ToCollection
{


    private TypeDestinationService $typeDestinationService;


    public function __construct() {
        $this->typeDestinationService = new TypeDestinationService();
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //
        unset($collection[0]);
        foreach ($collection as $item) {
            $request['name'] = $item[0];
            $this->typeDestinationService->create($request);
        }
    }
}
