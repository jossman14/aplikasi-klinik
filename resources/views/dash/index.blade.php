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
                <h3 class="white-text">Welcome back {{$user}}!</h3>
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
                        <h2 class="white-text m-b-5">{{$jumlahPasien}}</h2>
                        <h6 class="white-text op-5 light-blue-text">Pasien</h6>
                    </div>
                    <div class="ml-auto">
                        <span class="white-text display-6"><i class="material-icons">group</i></span>
                    </div>
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
<script src="{{ asset('template') }}/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js">
</script>
<script src="{{ asset('template') }}/assets/libs/gaugeJS/dist/gauge.min.js"></script>
<script src="{{ asset('template') }}/assets/extra-libs/c3/d3.min.js"></script>
<script src="{{ asset('template') }}/assets/extra-libs/c3/c3.min.js"></script>
<script src="{{ asset('template') }}/assets/extra-libs/sparkline/sparkline.js"></script>
<script src="{{ asset('template') }}/dist/js/pages/dashboards/dashboard3.js"></script>

@endsection

@section('halaman-css')
<link href="{{ asset('template') }}/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
<link href="{{ asset('template') }}/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css"
    rel="stylesheet">
<link href="{{ asset('template') }}/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
<link href="{{ asset('template') }}/assets/extra-libs/css-chart/css-chart.css" rel="stylesheet">
<link href="{{ asset('template') }}/dist/css/pages/dashboard3.css" rel="stylesheet">
@endsection
