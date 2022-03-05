@extends('layout.app')

@section('judul-halaman')
Halaman Detail Pasien
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Pasien Detail : <span class="blue white-text p-10">
                    {{ $singlePasien->nama }} </span></h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Pasien</a>
                <a href="#!" class="breadcrumb">Pasien Detail</a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        {{-- {{dd($singlePasien) }} --}}
        <div class="row">

            <div class="col s12">
                <div class="card">
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab col s6"><a class="active" href="#identitas_pasien">Identitas Pasien</a>
                                </li>
                                <li class="tab col s6"><a href="#alamat">Alamat</a></li>
                            </ul>
                        </div>
                        <div id="identitas_pasien" class="col s12">
                            <div class="card-content row">
                                <div class="col s12 m6">
                                    <small>No. RM</small>
                                    <h6>{{ $singlePasien->norm }}</h6>
                                    <small>Nama</small>
                                    <h6>{{ $singlePasien->nama }}</h6>
                                    <small>Tanggal Lahir</small>
                                    <h6 id="tgl_lahir_show">{{ $singlePasien->tgl_lahir }}</h6>
                                    <small>Umur</small>
                                    <h6>{{ $singlePasien->umur }}</h6>
                                    <small>Tempat Lahir</small>
                                    <h6>{{ $tempat_lahir->name }}</h6>
                                    <small>Pekerjaan</small>
                                    <h6>{{ $singlePasien->pekerjaan }}</h6>
                                    <small>Nomor Telepon</small>
                                    <h6>{{ $singlePasien->nomor_telepon }}</h6>


                                </div>
                                <div class="col s12 m6">
                                    <small>Jenis Kelamin</small>
                                    <h6>{{ $jenis_kelamin->jenis_kelamin }}</h6>
                                    <small>Agama</small>
                                    <h6>{{ $agama->agama }}</h6>

                                    <small>Golongan Darah</small>
                                    <h6>{{ $golongan_darah->golongan_darah }}</h6>

                                    <small>NIK</small>
                                    <h6>{{ $singlePasien->nik }}</h6>
                                    <small>No. BPJS</small>
                                    <h6>{{ $singlePasien->nomor_bpjs }}</h6>

                                    <small>Nomor Telepon Keluarga</small>
                                    <h6>{{ $singlePasien->nomor_telepon_keluarga }}</h6>
                                    <small>Status Nikah</small>
                                    <h6>{{ $singlePasien->nama_status_nikah }}</h6>
                                </div>


                            </div>
                        </div>
                        <div id="alamat" class="col s12">
                            <div class="card-content row">
                                <div class="col s12 m6">
                                    <small>Alamat Tetap</small>
                                    <h6>{{ $singlePasien->alamat_tetap }}</h6>
                                    <small>Desa Tetap</small>
                                    <h6>{{ $desa_tetap->name }}</h6>

                                    <small>Kecamatan Tetap</small>
                                    <h6>{{ $kecamatan_tetap->name }}</h6>
                                    <small>Kabupaten Tetap</small>
                                    <h6>{{ $kabupaten_tetap->name }}</h6>
                                    <small>Provinsi Tetap</small>
                                    <h6>{{ $provinsi_tetap->name }}</h6>


                                </div>
                                <div class="col s12 m6">
                                    <small>Alamat Sementara</small>
                                    <h6>{{ $singlePasien->alamat_sementara }}</h6>
                                    <small>Desa Sementara</small>
                                    <h6>{{ $desa_klg->name }}</h6>

                                    <small>Kecamatan Sementara</small>
                                    <h6>{{ $kecamatan_klg->name }}</h6>
                                    <small>Kabupaten Sementara</small>
                                    <h6>{{ $kabupaten_klg->name }}</h6>
                                    <small>Provinsi Sementara</small>
                                    <h6>{{ $provinsi_klg->name }}</h6>


                                </div>


                            </div>
                            <hr>
                            <div class="card-content row">

                                <div class="col s12 m6">
                                    <small>Alamat Keluarga</small>
                                    <h6>{{ $singlePasien->alamat_keluarga }}</h6>
                                    <small>Desa Keluarga</small>
                                    <h6>{{ $desa_smt->name }}</h6>
                                    <small>Kecamatan Keluarga</small>
                                    <h6>{{ $kecamatan_smt->name }}</h6>
                                    <small>Kabupaten Keluarga</small>
                                    <h6>{{ $kabupaten_smt->name }}</h6>
                                    <small>Provinsi Keluarga</small>
                                    <h6>{{ $provinsi_smt->name }}</h6>


                                </div>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="card">
                    <div class="row">
                        <div class="col s12">
                            <ul class="tabs">
                                <li class="tab col s4"><a class="active" href="#riwayat_periksa_card">Riwayat
                                        Periksa</a></li>
                                <li class="tab col s4"><a href="#soap_perawat_card">SOAP Perawat</a></li>
                                <li class="tab col s4"><a href="#soap_dokter_card">SOAP Dokter</a></li>
                            </ul>
                        </div>
                        <div id="riwayat_periksa_card" class="col s12">
                            <div class="card-content">
                                <div class="table-responsive">

                                    <table id="file_export"
                                        class="table table-striped table-bordered display cariTable">
                                        <thead>
                                            <tr>
                                                {{-- // "norm", "nama","nik", "tgl_lahir", "umur", "alamat_tetap" --}}

                                                <th>Aksi</th>
                                                <th id="no">Id</th>
                                                <th id="no">Id Pasien</th>
                                                <th id="no">Waktu Daftar</th>
                                                <th id="norm">Nama</th>
                                                <th id="nik">NIK</th>
                                                <th id="nama">No. RM</th>
                                                <th id="tgl_lahir">Poli</th>
                                                <th id="tgl_lahir">Dokter</th>
                                                <th id="umur">Cara Bayar</th>
                                                <th id="alamat_tetap">Rujukan</th>
                                                <th id="alamat_tetap">Penanggungjawab</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>

                                                <th>Aksi</th>
                                                <th id="no">Id</th>
                                                <th id="no">Id Pasien</th>
                                                <th id="no">Waktu Daftar</th>
                                                <th id="norm">Nama</th>
                                                <th id="nik">NIK</th>
                                                <th id="nama">No. RM</th>
                                                <th id="tgl_lahir">Poli</th>
                                                <th id="tgl_lahir">Dokter</th>
                                                <th id="umur">Cara Bayar</th>
                                                <th id="alamat_tetap">Rujukan</th>
                                                <th id="alamat_tetap">Penanggungjawab</th>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="soap_perawat_card" class="col s12">
                            <div class="card-content">
                                <div class="table-responsive">

                                    <table id="file_export"
                                        class="table table-striped table-bordered display cariTable1">
                                        <thead>
                                            <tr>
                                                <th>Aksi</th>
                                                <th>Id</th>
                                                <th>Id Daftar</th>
                                                <th>Waktu Daftar Periksa</th>
                                                <th>Nama</th>
                                                <th>Poli</th>
                                                <th>Dokter</th>
                                                <th>Anamnesa</th>
                                                <th>Systolic</th>
                                                <th>Diastolic</th>
                                                <th>Nadi</th>
                                                <th>Suhu</th>
                                                <th>Pernafasan</th>
                                                <th>Tinggi</th>
                                                <th>Berat</th>
                                                <th>Lila</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>

                                                <th>Aksi</th>
                                                <th>Id</th>
                                                <th>Id Daftar</th>
                                                <th>Waktu Daftar Periksa</th>
                                                <th>Nama</th>
                                                <th>Poli</th>
                                                <th>Dokter</th>
                                                <th>Anamnesa</th>
                                                <th>Systolic</th>
                                                <th>Diastolic</th>
                                                <th>Nadi</th>
                                                <th>Suhu</th>
                                                <th>Pernafasan</th>
                                                <th>Tinggi</th>
                                                <th>Berat</th>
                                                <th>Lila</th>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="soap_dokter_card" class="col s12">
                            <div class="row">
                                <div class="col s12">
                                    <div class="card">
                                        <div class="card-content">
                                            <h5 class="card-title">Data Soap Dokter</h5>
                                            <div class="row align-items-center">
                                                <div class="col s12 m8 l10">
                                                    <h6 class="card-subtitle">Detail data Tindakan.



                                                    </h6>
                                                </div>

                                            </div>

                                            <div class="table-responsive">
                                                <table id="" class="table table-striped table-bordered display cariTableDokter">
                                                    <thead>
                                                        <tr>
                                                            <th>Aksi</th>
                                                            <th>id</th>
                                                            <th>id_daftar</th>

                                                            <th>waktu_daftar_periksa</th>
                                                            <th>nama_pasien</th>
                                                            <th>nama_poliklinik</th>
                                                            <th>nama_dokter</th>


                                                            <th>anamnesa</th>

                                                            <th>planning</th>
                                                            <th>keluar</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>

                                                            <th>Aksi</th>
                                                            <th>id</th>
                                                            <th>id_daftar</th>

                                                            <th>waktu_daftar_periksa</th>
                                                            <th>nama_pasien</th>
                                                            <th>nama_poliklinik</th>
                                                            <th>nama_dokter</th>


                                                            <th>anamnesa</th>

                                                            <th>planning</th>
                                                            <th>keluar</th>
                                                        </tr>
                                                    </tfoot>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col s12">
                                    <div class="card">
                                        <div class="card-content">
                                            <h5 class="card-title">Data Soap Dokter Diagnosa</h5>
                                            <div class="row align-items-center">
                                                <div class="col s12 m8 l10">
                                                    <h6 class="card-subtitle">Detail data diagnosa



                                                    </h6>
                                                </div>

                                            </div>

                                            <div class="table-responsive">
                                                <table id="diagnosa_table" class="table table-striped table-bordered display">
                                                    <thead>
                                                        <tr>
                                                            <th>Kode</th>
                                                            <th>Arti</th>
                                                            <th>Waktu Periksa</th>
                                                            <th>Nama Pasien</th>
                                                            <th>Nama Poliklinik</th>
                                                            <th>Nama Dokter</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($diagnosa as $item)
                                                        <tr>
                                                            <td>{{$item->nama}}</td>
                                                            <td>{{$item->arti}}</td>
                                                            <td>{{$item->waktu_daftar_periksa}}</td>
                                                            <td>{{$item->nama_pasien}}</td>
                                                            <td>{{$item->nama_poliklinik}}</td>
                                                            <td>{{$item->nama_dokter}}</td>
                                                        </tr>
                                                        @endforeach

                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="card">
                                        <div class="card-content">
                                            <h5 class="card-title">Data Soap Dokter Tindakan</h5>
                                            <div class="row align-items-center">
                                                <div class="col s12 m8 l10">
                                                    <h6 class="card-subtitle">Detail data tindakan



                                                    </h6>
                                                </div>

                                            </div>

                                            <div class="table-responsive">
                                                <table id="tindakan_table" class="table table-striped table-bordered display">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Tindakan</th>
                                                            <th>Jumlah</th>
                                                            <th>Waktu Periksa</th>
                                                            <th>Nama Pasien</th>
                                                            <th>Nama Poliklinik</th>
                                                            <th>Nama Dokter</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($tindakan as $item)
                                                        <tr>
                                                            <td>{{$item->nama}}</td>
                                                            <td>{{$item->jumlah}}</td>
                                                            <td>{{$item->waktu_daftar_periksa}}</td>
                                                            <td>{{$item->nama_pasien}}</td>
                                                            <td>{{$item->nama_poliklinik}}</td>
                                                            <td>{{$item->nama_dokter}}</td>
                                                        </tr>
                                                        @endforeach

                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <div class="card">
                                        <div class="card-content">
                                            <h5 class="card-title">Data Soap Dokter Obat</h5>
                                            <div class="row align-items-center">
                                                <div class="col s12 m8 l10">
                                                    <h6 class="card-subtitle">Detail data obat



                                                    </h6>
                                                </div>

                                            </div>

                                            <div class="table-responsive">
                                                <table id="obat_table" class="table table-striped table-bordered display">
                                                    <thead>
                                                        <tr>
                                                            <th>Nama Obat</th>
                                                            <th>Jumlah</th>
                                                            <th>Waktu Periksa</th>
                                                            <th>Nama Pasien</th>
                                                            <th>Nama Poliklinik</th>
                                                            <th>Nama Dokter</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($obat as $item)
                                                        <tr>
                                                            <td>{{$item->nama}}</td>
                                                            <td>{{$item->jumlah}}</td>
                                                            <td>{{$item->waktu_daftar_periksa}}</td>
                                                            <td>{{$item->nama_pasien}}</td>
                                                            <td>{{$item->nama_poliklinik}}</td>
                                                            <td>{{$item->nama_dokter}}</td>
                                                        </tr>
                                                        @endforeach

                                                    </tbody>

                                                </table>
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
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    <footer class="center-align m-b-30">All Rights Reserved by Materialart. Designed and Developed by <a
            href="https://wrappixel.com">WrapPixel</a>.</footer>
</div>
@endsection

@section('halaman-js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('template') }}/assets/extra-libs/prism/prism.js"></script>
<script src="{{ asset('template') }}/assets/extra-libs/DataTables/datatables.min.js"></script>
{{-- <script src="{{ asset('template') }}/dist/js/pages/datatable/datatable-advanced.init.js">
</script> --}}

<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

<script src="{{ asset('template') }}/assets/libs/sweetalert2/dist/sweetalert2.min.js">
</script>
<script src="{{ asset('template') }}/assets/libs/sweetalert2/sweet-alert.init.js"></script>
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

    $(function () {
        $('#diagnosa_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
        $('#tindakan_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
        $('#obat_table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

    var tableSearchingDokter = $('.cariTableDokter').DataTable({
            dom: 'B<"clear">lfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            processing: true,
            serverSide: true,

            columnDefs: [{
                "targets": [1, 2],
                "visible": false
            }],
            ajax: "{{ route('showSoapDokter', $singlePasien->id) }}",
            "columns": [{
                    data: 'action',
                    orderable: false,
                    searchable: false
                },

                {
                    data: "id"
                },
                {
                    data: "id_daftar"
                },

                {
                    data: "waktu_daftar_periksa"
                },
                {
                    data: "nama_pasien"
                },
                {
                    data: "nama_poliklinik"
                },
                {
                    data: "nama_dokter"
                },


                {
                    data: "anamnesa"
                },

                {
                    data: "planning"
                },
                {
                    data: "keluar"
                },

            ],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                });
            }
        });

        $('.cariTable tbody').on('mouseover', 'tr', function () {
            var data = tableSearchingDokter.row(this).data();
            // alert(data["id"]);
            $(".edit").attr("href", "{{ route('soap_dokter.index') }}/" + data[
                'id'] + "/edit");
            $(".delete").attr("action", "{{ route('soap_dokter.index') }}/" + data[
                'id']);
            $('.show_confirm').click(function (event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");


                // swal({
                //     title: "Apakah anda yakin?",
                //     text: "Apabila anda yakin silahkan klik iya",
                //     type: "warning",
                //     showCancelButton: true,
                //     confirmButtonColor: "#DD6B55",
                //     confirmButtonText: "Iya",
                //     // closeOnConfirm: false
                // }, function (e) {
                //     // form[0].submit();
                //     console.log(e);
                //     console.log("sdfdfdf");
                //     swal("Dihapus!", "Data anda telah dihapus.", "success");


                // });

                const config = {
                    // html: true,
                    title: 'Apakah anda yakin?',
                    text: 'Apabila anda yakin silahkan klik iya',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Iya',
                    confirmButtonColor: "#DD6B55",
                };

                // first variant
                sweetAlert.fire(config).then(callback);

                function callback(result) {
                    if (result.value) {
                        SweetAlert.fire("Berhasil!", "data telah dimanipulasi", "success");
                        form[0].submit();

                    }
                }




            });
        });


    });

    $(function () {
        var tableSearching = $('.cariTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            processing: true,
            serverSide: true,

            columnDefs: [{
                "targets": [1, 2],
                "visible": false
            }],
            ajax: "{{ route('showDaftarPeriksa', $singlePasien->id ) }}",
            "columns": [{
                    data: 'action',
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "id"
                },
                {
                    "data": "id_pasien"
                },
                {
                    "data": "waktu_daftar_periksa"
                },
                {
                    "data": "nama_pasien"
                },
                {
                    "data": "nik"
                },
                {
                    "data": "norm"
                },
                {
                    "data": "poli"
                },
                {
                    "data": "nama_dokter"
                },
                {
                    "data": "cara_bayar"
                },
                {
                    "data": "rujukan"
                },
                {
                    "data": "penanggungjawab"
                },
            ],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                });
            }
        });


        $('.cariTable tbody').on('mouseover', 'tr', function () {
            var data = tableSearching.row(this).data();
            // alert(data["id"]);
            $(".soap_perawat_btn").attr("href",
                "{{ route('soap_perawat.index') }}/soap_perawat_baru/" + data[
                    'id_pasien']);
            $(".soap_dokter_btn").attr("href", "{{ route('soap_dokter.index') }}/soap_dokter_baru/" +
                data[
                    'id_pasien']);

            $('.show_confirm').click(function (event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");




                const config = {
                    // html: true,
                    title: 'Apakah anda yakin?',
                    text: 'Apabila anda yakin silahkan klik iya',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Iya',
                    confirmButtonColor: "#DD6B55",
                };

                // first variant
                sweetAlert.fire(config).then(callback);

                function callback(result) {
                    if (result.value) {
                        SweetAlert.fire("Berhasil!", "data telah dimanipulasi", "success");
                        form[0].submit();

                    }
                }




            });
        });
    });

    $(function () {



        var tableSearching1 = $('.cariTable1').DataTable({
            dom: 'B<"clear">lfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            processing: true,
            serverSide: true,

            columnDefs: [{
                "targets": [1, 2],
                "visible": false
            }],
            ajax: "{{ route('showSoapPerawat', $singlePasien->id) }}",
            "columns": [{
                    data: 'action',
                    orderable: false,
                    searchable: false
                },
                {
                    data: "id"
                },
                {
                    data: "id_daftar"
                },
                {
                    data: "waktu_daftar_periksa"
                },
                {
                    data: "nama_pasien"
                },
                {
                    data: "nama_poliklinik"
                },
                {
                    data: "nama_dokter"
                },
                {
                    data: "anamnesa"
                },
                {
                    data: "systolic"
                },
                {
                    data: "diastolic"
                },
                {
                    data: "nadi"
                },
                {
                    data: "suhu"
                },
                {
                    data: "pernafasan"
                },
                {
                    data: "tinggi"
                },
                {
                    data: "berat"
                },
                {
                    data: "lila"
                },
            ],
            initComplete: function () {
                this.api().columns().every(function () {
                    var column = this;
                    var input = document.createElement("input");
                    $(input).appendTo($(column.footer()).empty())
                        .on('change', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
                });
            }
        });





        $('.cariTable1 tbody').on('mouseover', 'tr', function () {
            var data = tableSearching1.row(this).data();
            // alert(data["id"]);
            $(".edit").attr("href", "{{ route('soap_perawat.index') }}/" + data[
                'id'] + "/edit");
            $(".delete").attr("action", "{{ route('soap_perawat.index') }}/" + data[
                'id']);
            $('.show_confirm').click(function (event) {
                var form = $(this).closest("form");
                var name = $(this).data("name");


                // swal({
                //     title: "Apakah anda yakin?",
                //     text: "Apabila anda yakin silahkan klik iya",
                //     type: "warning",
                //     showCancelButton: true,
                //     confirmButtonColor: "#DD6B55",
                //     confirmButtonText: "Iya",
                //     // closeOnConfirm: false
                // }, function (e) {
                //     // form[0].submit();
                //     console.log(e);
                //     console.log("sdfdfdf");
                //     swal("Dihapus!", "Data anda telah dihapus.", "success");


                // });

                const config = {
                    // html: true,
                    title: 'Apakah anda yakin?',
                    text: 'Apabila anda yakin silahkan klik iya',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Iya',
                    confirmButtonColor: "#DD6B55",
                };

                // first variant
                sweetAlert.fire(config).then(callback);

                function callback(result) {
                    if (result.value) {
                        SweetAlert.fire("Berhasil!", "data telah dimanipulasi", "success");
                        form[0].submit();

                    }
                }

                // Swal.fire({
                //     title: 'Do you want to save the changes?',
                //     showDenyButton: true,
                //     showCancelButton: true,
                //     confirmButtonText: 'Yes',
                //     denyButtonText: 'No',
                //     customClass: {
                //         actions: 'my-actions',
                //         cancelButton: 'order-1 right-gap',
                //         confirmButton: 'order-2',
                //         denyButton: 'order-3',
                //     }
                // }).then((result) => {
                //     if (result.isConfirmed) {
                //         form[0].submit();

                //         Swal.fire('Saved!', '', 'success')
                //     } else if (result.isDenied) {
                //         Swal.fire('Changes are not saved', '', 'info')
                //     }
                // })


            });
        });




    });

</script>
@endsection

@section('halaman-css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('template') }}/dist/css/pages/data-table.css" rel="stylesheet">

@endsection
