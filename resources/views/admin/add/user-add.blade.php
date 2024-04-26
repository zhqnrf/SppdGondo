@extends('layouts.app')
<title>Tambah Pengguna - SPPD Puskesmas Gondosari</title>
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
            /* Tambah sesuai kebutuhan */
            transition: box-shadow 0.3s ease;
            /* Efek transisi */
        }

        .custom-card:hover {
            box-shadow: 0 8px 16px var(--primary);
            ;
            /* Tambah sesuai kebutuhan saat hover */
        }
    </style>
    <div class="container-fluid">
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h2 class="card-title " style="font-weight: bold; font-size: 25px">Tambah Pengguna</h2>
                    </div>
                    <hr class="m-0" style="opacity: 30%;
        height: 0.7px; ">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('user-post') }}" method="post"
                                class="form-valide-with-icon needs-validation" novalidate="">
                                @method('post')
                                @csrf

                                <div class="mb-3">
                                    <label class="text-label form-label ps-2" style="font-size: 19px; font-weight: 500">Nama
                                        Pengguna</label>
                                    <input type="text" class="form-control input-default custom-border"
                                        placeholder="Masukkan Nama Pengguna" name="name">
                                </div>

                                <div class="mb-3">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Email</label>
                                    <input type="email" class="form-control input-default custom-border"
                                        placeholder="Masukkan Email" name="email">
                                </div>

                                <div class="mb-3">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Password</label>
                                    <div class="input-group transparent-append">
                                        <input type="password" class="form-control custom-border" id="dlab-password"
                                            placeholder="Masukkan Password " required="" name="password">
                                        <span class="input-group-text show-pass"
                                            style=" border-top-right-radius: 10px; border-bottom-right-radius: 10px; ">
                                            <i class="fa fa-eye-slash"></i>
                                            <i class="fa fa-eye"></i>
                                        </span>
                                        <div class="invalid-feedback">
                                            Masukkan Password
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="inlineFormCustomSelect" class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Hak Akses</label>
                                    <select class="me-sm-2 mb-3 default-select form-control wide custom-border"
                                        id="inlineFormCustomSelect" name="role">
                                        {{-- <option selected="">Choose...</option> --}}
                                        <option value="super-admin">Super Admin</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn me-2 btn-dark">Kembali</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
