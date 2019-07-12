@extends('layouts.app')

@section('page-name', 'Dashboard')
@section('title', 'Dashboard')
@section('content')
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 py-3">
      <h3 class="mb-0">Welcome!</h3>
    </div>
    <div class="d-flex justify-content-center">
      <h2>
        Selamat datang, 
        @if (Session::get('user_type') == 'admin')
            {{ Session::get('nama_admin') }}
        @elseif(Session::get('user_type') == 'guru')
            {{ Session::get('nama_guru') }}
        @else
            {{ Session::get('nama_siswa') }}
        @endif
        !
      </h2>
    </div>
  </div>
</div>
@endsection