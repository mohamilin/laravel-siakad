<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailPelajaran;
use App\Pelajaran;
use App\Nilai;
use App\Kelas;
use App\Siswa;
use App\Guru;

class DetailPelajaranController extends BaseController
{
    public function index() {
      $detail = DetailPelajaran::leftJoin('pelajaran', 'pelajaran.id_pelajaran', 'detail_pelajaran.id_pelajaran')
      ->leftJoin('kelas', 'kelas.id_kelas', 'detail_pelajaran.id_kelas')
      ->leftJoin('guru', 'guru.id_guru', 'detail_pelajaran.id_guru')
      ->get();

      return view('detailpelajaran.index')->with('detail', $detail);
    }

    public function create() {
      $pelajaran = Pelajaran::all();
      $kelas = Kelas::all();
      $guru = Guru::all();


      return view('detailpelajaran.create')
      ->with('pelajaran', $pelajaran)
      ->with('kelas', $kelas)
      ->with('guru', $guru);
    }

    public function store(Request $req) {
      $detail = new DetailPelajaran;
      $detail->id_pelajaran = $req->id_pelajaran;
      $detail->id_kelas = $req->id_kelas;
      $detail->id_guru = $req->id_guru;
      $detail->save();

      // $lastId = DetailPelajaran::orderBy('id_detail_pelajaran', 'DESC')->first();

      // $siswa = Siswa::where('id_kelas', $req->id_kelas)->get();
      // $semester  = [1, 2];

      
      // foreach($siswa as $s) {
      //   foreach($semester as $se) {
      //     $nilai = new Nilai;
      //     $nilai->semester = $se;
      //     $nilai->id_detail_pelajaran = $lastId->id_detail_pelajaran;
      //     $nilai->id_siswa = $s->id_siswa;
      //     $nilai->keterangan = '-';
      //     $nilai->save();
      //   }
      // }

      return redirect('/detail')->withSuccess('Detail Pelajaran berhasil ditambah!');
    }

    public function edit($id) {
      $pelajaran = Pelajaran::all();
      $kelas = Kelas::all();
      $guru = Guru::all();
      $detail = DetailPelajaran::findOrFail($id);


      return view('detailpelajaran.edit')
      ->with('detail', $detail)
      ->with('pelajaran', $pelajaran)
      ->with('kelas', $kelas)
      ->with('guru', $guru);
    }

    public function update(Request $req, $id) {
      $detail = DetailPelajaran::findOrFail($id);
      $detail->id_pelajaran = $req->id_pelajaran;
      $detail->id_kelas = $req->id_kelas;
      $detail->id_guru = $req->id_guru;
      $detail->save();

      return redirect('/detail')->withSuccess('Detail Pelajaran berhasil diupdate!');
    }

    public function destroy($id) {
      $detail = DetailPelajaran::findOrFail($id);
      $detail->delete();

      return redirect('/detail')->withSuccess('Detail Pelajaran berhasil dihapus!');
    }
}
