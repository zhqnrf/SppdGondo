<?php

namespace App\Imports;

use App\Services\PlacesService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PlaceImport implements ToCollection
{


    private PlacesService $placeService;


    public function __construct()
    {
        $this->placeService = new PlacesService();
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
            $this->placeService->create($request);
        }
    }
}
