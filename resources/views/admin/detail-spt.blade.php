@extends('layouts.app')
<title>Detail SPT - SPPD Puskesmas Gondosari</title>
@section('content')
    <style>
        .custom-card {
            box-shadow: 0 4px 8px var(--primary);
            ;
            /* Edit sesuai kebutuhan */
            transition: box-shadow 0.3s ease;
            /* Efek transisi */
        }

        .custom-card:hover {
            box-shadow: 0 8px 16px var(--primary);
            ;
            /* Edit sesuai kebutuhan saat hover */
        }

        .table tbody tr td {
            vertical-align: middle;
            border-color: #f5f5f5;
        }

        th {
            width: 200px;
            font-size: 18px;
            /* Atur lebar elemen th */
            /* Atur properti CSS lainnya sesuai kebutuhan */
        }
    </style>
    <div class="container-fluid ">
        <div class="row">
            <div class=" col-sm-12">
                <div class="card custom-card">
                    <div class="card-header text-align-between">
                        <h2 class="card-title " style="font-weight: bold; font-size: 25px">Data SPT</h2>
                        <div>

                            <a class="btn me-2 btn-dark mb-3" href="{{ route('spt') }}">Kembali</a>


                            <a href="{{ route('spt-export', ['id' => $data['id']]) }}"
                                class="btn me-2 btn-success mb-3">Cetak
                                SPT,
                                Laporan &
                                Kuitansi</a>


                        </div>
                    </div>
                    <hr class="m-0" style="opacity: 30%;
        height: 0.7px; ">
                    <div class=" card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm">
                                {{-- <thead>
                                    <tr>
                                        <th>Koa</th>
                                        <th>Name</th>
                                    </tr>
                                </thead> --}}
                                <tbody>
                                    <tr>
                                        <th>Kegiatan</th>
                                        <td> {{ $data['activity_name'] }}
                                        </td>
                                    </tr>
                                    {{-- @dd($data) --}}
                                    <tr>
                                        <th>Sub Kegiatan</th>
                                        <td> {{ $data['sub_activity_name'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Kategori Perjalanan</th>
                                        <td> {{ $data['categories']['name'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Pegawai Ditugaskan</th>
                                        <td>
                                            @foreach ($data['employees'] as $item)
                                                {{ $item['employee']['name'] }} <a
                                                    href="{{ route('sppd-export', ['id' => $instructionsId, 'userId' => $item['employee']['id']]) }}"><span
                                                        class="badge badge-primary m-2">CETAK SPPD</span></a> <br>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alat Angkut</th>
                                        <td> {{ $data['transportation']['name'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Berangkat</th>
                                        <td> {{ $data['destination_from']['place']['name'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Tujuan</th>
                                        <td> {{ $data['destination_to']['place']['name'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Lama Perjalanan</th>
                                        <td> {{ $data['travel_time'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Berangkat</th>
                                        <td> {{ \Carbon\Carbon::parse($data['departure_date'])->format('Y-m-d') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Pulang</th>
                                        <td> {{ \Carbon\Carbon::parse($data['return_date'])->format('Y-m-d') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Akun Anggaran</th>
                                        <td> {{ $data['account']['name'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sudah Diterima Dari</th>
                                        <td> {{ $data['accept_from'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sub Komponen</th>
                                        <td> {{ $data['sub_component'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Jumlah Uang</th>
                                        <td> {{ $data['amount_money'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Rekening</th>
                                        <td> {{ $data['bank_account']['account_number'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Hadir Dalam</th>
                                        <td> {{ $data['present_in'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Arahan/Petunjuk</th>
                                        <td> {{ $data['briefings'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Temuan Masalah</th>
                                        <td> {{ $data['problem'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Saran</th>
                                        <td> {{ $data['advice'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Lain Lain</th>
                                        <td> {{ $data['other'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td> {{ $data['description'] }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
