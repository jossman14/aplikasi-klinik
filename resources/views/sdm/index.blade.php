@extends('layout.app')

@section('judul-halaman')
Halaman Utama Sumber Daya Manusia
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Manajemen Sumber Daya Manusia</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Sumber Daya Manusia</a>
                <a href="#!" class="breadcrumb">Manajemen Sumber Daya Manusia</a>
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
                        <h5 class="card-title">Data Sumber Daya Manusia</h5>
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
                                    href="{{ route('sdm.create') }}"><i
                                        class="material-icons left">add</i>Tambah SDM</a>

                                <a class="waves-effect waves-light btn-small blue m-t-10 modal-trigger"
                                    href="#modal1"><i class="material-icons left">add</i>Filter SDM</a>
                            </div>
                        </div>
                        <div class="table-responsive">

                            <table id="file_export" class="table table-striped table-bordered display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jobdesk</th>
                                        <th>Nomor HP</th>
                                        <th>Desa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($sdm as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_sdm }}</td>
                                            <td>{{ $item->nama_jabatan }}</td>
                                            <td>{{ $item->nomor_hp }}</td>
                                            <td>{{ $item->nama_desa }}</td>
                                            <td class="">


                                                <a type="button"
                                                    class="btn waves-effect waves-light green btn-sm btn-icon btn-pure btn-outline"
                                                    href="{{ route('sdm.show', $item->sdm_id) }}"
                                                    data-toggle="tooltip" data-original-title="show""><i
                                                        class=" ti-search" aria-hidden="true"></i></a>

                                                <a type="button"
                                                    class="btn waves-effect waves-light orange btn-sm btn-icon btn-pure btn-outline"
                                                    href="{{ route('sdm.edit', $item->sdm_id) }}"
                                                    data-toggle="tooltip" data-original-title="edit"><i
                                                        class="ti-pencil" aria-hidden="true"></i></a>



                                                <form method="POST"
                                                    action="{{ route('sdm.destroy', $item->sdm_id) }}"
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
                    harus mengisi semua kolom pencarian dengan lengkap. hanya isi yang anda perlukan saja. contohnya
                    ketika mencari sdm dengan NIK 3312334323, anda dapat menuliskan di kolom NIK hanya dengan 331.
                    sistem akan mencari kecocokan data dengan kolom pencarian. </p>
                <div class="row">
                    <form class="col s12" id="cariData" action="{{ route('sdmFilter') }}"
                        method="POST">
                        @csrf
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <input id="icon_prefix" type="text" class="validate" placeholder="Ahmad" name="nama_sdm">
                                <label for="icon_prefix">Nama</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="icon_telephone" type="tel" class="validate" placeholder="3311876829324"
                                    name="nik">
                                <label for="icon_telephone">NIK</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="icon_telephone" type="tel" class="validate" placeholder="20-01-1997"
                                    name="tgl_lahir">
                                <label for="icon_telephone">Tanggal Lahir</label>
                            </div>
                            <div class="col m6">
                                <div class="input-field col s12">
                                    <select required class="custom-select form-control cariKota" id="tempat_lahir"
                                        name="tempat_lahir">
                                        <option disabled selected>Pilih Tempat Lahir</option>


                                    </select>
                                    <label for="tempat_lahir"> Tempat Lahir : <span class="danger">*</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col s12 m6">
                                <div class="input-field col s12">
                                    <select required class="custom-select form-control" id="status_nikah"
                                        name="status_nikah">
                                        <option disabled selected>Pilih Status Menikah</option>
                                        @foreach($status_nikah as $item)

                                            <option value="{{ $item->id }}">
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    <label for="sapaan"> Status Menikah : <span class="danger">*</span>
                                    </label>
                                </div>
                            </div>

                            <div class="input-field col s12 m6">
                                <input id="icon_prefix" type="text" class="validate" placeholder="26" name="umur">
                                <label for="icon_prefix">Umur</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <input id="icon_telephone" type="tel" class="validate" placeholder="Jalan Raya Bahagia"
                                    name="alamat_sdm">
                                <label for="icon_telephone">Alamat SDM</label>
                            </div>

                            <div class="col s12 m6">
                                <div class="input-field col s12">
                                    <select required class="custom-select form-control" id="jabatan"
                                        name="jabatan">
                                        <option disabled selected>Pilih Jabatan</option>
                                        @foreach($jabatan as $item)

                                            <option value="{{ $item->id }}">{{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="sapaan"> Jabatan : <span class="danger">*</span>
                                    </label>
                                </div>
                            </div>




                        </div>

                        <hr>
                        <div class="row">
                            <div class="col s12 m6">
                                <div class="input-field col s12">
                                    <select required class="custom-select form-control" id="isDokter"
                                        name="isDokter">
                                        <option disabled selected>Apakah Dokter?</option>
                                        <option value="2">Iya</option>
                                        <option value="1">Tidak</option>
                                    </select>
                                    <label for="sapaan"> Apakah Dokter? : <span class="danger">*</span>
                                    </label>
                                </div>
                            </div>

                            <div class="col s12 m6">
                                <div class="input-field col s12">
                                    <select required class="custom-select form-control" id="gol_darah_id"
                                        name="gol_darah_id">
                                        <option disabled selected>Pilih Golongan Darah</option>
                                        @foreach($golongan_darah as $item)

                                            <option value="{{ $item->gol_dar_id }}">
                                                {{ $item->golongan_darah }}</option>
                                        @endforeach
                                    </select>
                                    <label for="sapaan"> Golongan Darah : <span class="danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col s12 m6">
                                <div class="input-field col s12">
                                    <select required class="custom-select form-control" id="jenis_kelamin"
                                        name="jenis_kelamin">
                                        <option disabled selected>Pilih Jenis Kelamin</option>
                                        @foreach($jenis_kelamin as $item)

                                            <option value="{{ $item->id }}">{{ $item->jenis_kelamin }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="sapaan"> Jenis Kelamin : <span class="danger">*</span>
                                    </label>
                                </div>
                            </div>


                            <div class="col s12 m6">
                                <div class="input-field col s12">
                                    <select required class="custom-select form-control" id="agama_id"
                                        name="agama_id">
                                        <option disabled selected>Pilih Agama</option>
                                        @foreach($agama as $item)

                                            <option value="{{ $item->agamaId }}">
                                                {{ $item->agama }}</option>
                                        @endforeach
                                    </select>
                                    <label for="sapaan"> Agama : <span class="danger">*</span>
                                    </label>
                                </div>
                            </div>

                           </div>

                        <hr>
                        <div class="row">
                            <div class="col m6">
                                <div class="input-field col s12">
                                    <select required class="custom-select form-control cariDesa" id="desa_sdm_id"
                                        name="desa_sdm_id">
                                        <option disabled selected>Pilih Desa SDM</option>


                                    </select>
                                    <label for="desa_sdm_id"> Desa SDM : <span class="danger">*</span>
                                    </label>
                                </div>
                            </div>


                            <div class="col m6">
                                <div class="input-field col s12">
                                    <select required class="custom-select form-control cariKecamatan"
                                        id="kecamatan_sdm_id" name="kecamatan_sdm_id">
                                        <option disabled selected>Pilih Kecamatan SDM</option>


                                    </select>
                                    <label for="kecamatan_sdm_id"> Kecamatan SDM : <span class="danger">*</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div class="row">


                            <div class="col m6">
                                <div class="input-field col s12">
                                    <select required class="custom-select form-control cariKota" id="kabupaten_sdm_id"
                                        name="kabupaten_sdm_id">
                                        <option disabled selected>Pilih Kabupaten SDM</option>


                                    </select>
                                    <label for="kabupaten_sdm_id"> Kabupaten SDM : <span class="danger">*</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col m6">
                                <div class="input-field col s12">
                                    <select required class="custom-select form-control cariProvinsi"
                                        id="provinsi_sdm_id" name="provinsi_sdm_id">
                                        <option disabled selected>Pilih Provinsi SDM</option>


                                    </select>
                                    <label for="provinsi_sdm_id"> Provinsi SDM : <span class="danger">*</span>
                                    </label>
                                </div>
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

        dateFormat("#dateFormatAwal", $("#dateFormatAwal").html())
        dateFormat("#dateFormatAkhir", $("#dateFormatAkhir").html())



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

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $(".cariKota").select2({
            width: '100%',
            ajax: {
                url: "{{ route('cariKota') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });
        $(".cariKecamatan").select2({
            width: '100%',
            ajax: {
                url: "{{ route('cariKecamatan') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });
        $(".cariDesa").select2({
            width: '100%',
            ajax: {
                url: "{{ route('cariDesa') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });
        $(".cariProvinsi").select2({
            width: '100%',
            ajax: {
                url: "{{ route('cariProvinsi') }}",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        _token: CSRF_TOKEN,
                        search: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }

        });


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
