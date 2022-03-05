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
                <h3 class="white-text">Welcome back {{ $user }}!</h3>
                <p class="white-text op-7 m-b-20">Success is not a destination, its a Journey!!!</p>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col l3 m6 s12">
                <div class="card danger-gradient card-hover">
                    <div class="card-content">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="white-text m-b-5">{{ $jumlahPasien }}</h2>
                                <h6 class="white-text op-5 light-blue-text">Pasien</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="white-text display-6"><i class="material-icons">group</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l3 m6 s12">
                <div class="card danger-gradient card-hover">
                    <div class="card-content">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="white-text m-b-5">{{ $jumlahSdmPegawai }}</h2>
                                <h6 class="white-text op-5 light-blue-text">Pegawai</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="white-text display-6"><i class="material-icons">group</i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l3 m6 s12">
                <div class="card danger-gradient card-hover">
                    <div class="card-content">
                        <div class="d-flex no-block align-items-center">
                            <div>
                                <h2 class="white-text m-b-5">{{ $jumlahSdmDokter }}</h2>
                                <h6 class="white-text op-5 light-blue-text">Dokter</h6>
                            </div>
                            <div class="ml-auto">
                                <span class="white-text display-6"><i class="material-icons">group</i></span>
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
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    <footer class="center-align m-b-30">All Rights Reserved by Materialart. Designed and Developed by <a
            href="https://wrappixel.com">WrapPixel</a>.</footer>
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
