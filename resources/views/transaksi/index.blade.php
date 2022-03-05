@extends('layout.app')

@section('judul-halaman')
Halaman Utama Transaksi
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Manajemen Transaksi</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Transaksi</a>
                <a href="#!" class="breadcrumb">Manajemen Transaksi</a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <h5 class="card-title">Data Transaksi Tindakan</h5>
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

                                        <th>Waktu Transaksi</th>
                                        <th>Nama Tindakan</th>
                                        <th>Nama Pasien</th>
                                        <th>Nama Poliklinik</th>
                                        <th>Nama Dokter</th>
                                        <th>Jumlah Tindakan</th>
                                        <th>Nominal Transaksi</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($transaksi_tindakan as $item)
                                    <tr>
                                        <td>{{$item->waktu_transaksi}}</td>
                                        <td>{{$item->nama_tindakan}}</td>
                                        <td>{{$item->nama_pasien}}</td>
                                        <td>{{$item->nama_poliklinik}}</td>
                                        <td>{{$item->nama_dokter}}</td>
                                        <td>{{$item->jumlah_tindakan}}</td>
                                        <td>{{$item->jumlah_transaksi}}</td>
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
                        <h5 class="card-title">Data Transaksi Obat</h5>
                        <div class="row align-items-center">
                            <div class="col s12 m8 l10">
                                <h6 class="card-subtitle">Detail data Obat



                                </h6>
                            </div>

                        </div>

                        <div class="table-responsive">
                            <table id="obat_table" class="table table-striped table-bordered display">
                                <thead>
                                    <tr>

                                        <th>Waktu Transaksi</th>
                                        <th>Nama Obat</th>
                                        <th>Nama Pasien</th>
                                        <th>Nama Poliklinik</th>
                                        <th>Nama Dokter</th>
                                        <th>Jumlah Obat</th>
                                        <th>Nominal Transaksi</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($transaksi_obat as $item)
                                    <tr>
                                        <td>{{$item->waktu_transaksi}}</td>
                                        <td>{{$item->nama_obat}}</td>
                                        <td>{{$item->nama_pasien}}</td>
                                        <td>{{$item->nama_poliklinik}}</td>
                                        <td>{{$item->nama_dokter}}</td>
                                        <td>{{$item->jumlah_obat}}</td>
                                        <td>{{$item->jumlah_transaksi}}</td>
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
    //=============================================//
    //    File export                              //
    //=============================================//

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');


    $(function () {

        // var table = $('#dom_jq_event').DataTable();

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

        // $(".periksa").click(function (e) {
        //     console.log("hehe")

        // });

        // $('.cariTable').on('click', '.periksa', function () {
        //     var currentTR = $(this).closest('tr');
        //     // var data = table.row(currentTR);
        //     console.log(currentTR);


        //     // $(".periksa").attr("href", "{{ route('pasien.create') }}/" + data['id']);

        //     //  var iprice = currentTR.find("price").text();
        //     //  var iqty = currentTR.find("qty").text();
        // });





        var tableSearching = $('.cariTable').DataTable({
            dom: 'B<"clear">lfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            processing: true,
            serverSide: true,

            columnDefs: [{
                "targets": [1],
                "visible": false
            }],
            ajax: "{{ route('transaksi.index') }}",
            "columns": [{
                    data: 'action',
                    orderable: false,
                    searchable: false
                },
                {
                    data: "id"
                },
                {
                    data: "nama"
                },
                {
                    data: "nama_jenis_transaksi"
                },

                {
                    data: "jasa_dokter"
                },
                {
                    data: "jasa_perawat"
                },
                {
                    data: "jasa_klinik"
                },
                {
                    data: "alat"
                },
                {
                    data: "bahan"
                },
                {
                    data: "lainnya"
                },
                {
                    data: "harga_total"
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
            $(".edit").attr("href", "{{ route('transaksi.index') }}/" + data['id'] + "/edit");
            $(".delete").attr("action", "{{ route('transaksi.index') }}/" + data['id']);
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


        // $('.cariTable tbody').on('hover', 'tr', function () {
        //     var data = table.row(this).data();

        //     $(".cariTable tbody tr").css('cursor', 'pointer');

        // });

    });





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

    $(function () {


        $('.modal').removeAttr("tabindex");

        $("#cariDataBtn").click(function (e) {
            $("#cariData")[0].submit();

        });



    });

</script>
@endsection

@section('halaman-css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('template') }}/dist/css/pages/data-table.css" rel="stylesheet">
<link href="{{ asset('template') }}/assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet"
    type="text/css">
@endsection
