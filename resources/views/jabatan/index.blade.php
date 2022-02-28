@extends('layout.app')

@section('judul-halaman')
Halaman Utama Jabatan
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Manajemen Jabatan</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Jabatan</a>
                <a href="#!" class="breadcrumb">Manajemen Jabatan</a>
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
                        <h5 class="card-title">Data Jabatan</h5>
                        <div class="row align-items-center">
                            <div class="col s12 m8 l10">
                                <h6 class="card-subtitle">Detail data jabatan pasien.



                                    @isset($filter_pencarian)
                                        <span> Tabel menampilkan hasil pencarian {{ count($jabatan) }} data dengan
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
                            <div class="col s12 m4 l2 align-self-center">
                                <a class="waves-effect waves-light btn-small blue"
                                    href="{{ route('jabatan.create') }}"><i
                                        class="material-icons left">add</i>Tambah Jabatan</a>

                                <a class="waves-effect waves-light btn-small blue m-t-10 modal-trigger"
                                    href="#modal1"><i class="material-icons left">add</i>Filter Jabatan</a>
                            </div>
                        </div>
                        <div class="table-responsive">

                            <table id="file_export" class="table table-striped table-bordered display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($jabatan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td class="">




                                                <a type="button"
                                                    class="btn waves-effect waves-light orange btn-sm btn-icon btn-pure btn-outline"
                                                    href="{{ route('jabatan.edit', $item->id) }}"
                                                    data-toggle="tooltip" data-original-title="edit"><i
                                                        class="ti-pencil" aria-hidden="true"></i></a>



                                                <form method="POST"
                                                    action="{{ route('jabatan.destroy', $item->id) }}"
                                                    style="display: inline">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <a type="button"
                                                        class="btn waves-effect waves-light red btn-sm btn-icon btn-pure btn-outline show_confirm"
                                                        data-toggle="tooltip" data-original-title="delete"
                                                        title='Delete'><i class="ti-close" aria-hidden="true"></i></a>


                                                </form>


                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>

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
                    <form class="col s12" id="cariData" action="{{ route('jabatanFilter') }}"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="icon_prefix" type="text" class="validate" name="jabatan">
                                <label for="icon_prefix">Jabatan</label>
                            </div>
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
    $('#file_export').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
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
