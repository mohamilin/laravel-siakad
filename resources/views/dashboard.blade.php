@extends('layouts.app')

@section('page-name', 'Dashboard')
@section('title', 'Dashboard')
@section('content')
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 py-3">
      <h3 class="mb-0">
        Selamat datang RPL SMK JENPO!</h3>
    </div>
    <div class="d-flex justify-content-center">
      @if (Session::get('user_type') == 'admin')
        <img src="{{ asset('images/dashboard-admin.jpeg') }}" alt="" class="img-fluid">
      @elseif(Session::get('user_type') == 'guru')
        <img src="{{ asset('images/dashboard-guru.jpeg') }}" alt="" class="img-fluid">
      @else
        <img src="{{ asset('images/dashboard-siswa.jpeg') }}" alt="" class="img-fluid">
      @endif
      </h2>
    </div>
  </div>
</div>
@endsection