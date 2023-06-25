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
            if ($kategori->kategori == "Habis Pakai") {
                $jumlahBarang1 = Barang::whereHas('kategori', function ($query) {
                    $query->where('kategori', 'Habis Pakai');
                })->where('status', 1)->count();
                $jumlahBarang2 = Barang::whereHas('kategori', function ($query) {
                    $query->where('kategori', 'Habis Pakai');
                })->count();
                $jumlahBarang = $jumlahBarang2 - $jumlahBarang1;
            } else {
                $jumlahBarang = Barang::where('id_kategori', $kategori->id)->count();
            }
            // Buat array untuk setiap kategori barang
            $kategoriBarangs[] = [
                'nama_kategori' => $kategori->kategori,
                'jumlah_barang' => $jumlahBarang,
            ];
        }

        return view('dashboard.index', compact('kategoriBarangs'));
    }
}
