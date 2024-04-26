<html lang="en">

<head>
    <meta charset="UTF-8">
    </meta>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </meta>

    <style>
        .lembar2 {
            page-break-before: always
        }

        table td {
            vertical-align: top;
        }

        .head p {
            text-align: center;
            line-height: 1%;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            color: salmon;
        }

        .head div {
            text-align: center;
            color: salmon;
        }
    </style>
</head>

<body style="margin: 20px;">
    <table style="width: 100%;;">
        <tbody>
            <tr>
                <td>
                    <img src="{{ public_path('/images/pacitan.jpeg') }}" alt=""></img>
                </td>
                <td class="head" style="width: 500px;">
                    <div style="font-size: 16px;text-align: center; color: salmon"><strong>PEMERINTAH KABUPATEN
                            PACITAN</strong></div>
                    <div style="font-size: 19px;text-align: center"><strong>DINAS KESEHATAN</strong></div>
                    <div style="font-size: 19px;text-align: center"><strong>PUSKESMAS Gondosari</strong></div>
                    <div style="font-size: 16px;text-align: center">Jln. Pacitan – Lorok Km 16, Kode Pos 63561</div>
                    <div style="font-size: 16px;text-align: center">e-mail: puskesmasGondosari@gmail.com</div>
                    <div style="font-size: 16px;text-align: center">Telp. 085233190910</div>
                    <div style="font-size: 15px;text-align: center"><strong>PACITAN</strong></div>
                </td>
                <td style="text-align: end;">
                    <img src="{{ public_path('/images/ketro.png') }}" alt=""></img>
                </td>
            </tr>
        </tbody>
    </table>

    <hr style="border: 2px solid black; margin-bottom: 2px;">
    </hr>
    <hr style="border: 1px solid black; padding: 0; margin-top: 0px;">
    </hr>
    <div style="text-align: start; float: right; margin-right: 6%;">
        <div style="font-size: 14px;">Lembar Ke : 1</div>
        <div style="font-size: 14px;">Kode No. : </div>
        <div style="font-size: 14px;">Nomor : 090/ /408.36.6/2023</div>
    </div>
    <div style="font-size: 18px; clear:right; text-align: center;"><strong><u>SURAT PERJALANAN DINAS (SPD)</u></strong>
    </div>
    <table
        style="border-collapse: collapse; width: 100%; border: 1px solid black;   width: 95%; /* Lebar tabel */
        margin: 0 auto;">
        <tbody>
            <tr style="border-bottom: 1px solid black;">
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">1.</td>
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">
                    <div style="margin-bottom: 20px;">
                        Kuasa Pengguna Anggaran
                    </div>

                    <div>
                        NIP
                    </div>
                </td>
                <td colspan="2" style="font-size: 14px; border: 1px solid black; padding: 8px;">
                    <div style="margin-bottom: 20px;">
                        {{ $head['name'] }}
                    </div>
                    <div style="padding-bottom: 3%;">
                        {{ $head['nip'] }}
                    </div>
                </td>

            </tr>
            <tr style="border-bottom: 1px solid black;">
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">2.</td>
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">
                    <div style="margin-bottom: 20px;">
                        Nama Pegawai yang diperintah
                    </div>

                    <div>
                        NIP
                    </div>
                </td>
                <td colspan="2" style="font-size: 14px; border: 1px solid black; padding: 8px;">
                    <div style="margin-bottom: 20px;">
                        {{ $data['user']['name'] }}
                    </div>
                    <div style="padding-bottom: 3%;">
                        {{ $data['user']['nip'] }}
                    </div>
                </td>

            </tr>
            <tr style="border-bottom: 1px solid black;">
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">3.</td>

                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">
                    <div style="margin-bottom: 20px;">
                        a. Pangkat dan Golongan
                    </div>
                    <div style="margin-bottom: 20px;">
                        b. Jabatan / Instansi
                    </div>
                    <div>
                        c. Tingkat Biaya Perjalanan Dinas
                    </div>
                </td>
                <td colspan="2" style="font-size: 14px; border: 1px solid black; padding: 8px;">
                    <div style="margin-bottom: 20px;">
                        a.
                        {{ $data['user']['rank'] }}
                        {{ $data['user']['group'] }}
                    </div>
                    <div style="margin-bottom: 20px;">
                        b.
                        {{ $data['user']['position'] }}
                    </div>
                    <div style="padding-bottom: 3%;">
                        c.
                    </div>
                </td>


            </tr>

            <tr style="border-bottom: 1px solid black;">
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">4.</td>
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">Maksud Perjalanan Dinas</td>
                <td colspan="2" style="font-size: 14px; border: 1px solid black; padding: 8px;">
                    {{ $data['activity_name'] }}</td>

            </tr>
            <tr style="border-bottom: 1px solid black;">
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">5.</td>
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">Alat angkutan yang digunakan </td>
                <td colspan="2" style="font-size: 14px; border: 1px solid black; padding: 8px;">
                    {{ $data['transportation']['name'] }}</td>

            </tr>
            <tr style="border-bottom: 1px solid black;">
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">6.</td>
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">
                    <div style="margin-bottom: 20px;">
                        a. Tempat berangkat
                    </div>

                    <div>
                        b. Tempat Tujuan
                    </div>
                </td>
                <td colspan="2" style="font-size: 14px; border: 1px solid black; padding: 8px;">
                    <div style="margin-bottom: 20px;">
                        a.
                        {{ $data['destination_from']['place']['name'] }}
                    </div>

                    <div style="padding-bottom: 3%;">
                        b.
                        {{ $data['destination_to']['place']['name'] }}
                    </div>
                </td>



            </tr>

            <tr style="border-bottom: 1px solid black;">
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">7.</td>
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">
                    <div style="margin-bottom: 20px;">
                        a. Lamanya Perjalanan Dinas
                    </div>
                    <div style="margin-bottom: 20px;">
                        b. Tanggal Berangkat
                    </div>
                    <div>
                        c. Tanggal Harus Kembali
                    </div>
                </td>
                <td colspan="2" style="font-size: 14px; border: 1px solid black; padding: 8px;">
                    <div style="margin-bottom: 20px;">
                        a.
                        {{ $data['travel_time'] }} hari
                    </div>
                    <div style="margin-bottom: 20px;">
                        b.
                        {{ Carbon\Carbon::parse($data['departure_date'])->format('Y-m-d') }}
                    </div>
                    <div style="padding-bottom: 3%;">
                        c.
                        {{ Carbon\Carbon::parse($data['return_date'])->format('Y-m-d') }}.
                    </div>
                </td>


            </tr>

            <tr style="border-bottom: 1px solid black;">
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">8.</td>
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">Pengikut : Nama</td>
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">Tanggal lahir</td>
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">Keterangan</td>
            </tr>
            <tr style="border-bottom: 1px solid black;">
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;"></td>
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;  padding-inline-start: 10px;">1.
                </td>
                <td colspan="2" style="font-size: 14px; border: 1px solid black; padding: 8px;"></td>

            </tr>
            <tr style="border-bottom: 1px solid black;">
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">9.</td>
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">
                    <div style="margin-bottom: 10px;">
                        Pembebanan Anggaran
                    </div>
                    <div style="margin-bottom: 20px;">
                        a. Instansi
                    </div>
                    <div>
                        b. Akun
                    </div>
                </td>
                <td colspan="2" style="font-size: 14px; border: 1px solid black; padding: 8px;">
                    <div style="margin-bottom: 20px;">

                    </div>
                    <div style="margin-bottom: 20px;">
                        a. Dinas Kesehatan
                    </div>
                    <div style="padding-bottom: 3%;">
                        b.
                        {{ $data['account']['name'] }}
                    </div>
                </td>


            </tr>

            <tr style="border-bottom: 1px solid black;">
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">10</td>
                <td style="font-size: 14px; border: 1px solid black; padding: 8px;">Keterangan lain-lain</td>
                <td colspan="2" style="font-size: 14px; border: 1px solid black; padding: 8px;">-</td>

            </tr>
        </tbody>
    </table>
    <div style="float: right;   text-align: center; padding: 0%;  margin-top: 20px; margin-right: 6%; ">
        <div style="margin-bottom: 0%; margin-top: 0%; font-size:14px;">Mengetahui/ Menyetujui</div>
        <div style="margin-bottom: 0%; margin-top: 0%; font-size:14px;">Kuasa
            Pengguna Anggaran</div>
        <div style="margin-bottom: 0%; margin-top: 0%; font-size:14px; margin-top: 30px">
            <strong><u>{{ $head['name'] }}</u></strong>
        </div>

        <div style="margin-bottom: 0%; margin-top: 0%; font-size:14px;">NIP. {{ $head['nip'] }}
        </div>

    </div>

    <div class="lembar2">
        <div style=" clear: right; text-align: start; float: right; margin-right: 6%;">
            <div style=" font-size:14px;"><strong>SPD Nomor : 090/ /408.36.6/2023</strong></div>
            <div style="font-size: 14px;"><strong>Lembar ke : 2</strong></div>
        </div>

        <table
            style="clear: right;  border-collapse: collapse; width: 100%; border: 1px solid black; width: 95%; /*
            Lebar tabel */ margin: 0 auto;">
            <tbody>
                <tr style="border-bottom: 1px solid black;">
                    <td style="font-size: 14px; border: 1px solid black; padding: 8px; width: 50%;">

                    </td>
                    <td style="font-size: 14px; border: 1px solid black; padding: 8px; width: 50%;">

                        I. Berangkat dari :
                        (Tempat Kedudukan)
                        <div style="padding-inline-start: 10px; padding-bottom: 20px;">
                            Ke :
                            Pada Tanggal :

                        </div>
                        <div style=" text-align: center; padding-inline-start:10px; ; margin: 0px; ;">
                            <div style="margin-bottom: 0%; margin-top: 0%; font-size:14px;">Kepala Puskesmas
                                Gondosari
                            </div>
                            <div>&nbsp;</div>
                            <div> &nbsp;</div>
                            <div style="margin-bottom: 0%; margin-top: 0%; font-size:14px;">
                                <strong><u>{{ $head['name'] }}</u></strong>
                            </div>

                            <div style="margin-bottom: 0%; margin-top: 0%; font-size:14px;">NIP. {{ $head['nip'] }}
                            </div>
                        </div>


                    </td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="font-size: 14px; border: 1px solid black; padding: 8px;">
                        II. Tiba di :
                        <div style="padding-inline-start: 10px;">
                            Pada tanggal :

                        </div>
                    </td>


                    <td style="font-size: 14px; border: 1px solid black; padding: 8px;">

                        <div style="padding-inline-start: 10px;">
                            Berangkat dari :
                        </div>
                        <div style="padding-inline-start: 10px;">
                            Ke &nbsp; &nbsp;:
                        </div>
                        <div style="padding-inline-start: 10px; padding-bottom: 10%;">
                            Pada Tanggal :
                        </div>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="font-size: 14px; border: 1px solid black; padding: 8px;">
                        III. Tiba di :
                        <div style="padding-inline-start: 10px;">
                            Pada tanggal :

                        </div>
                    </td>


                    <td style="font-size: 14px; border: 1px solid black; padding: 8px;">

                        <div style="padding-inline-start: 10px;">
                            Berangkat dari :
                        </div>
                        <div style="padding-inline-start: 10px;">
                            Ke &nbsp; &nbsp;:
                        </div>
                        <div style="padding-inline-start: 10px; padding-bottom: 10%;">
                            Pada Tanggal :
                        </div>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="font-size: 14px; border: 1px solid black; padding: 8px;">
                        IV. Tiba di :
                        <div style="padding-inline-start: 10px;">
                            Pada tanggal :

                        </div>
                    </td>


                    <td style="font-size: 14px; border: 1px solid black; padding: 8px;">

                        <div style="padding-inline-start: 10px;">
                            Berangkat dari :
                        </div>
                        <div style="padding-inline-start: 10px;">
                            Ke &nbsp; &nbsp;:
                        </div>
                        <div style="padding-inline-start: 10px; padding-bottom: 10%;">
                            Pada Tanggal :
                        </div>
                    </td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td style="font-size: 14px; border: 1px solid black; padding: 8px;">
                        V. Tiba di : {{ $data['destination_from']['place']['name'] }}
                        <div style="padding-inline-start: 10px; padding-bottom: 20px;">
                            Pada tanggal : {{ Carbon\Carbon::parse($data['departure_date'])->format('Y-m-d') }}
                        </div>
                        <div style=" text-align: center; padding-inline-start:10px; ; margin: 0px; ;">
                            <div style="margin-bottom: 0%; margin-top: 0%; font-size:14px;">Kepala Puskesmas
                                Gondosari
                            </div>
                            <div>&nbsp;</div>
                            <div> &nbsp;</div>
                            <div style="margin-bottom: 0%; margin-top: 0%; font-size:14px;">
                                <strong><u>{{ $head['name'] }}</u></strong>
                            </div>

                            <div style="margin-bottom: 0%; margin-top: 0%; font-size:14px;">NIP. {{ $head['nip'] }}
                            </div>
                        </div>
                    </td>


                    <td style="font-size: 14px; border: 1px solid black; padding: 8px;">

                        <div style=" padding-bottom: 20px;">
                            Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas perintahnya dan semata-mata
                            untuk
                            kepentingan jabatan dalam waktu yang sesingkat-singkatnya
                        </div>
                        <div style=" text-align: center; padding-inline-start:10px; ; margin: 0px; ;">
                            <div style="margin-bottom: 0%; margin-top: 0%; font-size:14px;">KUASA PENGGUNA ANGGARAN
                            </div>
                            <div>&nbsp;</div>
                            <div> &nbsp;</div>
                            <div style="margin-bottom: 0%; margin-top: 0%; font-size:14px;">
                                <strong><u>{{ $head['name'] }}</u></strong>
                            </div>

                            <div style="margin-bottom: 0%; margin-top: 0%; font-size:14px;">NIP. {{ $head['nip'] }}
                            </div>
                        </div>

                    </td>
                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td colspan="2" style="font-size: 14px; border: 1px solid black; padding: 8px;">
                        VI. Catatan lain-lain
                        <div style="padding-inline-start: 10px;">


                        </div>
                    </td>


                </tr>
                <tr style="border-bottom: 1px solid black;">
                    <td colspan="2" style="font-size: 14px; border: 1px solid black; padding: 8px;">
                        VII. PERHATIAN :
                        <div style="padding-inline-start: 10px; font-size: 14px;">
                            Pejabat yang berwenang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para
                            pejabat
                            yang
                            mengesahkan tanggal berangkat / tiba, serta bendahara pengeluaran bertanggungjawab
                            berdasarkan
                            peraturan-peraturan Keuangan Daerah apabila Daerah menderita rugi akibat kesalahan,
                            kelalaian
                            dan
                            kealpaannya.
                        </div>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
</body>

</html>
