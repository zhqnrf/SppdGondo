@extends('layouts.app')
<title>Tambah Kepala Puskesmas - SPPD Puskesmas Gondosari</title>
@section('content')
    <style>
        .custom-border {
            border: 1px solid rgba(128, 128, 128, 0.5);
            transition: border-color 0.3s;
            /* Add a transition for a smooth effect */
        }

        .custom-border:hover {
            border-color: var(--primary);
        }

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
    </style>
    <div class="container-fluid">
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h2 class="card-title " style="font-weight: bold; font-size: 25px">Tambah Kepala Puskesmas</h2>
                    </div>
                    <hr class="m-0" style="opacity: 30%;
        height: 0.7px; ">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('head-health-post') }}" class="form-valide-with-icon needs-validation"
                                novalidate="" method="post">

                                @method('post')
                                @csrf
                                <div class="mb-3">
                                    <label class="text-label form-label ps-2" style="font-size: 19px; font-weight: 500">Nama
                                        Kepala Puskesmas</label>
                                    <input type="text" class="form-control input-default custom-border"
                                        placeholder="Masukkan Nama Kepala Puskesmas" name="name">
                                </div>
                                <div class="mb-3">
                                    <label class="text-label form-label ps-2" style="font-size: 19px; font-weight: 500">NIP
                                    </label>
                                    <input type="text" class="form-control input-default custom-border"
                                        placeholder="Masukkan NIP " name="nip" value="-">
                                </div>
                                <div class="row mb-3">
                                    <div class="col mt-2 mt-sm-0">
                                        <label class="text-label form-label ps-2"
                                            style="font-size: 19px; font-weight: 500">Pangkat
                                        </label>
                                        <input type="text" class="form-control input-default custom-border"
                                            placeholder="Masukkan Pangkat " name="rank" value="-">
                                    </div>
                                    <div class="col mt-2 mt-sm-0 ">
                                        <label class="text-label form-label ps-2"
                                            style="font-size: 19px; font-weight: 500">Golongan
                                        </label>
                                        <input type="text" class="form-control input-default custom-border"
                                            placeholder="Masukkan Golongan " name="group" value="-">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="text-label form-label ps-2" style="font-size: 19px; font-weight: 500">Uang
                                        Harian</label>
                                    <input type="number" class="form-control input-default custom-border"
                                        placeholder="Masukkan Uang Harian" name="daily_money" value="0">
                                </div>
                                <div class="mb-3">
                                    <label class="text-label form-label ps-2" style="font-size: 19px; font-weight: 500">Uang
                                        Makan
                                    </label>
                                    <input type="number" class="form-control input-default custom-border"
                                        placeholder="Masukkan Uang Makan " name="food_money" value="0">
                                </div>
                                <div class="mb-5">
                                    <label class="text-label form-label ps-2" style="font-size: 19px; font-weight: 500">Uang
                                        Transport
                                    </label>
                                    <input type="number" class="form-control input-default custom-border"
                                        placeholder="Masukkan Uang Transport " name="transport_money" value="0">
                                </div>
                                <input type="text" name="role" value="employee" hidden>
                                <a href="{{ route('employee') }}" class="btn me-2 btn-dark">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
