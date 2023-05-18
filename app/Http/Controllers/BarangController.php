<?php

namespace App\Http\Controllers;


use App\Models\Kategori;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::with('kategori')->get();
        $kategoris = Kategori::all();

        return view('dashboard.barang.index', [
            'title' => 'Data Barang',
            'kategoris' => $kategoris,
            'barangs' => $barangs,
        ]);

        // $barangs = Barang::all();
        // return view('dashboard.barang.index',
        // [
        //     'title' => 'Data Barang',
        //     'kategoris' => Kategori::all(),
        //     'barangs' => Barang::with('kategori')->where('id_kategori')->get(),
        //     'spesifikasibarangs' => SpesifikasiBarang::with('barang')->where('id_barang')->get(),
        // ])->with(compact('barangs'));
        // ;
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
        $validatedData = $request->validate([
            'kode_barang' => 'required|max:255|unique:barangs',
            'id_kategori' => 'required',
            'deskripsi_barang' => 'required|max:255',
            'serial_number' => 'required|unique:barangs',
            'lokasi_user' => 'required',
            'tahun_pengadaan' => 'nullable',
            'keterangan' => 'nullable',
            'kondisi_barang' => 'required'
        ]);

        Barang::create($validatedData);

        return redirect()->route('barang.index')->with('success', 'Barang baru berhasil ditambahkan!');
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
    public function update(Request $request, Barang $barang)
    {
        $rules = [
            'kode_barang' => 'required|max:255|unique:barangs,kode_barang,' . $barang->id,
            'id_kategori' => 'required',
            'deskripsi_barang' => 'required|max:255',
            'serial_number' => 'required|unique:barangs,serial_number,' . $barang->id,
            'lokasi_user' => 'required',
            'tahun_pengadaan' => 'nullable',
            'keterangan' => 'nullable',
            'kondisi_barang' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $barang->update($validatedData);
        // Barang::where('id', $barang->id)->update($validatedData);

        return redirect()->route('barang.index')->with('success', "Data barang $barang->deskripsi_barang berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        try {
            Barang::destroy($barang->id);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                //SQLSTATE[23000]: Integrity constraint violation
                return redirect()->route('barang.index')->with('failed', "Barang $barang->deskripsi_barang tidak dapat dihapus, karena sedang digunakan pada tabel lain!");
            }
        }

        return redirect()->route('barang.index')->with('success', "Barang $barang->deskripsi_barang berhasil dihapus!");
    }
}
