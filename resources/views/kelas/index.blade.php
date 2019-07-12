@extends('layouts.app')

@section('page-name', 'kelas')
@section('title', 'Kelas')
@section('content')
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 pb-3">
      <h3 class="mb-0">Kelas</h3>
    </div>
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <div class="mb-3">
      <a href="{{ url('/kelas/tambah') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
    </div>
    <div class="table-responsive">
      <table class="table align-items-center table-flush" id="example">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Tahun Ajaran</th>
            <th scope="col">Kelas</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kelas as $p)
            <tr>
              <td>{{ $loop->iteration }}.</td>
              <td>{{ $p->tahun_ajar }}</td>
              <td>{{ $p->kelas }}</td>
              <td>{{ $p->jurusan }}</td>
              <td>{{ $p->status_aktif }}</td>
              <td>
                <a href="{{ url('/kelas/ubah/' . $p->id_kelas) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                <form action="{{ url('/kelas/hapus/' . $p->id_kelas) }}" method="POST" style="display: inline">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection