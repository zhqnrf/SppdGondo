<?php

namespace App\Exports;

use App\Services\InstructionService;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class BkuExport implements FromView, WithEvents
{

    private InstructionService $instructionService;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct()
    {
        $this->instructionService = new InstructionService();
    }

    public function view(): View
    {
        //
        $data = $this->instructionService->bkuFindAll();
        // dd($data);
        // dd($data);
        return view('exports.bku-export', ['data' => $data]);
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $highestRow = $event->sheet->getHighestRow();
                $highestRowFinalTotal = $event->sheet->getHighestDataRow('AQ');
                $totalCellFinal = "AQ" . ($highestRowFinalTotal);
                $totalCell = 'AA5'; // Adjust the cell based on your actual data columns
                $totalFinalCell = "AQ5";
                $total15 = 'O5';

                $event->sheet->setCellValue($totalCell, "=SUM(O5:Z5)");
                // Adjust the range (AQ6:AQ{$highestRow}) based on your actual data rows
                $event->sheet->setCellValue($totalFinalCell, "=AA5");
                $highest = $highestRowFinalTotal - 1;
                $event->sheet->setCellValue($total15, "=M5 * N5");
                // Adjust the range (AQ6:{$totalCellFinal}) based on your actual data rows
                $event->sheet->setCellValue($totalCellFinal, "=SUM(AQ5:AQ{$highest})");
                // Adjust the range (AQ6:AQ{$highestRowFinalTotal}) based on your actual data rows
            },
        ];
    }




}
