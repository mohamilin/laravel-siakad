<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Pelajaran;
use App\Kelas;
use App\Siswa;
use App\Guru;
use App\Nilai;
use Session;

class SiswaController extends BaseController
{
    public function index() {
      $siswa = Siswa::leftJoin('kelas', 'kelas.id_kelas', 'siswa.id_kelas')->get();

      return view('siswa.index')->with('siswa', $siswa);
    }

    public function create() {
      $kelas = Kelas::all();

      return view('siswa.create')->with('kelas', $kelas);
    }

    public function store(Request $req) {
      if ($req->has('foto')) {
        $file = $req->file('foto');
        $fileName = $file->getClientOriginalName();
        $file->move('images/', $fileName);

        $siswa = new Siswa;
        $siswa->nis = $req->nis;
        $siswa->nama_siswa = $req->nama_siswa;
        $siswa->jenis_kelamin = $req->jenis_kelamin;
        $siswa->agama = $req->agama;
        $siswa->tempat_lahir = $req->tempat_lahir;
        $siswa->tgl_lahir = $req->tgl_lahir;
        $siswa->alamat = $req->alamat;
        $siswa->no_telepon = $req->no_telepon;
        $siswa->id_kelas = $req->id_kelas;
        $siswa->status = $req->status;
        $siswa->password = Hash::make($req->password);
        $siswa->foto = $fileName;
        $siswa->save();

      } else {
        $siswa = new Siswa;
        $siswa->nis = $req->nis;
        $siswa->nama_siswa = $req->nama_siswa;
        $siswa->jenis_kelamin = $req->jenis_kelamin;
        $siswa->agama = $req->agama;
        $siswa->tempat_lahir = $req->tempat_lahir;
        $siswa->tgl_lahir = $req->tgl_lahir;
        $siswa->alamat = $req->alamat;
        $siswa->no_telepon = $req->no_telepon;
        $siswa->id_kelas = $req->id_kelas;
        $siswa->status = $req->status;
        $siswa->password = Hash::make($req->password);
        $siswa->foto = 'default.jpg';

        $siswa->save();
      }
      return redirect('/siswa')->withSuccess('Data Siswa berhasil ditambah!');
    }

    public function edit($id) {
      $siswa = Siswa::findOrFail($id);
      $kelas = Kelas::all();

      return view('siswa.edit')->with('siswa', $siswa)->with('kelas', $kelas);
    }

    public function update(Request $req, $id) {

      $siswa = Siswa::findOrFail($id);
      $siswa->nis = $req->nis;
      $siswa->nama_siswa = $req->nama_siswa;
      $siswa->jenis_kelamin = $req->jenis_kelamin;
      $siswa->agama = $req->agama;
      $siswa->tempat_lahir = $req->tempat_lahir;
      $siswa->tgl_lahir = $req->tgl_lahir;
      $siswa->alamat = $req->alamat;
      $siswa->no_telepon = $req->no_telepon;
      $siswa->id_kelas = $req->id_kelas;
      $siswa->status = $req->status;

      if ($req->has('foto')) {
        $file = $req->file('foto');
        $fileName = $file->getClientOriginalName();
        $file->move('images/', $fileName);
        $siswa->foto = $fileName;
      } else {
        $siswa->foto = 'default.jpg';
      }

      if ($req->has('password')) {
        $siswa->password = Hash::make($req->password);
      }

      $siswa->update();

      if ($req->has('profile_update')) {
        return redirect('/siswa/myprofile')->withSuccess('Profil berhasil diupdate!');
      } else {
        return redirect('/siswa')->withSuccess('Data Siswa berhasil diupdate!');
      }

    }

    public function destroy($id) {
      $siswa = Siswa::findOrFail($id);
      $siswa->delete();

      
      return redirect('/siswa')->withSuccess('Data Siswa berhasil dihapus!');
    }

    public function nilai() {
      $nilai = Nilai::where('id_siswa', Session::get('id_siswa'))
      ->leftJoin('detail_pelajaran', 'detail_pelajaran.id_detail_pelajaran', 'nilai.id_detail_pelajaran')
      ->leftJoin('pelajaran', 'pelajaran.id_pelajaran', 'detail_pelajaran.id_pelajaran')
      ->get();

      return view('siswa.nilai')
      ->with('nilai', $nilai);
    }

    public function profile() {
      $siswa = Siswa::findOrFail(Session::get('id_siswa'));
      $kelas = Kelas::all();

      return view('siswa.myprofile')
      ->with('siswa', $siswa)
      ->with('kelas', $kelas);
    }

    public function login_page() {
      return view('siswa.login');
    }

    public function login(Request $request) {
      $siswa = Siswa::where('nis', $request->nis)->first();

      if ($siswa && Hash::check($request->password, $siswa->password)) {
          Session::put('user_type', 'siswa');
          Session::put('id_siswa', $siswa->id_siswa);
          Session::put('foto_siswa', $siswa->foto);
          Session::put('nama_siswa', $siswa->nama_siswa);

          return redirect('/');
      } else {
          return back()->withSuccess('Username atau Password salah!');
      }
    }

    public function logout() {
      Session::flush();

      return redirect('/');
    }
}
