@extends('dashboard.layouts.main')

@section('content')
    <div class="container">
        <h2 class="main-title mt-2 fw-semibold fs-3">Peminjaman</h2>

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

        <div class="row mt-1">
            <div class="col">
                @if (auth()->user()->role != 3)
                    <button class="btn btn-primary fs-5 fw-normal mt-2 mb-2"
                        onclick="window.location.href='{{ route('peminjaman.create') }}'"><i
                            class="fa-solid fa-square-plus fs-5 me-2"></i></i>Pinjam
                    </button>
                @endif

                {{-- / Edit Check --}}
                <div class="card mt-2">
                    <div class="card-body">
                        <table id="myTable" class="table responsive nowrap table-bordered table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Barang</th>
                                    <th>Peminjam</th>
                                    <th>Bidang</th>
                                    <th>Tanggal/Waktu Pinjam</th>
                                    {{-- <th hidden>Status</th> --}}
                                    @if (auth()->user()->role != 3)
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peminjamans as $peminjaman)
                                    @foreach ($peminjaman->detailsPeminjamans as $detail)
                                        @if ($detail->status_detail == 1 && $detail->hbs_pakai == 0)
                                            <tr>
                                                <td>{{ $loop->parent->iteration }}</td>
                                                <td>{{ $detail->barang->deskripsi_barang }} -
                                                    {{ $detail->barang->kode_barang }}</td>
                                                <td>{{ $peminjaman->nama_peminjam }}</td>
                                                <td>{{ $peminjaman->bidang }}</td>
                                                <td>{{ $peminjaman->tgl_pinjam }}</td>
                                                {{-- <td hidden>{{ $detail->status }}</td> --}}
                                                @if (auth()->user()->role != 3)
                                                    <td><button class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#checkmodal{{ $loop->parent->iteration }}"><i
                                                                class="fa-solid fa-box-check"></i>
                                                        </button>
                                                    </td>
                                                @endif
                                            </tr>
                                        @else
                                        @endif

                                        <!-- Check -->
                                        <div class="modal fade" id="checkmodal{{ $loop->parent->iteration }}"
                                            tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel1">
                                                            Check Peminjaman</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('peminjaman.update', $detail->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="mb-3">
                                                                    <label for="barang" class="form-label">Barang</label>
                                                                    <input type="text"
                                                                        class="form-control @error('barang') is-invalid @enderror"
                                                                        name="id_barang" id="id_barang"
                                                                        value="{{ old('id_barang', $detail->barang->deskripsi_barang) }}"
                                                                        autofocus required disabled>
                                                                    @error('barang')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="nama_peminjam"
                                                                        class="form-label">Peminjam</label>
                                                                    <input type="text"
                                                                        class="form-control @error('nama_peminjam') is-invalid @enderror"
                                                                        name="nama_peminjam" id="nama_peminjam"
                                                                        value="{{ old('nama_peminjam', $peminjaman->nama_peminjam) }}"
                                                                        autofocus required disabled>
                                                                    @error('nama_peminjam')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="bidang" class="form-label">Bidang</label>
                                                                    <input type="text"
                                                                        class="form-control @error('bidang') is-invalid @enderror"
                                                                        name="bidang" id="bidang"
                                                                        value="{{ old('bidang', $peminjaman->bidang) }}"
                                                                        autofocus required disabled>
                                                                    @error('bidang')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                <div>
                                                                    <input type="hidden"
                                                                        class="form-control @error('status') is-invalid @enderror"
                                                                        name="status" id="status" value="0">
                                                                </div>
                                                                <div>
                                                                    <input type="hidden"
                                                                        class="form-control @error('status_detail') is-invalid @enderror"
                                                                        name="status_detail" id="status_detail"
                                                                        value="0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="submit"
                                                                class="btn btn-primary">Dikembalikan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- / Edit Check --}}
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script>
        const {
            createApp
        } = Vue;

        createApp({
            mounted() {

                $(".select2").select2({
                    theme: 'bootstrap-5',
                });

                $(document).on('select2:open', () => {
                    document.querySelector('.select2-search__field').focus();
                });

            },
        }).mount("#TambahPinjam");
    </script>
@endsection
