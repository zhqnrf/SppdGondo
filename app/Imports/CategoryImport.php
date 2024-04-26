<?php

namespace App\Imports;

use App\Services\CategoryService;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CategoryImport implements ToCollection
{


    private CategoryService $categoryService;


    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        //

        unset($collection[0]); // remove title on excel
        foreach ($collection as $key => $value) {
            # code...
            $request['name'] = $value[0];
            $this->categoryService->create($request);
        }
    }
}
