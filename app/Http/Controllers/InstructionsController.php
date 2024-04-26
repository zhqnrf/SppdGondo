<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use App\Exceptions\WebException;
use App\Exports\BkuExport;
use App\Services\AccountService;
use App\Services\BankAccountService;
use App\Services\CategoryService;
use App\Services\DestinationService;
use App\Services\EmployeeService;
use App\Services\HeadHealthService;
use App\Services\InstructionService;
use App\Services\LawService;
use App\Services\PlacesService;
use App\Services\TransportationService;
use App\Services\TypeDestinationService;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpWord\TemplateProcessor;
use RealRashid\SweetAlert\Facades\Alert;
use Riskihajar\Terbilang\Facades\Terbilang;

class InstructionsController extends Controller
{
    //
    private CategoryService $categoryService;
    private EmployeeService $employeeService;
    private TransportationService $transportationService;
    private PlacesService $placesService;
    private AccountService $accountService;
    private BankAccountService $bankService;

    private DestinationService $destinationService;
    private TypeDestinationService $typeDestinationService;

    private InstructionService $instructionService;
    private HeadHealthService $headHealthService;
    private LawService $lawService;




    public function __construct()
    {
        $this->categoryService = new CategoryService();
        $this->employeeService = new EmployeeService();
        $this->transportationService = new TransportationService();
        $this->placesService = new PlacesService();
        $this->accountService = new AccountService();
        $this->bankService = new BankAccountService();
        $this->typeDestinationService = new TypeDestinationService();
        $this->instructionService = new InstructionService();
        $this->headHealthService = new HeadHealthService();
        $this->lawService = new LawService();
    }


    public function create()
    {

        $headHealths = $this->headHealthService->findAll();
        if (sizeof($headHealths) == 0) {
            throw new WebException('Ops, Data Kepala Puskesmas Kosong Silahkan Tambahkan Terlebih Dahulu');
        }
        $categories = $this->categoryService->findAll();
        $employees = $this->employeeService->findAllEmployeesWithoutTresurer();
        $transportations = $this->transportationService->findAll();
        $places = $this->placesService->findAll();
        $accounts = $this->accountService->findAll();
        $bankAccounts = $this->bankService->findAll();
        $typeDestinations = $this->typeDestinationService->findAll();
        $tresurers = $this->employeeService->findAllTresurer();

        return view('admin.add.spt-add', [
            'categories' => $categories,
            'employees' => $employees,
            'transportations' => $transportations,
            'places' => $places,
            'accounts' => $accounts,
            'banks' => $bankAccounts,
            'type_destinations' => $typeDestinations,
            'head' => $headHealths[0],
            'tresurers' => $tresurers
        ]);
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $rules = [
            'activity_name' => 'required',
            'sub_activity_name' => 'required',
            'category_id' => 'required',
            'departure_date' => 'required|date',
            'return_date' => 'required|date',
            'users' => 'required|array|min:1',
            'transportation_id' => 'required',
            'place_from' => 'required',
            'place_to' => 'required',
            'type_destinations_id' => 'required',
            'travel_time' => 'required',
            'account_id' => 'required',
            'accept_from' => 'required',
            'sub_component' => 'required',
            'ammount_money' => 'required',
            'bank_account_id' => 'required',
            'present_in' => 'required',
            'briefings' => 'required',
            'problem' => 'required',
            'advice' => 'required',
            'description' => 'required',
            'other' => 'required',
            'tresurer_id' => 'required'
        ];
        $messages = [
            'activity_name.required' => 'Nama Aktivitas Harus Di Isi',
            'sub_activity_name.required' => 'Nama SUb Aktivitas Harus Di isi',
            'category_id.required' => 'Kategory Perjalanan Tidak Boleh Kosong',
            'derparture_id.required' => 'Tanggal Berangkat Harus Di Isi',
            'return_date.required' => 'Tanggal Pulang Harus Diisi',
            'users.min' => 'Pegawai Tidak Boleh Kosong',
            'transportation_id.required' => 'Alat Transportasi Tidak Boleh Kosong',
            'place_form.required' => 'Tempat Berangkat Tidak Boleh Kosong',
            'place_to.required' => 'Tempat Tujuan Tidak Boleh Kosong',
            'type_destinations_id.required' => 'Tipe Tujuan Tidak Boleh Kosong',
            'travel_time.required' => 'Waktu Perjalanan Tidak Boleh Kosong',
            'account_id.required' => 'Akun Tidak Boleh Kosong',
            'accept_from.required' => "Diterima Dari Tidak Boleh Kosong",
            'sub_component.required' => 'Sub Komponen Tidak Boleh Kosong',
            "ammount_money.required" => 'Total Biaya tidak boleh kosong',
            "bank_account_id.required" => "Nomor Rekening Tidak Boleh Kosong",
            "present_in.required" => "Hadir Dalam Tidak Boleh Kosong",
            "briefings.required" => 'Pengarahan Tidak Boleh Kosong',
            "problem.required" => 'Masalah Tidak Boleh Kosong',
            "advice.required" => 'Saran Tidak Boleh Kosong',
            "description.required" => "Deskripsi Tidak boleh kosong",
            'users.required' => 'Pegawai Harus Di isi',
            'other' => 'Lain Lain Harus Diisi',
            'tresurer_id.required' => 'Petugas Bendahara Tidak Boleh Kosong'
        ];
        $data = $this->validate($request, $rules, $messages);
        $this->instructionService->create($data);
        Alert::success("Sukses", "Berhasil Menambahkan SPT");
        return redirect('/admin/spt');
    }



