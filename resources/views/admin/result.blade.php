@extends('layouts.app')

@section('page-name', 'Data Siswa')
@section('title', 'Data Siswa')
@section('content')
<div class="col-xl-12 mb-12 mb-xl-12">
  <div class="card shadow p-4">
    <div class="card-header border-0 p-0 pb-3">
      <h3 class="mb-0">Data Siswa</h3>
      <h4 class="mt-1">Kelas : <span id="namakelas">{{ $kelas->kelas . ' ' . $kelas->jurusan }}</span></h4>
      <h4 class="mt-1">Tahun Ajaran : {{ $kelas->tahun_ajar }}</h4>
    </div>
    <div class="table-responsive">
      <table class="table align-items-center table-flush" id="report">
        <thead class="thead-light">
          <tr>
            <th scope="col">No.</th>
            <th scope="col">NIS</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">TTL</th>
            <th scope="col">Alamat</th>
            <th scope="col">No. Telepon</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($siswa as $p)
            <tr>
              <td>{{ $loop->iteration }}.</td>
              <td>{{ $p->nis }}</td>
              <td>{{ $p->nama_siswa }}</td>
              <td>{{ $p->jenis_kelamin }}</td>
              <td>{{ $p->tempat_lahir.', '.$p->tgl_lahir }}</td>
              <td>{{ $p->alamat }}</td>
              <td>{{ $p->no_telepon }}</td>
              <td>{{ $p->status }}</td>
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
                columns: ':visible',
              }
          },{
              extend : 'pdf',
              text : 'PDF',
              title : namakelas,
              exportOptions: {
                columns: ':visible',
              }
          },{
              extend : 'print',
              text : 'Print',
              title : namakelas,
              exportOptions: {
                columns: ':visible',
              }
          }
          ],
          "language": {
            "lengthMenu": "_MENU_ Data per halaman",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entries",
            "zeroRecords": "Tidak ada data yang cocok",
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