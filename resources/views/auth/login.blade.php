<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Login SPPD - Puskemas Gondosari</title>
    <link rel="icon" href="{{ asset('/') }}images/sppd-logo.png" type="image/png" style="size: 200%" />

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="css/style.css" rel="stylesheet">
    <script src="{{ asset('/') }}vendor/toastr/js/toastr.min.js"></script>
    <link rel="stylesheet" href="{{ asset('/') }}vendor/toastr/css/toastr.min.css">
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <img src="images/sppd-logo.png" alt=""
                                            style="width: 100px; height: 100px">
                                    </div>
                                    <div class="text-center mb-3">
                                        <h4 style="font-weight: bold ">PUSKESMAS GONDOSARI</h4>
                                    </div>
                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="inputEmailAddress" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="inputEmailAddress"
                                                placeholder="Email Anda" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputChoosePassword" class="form-label">Password</label>
                                            <div class="input-group" id="">
                                                <input type="password" class="form-control border-end-0" name="password"
                                                    id="inputChoosePassword" placeholder="Password Anda">
                                                <a href="javascript:;" class="input-group-text bg-primary"
                                                    id="show-hide-password">
                                                    <i class="fa fa-eye" style="color: white"></i>
                                                </a>
                                            </div>
                                        </div>


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('inputChoosePassword');
        const showHidePasswordButton = document.getElementById('show-hide-password');
        let isPasswordVisible = false;

        showHidePasswordButton.addEventListener('click', () => {
            if (isPasswordVisible) {
                passwordInput.type = 'password';
                showHidePasswordButton.innerHTML = '<i class="fa fa-eye" style="color: white"></i>';
            } else {
                passwordInput.type = 'text';
                showHidePasswordButton.innerHTML = '<i class="fa fa-eye-slash" style="color: white"></i>';
            }
            isPasswordVisible = !isPasswordVisible;
        });
    </script>
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/styleSwitcher.js"></script>
    @if ($errors->any())
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            (function($) {
                "use strict";
                $(document).ready(function() {
                    toastr.error("{{ $errors->first() }}", "Error", {
                        positionClass: "toast-top-right",
                        timeOut: 5e3,
                        closeButton: true,
                        debug: false,
                        newestOnTop: true,
                        progressBar: true,
                        preventDuplicates: true,
                        onclick: null,
                        showDuration: "300",
                        hideDuration: "1000",
                        extendedTimeOut: "1000",
                        showEasing: "swing",
                        hideEasing: "linear",
                        showMethod: "fadeIn",
                        hideMethod: "fadeOut",
                        tapToDismiss: false
                    });
                });
            })(jQuery);
        </script>
    @endif
</body>

</html>
