@extends('dashboard.layouts.main')

@section('content')
  <div class="container">
    <h2 class="main-title mt-2 fw-semibold fs-3">Laporan Peminjaman</h2>
    <div class="row mt-3">
        <div class="col">
            <div class="card mt-2">
                <div class="card-body">

                    {{-- Tabel Data Peminjaman --}}
                    <table id="myTable" class="table responsive nowrap table-bordered table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>TGL PINJAM</th>
                                <th>TGL KEMBALI</th>
                                <th>NAMA PEMINJAM</th>
                                <th>BIDANG</th>
                                <th>BARANG</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2022-10-12</td>
                                    <td>2022-10-14</td>
                                    <td>Tajul</td>
                                    <td>TIK</td>
                                    <td>MIC, Sound</td>
                                    <td>Keperluan Acara</td>
                                </tr>
                        </tbody>
                    </table>
                    {{-- / Tabel Data Peminjaman --}}
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection

