@extends('dashboard.layouts.main')
@section('content')
    <!-- Tambah Peminjaman -->

    <div class="row">
        <div class="col-6">
            <div class="row mb-2">
                <div class="col-1">
                    <a class="text-dark mb-3" href="{{ route('peminjaman.index') }}">
                        <i class="fa-regular fa-circle-chevron-left fs-2" aria-label="Close"></i>
                    </a>
                </div>
                <div class="col">
                    <h3 class="fw-bold mb-4">Tambah Peminjaman</h3>
                </div>
            </div>
            <form action="{{ route('peminjaman.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="id_barang" class="form-label">Barang</label>
                    <select class="select2 form-select" id="id_barang" name="id_barang">
                        <option selected disabled>Pilih Barang</option>
                        @foreach ($barangs as $barang)
                            <option value="{{ $barang->id }}">
                                {{ $barang->deskripsi_barang }} - {{ $barang->kode_barang }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                    <input type="text" class="form-control @error('nama_peminjam') is-invalid @enderror"
                        name="nama_peminjam" id="nama_peminjam" required>
                    @error('nama_peminjam')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="bidang" class="form-label">Bidang</label>
                    <input type="text" class="form-control @error('bidang') is-invalid @enderror" name="bidang"
                        id="bidang" required>
                    @error('bidang')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                        id="keterangan" required>
                    @error('keterangan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Habis Pakai</label>
                    <select class="form-select" id="hbs_pakai" name="hbs_pakai">
                        <option value="0">
                            Tidak Habis Pakai
                        </option>
                        <option value="1">
                            Habis pakai
                        </option>
                    </select>
                </div>
                <div>
                    <input type="hidden" class="form-control @error('status') is-invalid @enderror" name="status"
                        id="status" value="1">
                </div>
                <div>
                    <input type="hidden" class="form-control @error('status_detail') is-invalid @enderror"
                        name="status_detail" id="status_detail" value="1">
                </div>
                <div class="text-end">
                    <button class="btn btn-primary mt-2 mb-4"
                        onclick="window.location.href='{{ route('peminjaman.store') }}'">
                        Tambah
                    </button>
                </div>
        </div>
    </div>
    </form>
    </div>
    {{-- / Akhir Tambah Peminjaman --}}
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                theme: 'bootstrap-5',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                    'style',
                placeholder: $(this).data('placeholder'),
            });
        });

        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
        });
    </script>
@endsection