    public function detail($id)
    {
        $data = $this->instructionService->findById($id)->toArray();
        // dd($data);
        return view('admin.detail-spt', ['data' => $data, 'instructionsId' => $id]);
    }

    public function delete(Request $request)
    {
        $this->instructionService->delete($request->input('id'));
        Alert::success("Sukses", "Berhasil Menghapus SPT");
        return back();
    }


    public function index()
    {
        $data = $this->instructionService->findAll();
        // dd($data);
        return view("admin.spt", ['data' => $data]);
    }


    public function edit($id)
    {
        $data = $this->instructionService->findById($id)->toArray();

        $categories = $this->categoryService->findAll();
        $employees = $this->employeeService->findAllEmployeesWithoutTresurer();
        $transportations = $this->transportationService->findAll();
        $places = $this->placesService->findAll();
        $accounts = $this->accountService->findAll();
        $bankAccounts = $this->bankService->findAll();
        $typeDestinations = $this->typeDestinationService->findAll();
        $tresurest = $this->employeeService->findAllTresurer();
        // dd($data);
        return view('admin.edit.spt-edit', [
            'data' => $data,
            'categories' => $categories,
            'employees' => $employees,
            'transportations' => $transportations,
            'places' => $places,
            'accounts' => $accounts,
            'banks' => $bankAccounts,
            'type_destinations' => $typeDestinations,
            'tresurers' => $tresurest
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'activity_name' => 'required',
            'sub_activity_name' => 'required',
            'category_id' => 'required',
            'departure_date' => 'required',
            'return_date' => 'required',
            'users' => 'required|array|min:1',
            'transportation_id' => 'required',
            'place_from' => 'required',
            'place_to' => 'required',
            'type_destinations_id' => 'required',
            'travel_time' => 'required',
            'account_id' => 'required',
            'accept_from' => 'required',
            'sub_component' => 'required',
            'ammount_money' => 'required',
            'bank_account_id' => 'required',
            'present_in' => 'required',
            'briefings' => 'required',
            'problem' => 'required',
            'advice' => 'required',
            'description' => 'required',
            'other' => 'required',
            'tresurer_id' => 'required'
        ];
        $messages = [
            'activity_name.required' => 'Nama Aktivitas Harus Di Isi',
            'sub_activity_name.required' => 'Nama SUb Aktivitas Harus Di isi',
            'category_id.required' => 'Kategory Perjalanan Tidak Boleh Kosong',
            'derparture_id.required' => 'Tanggal Berangkat Harus Di Isi',
            'return_date.required' => 'Tanggal Pulang Harus Diisi',
            'users.min' => 'Pegawai Tidak Boleh Kosong',
            'transportation_id.required' => 'Alat Transportasi Tidak Boleh Kosong',
            'place_form.required' => 'Tempat Berangkat Tidak Boleh Kosong',
            'place_to.required' => 'Tempat Tujuan Tidak Boleh Kosong',
            'type_destinations_id.required' => 'Tipe Tujuan Tidak Boleh Kosong',
            'travel_time.required' => 'Waktu Perjalanan Tidak Boleh Kosong',
            'account_id.required' => 'Akun Tidak Boleh Kosong',
            'accept_from.required' => "Diterima Dari Tidak Boleh Kosong",
            'sub_component.required' => 'Sub Komponen Tidak Boleh Kosong',
            "ammount_money.required" => 'Total Biaya tidak boleh kosong',
            "bank_account_id.required" => "Nomor Rekening Tidak Boleh Kosong",
            "present_in.required" => "Hadir Dalam Tidak Boleh Kosong",
            "briefings.required" => 'Pengarahan Tidak Boleh Kosong',
            "problem.required" => 'Masalah Tidak Boleh Kosong',
            "advice.required" => 'Saran Tidak Boleh Kosong',
            "description.required" => "Deskripsi Tidak boleh kosong",
            'users.required' => 'Pegawai Harus Di isi',
            'other' => 'Lain Lain Harus Diisi',
            'departure_date.after' => 'Tanggal Berangkat Tidak Valid',
            'return_date.after' => 'Tanggal Kembali Tidak Valid',
            'tresurer_id.required' => 'Petugas Bendahara Tidak Boleh Kosong'
        ];
        $data = $this->validate($request, $rules, $messages);
        $this->instructionService->update($data, $id);
        Alert::success("Sukses", "Berhasil Memperbarui SPT");
        return redirect("admin/spt");

    }

    public function export_bku()
    {
        return Excel::download(new BkuExport(), 'BKU.xlsx');
    }

    public function export_spt($id)
    {

        $data = $this->instructionService->findById($id)->toArray();
        $head = $this->headHealthService->findAll();
        $laws = $this->lawService->findAll();
        // dd($data);

        if (sizeof($head) == 0) {
            throw new WebException("Tidak Ada Kepala Puskesmas, Harap Tambahkan Terlebih dahulu");
        }

        $templateProcessor = new TemplateProcessor(storage_path("/app/templates/spt-template.docx"));

        $templateProcessor->cloneRow('row', sizeof($laws));

        foreach ($laws as $key => $value) {
            # code...
            $index = $key + 1;
            $templateProcessor->setValue('row#' . $index, $index);
            $templateProcessor->setValue('lawValue#' . $index, $value['law_value']);
        }

        $templateProcessor->cloneRow('rowEmployee', sizeof($data['employees']));
        $templateProcessor->cloneRow('employeeRow', sizeof($data['employees']));
        $templateProcessor->cloneRow('rowCost', sizeof($data['employees']));


        $terbilang = 0;
        $transportation = 0;
        $departure = Carbon::parse($data['departure_date']);
        $return = Carbon::parse($data['return_date']);
        $daysDifference = $return->diffInDays($departure);

        // If the dates are the same, set the value to 1
        if ($daysDifference == 0) {
            $daysDifference = 1;
        }
        $categoryName = $data['categories']['name'];
        if ($categoryName == 'Perjalanan Kurang Dari 8 Jam') {
            $transportation = 60000;
        } else {
            $transportation = (int) $data['amount_money'] / sizeof($data['employees']);
        }



        usort($data['employees'], function ($a, $b) {
            return $a['employee']['role'] === 'employee' ? -1 : 1;
        });

        $total = 0;
        foreach ($data['employees'] as $key => $value) {
            $tempTotal = $daysDifference * $transportation;
            $total += $tempTotal;
            # code...
            $index = $key + 1;
            $templateProcessor->setValue('rowEmployee#' . $index, $index);
            $templateProcessor->setValue('name#' . $index, $value['employee']['name']);
            $templateProcessor->setValue('rank#' . $index, $value['employee']['rank']);
            $templateProcessor->setValue('group#' . $index, $value['employee']['group']);
            $templateProcessor->setValue('employeeNip#' . $index, $value['employee']['nip']);
            $templateProcessor->setValue('position#' . $index, $value['employee']['position']);

            $templateProcessor->setValue('rankRow#' . $index, '');
            $templateProcessor->setValue('rowCost#' . $index, $index);
            $templateProcessor->setValue('nipRow#' . $index, '');
            $templateProcessor->setValue('positionRow#' . $index, '');
            $templateProcessor->setValue('employeeRow#' . $index, '-' . $value['employee']['name']);
            $templateProcessor->setValue('tempTotal#' . $index, $this->formatCurrency($tempTotal, ));
            $templateProcessor->setValue('time#' . $index, $daysDifference);
            $templateProcessor->setValue('transport#' . $index, $this->formatCurrency($transportation, ));
            $templateProcessor->setValue('costName#' . $index, $value['employee']['name']);
        }

        $terbilangAmount = Terbilang::make($total, " Rupiah");

        $employeeFirst = "";
        foreach ($data['employees'] as $key => $value) {
            # code...
            if ($value['employee']['role'] == 'employee') {
                $employeeFirst = $value['employee']['name'];
            }
        }

        $templateProcessor->setValue('total', $this->formatCurrency($total, ));
        $templateProcessor->setValue('activityName', $data['activity_name']);
        $templateProcessor->setValue('departure', Carbon::parse($data['departure_date'])->format('d-m-Y'));
        $templateProcessor->setValue('departureDate', Carbon::parse($data['departure_date'])->format('d-m-Y'));
        $templateProcessor->setValue('headName', $head[0]['name']);
        $templateProcessor->setValue('category', str_replace('Perjalanan', '', $data['categories']['name']));
        $templateProcessor->setValue('year', date('Y'));
        $templateProcessor->setValue('headNip', $head[0]['nip']);
        $templateProcessor->setValue('headRank', $head[0]['rank']);
        $templateProcessor->setValue('now', Carbon::now()->format('d-m-Y'));
        $templateProcessor->setValue('to', $data['destination_to']['place']['name']);
        $templateProcessor->setValue('placeTo', $data['destination_to']['place']['name']);
        $templateProcessor->setValue('employeeFirst', $employeeFirst);
        $templateProcessor->setValue('employeeNipFirst', $data['employees'][0]['employee']['nip']);
        $templateProcessor->setValue('present_in', $data['present_in']);
        $templateProcessor->setValue('briefings', $data['briefings']);
        $templateProcessor->setValue('problem', $data['problem']);
        $templateProcessor->setValue('advice', $data['advice']);
        $templateProcessor->setValue('other', $data['other']);
        $templateProcessor->setValue('account_number', $data['bank_account']['account_number']);
        $templateProcessor->setValue('accept_from', $data['accept_from']);
        $templateProcessor->setValue('sub_activity_name', $data['sub_activity_name']);
        $templateProcessor->setValue('amount_money', $this->formatCurrency($total));
        $templateProcessor->setValue('terbilang', Str::upper($terbilangAmount));
        $templateProcessor->setValue('tresurer', $data['treasurer']['name']);
        $templateProcessor->setValue('tresurerNip', $data['treasurer']['nip']);
        $templateProcessor->setValue('sub_component', $data['sub_component']);

        $temporaryPath = tempnam(sys_get_temp_dir(), 'word_temp');
        $templateProcessor->saveAs($temporaryPath);
        // Download the Word file
        $fileName = "SPT" . '-' . Carbon::now()->format('d-m-Y') . '.docx';
        return response()->download($temporaryPath, $fileName)->deleteFileAfterSend(true);
    }



    public function export_sppd($id, $userId)
    {
        $data = $this->instructionService->findByIdAndEmployeeId($id, $userId);
        $head = $this->headHealthService->findAll();

        $data = $data->toArray();
        $data['user'] = [];
        $isMatchUser = false;

        foreach ($data['employees'] as $key => $value) {
            # code...
            if ($value['employee']['id'] == $userId) {
                $isMatchUser = true;
                $employee = $value['employee'];
                $data['user'] = $employee;
            }
        }
        // dd($data);
        $view = view('exports.sppd-export', ['data' => $data, 'head' => $head[0]])->render();

        $templateProcessor = new TemplateProcessor(storage_path("/app/templates/template_sppd.docx"));
        $templateProcessor->setValue('headName', $head[0]['name']);
        $templateProcessor->setValue('headNip', $head[0]['nip']);
        $templateProcessor->setValue('employeeName', $data['user']['name']);
        $templateProcessor->setValue('employeeNip', $data['user']['nip']);
        $templateProcessor->setValue('employeeRank', $data['user']['rank']);
        $templateProcessor->setValue('employeeGroup', $data['user']['group']);
        $templateProcessor->setValue('position', $data['user']['position']);
        $templateProcessor->setValue('activityName', $data['activity_name']);
        $templateProcessor->setValue('transportation', $data['transportation']['name']);
        $templateProcessor->setValue('placeFrom', $data['destination_from']['place']['name']);
        $templateProcessor->setValue('placeTo', $data['destination_to']['place']['name']);
        $templateProcessor->setValue('travel_time', $data['travel_time']);
        $templateProcessor->setValue('sub_component', $data['sub_component']);
        $templateProcessor->setValue('placeFrom', $data['destination_from']['place']['name']);


        $templateProcessor->setValue('departureDate', Carbon::parse($data['departure_date'])->format('d-m-Y'));
        $templateProcessor->setValue('returnDate', Carbon::parse($data['return_date'])->format('d-m-Y'));
        $templateProcessor->setValue('account', $data['account']['name']);
        $templateProcessor->setValue('description', $data['description']);
        $templateProcessor->setValue('other', $data['other']);

        $templateProcessor->setValue('now', Carbon::now()->format('d-m-Y'));

        $temporaryPath = tempnam(sys_get_temp_dir(), 'word_temp');
        $templateProcessor->saveAs($temporaryPath);

        // Download the Word file
        $fileName = "SPD-" . $data['user']['name'] . '-' . Carbon::now()->format('d-m-Y') . '.docx';
        return response()->download($temporaryPath, $fileName)->deleteFileAfterSend(true);
    }


    private function formatCurrency($amount)
    {
        // Format the amount without decimal separator and without thousands separator
        $formattedAmount = number_format($amount, 0, '.', '');

        // Add the currency symbol and thousands separator
        $formattedAmount = 'Rp ' . number_format($formattedAmount, 0, ',', '.');

        return $formattedAmount;
    }
}
