<!DOCTYPE html>
<html>

<head>
    <title>koya</title>
</head>
<style>
    .surat-perintah,
    .laporan-perjalanan-dinas,
    {
    page-break-after: always
    }


    table td {
        vertical-align: top;
    }

    .head p {
        text-align: center;
        line-height: 1%;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
    }
</style>

<body style="margin: 20px;">
    <div class="surat-perintah">
        <table style="width: 100%;">
            <tbody>
                <tr>
                    <td>
                        <img src="{{ public_path('/images/pacitan.jpeg') }}" alt="">
                    </td>
                    <td class="head" style="width: 500px;">
                        <p style="font-size: 14px;"><strong>PEMERINTAH KABUPATEN PACITAN</strong></p>
                        <p style="font-size: 16px;"><strong>DINAS KESEHATAN</strong></p>
                        <p style="font-size: 16px;"><strong>PUSKESMAS Gondosari</strong></p>
                        <p style="font-size: 11px;">Jln. Pacitan – Lorok Km 16, Kode Pos 63561</p>
                        <p style="font-size: 11px;">e-mail :puskesmasGondosari@gmail.com </p>
                        <p style="font-size: 11px;">Telp. 085233190910</p>
                        <p style="font-size: 12px;"><strong>PACITAN</strong></p>

                    </td>
                    <td style="text-align: end;">
                        <img src="{{ public_path('/images/ketro.png') }}" alt="">
                    </td>
                </tr>
            </tbody>
        </table>
        <hr style="border: 2px solid black; margin-bottom: 2px;">
        <hr style="border: 1px solid black; padding: 0; margin-top: 0px;">
        <p style="text-align: center; margin-bottom: 0%; font-size: 14px;"><strong><u>SURAT PERINTAH TUGAS</u></strong>
        </p>
        <p style="text-align: center; padding-top: 0%; margin-top: 0%; font-size: 12px;">Nomor :
            090/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/408.36.6/2023</p>
        <p style="font-size: 11px; margin-bottom:0 %;">Dasar : </p>
        <table style="margin-left: 50px;">
            <tbody>
                @foreach ($laws as $item)
                    <tr>
                        <td style="font-size: 11px;">{{ $loop->iteration }}.</td>
                        <td style="font-size: 11px;">{{ $item['law_value'] }} ;</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p style="text-align: center; font-size: 11px;"><strong>MEMERINTAHKAN :</strong></p>
        <p style="font-size: 11px;">Kepada : </p>
        <table style="margin-left: 40px;">
            <tbody>
                @foreach ($data['employees'] as $item)
                    <tr>
                        <td style="margin-right: 30px; font-size: 11px;">{{ $loop->iteration }}.</td>
                        <td style="margin-left: 20px; font-size: 11px;">Nama</td>
                        <td style="font-size: 11px;">: {{ $item['employee']['name'] }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 11px;">Pangkat/gol</td>
                        <td style="font-size: 11px;">: {{ $item['employee']['rank'] }} "/"
                            {{ $item['employee']['group'] }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 11px;">NIP.</td>
                        <td style="font-size: 11px;">: {{ $item['employee']['nip'] }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 11px;">Jabatan</td>
                        <td style="font-size: 11px;">: {{ $item['employee']['position'] }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p style="font-size: 11px;">Untuk : </p>
        <table style="margin-left: 40px;">
            <tbody>
                <tr>
                    <td style="margin-right: 30px; font-size: 11px;">{{ $data['activity_name'] }}.</td>
                </tr>
            </tbody>
        </table>
        <div style="float: right;  text-align: center; padding: 0%; margin: 0px;">
            <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">
                Gondosari,{{ \Carbon\Carbon::now()->format('Y-m-d') }}</p>
            <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">Kepala Puskesmas Gondosari</p>
            <p>&nbsp;</p>
            <p> &nbsp;</p>
            <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;"><strong><u>{{ $head['name'] }}</u></strong>
            </p>
            <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">{{ $head['rank'] }}</p>
            <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">NIP. {{ $head['nip'] }} </p>
            <p> </p>
            <p></p>
        </div>
    </div>

    <div class="laporan-perjalanan-dinas">
        <p style="clear: right; text-align: center; font-size: 14px;"><strong>LAPORAN PERJALANAN DINAS</strong></p>
        <table>
            <tbody>
                <tr>
                    <td style="font-size: 11px;">
                        I.
                    </td>
                    <td style="font-size: 11px;">DASAR</td>
                    <td style="font-size: 11px;">:</td>
                    <td style="font-size: 11px;">090/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/408.36.6/2023</td>
                </tr>
                <tr>
                    <td style="font-size: 11px;">II.</td>
                    <td style="font-size: 11px;">MAKSUD TUJUAN</td>
                    <td style="font-size: 11px;">:</td>
                    <td style="font-size: 11px;">{{ $data['activity_name'] }}</td>
                </tr>
                <tr>
                    <td style="font-size: 11px;">III.</td>
                    <td style="font-size: 11px;">WAKTU PELAKSANAAN</td>
                    <td style="font-size: 11px;">:</td>
                    <td style="font-size: 11px;">{{ \Carbon\Carbon::parse($data['departure_date'])->format('Y-m-d') }}
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 11px;">IV.</td>
                    <td style="font-size: 11px;">NAMA PETUGAS</td>
                    <td style="font-size: 11px;">:</td>
                    <td style="font-size: 11px;">
                        <table>
                            <tbody>
                                @foreach ($data['employees'] as $item)
                                    <tr>
                                        <td style="font-size: 11px;"> - {{ $item['employee']['name'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="font-size: 11px;">V.</td>
                    <td style="font-size: 11px;">DAERAH TUJUAN/INSTANSI YANG DIKUNJUNGI</td>
                    <td style="font-size: 11px;">:</td>
                    <td style="font-size: 11px;">{{ $data['destination_to']['place']['name'] }}</td>
                </tr>
                <tr>
                    <td style="font-size: 11px;">
                        VI.
                    </td>
                    <td style="font-size: 11px;"> HADIR DALAM PERTEMUAN</td>
                    <td style="font-size: 11px;">:</td>
                    <td style="font-size: 11px;">- {{ $data['present_in'] }}</td>
                </tr>
                <tr>
                    <td style="font-size: 11px;">VII.</td>
                    <td style="font-size: 11px;">PETUNJUK/ARAHAN YANG DIBERIKAN</td>
                    <td style="font-size: 11px;">:</td>
                    <td style="font-size: 11px;">{{ $data['briefings'] }}</td>
                </tr>
                <tr>
                    <td style="font-size: 11px;">VIII.</td>
                    <td style="font-size: 11px;">MASALAH/TEMUAN</td>
                    <td style="font-size: 11px;">:</td>
                    <td style="font-size: 11px;">{{ $data['problem'] }}</td>
                </tr>
                <tr>
                    <td style="font-size: 11px;">IX.</td>
                    <td style="font-size: 11px;">SARAN TINDAKAN</td>
                    <td style="font-size: 11px;">:</td>
                    <td style="font-size: 11px;">{{ $data['advice'] }}</td>
                </tr>
                <tr>
                    <td style="font-size: 11px;">X.</td>
                    <td style="font-size: 11px;">LAIN-LAIN</td>
                    <td style="font-size: 11px;">:</td>
                    <td style="font-size: 11px;">{{ $data['other'] }}</td>
                </tr>

            </tbody>
        </table>
        <div style="float: right;  text-align: center; padding: 0%; margin: 0px;">
            <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">Gondosari,
                {{ \Carbon\Carbon::now()->format('Y-m-d') }}</p>
            <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">Yang melaksanakan Perjalanan Dinas</p>
            <p>&nbsp;</p>
            <p> &nbsp;</p>
            <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">
                <strong><u>
                        @if (sizeof($data['employees']) != 0)
                            {{ $data['employees'][0]['employee']['name'] }}
                        @else
                            Petugas
                        @endif
                    </u></strong>
            </p>

            <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">NIP. @if (sizeof($data['employees']) != 0)
                    {{ $data['employees'][0]['employee']['nip'] }}
                @else
                    -
                @endif
            </p>
            <p></p>
            <p></p>
        </div>
    </div>
    <page></page>
    <p style="clear: right; text-align: center; font-size: 14px;"><strong>RINCIAN BIAYA PERJALANAN DINAS</strong></p>
    <p style="text-align: center; font-size: 12px;"><strong>{{ $data['categories']['name'] }}</strong>
    </p>
    <p style="text-align: center; font-size: 12px;"><strong><u>KUITANSI</u></strong></p>
    <table style="border:1px solid black; float: right; border-collapse: collapse;">
        <tbody>
            <tr style=" border-bottom: 1px solid black;">
                <td style="    border: 1px solid black; text-align: center; 
             font-size: 11px;">Kode. Rek :
                    <br>{{ $data['bank_account']['account_number'] }}
                </td>

            </tr>
            <tr style="font-size: 11px; text-align: center;">
                <td>Tahun Anggaran {{ \Carbon\Carbon::now()->year }}</td>
            </tr>
        </tbody>
    </table>
    <table style="clear: right;">
        <tbody>
            <tr>
                <td style="font-size:11px;">Nomor</td>
                <td style="font-size:11px;">: </td>
            </tr>
            <tr>
                <td style="font-size:11px; width: 100px;">Sudah terima dari</td>
                <td style="font-size:11px;">: </td>
                <td style="font-size:11px;">{{ $data['treasurer']['name'] }}</td>
            </tr>
            <tr>
                <td style="font-size:11px;">Kegiatan</td>
                <td style="font-size:11px;">: </td>
                <td style="font-size:11px;">{{ $data['activity_name'] }}</td>
            </tr>
            <tr>
                <td style="font-size:11px;">Sub Kegiatan</td>
                <td style="font-size:11px;">: </td>
                <td style="font-size:11px;">{{ $data['sub_activity_name'] }}</td>
            </tr>
            <tr>
                <td style="font-size:11px;">Jumlah Uang</td>
                <td style="font-size:11px;">: </td>
                <td style="font-size:11px;">{{ $data['amount_money'] }}</td>
            </tr>
            <tr>
                <td style="font-size:11px;">Guna membayar</td>
                <td style="font-size:11px;">: </td>
                <td style="font-size:11px;">Perjalanan Dinas {{ $data['activity_name'] }} pada tanggal
                    {{ \Carbon\Carbon::now()->format('Y-m-d') }} a.n @if (sizeof($data['employees']) != 0)
                        {{ $data['employees'][0]['employee']['name'] }}
                    @else
                        Petugas
                    @endif , dkk.</td>
            </tr>

            <tr>
                <td style="font-size:11px;">Sub Komponen</td>
                <td style="font-size:11px;">: </td>
                <td style="font-size:11px;">{{ $data['sub_activity_name'] }}</td>
            </tr>
            <tr>
                <td style="font-size:11px;">Terbilang</td>
                <td style="font-size:11px;">: </td>
                <td style="font-size:11px;">Rp. @php
                    $money = 0;
                    $detailMoney = [];
                    $amountMoney = 0;
                    foreach ($data['employees'] as $key => $value) {
                        # code...
                        $moneyTransport = 0;
                        $travelTime = 0;
                        $moey = 0;
                        if ($data['categories']['name'] == 'Perjalanan Kurang Dari 8 Jam') {
                            $moneyTransport = 60000;
                            $travelTime = 1;
                            $money += $moneyTransport * $travelTime;
                        }
                        $temp = [
                            'travel_time' => $travelTime,
                            'transport' => $moneyTransport,
                            'amount' => $travelTime * $moneyTransport,
                            'name' => $value['employee']['name'],
                        ];
                        $amountMoney += $temp['amount'];
                        array_push($detailMoney, $temp);
                    }
                @endphp
                    Rp @if ($money != 0)
                        {{ number_format($money, 0, ',', '.') }}
                    @else
                        &nbsp;&nbsp;
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    <p style="font-size: 11px; text-align: center;"><strong>PERINCIAN PERHITUNGAN BIAYA PERJALANAN DINAS</strong></p>
    <table
        style="border: 1px solid black; border-collapse: collapse; width: 50%; font-size: 11px; text-align: center;
        align-items: center; width: 87%; /* Lebar tabel */
        margin: 0 auto;">
        <tbody>
            <tr style="border-bottom: 1px solid black;;">
                <td style="padding-top:10px; padding-bottom:10px;border: 1px solid black; ">No</td>
                <td style="padding-top:10px; padding-bottom:10px;border: 1px solid black; ">PERHITUNGAN BIAYA</td>
                <td style="padding-top:10px; padding-bottom:10px;border: 1px solid black; width: 50px;">JUMLAH</td>
                <td style="padding-top:10px; padding-bottom:10px;border: 1px solid black; ">NAMA DAN TANDA TANGAN
                    PENERIMA</td>
            </tr>
            @foreach ($detailMoney as $item)
                <tr style="border-bottom: 1px solid black; width: 100px;">

                    <td style="padding-top:10px; padding-bottom:10px;border: 1px solid black; ">{{ $loop->iteration }}
                    </td>
                    <td style="padding-top:10px; padding-bottom:10px;border: 1px solid black; ">Uang Transport
                        @if ($item['travel_time'] != 0)
                            {{ $item['travel_time'] }}
                        @else
                            &nbsp;&nbsp;
                        @endif
                        X Rp. @if ($item['transport'] != 0)
                            {{ number_format($item['transport'], 0, ',', '.') }}
                        @else
                            &nbsp;&nbsp;
                        @endif
                    </td>
                    <td style="padding-top:10px; padding-bottom:10px;border: 1px solid black;"> Rp.
                        @if ($item['amount'] != 0)
                            {{ number_format($item['amount'], 0, ',', '.') }}
                        @else
                            &nbsp;&nbsp;
                        @endif
                    </td>
                    <td style=" padding-top:10px; padding-bottom:10px;border: 1px solid black; "> {{ $item['name'] }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td style=" padding-top:10px; padding-bottom:10px;border: 1px solid black; "></td>
                <td style=" padding-top:10px; padding-bottom:10px;border: 1px solid black; ">JUMLAH SELURUHNYA</td>
                <td style=" padding-top:10px; padding-bottom:10px;border: 1px solid black; ">Rp.
                    @if ($amountMoney != 0)
                        {{ number_format($amountMoney, 0, ',', '.') }}
                    @else
                        &nbsp;&nbsp;
                    @endif
                </td>
                <td style=" padding-top:10px; padding-bottom:10px;border: 1px solid black; "></td>
            </tr>
        </tbody>
    </table>

    <table style="padding-top: 5%;   width: 87%; /* Lebar tabel */
            margin: 0 auto;">
        <tbody>
            <tr>
                <td>
                    <div style="float: right;   text-align: center; padding: 0%; margin: 0px;">
                        <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">Mengetahui/ Menyetujui</p>
                        <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">Kuasa
                            Pengguna Anggaran</p>
                        <p>&nbsp;</p>
                        <p> &nbsp;</p>
                        <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">
                            <strong><u>{{ $head['name'] }}</u></strong>
                        </p>

                        <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">NIP. {{ $head['nip'] }}
                        </p>
                        <p> </p>
                        <p></p>
                    </div>
                </td>
                <td>
                    <div style="float: right;  padding: 0%; margin: 0px;">
                        <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">Lunas dibayar pada tanggal -
                            {{ \Carbon\Carbon::now()->format('Y-m-d') }}
                        </p>
                        <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">Bendahara Pengeluaran Pembantu
                            Dinas</p>
                        <p>&nbsp;</p>
                        <p> &nbsp;</p>
                        <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">
                            <strong><u>{{ $data['treasurer']['name'] }}</u></strong>
                        </p>

                        <p style="margin-bottom: 0%; margin-top: 0%; font-size:11px;">NIP.
                            {{ $data['treasurer']['nip'] }}
                        </p>
                        <p> </p>
                        <p></p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

</body>

</html>
