@extends('layout.app')

@section('judul-halaman')
Dashboard Utama
@endsection

@section('konten')
<div class="page-wrapper page-header">
    <!-- ============================================================== -->
    <!-- Temp - Earnings -->
    <!-- ============================================================== -->
    <div class="card info-gradient m-t-0 m-b-0">
        <div class="card-content">
            <div class="p-b-40 p-t-20">
                <h3 class="white-text">Selamat Datang {{ Auth::user()->name }}!</h3>
                <p class="white-text op-7 m-b-20">semoga hari anda selalu menyenangkan!</p>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col l4 m6 s12">
                <div class="card danger-gradient card-hover">
                    <div class="card-content">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="white-text m-b-5">{{ $jumlahPasien }}</h2>
                                <h6 class="white-text op-5 light-blue-text">Pasien</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="white-text display-6"><i class="material-icons">accessible</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l4 m6 s12">
                <div class="card info-gradient card-hover">
                    <div class="card-content">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="white-text m-b-5">{{ $jumlahSdmPegawai }}</h2>
                                <h6 class="white-text op-5 light-blue-text">Pegawai</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="white-text display-6"><i class="material-icons">recent_actors</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l4 m6 s12">
                <div class="card success-gradient card-hover">
                    <div class="card-content">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="white-text m-b-5">{{ $jumlahSdmDokter }}</h2>
                                <h6 class="white-text op-5 light-blue-text">Dokter</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="white-text display-6"><i class="material-icons">contact_mail</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 l4">
                <div class="card">
                    <div class="card-content">
                        <h5 class="card-title">Total Transaksi</h5>
                        <div class="row">
                            <div class="col s8">
                                <h3 class="font-medium m-b-10 m-t-30">Rp. {{$jumlah_transaksi_total->total}}</h3>
                                <span>{{$jumlah_transaksi_total_hitung}} Transaksi</span>
                            </div>
                            <div class="col s4 right-align">
                                <div id="transaksi_total" style="height:125px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 l4">
                <div class="card">
                    <div class="card-content">
                        <h5 class="card-title">Total Transaksi Tindakan</h5>
                        <div class="row">
                            <div class="col s8">
                                <h3 class="font-medium m-b-10 m-t-30">Rp. {{$jumlah_transaksi_total_tindakan->total}}</h3>
                                <span>{{$jumlah_transaksi_total_tindakan_hitung}} Transaksi</span>
                            </div>
                            <div class="col s4 right-align">
                                <div id="transaksi_total_tindakan" style="height:125px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 l4">
                <div class="card">
                    <div class="card-content">
                        <h5 class="card-title">Total Transaksi Obat</h5>
                        <div class="row">
                            <div class="col s8">
                                <h3 class="font-medium m-b-10 m-t-30">Rp. {{$jumlah_transaksi_total_obat->total}}</h3>
                                <span>{{$jumlah_transaksi_total_obat_hitung}} Transaksi</span>
                            </div>
                            <div class="col s4 right-align">
                                <div id="transaksi_total_obat" style="height:125px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 l4">
                <div class="card">
                    <div class="card-content">
                        <h5 class="card-title">Total Transaksi Hari ini</h5>
                        <div class="row">
                            <div class="col s8">
                                <h3 class="font-medium m-b-10 m-t-30">Rp. {{$jumlah_transaksi_today->total}}</h3>
                                <span>{{$jumlah_transaksi_today_hitung}} Transaksi</span>
                            </div>
                            <div class="col s4 right-align">
                                <div id="transaksi_today" style="height:125px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 l4">
                <div class="card">
                    <div class="card-content">
                        <h5 class="card-title">Total Transaksi Tindakan Hari ini</h5>
                        <div class="row">
                            <div class="col s8">
                                <h3 class="font-medium m-b-10 m-t-30">Rp. {{$jumlah_transaksi_today_tindakan->total}}</h3>
                                <span>{{$jumlah_transaksi_today_tindakan_hitung}} Transaksi</span>
                            </div>
                            <div class="col s4 right-align">
                                <div id="transaksi_today_tindakan" style="height:125px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 l4">
                <div class="card">
                    <div class="card-content">
                        <h5 class="card-title">Total Transaksi Obat Hari ini</h5>
                        <div class="row">
                            <div class="col s8">
                                <h3 class="font-medium m-b-10 m-t-30">Rp. {{$jumlah_transaksi_today_obat->total}}</h3>
                                <span>{{$jumlah_transaksi_today_obat_hitung}} Transaksi</span>
                            </div>
                            <div class="col s4 right-align">
                                <div id="transaksi_today_obat" style="height:125px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12 l6">
                <div class="card">
                    <div class="card-content">
                        <h4 class="card-title">Statistik Obat Tertinggi</h4>
                        <div>
                            <canvas id="obat_stats" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 l6">
                <div class="card">
                    <div class="card-content">
                        <h4 class="card-title">Statistik Obat Terendah</h4>
                        <div>
                            <canvas id="obat_stats_low" height="150"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col l4 m6 s12">
                <div class="card">
                    <div class="card-content center-align">
                        <div>
                            <span class="blue-text display-6"><i class="ti-bar-chart-alt"></i></span>
                        </div>
                        <div>
                            <h4>{{$jumlah_icd}}</h4>
                            <h6 class="blue-text font-medium m-b-0">Jumlah ICD10</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l4 m6 s12">
                <div class="card">
                    <div class="card-content center-align">
                        <div>
                            <span class="cyan-text display-6"><i class="ti-receipt"></i></span>
                        </div>
                        <div>
                            <h4>{{$jumlah_obat}}</h4>
                            <h6 class="cyan-text font-medium m-b-0">Jumlah Obat</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l4 m6 s12">
                <div class="card">
                    <div class="card-content center-align">
                        <div>
                            <span class="yellow-text text-darken-2 display-6"><i class="ti-check-box"></i></span>
                        </div>
                        <div>
                            <h4>{{$jumlah_tindakan}}</h4>
                            <h6 class="yellow-text text-darken-2 font-medium m-b-0">Jumlah Tindakan</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    <footer class="center-align m-b-30">Theme designed and developed by Materialart and WrapPixel. System Developed by JozApp &copy; <span id="yearFooter"></span></footer>

</div>
@endsection




@section('halaman-js')
<script src="{{ asset('template') }}/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="{{ asset('template') }}/dist/js/pages/chartjs/chartjs.init.js"></script>
<script src="{{ asset('template') }}/assets/libs/chart.js/dist/Chart.min.js"></script>
<script
    src="{{ asset('template') }}/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js">
</script>
<script src="{{ asset('template') }}/assets/libs/gaugeJS/dist/gauge.min.js"></script>
<script src="{{ asset('template') }}/assets/extra-libs/c3/d3.min.js"></script>
<script src="{{ asset('template') }}/assets/extra-libs/c3/c3.min.js"></script>
<script src="{{ asset('template') }}/assets/extra-libs/sparkline/sparkline.js"></script>
<script src="{{ asset('template') }}/dist/js/pages/dashboards/dashboard3.js"></script>


<script>
 var chart = c3.generate({
        bindto: '#transaksi_total',
        data: {
            columns: [
                ['Tindakan', {{$jumlah_transaksi_total_tindakan_hitung}}],
                ['Obat', {{$jumlah_transaksi_total_obat_hitung}}]
            ],

            type: 'donut',
            onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); }
        },
        donut: {
            label: {
                show: false
            },
            width: 15,
        },

        legend: {
            hide: true
            //or hide: 'data1'
            //or hide: ['data1', 'data2']
        },
        color: {
            pattern: ['#40c4ff', '#2961ff']
        }
    });
 var chart = c3.generate({
        bindto: '#transaksi_today',
        data: {
            columns: [
                ['Tindakan', {{$jumlah_transaksi_today_tindakan_hitung}}],
                ['Obat', {{$jumlah_transaksi_today_obat_hitung}}]
            ],

            type: 'donut',
            onclick: function(d, i) { console.log("onclick", d, i); },
            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
            onmouseout: function(d, i) { console.log("onmouseout", d, i); }
        },
        donut: {
            label: {
                show: false
            },
            width: 15,
        },

        legend: {
            hide: true
            //or hide: 'data1'
            //or hide: ['data1', 'data2']
        },
        color: {
            pattern: ['#40c4ff', '#2961ff']
        }
    });



     new Chart(document.getElementById("obat_stats"), {
        type: 'bar',
        data: {
            labels: [

                @foreach ($obat_stats as $item)
                    "{{$item->nama}}",
                @endforeach

            ],
            datasets: [{
                label: "Stok",
                backgroundColor: ["#03a9f4", "#e861ff", "#08ccce", "#e2b35b", "#e40503"],
                data: [

                    @foreach ($obat_stats as $item)
                        {{$item->stock}},
                    @endforeach

                ]
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: 'Urutan Jumlah Obat Terbanyak'
            }
        }
    });

     new Chart(document.getElementById("obat_stats_low"), {
        type: 'bar',
        data: {
            labels: [

                @foreach ($obat_stats_low as $item)
                    "{{$item->nama}}",
                @endforeach

            ],
            datasets: [{
                label: "Stok",
                backgroundColor: ["#03a9f4", "#e861ff", "#08ccce", "#e2b35b", "#e40503"].reverse(),
                data: [

                    @foreach ($obat_stats_low as $item)
                        {{$item->stock}},
                    @endforeach

                ]
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: 'Urutan Jumlah Obat Terendah'
            }
        }
    });

</script>
@endsection

@section('halaman-css')
<link href="{{ asset('template') }}/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
<link
    href="{{ asset('template') }}/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css"
    rel="stylesheet">
<link href="{{ asset('template') }}/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
<link href="{{ asset('template') }}/assets/extra-libs/css-chart/css-chart.css" rel="stylesheet">
<link href="{{ asset('template') }}/dist/css/pages/dashboard3.css" rel="stylesheet">
@endsection
