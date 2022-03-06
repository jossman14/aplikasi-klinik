<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('template') }}/assets/images/k2.png">
    <title>Klinik Gigi | @yield('judul-halaman')</title>
    <link href="{{ asset('template') }}/dist/css/style.css" rel="stylesheet">
    <style>
        .center {
            text-align: center;
}

    </style>
    @yield('halaman-css')
    <!-- This page CSS -->


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="main-wrapper" id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="loader">
                <div class="loader__figure"></div>
                <p class="loader__label">Klinik Gigi</p>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <header class="topbar">
            <!-- ============================================================== -->
            <!-- Navbar scss in header.scss -->
            <!-- ============================================================== -->
            <nav>
                <div class="nav-wrapper">
                    <!-- ============================================================== -->
                    <!-- Logo you can find that scss in header.scss -->
                    <!-- ============================================================== -->
                    <a href="javascript:void(0)" class="brand-logo col justify-content-center">
                        <center>
                            <h2 class="white-text m-t-15">KLINIK</h2>
                        </center>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo you can find that scss in header.scss -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Left topbar icon scss in header.scss -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- Left topbar icon scss in header.scss -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right topbar icon scss in header.scss -->
                    <!-- ============================================================== -->

                    <!-- ============================================================== -->
                    <!-- Right topbar icon scss in header.scss -->
                    <!-- ============================================================== -->
                </div>
            </nav>
            <!-- ============================================================== -->
            <!-- Navbar scss in header.scss -->
            <!-- ============================================================== -->
        </header>
        <!-- ============================================================== -->
        <!-- Sidebar scss in sidebar.scss -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <ul id="slide-out" class="sidenav">

                <li>
                    <ul class="collapsible">
                        <li class="small-cap"><span class="hide-menu">Informasi</span></li>
                        <li
                            class="{{ request()->is("dash.index") ? 'active' : '' }}">
                            <a href="{{ route('dash.index') }}" class="collapsible-header"><i
                                    class="material-icons">dashboard</i><span class="hide-menu"> Dashboard</span></a>

                        </li>
                        <li
                            class="{{ request()->is("pasien.index") or request()->is("pasien.create") or request()->is("pasien.edit") or request()->is("pasien.show") ? 'active' : '' }}">
                            <a href="javascript:void(0)" class="collapsible-header has-arrow"><i
                                    class="material-icons">equalizer</i><span class="hide-menu"> Pasien
                                </span></a>
                            <div class="collapsible-body">
                                <ul>
                                    {{-- <li><a href="{{route('pasien.index') }}"><i
                                        class="material-icons">picture_in_picture</i><span class="hide-menu">Daftar
                                        Periksa</span></a>
                        </li> --}}
                        <li><a href="{{ route('pasien.index') }}"><i
                                    class="material-icons">photo_size_select_small</i><span class="hide-menu">Manajemen
                                    Pasien</span></a></li>
                        <li><a href="{{ route('daftar_periksa.index') }}"><i
                                    class="material-icons">add_circle</i><span class="hide-menu">Daftar
                                    Periksa Baru</span></a></li>
                        <li><a href="{{ route('indexDaftarPeriksa') }}"><i
                                    class="material-icons">account_box</i><span class="hide-menu">Daftar
                                    Pasien Periksa</span></a></li>
                        <li><a href="{{ route('poliklinik.index') }}"><i
                                    class="material-icons">assistant_photo</i><span
                                    class="hide-menu">Poliklinik</span></a></li>
                    </ul>
    </div>
    </li>
    <li
        class="{{ request()->is("sdm.index") or request()->is("sdm.create") or request()->is("sdm.edit") or request()->is("sdm.show") ? 'active' : '' }}">
        <a href="javascript:void(0)" class="collapsible-header has-arrow"><i class="material-icons">view_agenda</i><span
                class="hide-menu"> Sumber Daya Manusia
            </span></a>
        <div class="collapsible-body">
            <ul>

                <li><a href="{{ route('sdm.index') }}"><i
                            class="material-icons">verified_user</i><span class="hide-menu">Manajemen SDM</span></a>
                </li>
            </ul>
        </div>
    </li>
    <li
        class="{{ request()->is("transaksi.index") or request()->is("transaksi.create") or request()->is("transaksi.edit") or request()->is("transaksi.show") ? 'active' : '' }}">
        <a href="javascript:void(0)" class="collapsible-header has-arrow"><i
                class="material-icons">account_balance_wallet</i><span class="hide-menu"> Transaksi
            </span></a>
        <div class="collapsible-body">
            <ul>
                {{-- <li><a href="{{route('transaksi.index') }}"><i
                    class="material-icons">picture_in_picture</i><span class="hide-menu">Daftar Periksa</span></a>
    </li> --}}
    <li><a href="{{ route('transaksi.index') }}"><i class="material-icons">adjust</i><span
                class="hide-menu">Manajemen Transaksi</span></a></li>
    </ul>
    </div>
    </li>
    <li
        class="{{ request()->is("sdm.index") or request()->is("sdm.create") or request()->is("sdm.edit") or request()->is("sdm.show") ? 'active' : '' }}">
        <a href="javascript:void(0)" class="collapsible-header has-arrow"><i
                class="material-icons">airline_seat_recline_extra</i><span class="hide-menu"> Tindakan
            </span></a>
        <div class="collapsible-body">
            <ul>

                <li><a href="{{ route('tindakan.index') }}"><i
                            class="material-icons">assignment_late</i><span class="hide-menu">Manajemen
                            Tindakan</span></a></li>
                <li><a href="{{ route('soap_dokter.index') }}"><i
                            class="material-icons">assignment_turned_in</i><span class="hide-menu">Soap
                            Dokter</span></a></li>
                <li><a href="{{ route('soap_perawat.index') }}"><i
                            class="material-icons">assistant</i><span class="hide-menu">Soap Perawat</span></a></li>
                <li><a href="{{ route('jenis_tindakan.index') }}"><i
                            class="material-icons">data_usage</i><span class="hide-menu">Jenis Tindakan</span></a></li>
            </ul>
        </div>
    </li>
    <li
        class="{{ request()->is("obat_detail.index") or request()->is("obat_detail.create") or request()->is("obat_detail.edit") or request()->is("obat_detail.show") ? 'active' : '' }}">
        <a href="javascript:void(0)" class="collapsible-header has-arrow"><i
                class="material-icons">blur_circular</i><span class="hide-menu"> Obat
            </span></a>
        <div class="collapsible-body">
            <ul>

                <li><a href="{{ route('obat_detail.index') }}"><i
                            class="material-icons">autorenew</i><span class="hide-menu">Obat Detail</span></a></li>
                <li><a href="{{ route('satuan_obat.index') }}"><i
                            class="material-icons">device_hub</i><span class="hide-menu">Satuan Obat</span></a></li>
                <li><a href="{{ route('jenis_obat.index') }}"><i
                            class="material-icons">crop_free</i><span class="hide-menu">Jenis Obat</span></a></li>
                <li><a href="{{ route('penyedia_obat.index') }}"><i
                            class="material-icons">developer_board</i><span class="hide-menu">Penyedia Obat</span></a>
                </li>

            </ul>
        </div>
    </li>
    <li class="">
        <a href="javascript:void(0)" class="collapsible-header has-arrow"><i class="material-icons">filter_list</i><span
                class="hide-menu"> Lainnya
            </span></a>
        <div class="collapsible-body">
            <ul>

                <li><a href="{{ route('agama.index') }}"><i
                            class="material-icons">filter_tilt_shift</i><span class="hide-menu">Agama</span></a></li>
                <li><a href="{{ route('jenis_kelamin.index') }}"><i
                            class="material-icons">filter_vintage</i><span class="hide-menu">Jenis Kelamin</span></a>
                </li>
                <li><a href="{{ route('golongan_darah.index') }}"><i
                            class="material-icons">spa</i><span class="hide-menu">Golongan Darah</span></a></li>
                <li><a href="{{ route('sapaan.index') }}"><i
                            class="material-icons">sort_by_alpha</i><span class="hide-menu">Sapaan</span></a></li>
                <li><a href="{{ route('jabatan.index') }}"><i
                            class="material-icons">streetview</i><span class="hide-menu">Jabatan</span></a></li>







                <li><a href="{{ route('status_nikah.index') }}"><i
                            class="material-icons">assignment_ind</i><span class="hide-menu">Status Nikah</span></a>
                </li>

            </ul>
        </div>
    </li>

    <li>

            <a class="collapsible-header" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="material-icons">directions</i><span class="hide-menu"> Log Out </span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

    </li>




    </ul>
    </li>
    </ul>
    </aside>
    <!-- ============================================================== -->
    <!-- Sidebar scss in sidebar.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    @yield('konten')

    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    <a href="#" data-target="right-slide-out"
        class="sidenav-trigger right-side-toggle btn-floating btn-large waves-effect waves-light red"><i
            class="material-icons">settings</i></a>
    <aside class="right-sidebar">
        <!-- Right Sidebar -->
        <ul id="right-slide-out" class="sidenav right-sidenav p-t-10">
            <li>
                <div class="row">
                    <div class="col s12">
                        <!-- Tabs -->
                        <ul class="tabs">
                            <li class="tab col s4"><a href="#settings" class="active"><span
                                        class="material-icons">build</span></a></li>
                            <li class="tab col s4"><a href="#chat"><span class="material-icons">chat_bubble</span></a>
                            </li>
                            <li class="tab col s4"><a href="#activity"><span
                                        class="material-icons">local_activity</span></a></li>
                        </ul>
                        <!-- Tabs -->
                    </div>
                    <!-- Setting -->
                    <div id="settings" class="col s12">
                        <div class="m-t-10 p-10 b-b">
                            <h6 class="font-medium">Layout Settings</h6>
                            <ul class="m-t-15">
                                <li class="m-b-10">
                                    <label>
                                        <input type="checkbox" name="theme-view" id="theme-view" />
                                        <span>Dark Theme</span>
                                    </label>
                                </li>
                                <li class="m-b-10">
                                    <label>
                                        <input type="checkbox" class="nav-toggle" name="collapssidebar"
                                            id="collapssidebar" />
                                        <span>Collapse Sidebar</span>
                                    </label>
                                </li>
                                <li class="m-b-10">
                                    <label>
                                        <input type="checkbox" name="sidebar-position" id="sidebar-position" />
                                        <span>Fixed Sidebar</span>
                                    </label>
                                </li>
                                <li class="m-b-10">
                                    <label>
                                        <input type="checkbox" name="header-position" id="header-position" />
                                        <span>Fixed Header</span>
                                    </label>
                                </li>
                                <li class="m-b-10">
                                    <label>
                                        <input type="checkbox" name="boxed-layout" id="boxed-layout" />
                                        <span>Boxed Layout</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <div class="p-10 b-b">
                            <!-- Logo BG -->
                            <h6 class="font-medium">Logo Backgrounds</h6>
                            <ul class="m-t-15 theme-color">
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-logobg="skin1"></a></li>
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-logobg="skin2"></a></li>
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-logobg="skin3"></a></li>
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-logobg="skin4"></a></li>
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-logobg="skin5"></a></li>
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-logobg="skin6"></a></li>
                            </ul>
                            <!-- Logo BG -->
                        </div>
                        <div class="p-10 b-b">
                            <!-- Navbar BG -->
                            <h6 class="font-medium">Navbar Backgrounds</h6>
                            <ul class="m-t-15 theme-color">
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-navbarbg="skin1"></a></li>
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-navbarbg="skin2"></a></li>
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-navbarbg="skin3"></a></li>
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-navbarbg="skin4"></a></li>
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-navbarbg="skin5"></a></li>
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-navbarbg="skin6"></a></li>
                            </ul>
                            <!-- Navbar BG -->
                        </div>
                        <div class="p-10 b-b">
                            <!-- Logo BG -->
                            <h6 class="font-medium">Sidebar Backgrounds</h6>
                            <ul class="m-t-15 theme-color">
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-sidebarbg="skin1"></a></li>
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-sidebarbg="skin2"></a></li>
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-sidebarbg="skin3"></a></li>
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-sidebarbg="skin4"></a></li>
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-sidebarbg="skin5"></a></li>
                                <li class="theme-item"><a href="javascript:void(0)" class="theme-link"
                                        data-sidebarbg="skin6"></a></li>
                            </ul>
                            <!-- Logo BG -->
                        </div>
                    </div>

                </div>
            </li>
        </ul>
    </aside>

    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('template') }}/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ asset('template') }}/dist/js/materialize.min.js"></script>
    <script
        src="{{ asset('template') }}/assets/libs/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js">
    </script>
    <!-- ============================================================== -->
    <!-- Apps -->
    <!-- ============================================================== -->
    <script src="{{ asset('template') }}/dist/js/app.js"></script>
    <script src="{{ asset('template') }}/dist/js/app.init.js"></script>
    <script src="{{ asset('template') }}/dist/js/app-style-switcher.js"></script>
    <!-- ============================================================== -->
    <!-- Custom js -->
    <!-- ============================================================== -->
    <script src="{{ asset('template') }}/dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->

    @yield('halaman-js')
    <script>
        $(function () {
            $("#yearFooter").html(new Date().getFullYear());
        });
    </script>
</body>

</html>
