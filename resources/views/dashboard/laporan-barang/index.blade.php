@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <h2 class="main-title mt-2 fw-semibold fs-3">Laporan Barang</h2>
        <div class="row mt-3">
            <div class="col-lg-3">
                <label for="floatingInput">Tanggal Awal</label>
                <input type="text" id="min" name="min" class="form-control" placeholder="">
            </div>
            <div class="col-lg-3">
                <label for="floatingInput">Tanggal Akhir</label>
                <input type="text" id="max" name="max" class="form-control" placeholder="">
            </div>

            <div class="col-lg-3">
                <label for="floatingInput">Kategori</label>
                <select class="form-select filter" id="filter">
                    <option selected>Pilih Kategori</option disabled>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->kategori }}">{{ $kategori->kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col">
                <div class="card mt-2">
                    <div class="card-body">
                        {{-- Tabel Laporan Barang --}}
                        <table id="Table" class="table responsive nowrap table-bordered table-striped align-middle"
                            style="width:100%">
                            <ul class="nav nav-tabs mb-5">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('dashboard/laporan/laporan-barang/laporan-barang-utama') ? 'active' : '' }}"
                                        aria-current="page" href="{{ route('laporan-barang-utama.index') }}">RealTime</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('dashboard/laporan/laporan-barang/laporan-barang-mingguan') ? 'active' : '' }}"
                                        href="{{ route('laporan-barang-mingguan.index') }}">Mingguan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('dashboard/laporan/laporan-barang/laporan-barang-bulanan') ? 'active' : '' }}"
                                        href="{{ route('laporan-barang-bulanan.index') }}">Bulanan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('dashboard/laporan/laporan-barang/laporan-barang-tahunan') ? 'active' : '' }}"
                                        href="{{ route('laporan-barang-tahunan.index') }}">Tahunan</a>
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
                            <tbody id="tableBody">
                                @foreach ($laporans as $laporan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $laporan->kode_barang }}</td>
                                        <td>{{ $laporan->kategori->kategori }}</td>
                                        <td>{{ $laporan->deskripsi_barang }} </td>
                                        <td>{{ $laporan->serial_number }}</td>
                                        <td>{{ $laporan->lokasi_user }}</td>
                                        <td>{{ $laporan->tahun_pengadaan }}</td>
                                        <td>{{ $laporan->kondisi_barang }}</td>
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
        var minDate, maxDate;
        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[9]);
                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {

            function resetRowNumbers() {
                $('#tableBody tr').each(function(index) {
                    $(this).find('td:first').text(index + 1);
                });
            }

            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'Do MMMM YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'Do MMMM YYYY'
            });

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

            // Refilter the table
            $('#min, #max').on('change', function() {
                table.draw();

                // Reset row numbers
                resetRowNumbers();
            });

            $('.dataTables_filter input[type="search"]').css({
                "marginBottom": "10px"
            });

            $('#filter').on('change', function() {
                var filter = $(this).val();
                table.column(2).search(filter).draw();

                // Reset row numbers
                resetRowNumbers();
            });
        });
    </script>
@endsection
