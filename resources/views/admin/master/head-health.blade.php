@extends('layouts.app')
<title>Data Pegawai - SPPD Puskesmas Gondosari</title>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0 pt-3 pb-3 pe-3">
                        <div class="row">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6 text-md-end pe-3">
                                <a href="{{ route('add-head-health') }}">
                                    <button type="button" class="btn btn-primary">
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

        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <h2 class="card-title " style="font-weight: bold; font-size: 25px">Data Kepala Puskesmas </h2>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kepala Puskesmas</th>
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
                                                    <a href="{{ route('edit-head-health', ['id' => $item['id']]) }}"
                                                        class="btn btn-primary shadow btn-xs sharp me-1 pt-2"><i
                                                            class="fas fa-pencil-alt"></i></a>
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


    <div class="modal fade" id="delete-employee">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-weight: bold; font-size: 30px">Hapus Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body">
                    <p class="pt-3" id="title-modal" style="font-size: 17px"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Kembali</button>
                    <form action="{{ route('employee-delete') }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="text" id="id-employee" name="id" hidden>
                        <button type="submit" class="btn btn-primary">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Your HTML code -->



    <script>
        $(document).ready(function() {
            // Capture click event on the delete button
            $('.btn-delete').on('click', function() {
                // Retrieve the data-id attribute from the clicked button
                var id = $(this).data('id');
                var name = $(this).data('name');


                // Update the modal content with the retrieved text
                $('#title-modal').text('Apakah anda yakin ingin menghapus ' + name + ' ?');
                $('#id-employee').val(id);

            });
        });
    </script>



    <div class="modal fade" id="import-employee">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row12">
                        <h5 class="modal-title" style="font-weight: bold; font-size: 30px">Upload Data Pegawai</h5>

                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <form action="{{ route('employee-import', ['id' => 1]) }}" method="post" enctype="multipart/form-data">
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
