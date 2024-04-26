<?php

namespace App\Exports;

use App\Exceptions\WebException;
use App\Services\HeadHealthService;
use App\Services\InstructionService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class SppdExport implements FromView
{

    private InstructionService $instructionService;
    private HeadHealthService $headHealthService;

    private $id;

    private $userId;

    public function __construct($id, $userId)
    {
        $this->instructionService = new InstructionService();
        $this->headHealthService = new HeadHealthService();
        $this->id = $id;
        $this->userId = $userId;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        //

        $data = $this->instructionService->findByIdAndEmployeeId($this->id, $this->userId);
        $head = $this->headHealthService->findAll();

        $data = $data->toArray();
        $data['user'] = [];
        $isMatchUser = false;

        foreach ($data['employees'] as $key => $value) {
            # code...
            if ($value['employee']['id'] == $this->userId) {
                $isMatchUser = true;
                $employee = $value['employee'];
                $data['user'] = $employee;
            }
        }

        if (!$isMatchUser) {
            throw new WebException("SPD Tidak Ditemukan ");
        }

        return view('exports.sppd-export', ['data' => $data, 'head' => $head[0]]);
    }
}
