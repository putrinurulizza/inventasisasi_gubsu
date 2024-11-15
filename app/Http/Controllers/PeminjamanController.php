<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;


class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $barangs = Barang::where('status', '!=', 1)->get();
        $peminjamans = Peminjaman::with('detailsPeminjamans', 'detailsPeminjamans.barang')->latest()->get();

        return view('dashboard.peminjaman.index', [
            'title' => 'Data Peminjaman',
            'peminjamans' => $peminjamans,
            'barangs' => $barangs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = Barang::where('status', '!=', 1)->get();

        return view('dashboard.peminjaman.create', [
            'title' => 'Tambah Peminjaman Baru',
            'barangs' => $barangs
        ]);
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

            $validatedPeminjaman['tgl_pinjam'] = date('Y-m-d:H-i-s');
            $validatedPeminjaman['tgl_kembali'] = null;


            Peminjaman::create($validatedPeminjaman);

            $peminjamanTerbaru = Peminjaman::latest()->first();
            $idPeminjamanTerbaru = $peminjamanTerbaru->id;

            $validatedDePeminjaman = $request->validate([
                'id_barang' => 'required',
                'hbs_pakai' => 'required',
            ]);

            $validatedDePeminjaman['status_detail'] = 1;
            $validatedDePeminjaman['id_peminjaman'] = $idPeminjamanTerbaru;

            DetailPeminjaman::create($validatedDePeminjaman);

            $DePeminjamanTerbaru = DetailPeminjaman::latest()->first();
            $idBarangDePeminjamanTerbaru = $DePeminjamanTerbaru->id_barang;
            $validatedBarang['status'] = 1;
            Barang::where('id', $idBarangDePeminjamanTerbaru)->update(['status' => $validatedBarang['status']]);
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
            ]);
            $validatedPeminjaman['tgl_kembali'] = date('Y-m-d:H-i-s');

            $peminjaman->update($validatedPeminjaman);

            $peminjamans = Peminjaman::latest()->first();
            $validatedDePeminjaman['status_detail'] = 0;
            $DePeminjaman->where('id_peminjaman', $peminjamans->id)->update($validatedDePeminjaman);

            $DePeminjamanTerbaru = DetailPeminjaman::latest()->first();
            $validatedBarang['status'] = 0;
            Barang::where('id', $DePeminjamanTerbaru->id_barang)->update($validatedBarang);
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('peminjaman.index')->with('failed', $exception->getMessage());
        }

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman barang telah dikembalikan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
