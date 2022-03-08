@extends('layout.app')

@section('judul-halaman')
Halaman Detail Obat
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Obat Detail</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Obat</a>
                <a href="#!" class="breadcrumb">Obat Detail</a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        {{-- {{dd($singleObatDetail) }} --}}
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content row">
                        <div class="col s12 m6">

                            {{-- +"id": 26
  +"min_stock": 10
  +"max_stock": 1000
  +"stock": 600
  +"tgl_beli": "2022-03-01 00:00:00"
  +"expire": "2025-12-16 00:00:00"
  +"batch": "HY777878"
  +"harga_beli": 10000
  +"harga_jual": 11000
  +"nama_jenis_obat": "Tablet"
  +"nama_satuan_obat": "PAK"
  +"nama_penyedia_obat": "Penyedia Obat 56927" --}}

                            <small>No. Batch</small>
                            <h6>{{ $singleObatDetail->batch }}</h6>
                            <small>Nama</small>
                            <h6>{{ $singleObatDetail->nama }}</h6>
                            <small>Tanggal Beli</small>
                            <h6 id="tgl_lahir_show">{{ $singleObatDetail->tgl_beli }}</h6>
                            <small>Tanggal Kadaluarsa</small>
                            <h6 id="tgl_lahir_show">{{ $singleObatDetail->expire }}</h6>
                            <small>Jumlah Stok</small>
                            <h6>{{ $singleObatDetail->stock }}</h6>
                            <small>Stok Minimal</small>
                            <h6>{{ $singleObatDetail->min_stock }}</h6>



                        </div>
                        <div class="col s12 m6">
                            <small>Stok Maksimal</small>
                            <h6>{{ $singleObatDetail->max_stock }}</h6>
                            <small>Jenis Obat</small>
                            <h6>{{ $singleObatDetail->nama_jenis_obat }}</h6>
                            <small>Satuan Obat</small>
                            <h6>{{ $singleObatDetail->nama_satuan_obat }}</h6>
                            <small>Penyedia Obat</small>
                            <h6>{{ $singleObatDetail->nama_penyedia_obat }}</h6>
                            <small>Harga Beli</small>
                            <h6>{{ $singleObatDetail->harga_beli }}</h6>
                            <small>Harga Jual</small>
                            <h6>{{ $singleObatDetail->harga_jual }} <span class="p-l-5 p-r-5 white-text {{ $singleObatDetail->harga_jual < $singleObatDetail->harga_beli ? 'red' : 'green'}}"> <small><i class="ti-arrow-{{ $singleObatDetail->harga_jual < $singleObatDetail->harga_beli ? 'down' : 'up'}}"></i></small> {{ round((($singleObatDetail->harga_jual - $singleObatDetail->harga_beli)/$singleObatDetail->harga_beli) * 100,2) }}%</span></h6>

                        </div>


                    </div>
                    <hr>

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
<script>
    $(document).ready(function () {
        function dateFormat(idName, value) {
            var createdDate = new Date(value);
            // var date1 = crea
            var date = createdDate.toLocaleString("id-ID", {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            });

            $(String(idName)).html(date);
            // console.log(String(idName))

        }

        dateFormat("#tgl_lahir_show", $("#tgl_lahir_show").html())



    });

</script>
@endsection

@section('halaman-css')


@endsection
