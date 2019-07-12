@extends('layouts.app')

@section('page-name', 'pelajaran')
@section('title', 'Pelajaran - Tambah')
@section('content')
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 pb-3">
      <h3 class="mb-0">Tambah Pelajaran</h3>
    </div>
    <form action="{{ url('/pelajaran/store') }}" method="post">
      {{ csrf_field() }}
      <div class="form-group mb-3">
        <div class="input-group input-group-alternative">
          <input class="form-control" placeholder="Nama Mata pelajaran" type="text" name="nama" required>
        </div>
      </div>
      <div class="form-group mb-3">
        <div class="input-group input-group-alternative">
          <textarea name="keterangan" class="form-control" placeholder="Keterangan" required></textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Simpan</button>
    </form>
  </div>
</div>
@endsection