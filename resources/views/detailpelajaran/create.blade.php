@extends('layouts.app')

@section('page-name', 'detail pelajaran')
@section('title', 'Detail Pelajaran - Tambah')
@section('content')
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 pb-3">
      <h3 class="mb-0">Tambah Detail Pelajaran</h3>
    </div>
    <form action="{{ url('/detail/store') }}" method="post">
      <div class="row">
        <div class="col-md-6">
          {{ csrf_field() }}
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Pelajaran</label>
            <select name="id_pelajaran" id="" class="form-control" required>
              @foreach ($pelajaran as $d)
                <option value="{{ $d->id_pelajaran }}">{{ $d->nama_pelajaran }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Kelas</label>
            <select name="id_kelas" id="" class="form-control" required>
              @foreach ($kelas as $d)
                <option value="{{ $d->id_kelas }}">{{ $d->tahun_ajar.' - '.$d->kelas.' '.$d->jurusan }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Guru</label>
            <select name="id_guru" id="" class="form-control" required>
              @foreach ($guru as $d)
                <option value="{{ $d->id_guru }}">{{ $d->nama_guru }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection