@extends('layouts.app')

@section('page-name', 'Data Siswa')
@section('title', 'Data Siswa')
@section('content')
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 pb-3">
      <h3 class="mb-0">Data Nilai Siswa</h3>
      <h4 class="mt-1">Mapel : {{ $mapel->nama_pelajaran }}</h4>
      <h4 class="mt-1">Kelas : <span id="namakelas">{{ $kelas->kelas . ' ' . $kelas->jurusan }}</span></h4>
      <h4 class="mt-1">Tahun Ajaran : {{ $kelas->tahun_ajar }}</h4>
      <h4 class="mt-1">Semester : {{ Request()->semester }}</h4>
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
      <table class="table align-items-center table-flush" id="report">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
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
              <td>{{ $p->nama_siswa }}</td>
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

@section('script')
  <script>
    $(document).ready(function() {
      var namakelas = $('#namakelas').html();
      
      $('#report').DataTable( {
          dom: '<"row"<"col-lg-4"l><"col-lg-4"B><"col-lg-4"f>>rtip',
          buttons: [
          {
              extend : 'excel',
              text : 'Excel',
              title : namakelas,
              exportOptions: {
                columns: ':not(:last-child)',
              }
          },{
              extend : 'pdf',
              text : 'PDF',
              title : namakelas,
              exportOptions: {
                columns: ':not(:last-child)',
              }
          },{
              extend : 'print',
              text : 'Print',
              title : namakelas,
              exportOptions: {
                columns: ':not(:last-child)',
              }
          }
          ],
          "language": {
            "lengthMenu": "_MENU_ Data per halaman",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
            "zeroRecords": "Tidak ada data",
            "search": "Pencarian :",
            "paginate": {
              "next": "<i class='fa fa-arrow-right' />",
              "previous": "<i class='fa fa-arrow-left' />"
            }
          },
          "scrollX": true
      });

    });
  </script>
    
@endsection