@extends('layouts.app')

@section('page-name', 'siswa')
@section('title', 'Siswa - Edit')
@section('content')
@php
    $agama = ['Islam', 'Kristen', 'Katholik', 'Hindu', 'Buddha', 'Kong Hu Chu'];
    $status = ['Aktif', 'Tidak Aktif'];
@endphp
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 pb-3">
      <h3 class="mb-0">Ubah Siswa</h3>
    </div>
    <form action="{{ url('/siswa/update/' . $siswa->id_siswa) }}" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-6">
          {{ csrf_field() }}
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">NIS</label>
            <div class="input-group input-group-alternative">
              <input class="form-control" type="number" name="nis" value="{{ $siswa->nis }}" required>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Nama Siswa</label>
            <div class="input-group input-group-alternative">
              <input class="form-control" type="text" name="nama_siswa" value="{{ $siswa->nama_siswa }}" required>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Jenis Kelamin</label>
            <div class="form-row">
              @php
                  $jenkel = ['Laki-Laki', 'Perempuan'];
              @endphp
              @foreach ($jenkel as $j)
                <div class="col">
                  <div class="custom-control custom-radio">
                    <input type="radio" id="gender{{ $loop->iteration }}" name="jenis_kelamin" value="{{ $j }}" class="custom-control-input" {{ ($j == $siswa->jenis_kelamin) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="gender{{ $loop->iteration }}">{{ $j }}</label>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Tempat Lahir</label>
            <div class="input-group input-group-alternative">
              <input class="form-control" type="text" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}" required>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Tanggal Lahir</label>
            <div class="input-group input-group-alternative">
              <input class="form-control" type="date" name="tgl_lahir" value="{{ $siswa->tgl_lahir }}" required>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Alamat</label>
            <div class="input-group input-group-alternative">
              <textarea name="alamat" class="form-control" required>{{ $siswa->alamat }}</textarea>
            </div>
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Simpan</button>
        </div>
        <div class="col-md-6">
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">No. Telepon</label>
            <div class="input-group input-group-alternative">
            <input class="form-control" type="number" name="no_telepon" value="{{ $siswa->no_telepon }}" required>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Agama</label>
            <div class="input-group input-group-alternative">
              <select name="agama" class="form-control" required>
                @foreach ($agama as $d)
                  <option value="{{ $d }}" {{ ($d == $siswa->agama) ? 'selected' : '' }}>{{ $d }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Status</label>
            <div class="input-group input-group-alternative">
              <select name="status" class="form-control" required>
                @foreach ($status as $d)
                  <option value="{{ $d }}" {{ ($d == $siswa->status) ? 'selected' : '' }}>{{ $d }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Foto</label>
            <div class="mb-2 d-flex justify-content-center foto">
              <img src="{{ asset('images/' . $siswa->foto) }}" alt="">
            </div>
            <div class="input-group input-group-alternative">
              <input type="file" class="form-control" name="foto">
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Kelas</label>
            <div class="input-group input-group-alternative">
              <select name="id_kelas" class="form-control" required>
                @foreach ($kelas as $d)
                  <option value="{{ $d->id_kelas }}" {{ ($d->id_kelas == $siswa->id_kelas) ? 'selected' : '' }}>{{ $d->tahun_ajar.' - '.$d->kelas.' '.$d->jurusan }}</option>  
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection