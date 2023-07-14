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
                                    <a class="nav-link {{ Request::is('dashboard/laporan/laporan-peminjaman/laporan-peminjaman-bulanan') ? 'active' : '' }}" href="{{ route('laporan-peminjaman-bulanan.index') }}">Bulanan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('dashboard/laporan/laporan-peminjaman/laporan-peminjaman-tahunan') ? 'active' : '' }}" href="{{ route('laporan-peminjaman-tahunan.index') }}">Tahunan</a>
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
                                    <th hidden></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporans as $laporan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $laporan->tgl_pinjam }}</td>
                                    <td>{{ $laporan->tgl_kembali }}</td>
                                    <td>{{ $laporan->nama_peminjam }}</td>
                                    <td>{{ $laporan->bidang }}</td>
                                    <td>
                                        @foreach ($laporan->detailsPeminjamans as $barang)
                                            {!! '• ' . $barang->barang->deskripsi_barang . '<br>' !!}
                                        @endforeach
                                    </td>
                                    <td>{{ $laporan->keterangan }}</td>
                                    <td hidden>{{ $laporan->created_at }}</td>
                                </tr>
                                @endforeach
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
                buttons: ['excel']
            });

            table.buttons().container()
                .appendTo('#Table_wrapper .col-md-6:eq()').css({
                    "marginTop": "10px"
                });
        });
    </script>
@endsection
