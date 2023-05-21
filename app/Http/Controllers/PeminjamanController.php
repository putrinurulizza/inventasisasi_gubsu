<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        $peminjamans = Peminjaman::with('detailsPeminjamans.barang')->latest()->get();
        return view(
            'dashboard.peminjaman.index',
            [
                'title' => 'Data Peminjaman',
                'peminjamans' => $peminjamans,
                'barangs' => $barangs,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedPeminjaman = $request->validate([
                'tgl_pinjam' => 'nullable',
                'tgl_kembali' => 'nullable',
                'nama_peminjam' => 'required|max:255',
                'bidang' => 'required|max:255',
                'keterangan' => 'nullable',
            ]);

            $validatedPeminjaman['tgl_pinjam'] = date('Y-m-d:H-m-s');
            $validatedPeminjaman['tgl_kembali'] = null;
            $validatedPeminjaman['status'] = 'pinjam';

            Peminjaman::create($validatedPeminjaman);

            $peminjamanTerbaru = Peminjaman::latest()->first();
            $idPeminjamanTerbaru = $peminjamanTerbaru->id;

            $validatedDePeminjaman = $request->validate([
                'id_barang' => 'required',
            ]);

            $validatedDePeminjaman['id_peminjaman'] = $idPeminjamanTerbaru;

            DetailPeminjaman::create($validatedDePeminjaman);
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('peminjaman.index')->with('failed', $exception->getMessage());
        }

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman, DetailPeminjaman $DePeminjaman)
    {

        try {
            $validatedPeminjaman = $request->validate([
                'tgl_pinjam' => 'nullable',
                'tgl_kembali' => 'nullable',
                'status' => 'required',
            ]);
            $validatedPeminjaman['tgl_kembali'] = date('Y-m-d:H-m-s');

            $peminjaman->update($validatedPeminjaman);

            $peminjamanTerbaru = Peminjaman::latest()->first();
            $idPeminjamanTerbaru = $peminjamanTerbaru->id;

            $validatedDePeminjaman = $request->validate([]);

            $validatedDePeminjaman['id_peminjaman'] = $idPeminjamanTerbaru;

            $DePeminjaman = new DetailPeminjaman();
            $DePeminjaman->update($validatedDePeminjaman);
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('peminjaman.index')->with('failed', $exception->getMessage());
        }

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman baru berhasil diUbah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
