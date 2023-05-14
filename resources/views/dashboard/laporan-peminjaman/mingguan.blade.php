@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <h2 class="main-title mt-2 fw-semibold fs-3">Laporan Peminjaman</h2>
        <div class="row mt-3">
            <div class="col">
                <div class="card mt-2">
                    <div class="card-body">
                        {{-- Tabel Data Peminjaman --}}
                        <table id="Table" class="table responsive nowrap table-bordered table-striped align-middle"
                            style="width:100%">
                            <ul class="nav nav-tabs mb-5">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('dashboard/laporan/laporan-peminjaman/laporan-peminjaman-utama') ? 'active' : '' }}" aria-current="page" href="{{ route('laporan-peminjaman-utama.index') }}">RealTime</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('dashboard/laporan/laporan-peminjaman/laporan-peminjaman-mingguan') ? 'active' : '' }}" href="{{ route('laporan-peminjaman-mingguan.index') }}">Mingguan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Bulanan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Tahunan</a>
                                </li>
                            </ul>
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
                                    <td>'• ' MIC <br> '• ' Sound</td>
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

@section('scripts')
    <script>

        $(document).ready(function() {

            var table = $('#Table').DataTable({
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search...",
                },
                lengthChange: true,
                buttons: ['excel', 'pdf']
            });

            table.buttons().container()
                .appendTo('#Table_wrapper .col-md-6:eq()').css({
                    "marginTop": "10px"
                });
        });
    </script>
@endsection
