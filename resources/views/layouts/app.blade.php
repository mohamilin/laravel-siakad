<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    @yield('title')
  </title>
  <!-- Favicon -->
  <link href="{{ asset('argon/assets/img/brand/favicon.png') }}" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="{{ asset('argon/assets/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
  <link href="{{ asset('argon/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset('datatables/buttons.dataTables.min.css') }}">
  <!-- CSS Files -->
  <link href="{{ asset('argon/assets/css/argon-dashboard.css?v=1.1.0') }}" rel="stylesheet" />
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="{{ asset('argon/index.html') }}">
        <img src="{{ asset('argon/assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="{{ asset('argon/assets/img/theme/team-1-800x800.jpg') }}">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="{{ asset('argon/examples/profile.html') }}" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="{{ asset('argon/examples/profile.html') }}" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="{{ asset('argon/examples/profile.html') }}" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="{{ asset('argon/examples/profile.html') }}" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="{{ asset('argon/index.html') }}">
                <img src="{{ asset('argon/assets/img/brand/blue.png') }}">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        @if(Session::get('user_type') == 'admin')
          <ul class="navbar-nav">
            <li class="nav-item" class="active">
            <a class=" nav-link active " href=" {{ url('/') }}"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ url('/guru') }}">
                <i class="fa fa-chalkboard-teacher text-blue"></i> Guru
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ url('/kelas') }}">
                <i class="ni ni-planet text-blue"></i> Kelas
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ url('/siswa') }}">
                <i class="fa fa-graduation-cap text-blue"></i> Siswa
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ url('/pelajaran') }}">
                <i class="fa fa-book text-blue"></i> Pelajaran
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ url('/detail') }}">
                <i class="fa fa-book-open text-blue"></i> Detail Pelajaran
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading text-muted">Laporan</h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/data-siswa') }}">
                <i class="ni ni-spaceship"></i> Data Siswa
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/admin/nilai') }}">
                <i class="ni ni-spaceship"></i> Data Nilai
              </a>
            </li>
          </ul>
        @elseif(Session::get('user_type') == 'guru')
          <ul class="navbar-nav">
            <li class="nav-item" class="active">
              <a class="nav-link" href="{{ url('/') }}"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ url('/nilai') }}">
                <i class="fa fa-chalkboard-teacher text-blue"></i> Nilai
              </a>
            </li>
          </ul>
          
          
        @else
          <ul class="navbar-nav">
            <li class="nav-item" class="active">
              <a class="nav-link" href="{{ url('/') }}"> <i class="ni ni-tv-2 text-primary"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{ url('/siswa/nilai') }}">
                <i class="fa fa-chalkboard-teacher text-blue"></i> Lihat Nilai
              </a>
            </li>
          </ul>
        @endif
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <h4 class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block">@yield('page-name')</h4>
        <!-- Form -->
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  @if (Session::get('user_type') == 'siswa')
                  <img alt="Image placeholder" src="{{ asset('images/'. Session::get('foto_siswa')) }}">
                  @else
                  <img alt="Image placeholder" src="{{ asset('images/profil.jpeg') }}">
                  @endif
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">
                    @if (Session::get('user_type') == 'admin')
                      {{ Session::get('nama_admin') }} (Admin)
                    @elseif(Session::get('user_type') == 'guru')
                      {{ Session::get('nama_guru') }} (Guru)
                    @else
                      {{ Session::get('nama_siswa') }} (Siswa)
                    @endif
                  </span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <div class="dropdown-divider"></div>

                @if (Session::get('user_type') !== 'admin')
                  <a href="{{ (Session::get('user_type') == 'guru') ? url('/guru/myprofile') : url('/siswa/myprofile') }}" class="dropdown-item">
                    <i class="ni ni-badge"></i>
                    <span>Profil saya</span>
                  </a>
                @endif
                <form action="{{ url('logout-admin') }}" method="POST">
                  {{ csrf_field() }}
                  <button type="submit" class="dropdown-item">
                    <i class="ni ni-user-run"></i>
                    <span>Logout</span>
                  </button>
                </form>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Guru</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $all_count[0] }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fa fa-chalkboard-teacher"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Kelas</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $all_count[1] }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="ni ni-planet"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Siswa</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $all_count[2] }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Pelajaran</h5>
                      <span class="h2 font-weight-bold mb-0">{{ $all_count[3] }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fa fa-book"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid mt--7">
      <div class="row">
        @yield('content')
       
      </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
              </li>
              <li class="nav-item">
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core   -->
  <script src="{{ asset('argon/assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('argon/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <!--   Optional JS   -->
  <script src="{{ asset('argon/assets/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('argon/assets/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
  <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('datatables/dataTables.bootstrap4.min.js') }}"></script>
  <!--   Argon JS   -->
  <script src="{{ asset('argon/assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js') }}"></script>
  <script src="{{ asset('datatables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('datatables/buttons.flash.min.js')}}"></script>
  <script src="{{ asset('datatables/jszip.min.js') }}"></script>
  <script src="{{ asset('datatables/pdfmake.min.js') }}"></script>
  <script src="{{ asset('datatables/vfs_fonts.js') }}"></script>
  <script src="{{ asset('datatables/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('datatables/buttons.print.min.js') }}"></script>
  <script src="{{ asset('datatables/buttons.colVis.min.js') }}"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });

      $(document).ready(function() {
        $('#example').DataTable({
          "language": {
            "paginate": {
              "next": "<i class='fa fa-arrow-right' />",
              "previous": "<i class='fa fa-arrow-left' />"
            }
          }
        });
      });
      $(document).ready(function() {
        $('#example1').DataTable({
          "language": {
            "paginate": {
              "next": "<i class='fa fa-arrow-right' />",
              "previous": "<i class='fa fa-arrow-left' />"
            }
          },
          "scrollX": true
        });
      });
  </script>
  @yield('script')
</body>

</html>