@extends('layouts.app')

@section('page-name', 'guru')
@section('title', 'Guru - Tambah')
@section('content')
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 pb-3">
      <h3 class="mb-0">Tambah Guru</h3>
    </div>
    <form action="{{ url('/guru/store') }}" method="post">
      <div class="row">
        <div class="col-md-6">
          {{ csrf_field() }}
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">NIP</label>
            <div class="input-group input-group-alternative">
              <input class="form-control" type="number" name="nip" required>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Nama Guru</label>
            <div class="input-group input-group-alternative">
              <input class="form-control" type="text" name="nama_guru" required>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Jenis Kelamin</label>
            <div class="form-row">
              <div class="col">
                <div class="custom-control custom-radio">
                  <input type="radio" id="gender1" name="jenis_kelamin" value="Laki-Laki" class="custom-control-input">
                  <label class="custom-control-label" for="gender1">Laki-Laki</label>
                </div>
              </div>
              <div class="col">
                <div class="custom-control custom-radio">
                  <input type="radio" id="gender2" name="jenis_kelamin" value="Perempuan" class="custom-control-input">
                  <label class="custom-control-label" for="gender2">Perempuan</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">No. Telepon</label>
            <div class="input-group input-group-alternative">
              <input class="form-control" type="number" name="no_telepon" required>
            </div>
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Simpan</button>
        </div>
        <div class="col-md-6">
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Status</label>
            <div class="input-group input-group-alternative">
              <select name="status_aktif" class="form-control" required>
                <option value="Aktif">Aktif</option>
                <option value="Tidak Aktif">Tidak Aktif</option>
              </select>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Alamat</label>
            <div class="input-group input-group-alternative">
              <textarea name="alamat" class="form-control" required></textarea>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Password Akun</label>
            <div class="input-group input-group-alternative">
              <input class="form-control" type="password" name="password" required>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection