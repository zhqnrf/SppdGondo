@extends('layouts.app')
<title>Data Tempat - SPPD Puskesmas Gondosari</title>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0 pt-3 pb-3 pe-3">
                        <div class="row">
                            <div class="col-sm-6">
                            </div>

                            <div class="col-sm-6 text-md-end">
                                <a href="{{ route('place-template', ['id' => 1]) }}"><button class="btn btn-secondary me-2">
                                        Download Template
                                    </button></a>
                                <a href="{{ route('add-place') }}">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                        </svg> Tambah
                                    </button></a>

                                <div class="btn-group" role="group" aria-label="Basic mixed styles example"
                                    style="padding: 1%">
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <a href="{{ route('place-export', ['id' => 1]) }}" class="btn btn-success"
                                            aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-file-earmark-spreadsheet"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z" />
                                            </svg> Export
                                        </a>
                                    </div>

                                    <button type="button" class="btn btn-warning" data-bs-target="#button-import"
                                        data-bs-toggle="modal">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                                            <path
                                                d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z" />
                                            <path
                                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
                                        </svg> Import
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h2 class="card-title " style="font-weight: bold; font-size: 25px">Data Tempat</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Tempat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item['name'] }}</td>
                                            <td>
                                                <div class="d-flex ">
                                                    <a href="{{ route('edit-place', ['id' => $item['id']]) }}"
                                                        class="btn btn-primary shadow btn-xs sharp me-1 pt-2"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <button class="btn-delete btn btn-danger shadow btn-xs sharp pt-2"
                                                        data-bs-toggle="modal" data-bs-target="#delete-place"
                                                        data-id="{{ $item['id'] }}" data-name="{{ $item['name'] }}">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="delete-place">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight: bold; font-size: 30px">Hapus Tempat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <p id="name-place" class="pt-3" style="font-size: 17px">Apakah anda yakin ingin menghapus [Nama
                        Tempat] ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Kembali</button>
                    <form action="{{ route('place-delete', ['id' => 1]) }}" method="post">
                        @method('delete')
                        @csrf
                        <input type="text" name="id" id="id-place-delete" hidden>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            // Capture click event on the delete button
            $('.btn-delete').on('click', function() {
                // Retrieve the data-id attribute from the clicked button
                var id = $(this).data('id');
                var name = $(this).data('name');

                // Update the modal content with the retrieved text
                $('#name-place').text(`Apakah Anda Yakin Ingin Menghapus Tempat ${name} ini ?`);
                $('#id-place-delete').val(id);
            });
        });
    </script>
    <div class="modal fade" id="button-import">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row-12">
                        <h5 class="modal-title" style="font-weight: bold; font-size: 30px">Upload Data Tempat</h5>

                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="{{ route('place-import', ['id' => 1]) }}" method="post" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <div class="modal-body">
                        <div class="input-group">
                            <div class="form-file">
                                <input type="file" name="file" class="form-file-input form-control"
                                    accept=".xlsx , .csv , .xls">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
