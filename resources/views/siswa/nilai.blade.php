@extends('layouts.app')

@section('page-name', 'Data Siswa')
@section('title', 'Data Siswa')
@section('content')
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 pb-3">
      <h3 class="mb-0">Data Nilai Siswa</h3>
    </div>
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <div class="table-responsive">
      <table class="table align-items-center table-flush" id="example">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Mapel</th>
            <th scope="col">Semester</th>
            <th scope="col">Nilai Tugas 1</th>
            <th scope="col">Nilai Tugas 1</th>
            <th scope="col">Nilai UTS</th>
            <th scope="col">Nilai UAS</th>
            <th scope="col">Keterangan</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($nilai as $p)
            <tr>
              <td>{{ $loop->iteration }}.</td>
              <td>{{ $p->nama_pelajaran }}</td>
              <td>{{ $p->semester }}</td>
              <td>{{ $p->nilai_tugas1 }}</td>
              <td>{{ $p->nilai_tugas2 }}</td>
              <td>{{ $p->nilai_uts }}</td>
              <td>{{ $p->nilai_uas }}</td>
              <td>{{ $p->keterangan }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
