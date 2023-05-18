<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        return view('dashboard.index', [
            'tool_network' => Barang::where('id_kategori', '8')->get()->count(),
            'storage' => Barang::where('id_kategori', '2')->get()->count(),
            'multimedia' => Barang::where('id_kategori', '3')->get()->count(),
            'habis_pakai' => Barang::where('id_kategori', '4')->get()->count(),
            'pc' => Barang::where('id_kategori', '5')->get()->count(),
            'access_point' => Barang::where('id_kategori', '6')->get()->count(),
            'switch' => Barang::where('id_kategori', '1')->get()->count(),
            'router' => Barang::where('id_kategori', '8')->get()->count()
        ]);

    }
}
