<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kategori.index',
        [
            'title' => 'Data Kategori',
            'kategoris' =>  Kategori::all()
        ]);
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
            $validatedData = $request->validate([
                'kategori' => 'required|unique:kategoris'
            ]);
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('kategori.index')->with('failed', $exception->getMessage());
        }

        $validatedData = $request->validate([
            'kategori' => 'required|unique:kategoris'
        ]);

        Kategori::create($validatedData);

        return redirect()->route('kategori.index')->with('success', 'Kategori baru berhasil ditambahkan!');
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
    public function update(Request $request, Kategori $kategori)
    {
        try {
            $rules =[
                'kategori' => 'required|unique:kategoris,kategori,' . $kategori->id,
            ];

            $validatedData = $request->validate($rules);

            Kategori::where('id', $kategori->id)->update($validatedData);

            return redirect()->route('kategori.index')->with('success', "Data kategori $kategori->kategori berhasil diperbarui!");
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('kategori.index')->with('failed', 'Data gagal diperbarui! ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        try {
            Kategori::destroy($kategori->id);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                //SQLSTATE[23000]: Integrity constraint violation
                return redirect()->route('kategori.index')->with('failed', "Kategori $kategori->kategori tidak dapat dihapus, karena sedang digunakan pada tabel lain!");
            }
        }

        return redirect()->route('kategori.index')->with('success', "Kategori $kategori->kategori berhasil dihapus!");
    }
}
