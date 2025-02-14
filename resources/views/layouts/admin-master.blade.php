<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('gambar/Logo Klinik Sahabat Hewan Clear.png') }}">

    <title>{{ $title }} - Klinik Sahabat Hewan</title>

    <!-- CSS bootstrap yang dipake -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Ini 2 link dibawah itu nentuin bootstrap yang bisa dipake di yajra tabel -->
    <!-- <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

     <!-- Script dan Link buat aktivasi Yajra Datatables (Kalo satu hilang, gabisa dipake) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <!-- Custom fonts dan dan asset css fontawesome -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom Admin CSS -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-text mx-3">Klinik Sahabat Hewan</div>
            </a>
            
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            @if(Auth('pekerja')->check() && Auth('pekerja')->user()->peran == 'Admin')

                <!-- Nav Item - Dashboard -->
                @if(Route::currentRouteName() == 'AdminDashboard')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                    <a class="nav-link" href="{{ route('AdminDashboard') }}">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Data Admin
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                @if(Route::currentRouteName() == 'ShowJadwalKlinik' || Route::currentRouteName() == 'CreateJadwalForm' || Route::currentRouteName() == 'UpdateJadwalForm'
                    || Route::currentRouteName() == 'DetailsJadwal')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                    <a class="nav-link" href="{{ route('ShowJadwalKlinik') }}">
                        <i class="fas fa-fw fa-calendar"></i>
                        <span>Jadwal Layanan</span>
                    </a>
                </li>

                @if(Route::currentRouteName() == 'ShowLayananData' || Route::currentRouteName() == 'CreateLayananForm' || Route::currentRouteName() == 'UpdateLayananForm')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                    <a class="nav-link" href="{{ route('ShowLayananData') }}">
                        <i class="fas fa-fw fa-database"></i>
                        <span>Data Layanan</span>
                    </a>
                </li>


                @if(Route::currentRouteName() == 'ShowUserData' || Route::currentRouteName() == 'CreateUserForm' || Route::currentRouteName() == 'UpdateUserForm'
                    || Route::currentRouteName() == 'ShowPasienData' || Route::currentRouteName() == 'ShowPekerjaData' || Route::currentRouteName() == 'CreatePekerjaForm'
                    || Route::currentRouteName() == 'UpdatePekerjaForm')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-database"></i>
                        <span>Data Klinik</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Data:</h6>
                            <a class="collapse-item" href="{{ route('ShowUserData') }}">Data Customer</a>
                            <a class="collapse-item" href="{{ route('ShowPasienData') }}">Data Hewan Peliharaan</a>
                            <a class="collapse-item" href="{{ route('ShowPekerjaData') }}">Data Pekerja</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                @if(Route::currentRouteName() == 'ShowBuktiPembayaran' || Route::currentRouteName() == 'ShowTransaksi' || Route::currentRouteName() == 'ShowLaporanTransaksi' || Route::currentRouteName() == 'DetailsTransaksi')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                        aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-file-invoice"></i>
                        <span>Transaksi</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Transaksi:</h6>
                            <a class="collapse-item" href="{{route('ShowTransaksi')}}">Data Transaksi</a>
                            <a class="collapse-item" href="{{route('ShowLaporanTransaksi')}}">Cetak Laporan Transaksi</a>
                            <a class="collapse-item" href="{{route('ShowBuktiPembayaran')}}">Konfirmasi Bukti Bayar</a>
                        </div>
                    </div>
                </li>

                <!-- Nav Item - Pages Collapse Menu -->
                @if(Route::currentRouteName() == 'KonfirmasiProsesGrooming')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                    <a class="nav-link" href="{{ route('KonfirmasiProsesGrooming') }}">
                        <i class="fas fa-fw fa-database"></i>
                        <span>Konfirmasi Grooming</span>
                    </a>
                </li>

            @elseif (Auth('pekerja')->check() && Auth('pekerja')->user()->peran == 'Dokter')
                <!-- Nav Item - Pages Collapse Menu -->
                @if(Route::currentRouteName() == 'ShowJadwalAktif' || Route::currentRouteName() == 'TambahKeteranganDanMedikasi')
                <li class="nav-item active">
                @else
                <li class="nav-item">
                @endif
                    <a class="nav-link" href="{{ route('ShowJadwalAktif') }}">
                        <i class="fas fa-fw fa-calendar"></i>
                        <span>Jadwal Aktif</span>
                    </a>
                </li>

            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->guard('pekerja')->user()->namapekerja }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('viewProfilePekerja') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Klinik Sahabat Hewan 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingin keluar dari akun?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih tombol "Logout" jika Anda benar-benar ingin keluar dari akun.</div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('pekerja.logout') }}">
                        @csrf
                        <button class="btn btn-danger" type="submit">Logout</button>
                    </form>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <!-- Ini script bikin error jquery buat yajra datatables
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script> -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Close alert after 10 seconds
            setTimeout(function() {
                $('.alert').alert('close');
            }, 10000);

            // Close alert when close button is clicked
            $('.alert .btn-close').on('click', function() {
                $(this).closest('.alert').alert('close');
            });
        });
    </script>

</body>

</html>