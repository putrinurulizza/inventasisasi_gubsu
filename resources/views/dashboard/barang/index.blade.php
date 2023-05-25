@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <h2 class="main-title mt-2 fw-semibold fs-3">Tabel Data Barang</h2>

        <div class="row">
            <div class="col-sm-6 col-md">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session()->has('failed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('failed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>


        <button class="btn btn-primary fs-5 fw-normal mt-2" data-bs-toggle="modal" data-bs-target="#tambahBarang"><i
                class="fa-solid fa-square-plus fs-5 me-2"></i>Tambah</button>
        <div class="row mt-3">
            <div class="col">
                <div class="card mt-2">
                    <div class="card-body">

                        {{-- Tabel Data Barang --}}
                        <table id="myTable" class="table responsive nowrap table-bordered table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>STATUS</th>
                                    <th>KODE BARANG</th>
                                    <th>KATEGORI</th>
                                    <th>NAMA/DESKRIPSI BARANG</th>
                                    <th>SERIAL NUMBER</th>
                                    <th>LOKASI</th>
                                    <th>TAHUN PENGADAAN</th>
                                    <th>KONDISI</th>
                                    <th>KET</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $barang)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($barang->DetailPeminjaman && $barang->DetailPeminjaman->isNotEmpty())
                                                @if ($barang->DetailPeminjaman[0]->status == 1)
                                                    <span class="badge badge-danger bg-danger">Dipinjam</span>
                                                @else
                                                    <span class="badge badge-success bg-success">Tersedia</span>
                                                @endif
                                            @else
                                                <span class="badge badge-success bg-success">Tersedia</span>
                                            @endif
                                        </td>

                                        <td>{{ $barang->kode_barang }}</td>
                                        <td>{{ $barang->kategori->kategori }}</td>
                                        <td>{{ $barang->deskripsi_barang }} </td>
                                        <td>{{ $barang->serial_number }}</td>
                                        <td>{{ $barang->lokasi_user }}</td>
                                        <td>{{ $barang->tahun_pengadaan }}</td>
                                        <td>{{ $barang->kondisi_barang }}</td>
                                        <td>{{ $barang->keterangan }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editBarang{{ $loop->iteration }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapusBarang{{ $loop->iteration }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    {{-- Modal Edit Barang --}}
                                    <x-form_modal>
                                        @slot('id', "editBarang$loop->iteration")
                                        @slot('title', 'Edit Data Barang')
                                        @slot('route', route('barang.update', $barang->id))
                                        @slot('method') @method('put') @endslot
                                        @slot('btnPrimaryTitle', 'Perbarui')

                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="kode_barang" class="form-label">Kode Barang</label>
                                                <input type="text"
                                                    class="form-control @error('kode_barang') is-invalid @enderror"
                                                    name="kode_barang" id="kode_barang"
                                                    value="{{ old('kode_barang', $barang->kode_barang) }}" autofocus
                                                    required>
                                                @error('kode_barang')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="id_kategori" class="form-label">Kategori Barang</label>
                                                <select class="form-select" id="id_kategori" name="id_kategori">
                                                    @foreach ($kategoris as $kategori)
                                                        @if (old('id_kategori', $barang->id_kategori) == $kategori->id)
                                                            <option value="{{ $kategori->id }}" selected>
                                                                {{ "$kategori->kategori" }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $kategori->id }}">
                                                                {{ "$kategori->kategori" }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="deskripsi_barang" class="form-label">Nama/Deskripsi
                                                    Barang</label>
                                                <input type="text"
                                                    class="form-control @error('deskripsi_barang') is-invalid @enderror"
                                                    name="deskripsi_barang" id="deskripsi_barang"
                                                    value="{{ old('deskripsi_barang', $barang->deskripsi_barang) }}"
                                                    autofocus required>
                                                @error('deskripsi_barang')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="serial_number" class="form-label">Serial Number</label>
                                                <input type="text"
                                                    class="form-control @error('serial_number') is-invalid @enderror"
                                                    name="serial_number" id="serial_number"
                                                    value="{{ old('serial_number', $barang->serial_number) }}" autofocus
                                                    required>
                                                @error('serial_number')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="lokasi_user" class="form-label">Lokasi</label>
                                                <input type="text"
                                                    class="form-control @error('lokasi_user') is-invalid @enderror"
                                                    name="lokasi_user" id="lokasi_user"
                                                    value="{{ old('lokasi_user', $barang->lokasi_user) }}" autofocus
                                                    required>
                                                @error('lokasi_user')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="tahun_pengadaan" class="form-label">Tahun Pengadaan</label>
                                                <input type="year"
                                                    class="form-control @error('tahun_pengadaan') is-invalid @enderror"
                                                    name="tahun_pengadaan" id="tahun_pengadaan"
                                                    value="{{ old('tahun_pengadaan', $barang->tahun_pengadaan) }}"
                                                    autofocus>
                                                @error('tahun_pengadaan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="keterangan" class="form-label">Keterangan</label>
                                                <input type="text"
                                                    class="form-control @error('keterangan') is-invalid @enderror"
                                                    name="keterangan" id="keterangan"
                                                    value="{{ old('keterangan', $barang->keterangan) }}" autofocus>
                                                @error('keterangan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="kondisi_barang" class="form-label">Kondisi</label>
                                                <input type="text"
                                                    class="form-control @error('kondisi_barang') is-invalid @enderror"
                                                    name="kondisi_barang" id="kondisi_barang"
                                                    value="{{ old('kondisi_barang', $barang->kondisi_barang) }}" autofocus
                                                    required>
                                                @error('kondisi_barang')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </x-form_modal>
                                    {{-- / Modal Edit Barang

                                    {{-- Modal Hapus Barang --}}
                                    <x-form_modal>

                                        @slot('id', "hapusBarang$loop->iteration")
                                        @slot('title', 'Hapus Data Barang')
                                        @slot('route', route('barang.destroy', $barang->id))
                                        @slot('method') @method('delete') @endslot
                                        @slot('btnPrimaryClass', 'btn-outline-danger')
                                        @slot('btnSecondaryClass', 'btn-secondary')
                                        @slot('btnPrimaryTitle', 'Hapus')

                                        <p class="fs-5">Apakah anda yakin akan menghapus data barang
                                            <b>{{ $barang->serial_number . ' - ' . $barang->deskripsi_barang }}</b>?
                                        </p>

                                    </x-form_modal>
                                    {{-- / Modal Hapus Barang  --}}
                                @endforeach
                            </tbody>
                        </table>
                        {{-- / Tabel Data Barang --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Barang -->
    <x-form_modal>
        @slot('id', 'tambahBarang')
        @slot('title', 'Tambah Data Barang')
        @slot('overflow', 'overflow-auto')
        @slot('route', route('barang.store'))

        <div class="row">
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" class="form-control @error('kode_barang') is-invalid @enderror" name="kode_barang"
                    id="kode_barang" autofocus required>
                @error('kode_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="id_kategori" class="form-label">Kategori Barang</label>
                <select class="form-select" id="id_kategori" name="id_kategori">
                    @foreach ($kategoris as $kategori)
                        @if (old('id_kategori') == $kategori->id)
                            <option value="{{ $kategori->id }}" selected>
                                {{ "$kategori->kategori" }}
                            </option>
                        @else
                            <option value="{{ $kategori->id }}">{{ "$kategori->kategori" }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="deskripsi_barang" class="form-label">Nama/Deskripsi Barang</label>
                <input type="text" class="form-control @error('deskripsi_barang') is-invalid @enderror"
                    name="deskripsi_barang" id="deskripsi_barang" autofocus required>
                @error('deskripsi_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="serial_number" class="form-label">Serial Number</label>
                <input type="text" class="form-control @error('serial_number') is-invalid @enderror"
                    name="serial_number" id="serial_number" autofocus required>
                @error('serial_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lokasi_user" class="form-label">Lokasi</label>
                <input type="text" class="form-control @error('lokasi_user') is-invalid @enderror" name="lokasi_user"
                    id="lokasi_user" autofocus required>
                @error('lokasi_user')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tahun_pengadaan" class="form-label">Tahun Pengadaan</label>
                <input type="year" class="form-control @error('tahun_pengadaan') is-invalid @enderror"
                    name="tahun_pengadaan" id="tahun_pengadaan" autofocus>
                @error('tahun_pengadaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                    id="keterangan" autofocus>
                @error('keterangan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kondisi_barang" class="form-label">Kondisi</label>
                <input type="text" class="form-control @error('kondisi_barang') is-invalid @enderror"
                    name="kondisi_barang" id="kondisi_barang" autofocus required>
                @error('kondisi_barang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </x-form_modal>
    <!-- Akhir Modal Tambah Barang -->
@endsection
