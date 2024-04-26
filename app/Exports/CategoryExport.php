<?php

namespace App\Exports;

use App\Services\CategoryService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class CategoryExport implements FromView
{


    private CategoryService $service;



    public function __construct() {
        $this->service = new CategoryService();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        //
        return view(
            "exports.category-export",
            [
                'data' => $this->service->findAll()
            ]
        );
    }
}
