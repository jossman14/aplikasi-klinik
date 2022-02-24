@extends('layout.app')

@section('judul-halaman')
Halaman Utama Pasien
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Manajemen Pasien</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Pasien</a>
                <a href="#!" class="breadcrumb">Manajemen Pasien</a>
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
                        <h5 class="card-title">Data Pasien</h5>
                        <div class="row align-items-center">
                            <div class="col s12 m8 l10">
                                <h6 class="card-subtitle">Tabel ini berisi data pasien secara lengkap dari awal mula
                                    sistem berjalan sampai waktu sekarang</a></h6>
                            </div>
                            <div class="col s12 m4 l2 align-self-center">
                                <a class="waves-effect waves-light btn-small blue" href="{{route('pasien.create')}}"><i
                                        class="material-icons left">add</i>Tambah Pasien</a>
                            </div>
                        </div>
                        <div class="table-responsive">

                            <table id="file_export" class="table table-striped table-bordered display">
                                <thead>
                                    <tr>
                                        <th>RM</th>
                                        <th>Nama</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Umur</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($all_pasien as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->tgl_lahir}}</td>
                                        <td>{{$item->umur}}</td>
                                        <td>{{$item->alamat_tetap}}</td>
                                        <td class="">


                                            <a type="button"
                                                class="btn waves-effect waves-light green btn-sm btn-icon btn-pure btn-outline"
                                                data-toggle="tooltip" data-original-title="Delete"><i class="ti-search"
                                                    aria-hidden="true"></i></a>

                                            <a type="button"
                                                class="btn waves-effect waves-light orange btn-sm btn-icon btn-pure btn-outline"
                                                data-toggle="tooltip" data-original-title="Delete"><i class="ti-pencil"
                                                    aria-hidden="true"></i></a>

                                            <a type="button"
                                                class="btn waves-effect waves-light red btn-sm btn-icon btn-pure btn-outline"
                                                data-toggle="tooltip" data-original-title="Delete"><i class="ti-close"
                                                    aria-hidden="true"></i></a>


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
        <div id="modal2" class="modal">
            <div class="modal-content">
                <h5 class="card-title"> <i class="fas fa-phone-square m-r-10"></i>New Contact</h5>
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s9">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="icon_prefix" type="text" class="validate">
                                <label for="icon_prefix">Enter Name Here</label>
                            </div>
                            <div class="input-field col s9">
                                <i class="material-icons prefix">phone</i>
                                <input id="icon_telephone" type="tel" class="validate">
                                <label for="icon_telephone">Telephone</label>
                            </div>
                            <div class="file-field input-field col s9">
                                <div class="btn indigo">
                                    <span>File</span>
                                    <input type="file">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat indigo white-text"><i
                        class="far fa-save m-r-10"></i> Save Contact</a>
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
<script src="{{ asset('template') }}/assets/extra-libs/DataTables/datatables.min.js"></script>
{{-- <script src="{{ asset('template') }}/dist/js/pages/datatable/datatable-advanced.init.js"></script> --}}

<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
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

</script>
@endsection

@section('halaman-css')
<link href="{{ asset('template') }}/dist/css/pages/data-table.css" rel="stylesheet">

@endsection
