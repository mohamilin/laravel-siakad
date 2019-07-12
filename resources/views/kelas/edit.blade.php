@extends('layouts.app')

@section('page-name', 'kelas')
@section('title', 'Kelas - Edit')
@section('content')
@php
    $tingkat = ['X', 'XI', 'XII'];
    $jurusan = ['Rekayasa Perangkat Lunak', 'Teknik Otomasi Industri'];
    $status = ['Aktif', 'Tidak Aktif'];
@endphp
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 pb-3">
      <h3 class="mb-0">Ubah Kelas</h3>
    </div>
    <form action="{{ url('/kelas/update/' . $kelas->id_kelas) }}" method="post">
      <div class="row">
        <div class="col-md-6">
          {{ csrf_field() }}
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Tahun Ajaran</label>
            <div class="form-row align-items-center">
              <div class="col">
                <input type="number" class="form-control" name="tahun_ajaran" id="tahun1" value="{{ $tahun_ajaran }}" required>
              </div>
              <div>/</div>
              <div class="col">
                <input type="number" class="form-control" id="tahun2" readonly>
              </div>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Kelas</label>
            <select name="kelas" id="" class="form-control" required>
              @foreach ($tingkat as $d)
                <option value="{{ $d }}" {{ ($d == $kelas->kelas) ? 'selected' : '' }}>{{ $d }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Jurusan</label>
            <select name="jurusan" id="" class="form-control" required>
              @foreach ($jurusan as $d)
                <option value="{{ $d }}" {{ ($d == $kelas->jurusan) ? 'selected' : '' }}>{{ $d }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="" class="text-sm font-weight-bold">Status Aktif</label>
            <select name="status_aktif" id="" class="form-control" required>
              @foreach ($status as $d)
                <option value="{{ $d }}" {{ ($d == $kelas->status_aktif) ? 'selected' : '' }}>{{ $d }}</option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    $('#tahun2').val(parseInt($('#tahun1').val()) + 1);
    $('#tahun1').on('input', function() {
      $('#tahun2').val(parseInt($(this).val()) + 1);
    });
  });
</script>  
@endsection