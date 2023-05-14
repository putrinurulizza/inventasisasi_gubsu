@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <h2 class="main-title mt-2 fw-semibold fs-3">Laporan Barang</h2>
        <div class="row mt-3">
            <div class="col">
                <div class="card mt-2">
                    <div class="card-body">
                        {{-- Tabel Data Barang --}}
                        <table id="Table" class="table responsive nowrap table-bordered table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>KODE BARANG</th>
                                    <th>KATEGORI</th>
                                    <th>BARANG</th>
                                    <th>SERIAL NUMBER</th>
                                    <th>LOKASI</th>
                                    <th>TAHUN PENGADAAN</th>
                                    <th>KONDISI</th>
                                    <th>KET</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $barang)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $barang->kode_barang }}</td>
                                        <td>{{ $barang->kategori->kategori }}</td>
                                        <td>{{ $barang->deskripsi_barang }}</td>
                                        <td>{{ $barang->serial_number }}</td>
                                        <td>{{ $barang->lokasi_user }}</td>
                                        <td>{{ $barang->tahun_pengadaan }}</td>
                                        <td>{{ $barang->kondisi_barang }}</td>
                                        <td>{{ $barang->keterangan }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- / Tabel Data Barang --}}
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
                lengthChange: true,
                buttons: ['excel', 'pdf']
            });

            table.buttons().container()
                .appendTo('#Table_wrapper .col-md-6:eq()').css({
                "marginTop": "10px"
            });;
        });
    </script>
@endsection
