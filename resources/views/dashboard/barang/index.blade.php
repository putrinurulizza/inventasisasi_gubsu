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

        <button class="btn btn-primary fs-5 fw-normal mt-2" data-bs-toggle="modal" data-bs-target="#tambahRek"><i
                class="fa-solid fa-square-plus fs-5 me-2"></i>Tambah</button>
        <div class="row mt-3">
            <div class="col">
                <div class="card mt-2">
                    <div class="card-body">

                        {{-- Tabel Data Rekening --}}
                        <table id="myTable" class="table responsive nowrap table-bordered table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>KODE BARANG</th>
                                    <th>BARANG</th>
                                    <th>SERIAL NUMBER</th>
                                    <th>LOKASI</th>
                                    <th>TAHUN PENGADAAN</th>
                                    <th>KONDISI</th>
                                    <th>KET</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($rekenings as $rekening) --}}
                                    <tr>
                                        <td>1</td>
                                        <td>123</td>
                                        <td>Lampu</td>
                                        <td>12343</td>
                                        <td>tik</td>
                                        <td>2022</td>
                                        <td>baik</td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#modalEditRek">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalHapusRek">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                        {{-- <td>{{ $loop->iteration }}</td>
                                        <th>{{ $rekening->no_rekening }}</th>
                                        <td>{{ $rekening->atas_nama }}</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#modalEditRek{{ $loop->iteration }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#modalHapusRek{{ $loop->iteration }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td> --}}
                                    </tr>

                                    {{-- Modal Edit Rekening --}}
                                    {{-- <x-form_modal>
                                        @slot('id', "modalEditRek$loop->iteration")
                                        @slot('title', 'Edit Data Rekening')
                                        @slot('route', route('data-rekening.update', $rekening->id))
                                        @slot('method') @method('put') @endslot
                                        @slot('btnTitle', 'Perbarui')

                                        <div class="mb-3">
                                            <label for="no_rekening" class="form-label">No Rekening</label>
                                            <input type="text" class="form-control" id="no_rekening" name="no_rekening"
                                                value="{{ old('no_rekening', $rekening->no_rekening) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Atas Nama</label>
                                            <input type="name" class="form-control" id="atas_nama" name="atas_nama"
                                                value="{{ old('atas_nama', $rekening->atas_nama) }}">
                                        </div>

                                    </x-form_modal> --}}
                                    {{-- / Modal Rekening --}}

                                    {{-- Modal Hapus Rekening --}}
                                    {{-- <x-form_modal>

                                        @slot('id', "modalHapusRek$loop->iteration")
                                        @slot('title', 'Hapus Data Rekening')
                                        @slot('route', route('data-rekening.destroy', $rekening->id))
                                        @slot('method') @method('delete') @endslot
                                        @slot('btnPrimaryClass', 'btn-outline-danger')
                                        @slot('btnSecondaryClass', 'btn-secondary')
                                        @slot('btnPrimaryTitle', 'Hapus')

                                        <p class="fs-5">Apakah anda yakin akan menghapus data rekening
                                            <b>{{ $rekening->no_rekening . ' - ' . $rekening->atas_nama }}</b>?
                                        </p>

                                    </x-form_modal> --}}
                                    {{-- / Modal Hapus Rekening  --}}
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                        {{-- / Tabel Data Rekening --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- Modal Tambah Rekening -->
  {{-- <x-form_modal>
    @slot('id', 'tambahRek')
    @slot('title', 'Tambah Data Rekening')
    @slot('route', route('data-rekening.store'))

    <div class="row">
      <div class="mb-3">
        <label for="no_rekening" class="form-label">No Rekening</label>
        <input type="text" class="form-control @error('no_rekening') is-invalid @enderror" name="no_rekening" id="no_rekening" autofocus required>
        @error('no_rekening')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="atas_nama" class="form-label">Atas Nama</label>
        <input type="text" class="form-control @error('atas_nama') is-invalid @enderror" name="atas_nama" id="atas_nama" autofocus required>
        @error('atas_nama')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div>
  </x-form_modal> --}}
  <!-- Akhir Modal Tambah Rekening -->
@endsection
