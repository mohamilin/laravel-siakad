@extends('layouts.app')

@section('page-name', 'guru')
@section('title', 'Guru')
@section('content')
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 pb-3">
      <h3 class="mb-0">Guru</h3>
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
      <a href="{{ url('/guru/tambah') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah</a>
    </div>
    <div class="table-responsive">
      <table class="table align-items-center table-flush" id="example">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">NIP</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($guru as $p)
            <tr>
              <td>{{ $loop->iteration }}.</td>
              <td>{{ $p->nip }}</td>
              <td>{{ $p->nama_guru }}</td>
              <td>{{ $p->jenis_kelamin }}</td>
              <td>{{ $p->alamat }}</td>
              <td>{{ $p->status_aktif }}</td>
              <td>
                <a href="{{ url('/guru/ubah/' . $p->id_guru) }}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                <form action="{{ url('/guru/hapus/' . $p->id_guru) }}" method="POST" style="display: inline">
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