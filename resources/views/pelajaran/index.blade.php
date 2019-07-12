@extends('layouts.app')

@section('page-name', 'Pelajaran')
@section('title', 'Pelajaran')
@section('content')
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 pb-3">
      <h3 class="mb-0">Pelajaran</h3>
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
      <a href="{{ url('/pelajaran/tambah') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
    </div>
    <div class="table-responsive">
      <table class="table align-items-center table-flush" id="example">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Mapel</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pelajaran as $p)
            <tr>
              <td>{{ $loop->iteration }}.</td>
              <td>{{ $p->nama_pelajaran }}</td>
              <td>{{ $p->keterangan }}</td>
              <td>
                <a href="{{ url('/pelajaran/ubah/' . $p->id_pelajaran) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                <form action="{{ url('/pelajaran/hapus/' . $p->id_pelajaran) }}" method="POST" style="display: inline">
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