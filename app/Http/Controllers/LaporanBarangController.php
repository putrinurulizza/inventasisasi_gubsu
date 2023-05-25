<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Barang;
use Carbon\Carbon;
use Illuminate\Http\Request;

use DataTables;

class LaporanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $kategoris = Kategori::all();
        $laporans = Barang::all();
        return view(
            'dashboard.laporan-barang.index',
            [
                'title' => 'Laporan Barang',
                'laporans' => Barang::with('kategori')->where('id_kategori')->latest()->get()
            ]
        )->with(compact('laporans', 'kategoris'));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dt_laporan(Request $request)
    {
        if ($request->get('minDate') != '' && $request->get('maxDate') != '' && $request->get('kategori') != '') {

            $mindate = $request->get('minDate');
            $maxdate = $request->get('maxDate');

            $data = Barang::with('kategori')->where('id_kategori', $request->get('kategori'))->whereBetween('created_at', [$mindate, $maxdate])->get();
        } else if ($request->get('minDate') != '' && $request->get('maxDate') != '' && $request->get('kategori') == '') {

            $mindate = $request->get('minDate');
            $maxdate = $request->get('maxDate');

            $data = Barang::with('kategori')->whereBetween('created_at', [$mindate, $maxdate])->get();
        } else if ($request->get('minDate') != '' && $request->get('maxDate') == '' && $request->get('kategori') != '') {
            $data = Barang::with('kategori')->where('id_kategori',  $request->get('kategori'))->where('created_at', 'like',  $request->get('minDate') . '%')->get();
        } else if ($request->get('minDate') != '' && $request->get('maxDate') == '' && $request->get('kategori') == '') {
            $data = Barang::with('kategori')->where('created_at', 'like',  $request->get('minDate') . '%')->get();
        } else if ($request->get('minDate') == '' && $request->get('maxDate') == '' && $request->get('kategori') != '') {
            $data = Barang::with('kategori')->where('id_kategori',  $request->get('kategori'))->get();
        } else {
            $data = Barang::with('Kategori')->get();
        }

        // dd($data);

        return DataTables::of($data)->make(true);
    }
}
