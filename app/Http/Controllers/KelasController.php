<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;

class KelasController extends BaseController
{
    public function index() {
      $kelas = Kelas::all();

      return view('kelas.index')->with('kelas', $kelas);
    }

    public function create() {

      return view('kelas.create');
    }

    public function store(Request $req) {

      $kelas = new Kelas;
      $kelas->tahun_ajar = $req->tahun_ajaran . '/'. intval($req->tahun_ajaran + 1);
      $kelas->kelas = $req->kelas;
      $kelas->jurusan = $req->jurusan;
      $kelas->status_aktif = $req->status_aktif;
      $kelas->save();
      
      return redirect('/kelas')->withSuccess('Data Kelas berhasil ditambah!');
    }

    public function edit($id) {
      $kelas = Kelas::findOrFail($id);
      $tahun_ajaran = explode('/', $kelas->tahun_ajar);

      
      return view('kelas.edit')->with('kelas', $kelas)->with('tahun_ajaran', $tahun_ajaran[0]);
    }

    public function update(Request $req, $id) {
      $kelas = Kelas::findOrFail($id);
      $kelas->tahun_ajar = $req->tahun_ajaran . '/'. intval($req->tahun_ajaran + 1);
      $kelas->kelas = $req->kelas;
      $kelas->jurusan = $req->jurusan;
      $kelas->status_aktif = $req->status_aktif;
      $kelas->update();

      return redirect('/kelas')->withSuccess('Data Kelas berhasil diubah!');
    }

    public function destroy($id) {
      $kelas = Kelas::findOrFail($id);
      $kelas->delete();

      return redirect('/kelas')->withSuccess('Data Kelas berhasil dihapus!');
    }
}
