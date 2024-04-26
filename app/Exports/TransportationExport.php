<?php

namespace App\Exports;

use App\Services\TransportationService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Tests\Feature\TransportationServiceTest;

class TransportationExport implements FromView
{

    private TransportationService $service;

    public function __construct()
    {
        $this->service = new TransportationService();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        //
        return view("exports.transportation-export", ['data' => $this->service->findAll()]);
    }
}
