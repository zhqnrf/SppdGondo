<?php

namespace App\Exports;

use App\Services\PlacesService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PlaceExport implements FromView
{
    private PlacesService $service;


    public function __construct()
    {
        $this->service = new PlacesService();
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('exports.place-export', [
            'data' => $this->service->findAll()
        ]);
    }
}
