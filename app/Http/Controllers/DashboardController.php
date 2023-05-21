<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kategoriBarangs = [];

        // Ambil semua kategori barang yang tersedia
        $kategoris = Kategori::all();

        // Loop melalui setiap kategori barang
        foreach ($kategoris as $kategori) {
            $jumlahBarang = Barang::where('id_kategori', $kategori->id)->count();

            // Buat array untuk setiap kategori barang
            $kategoriBarangs[] = [
                'nama_kategori' => $kategori->kategori,
                'jumlah_barang' => $jumlahBarang,
            ];
        }

        return view('dashboard.index', compact('kategoriBarangs'));
    }
}
