<?php

namespace App\Http\Controllers;

use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class LaporanPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DetailPeminjaman $peminjaman)
    {
        $laporans = Peminjaman::with('detailsPeminjamans')->latest()->get();

        return view(
            'dashboard.laporan-peminjaman.index',
            [
                'title' => 'Laporan Peminjaman'
            ]
        )->with(compact('laporans'));
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

    // public function dt_laporan(Request $request)
    // {
    //     if ($request->get('minDate') != '' && $request->get('maxDate') != '') {

    //         $mindate = $request->get('minDate');
    //         $maxdate = $request->get('maxDate');

    //         $data = Peminjaman::with('detailsPeminjamans')->whereBetween('created_at', [$mindate, $maxdate])->get();
    //     } else if ($request->get('minDate') != '' && $request->get('maxDate') == '') {
    //         $data = Peminjaman::with('detailsPeminjamans')->where('created_at', 'like',  $request->get('minDate') . '%')->get();
    //     } else if ($request->get('minDate') == '' && $request->get('maxDate') == '') {
    //         $data = Peminjaman::with('detailsPeminjamans')->get();
    //     } else {
    //         $data = Peminjaman::with('detailsPeminjamans')->get();
    //     }

    //     dd($data);

    //     return DataTables::of($data)->make(true);
    // }
}
