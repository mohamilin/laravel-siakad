@extends('layouts.app')

@section('page-name', 'nilai')
@section('title', 'Nilai - Tambah')
@section('content')
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 pb-3">
      <h3 class="mb-0">Ubah Nilai</h3>
      <h4 class="mt-1">Mapel : {{ $mapel->nama_pelajaran }}</h4>
      <h4 class="mt-1">Kelas : <span id="namakelas">{{ $kelas->kelas . ' ' . $kelas->jurusan }}</span></h4>
      <h4 class="mt-1">Tahun Ajaran : {{ $kelas->tahun_ajar }}</h4>
      <h4 class="mt-1">Semester : {{ Request()->semester }}</h4>
    </div>
    <form action="{{ url('/nilai/update/'. $nilai->id_nilai) }}" method="post">
      <div class="row">
        <div class="col-md-6">
          {{ csrf_field() }}
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Siswa</label>
            <select name="id_siswa" id="" class="form-control" readonly>
              @foreach ($siswa as $d)
                <option value="{{ $d->id_siswa }}" {{ ($nilai->id_siswa == $d->id_siswa) ? 'selected' : '' }}>{{ $d->nis . ' - '. $d->nama_siswa }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Nilai Tugas 1</label>
            <input type="text" class="form-control" name="nilai_tugas1" value="{{ $nilai->nilai_tugas1 }}" required>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Nilai Tugas 2</label>
            <input type="text" class="form-control" name="nilai_tugas2" value="{{ $nilai->nilai_tugas2 }}" required>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Nilai UTS</label>
            <input type="text" class="form-control" name="nilai_uts" value="{{ $nilai->nilai_uts }}" required>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Nilai UAS</label>
            <input type="text" class="form-control" name="nilai_uas" value="{{ $nilai->nilai_uas }}" required>
          </div>
          <input type="hidden" class="form-control" name="mapel" value="{{ Request()->mapel }}">
          <input type="hidden" class="form-control" name="kelas" value="{{ Request()->kelas }}">
          <input type="hidden" class="form-control" name="semester" value="{{ Request()->semester }}">
          <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Ubah</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
