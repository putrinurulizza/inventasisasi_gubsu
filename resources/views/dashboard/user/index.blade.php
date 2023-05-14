@extends('dashboard.layouts.main')

@section('content')
  <div class="container">
    <h2 class="main-title mt-2 fw-semibold fs-3">Tabel Data User</h2>

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

        <button class="btn btn-primary fs-5 fw-normal mt-2" data-bs-toggle="modal" data-bs-target="#tambahUser"><i
                class="fa-solid fa-square-plus fs-5 me-2"></i>Tambah</button>
        <div class="row mt-3">
            <div class="col">
                <div class="card mt-2">
                    <div class="card-body">

                        {{-- Tabel Data User --}}
                        <table id="myTable" class="table responsive nowrap table-bordered table-striped align-middle"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>USERNAME</th>
                                    <th>ROLE</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $user->nama}}</td>
                                        <td>{{ $user->username}}</td>
                                        <td>
                                            @php
                                                if ($user->is_admin) {
                                                    $is_admin = 'Admin';
                                                } else {
                                                    $is_admin = 'User';
                                                }
                                            @endphp
                                            {{ $is_admin }}
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#editUser{{ $loop->iteration }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#hapusUser{{ $loop->iteration }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    {{-- Modal Edit User --}}
                                    <x-form_modal>
                                        @slot('id', "editUser$loop->iteration")
                                        @slot('title', 'Edit Data User')
                                        @slot('route', route('user.update', $user->id))
                                        @slot('method') @method('put') @endslot
                                        @slot('btnPrimaryTitle', 'Perbarui')

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="name" class="form-control @error('nama') is-invalid @enderror"
                                                id="nama" name="nama" value="{{ old('nama', $user->nama) }}"
                                                autofocus required>
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror" id="username"
                                                name="username" value="{{ old('username', $user->username) }}" autofocus
                                                required>
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="is_admin" class="form-label">Role</label>
                                            <select class="form-select" id="is_admin" name="is_admin">
                                                @foreach ([1 => 'Admin', 0 => 'User'] as $bool => $role)
                                                    <option value="{{ $bool }}"
                                                        {{ old('is_admin', $user->is_admin) == $bool ? 'selected' : '' }}>
                                                        {{ $role }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </x-form_modal>
                                    {{-- / Modal Edit User --}}

                                    {{-- Modal Hapus User --}}
                                    <x-form_modal>
                                        @slot('id', "hapusUser$loop->iteration")
                                        @slot('title', 'Hapus Data User')
                                        @slot('route', route('user.destroy', $user->id))
                                        @slot('method') @method('delete') @endslot
                                        @slot('btnPrimaryClass', 'btn-outline-danger')
                                        @slot('btnSecondaryClass', 'btn-secondary')
                                        @slot('btnPrimaryTitle', 'Hapus')

                                        <p class="fs-5">Apakah anda yakin akan menghapus data user
                                            <b>{{ $user->nama }}</b>?
                                        </p>

                                    </x-form_modal>
                                    {{-- / Modal Hapus User  --}}

                                    @endforeach
                            </tbody>
                        </table>
                        {{-- / Tabel Data ... --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal Tambah User -->
        <x-form_modal>
            @slot('id', 'tambahUser')
            @slot('title', 'Tambah Data User')
            @slot('overflow', 'overflow-auto')
            @slot('route', route('user.store'))

            <div class="row">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="name" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        autofocus required>
                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                        name="username" autofocus required>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" autofocus required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="is_admin" class="form-label">Role</label>
                    <select class="form-select" id="is_admin" name="is_admin">
                        <option value="1" selected>Admin</option>
                        <option value="0">User</option>
                    </select>
                </div>
            </div>
        </x-form_modal>
        <!-- Akhir Modal Tambah User -->
@endsection

