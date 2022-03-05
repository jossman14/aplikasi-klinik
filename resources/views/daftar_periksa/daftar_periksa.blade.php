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
                                <h6 class="card-subtitle"> data daftar periksa pasien



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
                            <div class="col s12 m4 l2align-self-center">
                                <a class="waves-effect waves-light btn-small blue"
                                    href="{{ route('daftar_periksa.index') }}"><i
                                        class="material-icons left">add</i>Tambah Daftar Periksa</a>


                            </div>
                        </div>

                        <div class="table-responsive">

                            <table id="file_export" class="table table-striped table-bordered display cariTable">
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



        var tableSearching = $('.cariTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            processing: true,
            serverSide: true,

            columnDefs: [{
                "targets": [1,2],
                "visible": false
            }],
            ajax: "{{ route('indexDaftarPeriksa') }}",
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
            $(".see").attr("href", "{{ route('pasien.index') }}/" + data['id_pasien']);
            $(".edit").attr("href", "{{ route('daftar_periksa.index') }}/" + data['id'] + "/edit");
            $(".delete").attr("action", "{{ route('daftar_periksa.index') }}/" + data['id']);
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
