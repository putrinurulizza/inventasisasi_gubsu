@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <h2 class="main-title mt-2 fw-semibold fs-3">Laporan Barang</h2>
        <div class="row mt-3">
            <div class="col">
                <div class="card mt-2">
                    <div class="card-body">
                        {{-- Tabel Laporan Barang --}}
                        <table id="Table" class="table responsive nowrap table-bordered table-striped align-middle"
                            style="width:100%">
                            <ul class="nav nav-tabs mb-5">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('dashboard/laporan/laporan-barang/laporan-barang-utama') ? 'active' : '' }}" aria-current="page" href="{{ route('laporan-barang-utama.index') }}">RealTime</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('dashboard/laporan/laporan-barang/laporan-barang-mingguan') ? 'active' : '' }}" href="{{ route('laporan-barang-mingguan.index') }}">Mingguan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('dashboard/laporan/laporan-barang/laporan-barang-bulanan') ? 'active' : '' }}" href="{{ route('laporan-barang-bulanan.index') }}">Bulanan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('dashboard/laporan/laporan-barang/laporan-barang-tahunan') ? 'active' : '' }}" href="{{ route('laporan-barang-tahunan.index') }}">Tahunan</a>
                                </li>
                            </ul>
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>KODE BARANG</th>
                                    <th>KATEGORI</th>
                                    <th>NAMA BARANG</th>
                                    <th>SERIAL NUMBER</th>
                                    <th>LOKASI</th>
                                    <th>TAHUN PENGADAAN</th>
                                    <th>KONDISI</th>
                                    <th>KET</th>
                                    <th hidden></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporans as $laporan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $laporan->kode_barang }}</td>
                                    <td>{{ $laporan->kategori->kategori}}</td>
                                    <td>{{ $laporan->deskripsi_barang }} </td>
                                    <td>{{ $laporan->serial_number}}</td>
                                    <td>{{ $laporan->lokasi_user }}</td>
                                    <td>{{ $laporan->tahun_pengadaan}}</td>
                                    <td>{{ $laporan->kondisi_barang}}</td>
                                    <td>{{ $laporan->keterangan }}</td>
                                    <td hidden>{{ $laporan->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- / Tabel Laporan Barang --}}
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
