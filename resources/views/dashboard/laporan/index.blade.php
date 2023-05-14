@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <h2 class="main-title mt-2 fw-semibold fs-3">Tabel Laporan Peminjaman</h2>

        <div class="row mt-3">
            <div class="col">
                <div class="card mt-2">
                    <div class="card-body">
                        {{-- Tabel laporan peminjaman --}}
                        <table id="tableku"
                            class="table display1 responsive nowrap table-bordered table-striped align-middle "
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>USERNAME</th>
                                    <th>ROLE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editUser">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#hapusUser">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- / Tabel laporan ... --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#tableku').DataTable({
                ordering: true,
                dom: 'Bfrtip',
                buttons: [
                    'pdfHtml5', 'excelHtml5'
                ]
            });
        });
    </script>
@endsection
