@extends('layouts.app')
<title>Ganti Password - SPPD Puskesmas Gondosari</title>
@section('content')
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ganti Password</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('update-password') }}" method="post"
                                class="form-valide-with-icon needs-validation" novalidate="">
                                @method('put')
                                @csrf
                                <div class="mb-3">
                                    <label class="text-label form-label" for="dlab-password">Password Lama</label>
                                    <div class="input-group transparent-append">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                        <input type="password" class="form-control" id="dlab-password"
                                            placeholder="Masukkan Password Lama" required="" name="old_password">
                                        <span class="input-group-text show-pass">
                                            <i class="fa fa-eye-slash"></i>
                                            <i class="fa fa-eye"></i>
                                        </span>
                                        <div class="invalid-feedback">
                                            Masukkan Password Lama
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="text-label form-label" for="dlab-password">Password Baru</label>
                                    <div class="input-group transparent-append">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                        <input type="password" class="form-control" id="dlab-password"
                                            placeholder="Masukkan Password Baru" required="" name="new_password">
                                        <span class="input-group-text show-pass">
                                            <i class="fa fa-eye-slash"></i>
                                            <i class="fa fa-eye"></i>
                                        </span>
                                        <div class="invalid-feedback">
                                            Masukkan Password Baru
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="text-label form-label" for="dlab-password">Ulangi Password Baru</label>
                                    <div class="input-group transparent-append">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                        <input type="password" class="form-control" id="dlab-password"
                                            placeholder="Ulangi Password" required="" name="confirm_password">
                                        <span class="input-group-text show-pass">
                                            <i class="fa fa-eye-slash"></i>
                                            <i class="fa fa-eye"></i>
                                        </span>
                                        <div class="invalid-feedback">
                                            Ulangi Password
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('dashboard', ['id' => 1]) }}" class="btn me-2 btn-dark">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
