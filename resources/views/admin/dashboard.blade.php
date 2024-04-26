@extends('layouts.app')
<title>Dashboard - SPPD Puskesmas Gondosari</title>
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card tryal-gradient">
                                    <div class="card-body tryal row">
                                        <div class="col-xl-7 col-sm-6">
                                            <h1 style="color:white; font-weight: bold">Selamat Datang</h1>
                                            <h3 style="color: primary">Di SPPD Puskesmas Gondosari</h3>
                                            <span></span>
                                            <a href="javascript:void(0);"
                                                class="btn btn-rounded-3  fs-18 font-w500">{{ Auth::guard('users')->user()->name }}</a>
                                        </div>

                                        <div class="col-xl-5 col-sm-6">
                                            <img src="{{ asset('') }}images/joyo.png" alt="" class="sd-shape">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="widget-stat card bg-success"
                                            style="background: linear-gradient(45deg, #60CE63, #8c6cc4);">
                                            <div class="card-body  p-4">
                                                <div class="media">
                                                    <span class="me-3">
                                                        <i class="fas fa-user-tie"></i>
                                                    </span>
                                                    <div class="media-body text-white text-end">
                                                        <p class="mb-1">JUMLAH PEGAWAI</p>
                                                        <h3 class="text-white">{{ $totalEmployee }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-6">
                                        <div class="widget-stat card bg-success"
                                            style="background: linear-gradient(50deg, #40A6FF, #ff5252);">
                                            <div class="card-body  p-4">
                                                <div class="media">
                                                    <span class="me-3">
                                                        <i class="flaticon-381-user-7"></i>
                                                    </span>
                                                    <div class="media-body text-white text-end">
                                                        <p class="mb-1">JUMLAH KADER</p>
                                                        <h3 class="text-white">{{ $totalCadress }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-sm-12 ">
                                        <div class="widget-stat card bg-success"
                                            style="background: linear-gradient(45deg, #FF8340, #FFEB36F3);">
                                            <div class="card-body  p-4">
                                                <div class="media">
                                                    <span class="me-3">
                                                        <i class="flaticon-381-calendar-1"></i>
                                                    </span>
                                                    <div class="media-body text-white text-end">
                                                        <p class="mb-1">Jumlah SPT</p>
                                                        <h3 class="text-white">{{ $spt }}</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
