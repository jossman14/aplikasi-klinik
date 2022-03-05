@extends('layout.app')

@section('judul-halaman')
Halaman Utama Obat Detail
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Manajemen Obat Detail</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Obat Detail</a>
                <a href="#!" class="breadcrumb">Manajemen Obat Detail</a>
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
                        <h5 class="card-title">Data Obat Detail</h5>
                        <div class="row align-items-center">
                            <div class="col s12 m8 l10">
                                <h6 class="card-subtitle">{!!$keterangan !!}


                                    @isset($filter_pencarian)
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
                                    href="{{ route('obat_detail.create') }}"><i
                                        class="material-icons left">add</i>Tambah Obat Detail</a>

                                <a class="waves-effect waves-light btn-small blue m-t-10 modal-trigger"
                                    href="#modal1"><i class="material-icons left">add</i>Filter Obat Detail</a>
                            </div>
                        </div>
                        <div class="table-responsive">

                            <table id="file_export" class="table table-striped table-bordered display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Obat</th>
                                        <th>Stock</th>
                                        <th>Expire</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($obat_detail as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nama_jenis_obat }}</td>
                                            <td>{{ $item->stock }}</td>
                                            <td>{{ $item->expire }}</td>
                                            <td class="">


                                                <a type="button"
                                                    class="btn waves-effect waves-light green btn-sm btn-icon btn-pure btn-outline"
                                                    href="{{ route('obat_detail.show', $item->id) }}"
                                                    data-toggle="tooltip" data-original-title="show""><i
                                                        class=" ti-search" aria-hidden="true"></i></a>

                                                <a type="button"
                                                    class="btn waves-effect waves-light orange btn-sm btn-icon btn-pure btn-outline"
                                                    href="{{ route('obat_detail.edit', $item->id) }}"
                                                    data-toggle="tooltip" data-original-title="edit"><i
                                                        class="ti-pencil" aria-hidden="true"></i></a>



                                                <form method="POST"
                                                    action="{{ route('obat_detail.destroy', $item->id) }}"
                                                    style="display: inline">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <a type="button"
                                                        class="btn waves-effect waves-light red btn-sm btn-icon btn-pure btn-outline show_confirm"
                                                        data-toggle="tooltip" data-original-title="delete"
                                                        title='Delete'><i class="ti-close" aria-hidden="true"></i></a>

                                                    {{-- <button type="submit"
                                                        class="btn waves-effect waves-light red btn-sm btn-icon btn-pure btn-outline show_confirm"
                                                        data-toggle="tooltip" title='Delete'>Delete</button> --}}
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
                    harus mengisi semua kolom pencarian dengan lengkap.</p>
                <div class="row">
                    <form class="col s12" id="cariData" action="{{ route('obatDetailFilter') }}"
                        method="POST">
                        @csrf
                        {{-- " ,"" ,"min_stock" ,"max_stock", "" ,"tgl_beli" ,"expire" ,"batch" ,"penyedia" ,"harga_beli" ,"harga_jual" --}}
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="icon_prefix" type="text" class="validate" name="nama">
                                <label for="icon_prefix">Nama</label>
                            </div>

                            <div class="col s12 m6">
                                <div class="input-field col s12">
                                    <select required class="custom-select form-control" id="satuan"
                                        name="satuan">
                                        <option disabled selected>Pilih Satuan Obat</option>
                                        @foreach($satuan_obat as $item)

                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="sapaan"> Satuan Obat : <span class="danger">*</span>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col s12 m6">
                                <div class="input-field col s12">
                                    <select required class="custom-select form-control" id="jenis_obat"
                                        name="jenis_obat">
                                        <option disabled selected>Pilih Jenis Obat</option>
                                        @foreach($jenis_obat as $item)

                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="sapaan"> Jenis Obat : <span class="danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col s12 m6">
                                <div class="input-field col s12">
                                    <select required class="custom-select form-control" id="penyedia_obat"
                                        name="penyedia_obat">
                                        <option disabled selected>Pilih Penyedia Obat</option>
                                        @foreach($penyedia_obat as $item)

                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="sapaan"> Penyedia Obat : <span class="danger">*</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="icon_telephone" type="number" class="validate"
                                    name="stok_bawah">
                                <label for="icon_telephone">Cari Stok Mulai</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="icon_telephone" type="number" class="validate"
                                    name="stok_atas">
                                <label for="icon_telephone">Sampai Stok </label>
                            </div>
                        </div>
                        <hr>



                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="icon_telephone" type="date" class="validate"
                                    name="tgl_beli_bawah">
                                <label for="icon_telephone">Cari tanggal beli mulai</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="icon_telephone" type="date" class="validate"
                                    name="tgl_beli_atas">
                                <label for="icon_telephone">sampai tanggal beli </label>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="icon_telephone" type="date" class="validate"
                                    name="expire_bawah">
                                <label for="icon_telephone">Cari tanggal kadaluarsa mulai</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="icon_telephone" type="date" class="validate"
                                    name="expire_atas">
                                <label for="icon_telephone">sampai tanggal kadaluarsa </label>
                            </div>
                        </div>
                        <hr>


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




        for (let index = 1; index < document.getElementById("file_export").rows.length; index++) {
            // console.log($("#dateFormat"+String(index)).html())
            dateFormat("#dateFormat" + String(index), $("#dateFormat" + String(index)).html());

        }
    });

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

    $(function () {


        $('.modal').removeAttr("tabindex");


        $("select").select2({
            width: '100%',
        });

        // $("select").each((_i, e) => {
        //     var $e = $(e);
        //     $e.select2({
        //         tags: true,
        //         dropdownParent: $e.parent(),
        //         width: '100%',


        //     });
        // })




        $(".select2.select2-container.select2-container--default").addClass('m-t-15 m6');
        // $(".select2-selection.select2-selection--single").addClass('m-t-15');


        $(".select-dropdown.dropdown-trigger").remove();

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
