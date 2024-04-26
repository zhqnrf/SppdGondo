<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tidak Ditemukan - SPPD Puskesmas Gondosari</title>
    <style>
        @media only screen and (max-width: 600px) {
            .hidden-on-mobile {
                display: none;
            }
        }
    </style>
</head>
@include('layouts.auth')

<body style="   background: linear-gradient(to left, var(--primary), var(--secondary)); ">
    <div class="error-404 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="card  rounded-5  pt-5" style="margin: 5%">
                <div class="row g-0">
                    <div class="col col-sm-6">
                        <div class="card-body ">
                            <h1 class="display-1"><span class="text-primary" style="font-weight: bold">4</span><span
                                    class="text-danger" style="font-weight: bold">0</span><span class="text-success"
                                    style="font-weight: bold">4</span></h1>
                            <h2 class="fw-bold">Mboten Wonten</h2>

                            <p class="hidden-on-mobile" style="text-align: justify; font-size: 16px">
                                Pangapunten, Halaman ingkang
                                badhe di padosi
                                mboten wonten,
                                Panjenengan saget balik ten Halaman sedereng niki
                            </p>


                            <div class="mt-5">
                                <a href="{{ route('dashboard') }}" class="btn btn-lg px-md-5 rounded-5"
                                    style="background: var(--primary); color: white;">Balik
                                </a>
                            </div>


                        </div>
                    </div>
                    <div class="col col-6">
                        <img src="{{ asset('') }}images/error.png" alt="" class="sd-shape p-4">
                        {{-- <i class="fa fa-exclamation-triangle text-warning sd-shape "></i> --}}
                    </div>
                </div>

            </div>
            <!--end row-->
        </div>
    </div>
    </div>
</body>

</html>
