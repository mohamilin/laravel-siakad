<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\DetailPelajaran;
use App\Pelajaran;
use App\Nilai;
use App\Kelas;
use App\Siswa;
use App\Guru;
use Session;

class GuruController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::all();

        return view('guru.index')
        ->with('guru', $guru);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guru = new Guru;
        $guru->nip = $request->nip;
        $guru->nama_guru = $request->nama_guru;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->alamat = $request->alamat;
        $guru->no_telepon = $request->no_telepon;
        $guru->status_aktif = $request->status_aktif;
        $guru->password = Hash::make($request->password);
        $guru->save();

        return redirect('/guru')->withSuccess('Data Guru berhasil ditambah!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        
        return view('guru.edit')->with('guru', $guru);
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
        if ($request->has('profile_update')) {
          if ($request->has('password')) {
            $guru = Guru::findOrFail($id);
            $guru->nip = $request->nip;
            $guru->nama_guru = $request->nama_guru;
            $guru->jenis_kelamin = $request->jenis_kelamin;
            $guru->alamat = $request->alamat;
            $guru->no_telepon = $request->no_telepon;
            $guru->status_aktif = $request->status_aktif;
            $guru->password = Hash::make($request->password);
            $guru->update();
            
          } else {
            $guru = Guru::findOrFail($id);
            $guru->nip = $request->nip;
            $guru->nama_guru = $request->nama_guru;
            $guru->jenis_kelamin = $request->jenis_kelamin;
            $guru->alamat = $request->alamat;
            $guru->no_telepon = $request->no_telepon;
            $guru->status_aktif = $request->status_aktif;
            $guru->update();
          }


          return redirect('/guru/myprofile')->withSuccess('Profile berhasil diubah!');
        } else {
          
          $guru = Guru::findOrFail($id);
          $guru->nip = $request->nip;
          $guru->nama_guru = $request->nama_guru;
          $guru->jenis_kelamin = $request->jenis_kelamin;
          $guru->alamat = $request->alamat;
          $guru->no_telepon = $request->no_telepon;
          $guru->status_aktif = $request->status_aktif;
          $guru->update();
          
          return redirect('/guru')->withSuccess('Data Guru berhasil diubah!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect('/guru')->withSuccess('Data Guru berhasil dihapus!');
    }

    public function nilai_page(Request $req) {
      if ($req->query('kelas') && $req->query('semester')) {
        
        $nilai = Nilai::leftJoin('siswa', 'siswa.id_siswa', 'nilai.id_siswa')
        ->leftJoin('kelas', 'kelas.id_kelas', 'siswa.id_kelas')
        ->where('kelas.id_kelas', $req->query('kelas'))
        ->where('nilai.semester', $req->query('semester'))
        ->get();

        $kelas = Kelas::where('id_kelas', $req->query('kelas'))->first();
        $mapel = Pelajaran::where('id_pelajaran', $req->query('mapel'))->first();
        
        return view('nilai.result')
        ->with('nilai', $nilai)
        ->with('mapel', $mapel)
        ->with('kelas', $kelas);

      } else {
        $kelas = DetailPelajaran::where('id_guru', Session::get('id_guru'))
        ->leftJoin('kelas', 'kelas.id_kelas', 'detail_pelajaran.id_kelas')
        ->leftJoin('pelajaran', 'pelajaran.id_pelajaran', 'detail_pelajaran.id_pelajaran')
        ->get();

        
        return view('nilai.index')
        ->with('kelas', $kelas);
      }

      // $kelas = Kelas::all();

      // return view('nilai.index')->with('nilai', $nilai)->with('kelas', $kelas);
    }

    public function add_nilai(Request $req) {
      $kelas = Kelas::where('id_kelas', $req->query('kelas'))->first();
      $mapel = Pelajaran::where('id_pelajaran', $req->query('mapel'))->first();
      $semester = $req->query('semester');
      $siswa = Siswa::where('id_kelas', $req->query('kelas'))->get();

      return view('nilai.create')
      ->with('siswa', $siswa)
      ->with('kelas', $kelas)
      ->with('mapel', $mapel)
      ->with('semester', $semester);
    }

    public function store_nilai(Request $req) {
      $detail = DetailPelajaran::where('id_pelajaran', $req->mapel)
      ->where('id_kelas', $req->kelas)
      ->where('id_guru', Session::get('id_guru'))->first();

      $nilai = new Nilai;
      $nilai->semester = $req->semester;
      $nilai->id_detail_pelajaran = $detail->id_detail_pelajaran;
      $nilai->id_siswa = $req->id_siswa;
      $nilai->nilai_tugas1 = $req->nilai_tugas1;
      $nilai->nilai_tugas2 = $req->nilai_tugas2;
      $nilai->nilai_uts = $req->nilai_uts;
      $nilai->nilai_uas = $req->nilai_uas;
      $nilai->keterangan = $req->keterangan;
      $nilai->save();

      return redirect('/nilai?kelas='.$req->kelas.'&mapel='.$req->mapel.'&semester='.$req->semester)->withSuccess('Nilai berhasil ditambah!');
    }

    public function edit_nilai(Request $req, $id) {
      $nilai = Nilai::findOrFail($id);
      $kelas = Kelas::where('id_kelas', $req->query('kelas'))->first();
      $mapel = Pelajaran::where('id_pelajaran', $req->query('mapel'))->first();
      $semester = $req->query('semester');
      $siswa = Siswa::where('id_kelas', $req->query('kelas'))->get();

      return view('nilai.edit')
      ->with('nilai', $nilai)
      ->with('siswa', $siswa)
      ->with('kelas', $kelas)
      ->with('mapel', $mapel)
      ->with('semester', $semester);
    }

    public function update_nilai(Request $req, $id) {
      $detail = DetailPelajaran::where('id_pelajaran', $req->mapel)
      ->where('id_kelas', $req->kelas)
      ->where('id_guru', Session::get('id_guru'))->first();

      $nilai = Nilai::findOrFail($id);
      $nilai->semester = $req->semester;
      $nilai->id_detail_pelajaran = $detail->id_detail_pelajaran;
      $nilai->id_siswa = $req->id_siswa;
      $nilai->nilai_tugas1 = $req->nilai_tugas1;
      $nilai->nilai_tugas2 = $req->nilai_tugas2;
      $nilai->nilai_uts = $req->nilai_uts;
      $nilai->nilai_uas = $req->nilai_uas;
      $nilai->keterangan = $req->keterangan;
      $nilai->update();

      return redirect('/nilai?kelas='.$req->kelas.'&mapel='.$req->mapel.'&semester='.$req->semester)->withSuccess('Nilai berhasil diubah!');
    }

    public function destroy_nilai($id) {
      $nilai = Nilai::findOrFail($id);
      $nilai->delete();

      return back()->withSuccess('Nilai berhasil dihapus!');
    }

    public function profile() {
      $guru = Guru::findOrFail(Session::get('id_guru'));

      return view('guru.myprofile')
      ->with('guru', $guru);
    }

    public function login_page() {
      return view('guru.login');
    }

    public function login(Request $request) {
      $guru = Guru::where('nip', $request->nip)->first();

      if ($guru && Hash::check($request->password, $guru->password)) {
          Session::put('user_type', 'guru');
          Session::put('id_guru', $guru->id_guru);
          Session::put('nip_guru', $guru->nip);
          Session::put('jenkel_guru', $guru->jenis_kelamin);
          Session::put('alamat_guru', $guru->alamat);
          Session::put('telepon_guru', $guru->no_telepon);
          Session::put('nama_guru', $guru->nama_guru);

          return redirect('/');
      } else {
          return redirect('/login-guru')->withSuccess('Username atau Password salah!');
      }
    }

    public function logout() {
      Session::flush();

      return redirect('/login-guru');
    }
}
