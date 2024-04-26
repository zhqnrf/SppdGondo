@extends('layouts.app')
<title>Data Pengguna - SPPD Puskesmas Gondosari</title>
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
                                <div class="btn" role="group" aria-label="Basic mixed styles example"
                                    style="padding: 1%">
                                    <a href="
                            {{ route('add-user') }}"> <button type="button"
                                            class="btn btn-primary" data-bs-toggle="modal" data-bs-target="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                            </svg> Tambah
                                        </button></a>

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
                        <h2 class="card-title " style="font-weight: bold; font-size: 25px">Data Pengguna</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pengguna</th>
                                        <th>Email</th>
                                        <th>Hak Akses</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item['name'] }}</td>
                                            <td>
                                                {{ $item['email'] }}
                                            </td>
                                            <td>{{ $item['role'] }}</td>
                                            <td>
                                                <div class="d-flex ">
                                                    <a href="{{ route('edit-user', ['id' => $item['id']]) }}"
                                                        class="btn btn-primary shadow btn-xs sharp me-1 pt-2"><i
                                                            class="fas fa-pencil-alt"></i></a>
                                                    <button class="btn-delete btn btn-danger shadow btn-xs sharp pt-2"
                                                        data-bs-toggle="modal" data-bs-target="#delete-user"
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
    <div class="modal fade" id="delete-user">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight: bold; font-size: 30px">Hapus Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <p id="user-name" class="pt-3" style="font-size: 17px"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Kembali</button>
                    <form action="{{ route('user-delete') }}" method="post">
                        @method('delete')
                        @csrf
                        <input type="text" name="id" id="id-user" hidden>
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
                $('#user-name').text(`Apakah Anda Yakin Ingin Menghapus User Dengan Nama ${name} ini ?`);
                $('#id-user').val(id);
            });
        });
    </script>
@endsection
