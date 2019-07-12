@extends('layouts.app')

@section('page-name', 'guru')
@section('title', 'Guru - Profil')
@section('content')
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 pb-3">
      <h3 class="mb-0">Profil</h3>
    </div>
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <form action="{{ url('/guru/update/' . $guru->id_guru) }}" method="post">
      <div class="row">
        <div class="col-md-6">
          {{ csrf_field() }}
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">NIP</label>
            <div class="input-group input-group-alternative">
              <input class="form-control" type="number" name="nip" value="{{ $guru->nip }}" required>
            </div>
            <input type="hidden" name="profile_update" value="guru">
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Nama Guru</label>
            <div class="input-group input-group-alternative">
              <input class="form-control" type="text" name="nama_guru" value="{{ $guru->nama_guru }}"  required>
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
                    <input type="radio" id="gender{{ $loop->iteration }}" name="jenis_kelamin" value="{{ $j }}" class="custom-control-input" {{ ($j == $guru->jenis_kelamin) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="gender{{ $loop->iteration }}">{{ $j }}</label>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">No. Telepon</label>
            <div class="input-group input-group-alternative">
              <input class="form-control" type="number" name="no_telepon" value="{{ $guru->no_telepon }}" required>
            </div>
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah</button>
        </div>
        <div class="col-md-6">
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Status</label>
            <div class="input-group input-group-alternative">
              <select name="status_aktif" class="form-control" required>
                @php
                    $status = ['Aktif', 'Tidak Aktif'];
                @endphp
                @foreach ($status as $s)
                  <option value="{{ $s }}" {{ ($s == $guru->status_aktif) ? 'selected' : '' }}>{{ $s }}</option>  
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Alamat</label>
            <div class="input-group input-group-alternative">
              <textarea name="alamat" class="form-control" required>{{ $guru->alamat }}</textarea>
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