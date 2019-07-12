<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelajaran;

class PelajaranController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelajaran = Pelajaran::all();

        return view('pelajaran.index')->with('pelajaran', $pelajaran);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pelajaran = new Pelajaran;
        $pelajaran->nama_pelajaran = $request->nama;
        $pelajaran->keterangan = $request->keterangan;
        $pelajaran->save();

        return redirect('/pelajaran')->withSuccess('Pelajaran berhasil ditambah!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelajaran = Pelajaran::findOrFail($id);

        return view('pelajaran.edit')->with('pelajaran', $pelajaran);
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
        $pelajaran = Pelajaran::findOrFail($id);
        $pelajaran->nama_pelajaran = $request->nama;
        $pelajaran->keterangan = $request->keterangan;
        $pelajaran->save();

        return redirect('/pelajaran')->withSuccess('Pelajaran berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelajaran = Pelajaran::findOrFail($id);
        $pelajaran->delete();

        return redirect('/pelajaran')->withSuccess('Pelajaran berhasil dihapus!');
    }
}
