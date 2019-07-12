<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AdminController@dashboard');

Route::group(['middleware' => ['admin']], function(){
  //Pelajaran
  Route::get('/pelajaran', 'PelajaranController@index');
  Route::get('/pelajaran/tambah', 'PelajaranController@create');
  Route::post('/pelajaran/store', 'PelajaranController@store');
  Route::get('/pelajaran/ubah/{id}', 'PelajaranController@edit');
  Route::post('/pelajaran/update/{id}', 'PelajaranController@update');
  Route::post('/pelajaran/hapus/{id}', 'PelajaranController@destroy');

  // Guru
  Route::get('/guru', 'GuruController@index');
  Route::get('/guru/tambah', 'GuruController@create');
  Route::post('/guru/store', 'GuruController@store');
  Route::get('/guru/ubah/{id}', 'GuruController@edit');
  Route::post('/guru/update/{id}', 'GuruController@update');
  Route::post('/guru/hapus/{id}', 'GuruController@destroy');
  
  //Kelas
  Route::get('/kelas', 'KelasController@index');
  Route::get('/kelas/tambah', 'KelasController@create');
  Route::post('/kelas/store', 'KelasController@store');
  Route::get('/kelas/ubah/{id}', 'KelasController@edit');
  Route::post('/kelas/update/{id}', 'KelasController@update');
  Route::post('/kelas/hapus/{id}', 'KelasController@destroy');

  //Siswa
  Route::get('/siswa', 'SiswaController@index');
  Route::get('/siswa/tambah', 'SiswaController@create');
  Route::post('/siswa/store', 'SiswaController@store');
  Route::get('/siswa/ubah/{id}', 'SiswaController@edit');
  Route::post('/siswa/update/{id}', 'SiswaController@update');
  Route::post('/siswa/hapus/{id}', 'SiswaController@destroy');

  //Detail Pelajaran
  Route::get('/detail', 'DetailPelajaranController@index');
  Route::get('/detail/tambah', 'DetailPelajaranController@create');
  Route::post('/detail/store', 'DetailPelajaranController@store');
  Route::get('/detail/ubah/{id}', 'DetailPelajaranController@edit');
  Route::post('/detail/update/{id}', 'DetailPelajaranController@update');
  Route::post('/detail/hapus/{id}', 'DetailPelajaranController@destroy');

  //Admin
  Route::get('/data-siswa', 'AdminController@index');
  Route::get('/admin/nilai', 'AdminController@nilai');
});

Route::group(['middleware' => ['guru']], function() {
  Route::get('/guru/myprofile', 'GuruController@profile');

  // Nilai
  Route::get('/nilai', 'GuruController@nilai_page');
  Route::get('/nilai/tambah', 'GuruController@add_nilai');
  Route::post('/nilai/store', 'GuruController@store_nilai');
  Route::get('/nilai/ubah/{id}', 'GuruController@edit_nilai');
  Route::post('/nilai/update/{id}', 'GuruController@update_nilai');
  Route::post('/nilai/hapus/{id}', 'GuruController@destroy_nilai');
});

Route::group(['middleware' => ['siswa']], function() {
  Route::get('/siswa/myprofile', 'SiswaController@profile');
  Route::get('/siswa/nilai', 'SiswaController@nilai');
});

//Login
Route::get('/login-admin', 'AdminController@login_page');
Route::get('/login-guru', 'GuruController@login_page');
Route::get('/login-siswa', 'SiswaController@login_page');
Route::post('/login-admin', 'AdminController@login');
Route::post('/login-guru', 'GuruController@login');
Route::post('/login-siswa', 'SiswaController@login');
Route::post('/logout-admin', 'AdminController@logout');

