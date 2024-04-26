<?php

namespace App\Exports;

use App\Services\CostService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class CostExport implements FromView
{
    private CostService $service;


    public function __construct()
    {
        $this->service = new CostService();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('exports.cost-export', [
            'data' => $this->service->findAll()
        ]);
    }
}
