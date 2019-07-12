<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\DetailPelajaran;
use App\Pelajaran;
use App\Siswa;
use App\Kelas;
use App\Nilai;
use App\Users;
use App\Guru;
use Session;


class AdminController extends BaseController
{
    public function dashboard() {
      if (Session::has('user_type')) {
        
        return view('dashboard');
      } else {
        return redirect('/login-admin');
      }
    }
    
    public function index(Request $req) {
      if ($req->query('kelas')) {
        $siswa = Siswa::where('id_kelas', $req->query('kelas'))->get();
        $kelas = Kelas::findOrFail($req->query('kelas'));

        return view('admin.result')
        ->with('siswa', $siswa)
        ->with('kelas', $kelas);
      } else {
        $kelas = Kelas::all();
  
        return view('admin.datasiswa')
        ->with('kelas', $kelas);
      }
    }

    public function nilai(Request $req) {
      if ($req->query('kelas') && $req->query('semester')) {
        
        $nilai = Nilai::leftJoin('siswa', 'siswa.id_siswa', 'nilai.id_siswa')
        ->leftJoin('kelas', 'kelas.id_kelas', 'siswa.id_kelas')
        ->where('kelas.id_kelas', $req->query('kelas'))
        ->where('nilai.semester', $req->query('semester'))
        ->get();

        $kelas = Kelas::where('id_kelas', $req->query('kelas'))->first();
        $mapel = Pelajaran::where('id_pelajaran', $req->query('mapel'))->first();
        
        return view('admin.nilai_result')
        ->with('nilai', $nilai)
        ->with('mapel', $mapel)
        ->with('kelas', $kelas);

      } else {
        $kelas = DetailPelajaran::select(['detail_pelajaran.id_kelas', 'kelas.kelas', 'kelas.jurusan', 'kelas.tahun_ajar'])
        ->leftJoin('kelas', 'kelas.id_kelas', 'detail_pelajaran.id_kelas')
        ->groupBy(['detail_pelajaran.id_kelas', 'kelas.kelas', 'kelas.jurusan', 'kelas.tahun_ajar'])
        ->get();

        $pelajaran = DetailPelajaran::select(['detail_pelajaran.id_pelajaran', 'pelajaran.nama_pelajaran'])
        ->leftJoin('pelajaran', 'pelajaran.id_pelajaran', 'detail_pelajaran.id_pelajaran')
        ->groupBy(['detail_pelajaran.id_pelajaran', 'pelajaran.nama_pelajaran'])
        ->get();
        
        // return $kelas;
        return view('admin.nilai')
        ->with('kelas', $kelas)
        ->with('pelajaran', $pelajaran);
      }
    }

    public function login_page() {
      return view('admin.login');
    }

    public function login(Request $request) {
      $admin = Users::where('username', $request->username)->first();
      

      if ($admin && Hash::check($request->password, $admin->password)) {
          Session::put('user_type', 'admin');
          Session::put('username_admin', $admin->username);
          Session::put('email_admin', $admin->email);
          Session::put('nama_admin', $admin->nama);
         

          return redirect('/');
      } else {
          return back()->withStatus('Username atau Password salah!');
      }
    }

    public function logout() {
      Session::flush();

      return redirect('/');
    }

}
