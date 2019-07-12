<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelajaran;
use App\Kelas;
use App\Siswa;
use App\Guru;
use Session;
use View;

class BaseController extends Controller
{
  public function __construct()
  {
    $guru_count = Guru::count();
    $kelas_count = Kelas::count();
    $siswa_count = Siswa::count();
    $pelajaran_count = Pelajaran::count();
    $siswa_img = Siswa::where('id_siswa', Session::get('id_siswa'))->first();

    // return Session::get('id_siswa');
    $all_count = [$guru_count, $kelas_count, $siswa_count, $pelajaran_count, $siswa_img];
    
    View::share('all_count', $all_count);
  }
}
