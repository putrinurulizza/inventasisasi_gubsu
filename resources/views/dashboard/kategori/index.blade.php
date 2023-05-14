@extends('dashboard.layouts.main')

@section('content')
  <div class="container">
    <h2 class="main-title mt-2 fw-semibold fs-3">Tabel Data Kategori</h2>

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

        <button class="btn btn-primary fs-5 fw-normal mt-2" data-bs-toggle="modal" data-bs-target="#tambahkategori"><i
                class="fa-solid fa-square-plus fs-5 me-2"></i>Tambah</button>
        <div class="row mt-3">
            <div class="col">
                <div class="card mt-2">
                    <div class="card-body">

                        {{-- Tabel Data ... --}}
                        <table id="myTable" class="table responsive nowrap table-bordered table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Kategori</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $kategori)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kategori->kategori }}</td>
                                    <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editmodal{{ $loop->iteration}}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapusmodal{{ $loop->iteration}}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                </tr>


                                    <!-- Edit Data Kategori -->
                                    <x-form_modal>
                                        @slot('id', "editmodal$loop->iteration")
                                        @slot('title', 'Edit Data Kategori')
                                        @slot('route', route('kategori.update', $kategori->id))
                                        @slot('method') @method('put') @endslot
                                        @slot('btnprimaryTitle', 'Perbarui')

                                        <div class="row">
                                            <div class="mb-3">
                                                <label for="kategori" class="form-label">Kategori</label>
                                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori" value="{{ old('kategori', $kategori->kategori) }}" autofocus required>
                                                @error('kategori')
                                                    <div class="invalid-feedback">
                                                    {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </x-form_modal>
                                    {{-- / Edit Data Kategori --}}

                                        <!-- Hapus Data Kategori -->
                                        <x-form_modal>
                                            @slot('id', "hapusmodal$loop->iteration")
                                            @slot('title', 'Hapus Data Kategori')
                                            @slot('route', route('kategori.destroy', $kategori->id))
                                            @slot('method') @method('delete') @endslot
                                            @slot('btnPrimaryClass', 'btn-outline-danger')
                                            @slot('btnSecondaryClass', 'btn-secondary')
                                            @slot('btnPrimaryTitle', 'Hapus')

                                            <p class="fs-5">Apakah anda yakin akan menghapus data kategori
                                                <b>{{ $kategori->kategori }}</b>?
                                            </p>
                                     </x-form_modal>
                                     {{-- / Hapus Data Kategori --}}
                           @endforeach
                            </tbody>
                        </table>
                        {{-- / Tabel Data Kategori --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah Kategori --}}
    <x-form_modal>
        @slot('id', 'tambahkategori')
        @slot('title', 'Tambah Data Kategori')
        @slot('route', route('kategori.store'))

        <div class="row">
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" id="kategori" autofocus required>
                @error('kategori')
                    <div class="invalid-feedback">
                    {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </x-form_modal>
    {{-- / Modal Tambah Kategori --}}
@endsection

