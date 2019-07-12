@extends('layouts.app')

@section('page-name', 'data siswa')
@section('title', 'Data Siswa')
@section('content')
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 pb-3">
      <h3 class="mb-0">Data Siswa</h3>
    </div>
    <form action="{{ url('/data-siswa') }}" method="get">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group form-row">
            <div class="col">
              <select name="kelas" id="" class="form-control">
                @foreach ($kelas as $d)
                <option value="{{ $d->id_kelas }}">{{ $d->tahun_ajar.' - '.$d->kelas.' '.$d->jurusan }}</option>  
                @endforeach
              </select>
            </div>

            <div class="col">
              <button class="btn btn-primary" type="submit">Cari</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection