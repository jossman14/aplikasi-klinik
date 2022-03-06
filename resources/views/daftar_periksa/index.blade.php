@extends('layout.app')

@section('judul-halaman')
Halaman Utama Daftar Periksa
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Manajemen Daftar Periksa</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Daftar Periksa</a>
                <a href="#!" class="breadcrumb">Manajemen Daftar Periksa</a>
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
                        <h5 class="card-title">Data Daftar Periksa</h5>
                        <div class="row align-items-center">
                            <div class="col s12 m8 l10">
                                <h6 class="card-subtitle">Pilih data pasien.



                                    @isset($filter_pencarian)
                                        <span> Tabel menampilkan hasil pencarian {{ count($daftar_periksa) }} data
                                            dengan
                                            filter
                                            pencarian</span>
                                        @foreach($filter_pencarian as $key=>$item)
                                            @if($item != "")
                                                <span class="green white-text p-l-5 p-r-5">{{ $key }} :
                                                    {{ $item }}</span>
                                            @endif
                                        @endforeach

                                    @endisset
                                </h6>
                            </div>

                        </div>

                        <div class="table-responsive">

                            <table id="file_export" class="table table-striped table-bordered display cariTable">
                                <thead>
                                    <tr>
                                        {{-- // "norm", "nama","nik", "tgl_lahir", "umur", "alamat_tetap" --}}

                                        <th>Aksi</th>
                                        <th id="no">No</th>
                                        <th id="norm">Norm</th>
                                        <th id="nik">NIK</th>
                                        <th id="nama">Nama</th>
                                        <th id="tgl_lahir">Tanggal Lahir</th>
                                        <th id="umur">Umur</th>
                                        <th id="alamat_tetap">Alamat Tetap</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                        <th>Aksi</th>
                                        <th id="no">No</th>
                                        <th id="norm">Norm</th>
                                        <th id="nik">NIK</th>
                                        <th id="nama">Nama</th>
                                        <th id="tgl_lahir">Tanggal Lahir</th>
                                        <th id="umur">Umur</th>
                                        <th id="alamat_tetap">Alamat Tetap</th>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Create Modal Structure -->
        <div id="modal1" class="modal p-20">
            <div class="modal-content">
                <h5 class="card-title"> <i class="fas fa-filter m-r-10"></i>Filter Data</h5>
                <p class="card-title"> <i class="fas fa-info m-r-10"></i>Silahkan isi data yang anda cari, anda tidak
                    harus mengisi semua kolom pencarian dengan lengkap. </p>
                <div class="row">
                    <form class="col s12" id="cariData" action="{{ route('daftar_periksa.store') }}"
                        method="POST">
                        @csrf



                        <div class="input-field col s12">
                            <input type="text" class="no_antrian" id="no_antrian" name="no_antrian" required>
                            <label for="no_antrian"> No Antrian : <span class="danger"></span>
                            </label>
                        </div>
                        <div class="input-field col s12">
                            <input type="date" class="waktu_daftar_periksa" id="waktu_daftar_periksa"
                                name="waktu_daftar_periksa" required disabled>
                            <label for="waktu_daftar_periksa"> Waktu Daftar Periksa : <span class="danger"></span>
                            </label>
                        </div>
                        <div class="input-field col s12">
                            <input type="text" class="norm" id="norm" name="norm" required>
                            <label for="norm"> NO. RM : <span class="danger"></span>
                            </label>
                        </div>
                        <div class="input-field col s12">
                            <input type="text" class="nik" id="nik" name="nik" required>
                            <label for="nik"> NIK : <span class="danger"></span>
                            </label>
                        </div>
                        <div class="input-field col s12">
                            <input type="text" class="id_pasien" id="id_pasien" name="id_pasien_fake" required>
                            <input type="text" class="id_pasien" id="id_pasien" name="id_pasien" hidden>
                            <label for="id_pasien"> Nama Pasien : <span class="danger"></span>
                            </label>
                        </div>


                        <div class="input-field col s12">
                            <select required class="custom-select form-control" id="is_poli" name="is_poli">
                                <option disabled selected>Pilih Poliklinik</option>
                                @foreach($poli as $item)

                                    <option value="{{ $item->id }}">
                                        {{ $item->nama }}</option>
                                @endforeach
                            </select>
                            <label for="sapaan"> Poliklinik: <span class="danger">*</span>
                            </label>
                        </div>




                        <div class="col s12">
                            <div class="input-field col s12">
                                <select required class="custom-select form-control" id="is_dokter" name="is_dokter">
                                    <option disabled selected>Pilih Dokter</option>
                                    @foreach($dokter as $item)

                                        <option value="{{ $item->sdm_id }}">
                                            {{ $item->nama_sdm }}</option>
                                    @endforeach
                                </select>
                                <label for="sapaan"> Dokter: <span class="danger">*</span>
                                </label>
                            </div>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" class="cara_bayar" id="cara_bayar" name="cara_bayar" required>
                            <label for="cara_bayar"> Cara Bayar : <span class="danger"></span>
                            </label>
                        </div>

                        <div class="input-field col s12">
                            <input type="text" class="penanggungjawab" id="penanggungjawab" name="penanggungjawab"
                                required>
                            <label for="penanggungjawab"> Penanggungjawab : <span class="danger"></span>
                            </label>
                        </div>



                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit"
                    class="modal-action modal-close waves-effect waves-green btn-flat indigo white-text"
                    id="cariDataBtn">Cari
                    Data</button>
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
            ajax: "{{ route('daftar_periksa.index') }}",
            "columns": [{
                    data: 'action',
                    orderable: false,
                    searchable: false
                },
                {
                    "data": "id"
                },
                {
                    "data": "norm"
                },
                {
                    "data": "nik"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "tgl_lahir"
                },
                {
                    "data": "umur"
                },
                {
                    "data": "alamat_tetap"
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
            // console.log(data["id"]);
            $(".periksa").attr("href", "{{ route('daftar_periksa.index') }}/daftar_periksa_baru/" + data['id']);

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
<link href="{{ asset('template') }}/dist/css/pages/data-table.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('template') }}/assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet"
    type="text/css">
@endsection
