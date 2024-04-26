@extends('layouts.app')
<title>Edit SPT - SPPD Puskesmas Gondosari</title>
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/zh-TW.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>



    <style>
        .select2-selection {
            height: 34px !important;
            font-size: 15px;
            font-family: 'Open Sans', sans-serif;

            border-radius: 15px !important;
            border: solid 1px rgba(128, 128, 128, 0.5) !important;
            padding-left: 4px;
        }

        .select2-selection--multiple {
            height: 60px !important;
            /* width: 366px !important; */
        }

        .select2-selection {
            height: 60px !important;
            /* width: 366px !important; */
        }

        .select2-selection__choice {
            height: 40px;
            line-height: 40px;
            padding-right: 16px !important;
            padding-left: 16px !important;
            background-color: var(--primary) !important;
            color: #eee !important;
            border: none !important;
            border-radius: 3px !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: white;
        }

        .select2-selection__choice__remove {
            float: right;
            text-decoration-color: white;
            border-color: white;
            margin-right: 0;
            margin-left: 2px;
        }

        .select2-search--inline .select2-search__field {
            line-height: 40px;
            color: white;
            width: 100% !important;
        }

        .select2-container:hover,
        .select2-container:focus,
        .select2-container:active,
        .select2-selection:hover,
        .select2-selection:focus,
        .select2-selection:active {
            outline-color: transparent;
            border-color: var(--primary);
            outline-style: none;
            /* color: var(--primary); */
        }

        .select2-results__options li {
            display: block;

        }

        .select2-selection__rendered {
            transform: translateY(2px);
        }

        .select2-selection__arrow {
            display: none;
        }

        .select2-results__option--highlighted {
            background-color: var(--primary) !important;
            color: black !important;
        }

        .select2-dropdown {
            border-radius: 0 !important;
            box-shadow: 0px 3px 6px 0 rgba(0, 0, 0, 0.15) !important;
            border: none !important;
            margin-top: 4px !important;
            /* width: 366px !important; */
        }

        .select2-results__option {
            font-family: 'Open Sans', sans-serif;
            font-size: 13px;
            line-height: 24px !important;
            vertical-align: middle !important;
            padding-left: 8px !important;
        }

        .select2-results__option[aria-selected="true"] {
            background-color: #eee !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #6e6e6e;
            padding-top: 14px;
            line-height: 28px;
        }

        .select2-search__field {
            font-family: 'Open Sans', sans-serif;
            color: black;
            font-size: 13px;
            padding-left: 8px !important;
            border-color: var(--primary) !important;
        }

        .select2-selection__placeholder {
            color: #var(--primary) !important;
        }

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
    <div class="container-fluid ">
        <!-- row -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <h2 class="card-title " style="font-weight: bold; font-size: 25px">Tambah SPT</h2>
                    </div>
                    <hr class="m-0" style="opacity: 30%;
        height: 0.7px; ">
                    <div class="card-body">
                        <div class="basic-form">
                            <form method="post" action="{{ route('spt-put', ['id' => $data['id']]) }}" method="post"
                                class="form-valide-with-icon needs-validation" novalidate="">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label class="text-label form-label ps-2" style="font-size: 19px; font-weight: 500">Nama
                                        Kegiatan
                                    </label>
                                    <input type="text" class="form-control input-default custom-border"
                                        placeholder="Masukkan Nama Kegiatan" name="activity_name"
                                        value="{{ $data['activity_name'] }}">
                                </div>

                                <div class="mb-3">
                                    <label class="text-label form-label ps-2" style="font-size: 19px; font-weight: 500">Nama
                                        Sub
                                        Kegiatan
                                    </label>
                                    <input type="text" class="form-control input-default custom-border"
                                        placeholder="Masukkan Nama Sub Kegiatan" name="sub_activity_name"
                                        value="{{ $data['sub_activity_name'] }}">
                                </div>
                                {{-- @dd($data) --}}

                                <div class="form-unit form-divided mb-3">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Kategori
                                        Perjalanan</label>
                                    <select class="js-example-category custom-border" name="category_id"
                                        id="categorySelect">
                                        @foreach ($categories as $item)
                                            <option value="{{ $item['id'] }}"
                                                {{ $item['id'] == $data['category_id'] ? 'selected' : '' }}>
                                                {{ $item['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- @dd($data) --}}
                                <div class="row mb-3">
                                    <div class="col mt-2 mt-sm-0" id="tanggalmulai">
                                        <label class="text-label form-label ps-2"
                                            style="font-size: 19px; font-weight: 500">Tanggal Berangkat
                                        </label>
                                        <div class="input-group " data-placement="left" data-align="top"
                                            data-autobtn-close="true">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            <input type="date" class="form-control input-default custom-border"
                                                name="departure_date"
                                                value="{{ date('Y-m-d', strtotime($data['departure_date'])) }}">
                                        </div>

                                    </div>
                                    <div class="col mt-2 mt-sm-0 " id="tanggalakhir">
                                        <label class="text-label form-label ps-2"
                                            style="font-size: 19px; font-weight: 500">Tanggal Pulang
                                        </label>
                                        <div class="input-group " data-placement="left" data-align="top"
                                            data-autobtn-close="true">
                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            <input type="date" class="form-control input-default custom-border"
                                                name="return_date"
                                                value="{{ date('Y-m-d', strtotime($data['return_date'])) }}">
                                        </div>
                                    </div>
                                </div>

                                {{-- @dd($data) --}}

                                <div class="form-unit form-divided mb-3">
                                    <label class="text-label form-label ps-2" style="font-size: 19px; font-weight: 500">
                                        Pegawai Ditugaskan</label>
                                    <select class="js-example-basic-multiple" name="users[]" multiple="multiple"
                                        id="employeeSelect">
                                        @foreach ($employees as $key => $item)
                                            @php
                                                $selected = false;
                                                foreach ($data['employees'] as $valueEmployee) {
                                                    # code...
                                                    if ($valueEmployee['employee']['id'] == $item['id']) {
                                                        $selected = true;
                                                    }
                                                }
                                            @endphp
                                            <option value="{{ $item['id'] }}"
                                                @if ($selected) selected @endif>
                                                {{ $item['name'] }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-unit form-divided mb-3">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Transportasi</label>
                                    <select class="js-example-transportation custom-border" name="transportation_id">

                                        @foreach ($transportations as $item)
                                            <option value="{{ $item['id'] }}"
                                                {{ $data['transportation_id'] == $item['id'] ? 'selected' : '' }}>
                                                {{ $item['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-unit form-divided mb-3">
                                    <label class="text-label form-label ps-2" style="font-size: 19px; font-weight: 500">
                                        Tempat Berangkat</label>
                                    <select class="js-example-place custom-border" name="place_from">
                                        @foreach ($places as $item)
                                            <option value="{{ $item['id'] }}"
                                                {{ $data['destination_from']['place']['id'] == $item['id'] ? 'selected' : '' }}>
                                                {{ $item['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-unit form-divided mb-3">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Tempat Tujuan</label>
                                    <select class="js-example-destination custom-border" name="place_to">
                                        @foreach ($places as $item)
                                            <option value="{{ $item['id'] }}"
                                                {{ $data['destination_to']['place']['id'] == $item['id'] ? 'selected' : '' }}>
                                                {{ $item['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-unit form-divided mb-3">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Tipe
                                        Tujuan</label>
                                    <select class="js-example-type custom-border" name="type_destinations_id">
                                        @foreach ($type_destinations as $item)
                                            <option value="{{ $item['id'] }}"
                                                {{ $data['destination_to']['type_destination_id'] == $item['id'] ? 'selected' : '' }}>
                                                {{ $item['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3" id="jumlahhari">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Lama
                                        Perjalanan
                                    </label>

                                    <input type="number" class="form-control input-default custom-border"
                                        placeholder="Masukkan Lama (Hari) " name="travel_time"
                                        value="{{ $data['travel_time'] }}">
                                </div>

                                <div class="form-unit form-divided mb-3">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Akun
                                        Anggaran</label>
                                    <select class="js-example-money custom-border" name="account_id">
                                        @foreach ($accounts as $item)
                                            <option value="{{ $item['id'] }}"
                                                {{ $data['account']['id'] == $item['id'] ? 'selected' : '' }}>
                                                {{ $item['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Sudah Diterima Dari
                                    </label>
                                    <input type="text" class="form-control input-default custom-border"
                                        placeholder="Masukkan Terima Dari" name="accept_from"
                                        value="{{ $data['accept_from'] }}">
                                </div>

                                <div class="mb-3">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Sub Komponen
                                    </label>
                                    <input type="text" class="form-control input-default custom-border"
                                        placeholder="Masukkan Sub Komponen" name="sub_component"
                                        value="{{ $data['sub_component'] }}">
                                </div>
                                <div class="form-unit form-divided mb-3">
                                    <label class="text-label form-label ps-2" style="font-size: 19px; font-weight: 500">
                                        Bendahara</label>
                                    <select class="js-example-bendahara custom-border" name="tresurer_id">
                                        @foreach ($tresurers as $item)
                                            <option value="{{ $item['id'] }}"
                                                {{ $data['bank_account']['id'] == $item['id'] ? 'selected' : '' }}>
                                                {{ $item['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Jumlah Uang
                                    </label>
                                    <input type="number" class="form-control input-default custom-border"
                                        placeholder="Masukkan Jumlah Uang" name="ammount_money"
                                        value="{{ $data['amount_money'] }}" id="amount_money">
                                </div>

                                <div class="form-unit form-divided mb-3">
                                    <label class="text-label form-label ps-2" style="font-size: 19px; font-weight: 500">
                                        Nomor Rekening</label>
                                    <select class="js-example-bank-account custom-border" name="bank_account_id">
                                        @foreach ($banks as $item)
                                            <option value="{{ $item['id'] }}"
                                                {{ $data['bank_account']['id'] == $item['id'] ? 'selected' : '' }}>
                                                {{ $item['account_number'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Hadir Dalam
                                    </label>
                                    <input type="text" class="form-control input-default custom-border"
                                        placeholder="Masukkan Hadir Dalam" name="present_in"
                                        value="{{ $data['present_in'] }}">
                                </div>

                                <div class="mb-3">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Arahan
                                    </label>
                                    <input type="text" class="form-control input-default custom-border"
                                        placeholder="Masukkan Arahan" name="briefings" value="{{ $data['briefings'] }}">

                                </div>

                                <div class="mb-3">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Masalah
                                    </label>
                                    <input type="text" class="form-control input-default custom-border"
                                        placeholder="Masukkan Masalah" name="problem" value="{{ $data['problem'] }}">
                                </div>

                                <div class="mb-3">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Saran
                                    </label>
                                    <input type="text" class="form-control input-default custom-border"
                                        placeholder="Masukkan Saran" name="advice" value="{{ $data['advice'] }}">
                                </div>
                                <div class="mb-3">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Lain -Lain
                                    </label>
                                    <input type="text" class="form-control input-default custom-border"
                                        placeholder="Masukkan Lain -Lain" name="other" value="{{ $data['other'] }}">
                                </div>

                                <div class="mb-4">
                                    <label class="text-label form-label ps-2"
                                        style="font-size: 19px; font-weight: 500">Keterangan
                                    </label>
                                    <input type="text" class="form-control input-default custom-border"
                                        placeholder="Masukkan Keterangan" name="description"
                                        value="{{ $data['other'] }}">
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
    <script>
        document.getElementsByName('departure_date')[0].addEventListener('change', function() {
            // Ambil nilai dari input tanggal berangkat
            var departureDate = this.value;

            // Set nilai input tanggal pulang dengan nilai tanggal berangkat
            document.getElementsByName('return_date')[0].value = departureDate;
        });

        $(document).ready(function() {

            $(".js-example-basic-multiple").select2({
                placeholder: "Pilih Pegawai"
            }).on('change', function(e) {
                if ($(this).val() && $(this).val().length) {
                    $(this).next('.select2-container')
                        .find('li.select2-search--inline input.select2-search__field').attr('placeholder',
                            'Pilih Pegawai');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $(".js-example-basic").select2({
                placeholder: "Pilih Pegawai"
            }).on('change', function(e) {
                if ($(this).val() && $(this).val().length) {
                    $(this).next('.select2-container')
                        .find('li.select2-search--inline input.select2-search__field').attr('placeholder',
                            'Pilih Pegawai');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $(".js-example-transportation").select2({
                placeholder: "Pilih Transportasi"
            }).on('change', function(e) {
                if ($(this).val() && $(this).val().length) {
                    $(this).next('.select2-container')
                        .find('li.select2-search--inline input.select2-search__field').attr('placeholder',
                            'Pilih Transportasi');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $(".js-example-category").select2({
                placeholder: "Pilih Kategori Perjalanan"
            }).on('change', function(e) {
                if ($(this).val() && $(this).val().length) {
                    $(this).next('.select2-container')
                        .find('li.select2-search--inline input.select2-search__field').attr('placeholder',
                            'Pilih Kategori Perjalanan');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $(".js-example-place").select2({
                placeholder: "Pilih Tempat Berangkat"
            }).on('change', function(e) {
                if ($(this).val() && $(this).val().length) {
                    $(this).next('.select2-container')
                        .find('li.select2-search--inline input.select2-search__field').attr('placeholder',
                            'Pilih Tempat Berangkat');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $(".js-example-destination").select2({
                placeholder: "Pilih Tempat Tujuan"
            }).on('change', function(e) {
                if ($(this).val() && $(this).val().length) {
                    $(this).next('.select2-container')
                        .find('li.select2-search--inline input.select2-search__field').attr('placeholder',
                            'Pilih Tempat Tujuan');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $(".js-example-type").select2({
                placeholder: "Pilih Tipe Tujuan"
            }).on('change', function(e) {
                if ($(this).val() && $(this).val().length) {
                    $(this).next('.select2-container')
                        .find('li.select2-search--inline input.select2-search__field').attr('placeholder',
                            'Pilih Tipe Tujuan');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $(".js-example-money").select2({
                placeholder: "Pilih Akun Anggaran"
            }).on('change', function(e) {
                if ($(this).val() && $(this).val().length) {
                    $(this).next('.select2-container')
                        .find('li.select2-search--inline input.select2-search__field').attr('placeholder',
                            'Pilih Akun Anggaran');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {


            $('#employeeSelect').change(function() {
                // Get the number of selected options
                updateAmountMoney();
            });

            $('#categorySelect').change(function() {
                // Get the number of selected options
                updateAmountMoney();
            });

            function updateAmountMoney() {
                var employeeSelectedCount = $('#employeeSelect option:selected').length;
                var selectedCategory = $('#categorySelect').val();
                console.log(selectedCategory);
                var categories = {!! json_encode($categories) !!};
                const filteredCategories = categories.filter(category => category.name.toLowerCase()
                    .includes('kurang'));
                var perEmployeeMoney = 0;
                if (selectedCategory === filteredCategories[0].id) {
                    var perEmployeeMoney = 60000;
                } else {
                    var perEmployeeMoney = 0;
                }
                var amountMoney = employeeSelectedCount * perEmployeeMoney;
                $('#amount_money').val(amountMoney);
            }

            $(".js-example-bank-account").select2({
                placeholder: "Pilih Nomor Rekening"
            }).on('change', function(e) {
                if ($(this).val() && $(this).val().length) {
                    $(this).next('.select2-container')
                        .find('li.select2-search--inline input.select2-search__field').attr('placeholder',
                            'Pilih Nomor Rekening');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $(".js-example-bendahara").select2({
                placeholder: "Pilih Bendahara"
            }).on('change', function(e) {
                if ($(this).val() && $(this).val().length) {
                    $(this).next('.select2-container')
                        .find('li.select2-search--inline input.select2-search__field').attr('placeholder',
                            'Pilih Bendahara');
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get the date input elements
            var startDateInput = document.getElementById("tanggalmulai").querySelector("input[type=date]");
            var endDateInput = document.getElementById("tanggalakhir").querySelector("input[type=date]");
            var daysTreatedInput = document.getElementById("jumlahhari").querySelector("input[type=number]");

            // Add event listeners to the date inputs
            startDateInput.addEventListener("input", updateDaysTreated);
            endDateInput.addEventListener("input", updateDaysTreated);

            function updateDaysTreated() {
                var startDate = new Date(startDateInput.value);
                var endDate = new Date(endDateInput.value);

                // Check if both dates are valid
                if (!isNaN(startDate.getTime()) && !isNaN(endDate.getTime())) {
                    // Calculate the difference in days
                    var timeDiff = Math.abs(endDate.getTime() - startDate.getTime());
                    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));

                    // Update the "Jumlah Hari Rawat" input field
                    daysTreatedInput.value = diffDays;
                } else {
                    // If either date is invalid, clear the "Jumlah Hari Rawat" input field
                    daysTreatedInput.value = "";
                }
            }
        });
    </script>
@endsection
