<?php

namespace App\Exports;

use App\Services\TypeDestinationService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class TypeDestinationExport implements FromView
{


    private TypeDestinationService $service;


    public function __construct()
    {
        $this->service = new TypeDestinationService();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('exports.type-destination-export', [
            'data' => $this->service->findAll()
        ]);
    }
}
