@extends('layout.app')

@section('judul-halaman')
Halaman Tambah Data Soap Dokter
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Tambah Data Soap Dokter</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Soap Dokter</a>
                <a href="#!" class="breadcrumb">Tambah Data Soap Dokter</a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card">

            <div class="">
                <!-- ============================================================== -->
                <!-- Example -->
                <!-- ============================================================== -->
                <div class="col s12">
                    <div>
                        <div class="card-content">
                            <h5 class="card-title">Form Soap Dokter Baru</h5>

                            <form action="{{ route('soap_dokter.store') }}"
                                class="validation-wizard wizard-circle m-t-40" method="POST" id="tindakan_form">
                                @csrf

                                {{-- "soap_dokter.id",
                                "soap_dokter.id_daftar",

                                "daftar_periksa.waktu_daftar_periksa",
                                "daftar_periksa.id_pasien",
                                "pasien.nama as nama_pasien",
                                "poliklinik.nama as nama_poliklinik",
                                "sdm.nama_sdm as nama_dokter",

                                "soap_dokter.anamnesa",
                                "soap_dokter.diagnosa",
                                "soap_dokter.tindakan",
                                "soap_dokter.obat",
                                "soap_dokter.planning",
                                "soap_dokter.keluar", --}}

                                <input type="hidden" name="id_daftar" value="{{ $soap_dokter->id }}">
                                <input type="hidden" name="id_pasien" value="{{ $soap_dokter->id_pasien }}">
                                <div class="input-field col s12">
                                    <input type="date" class="waktu_daftar_periksa" id="waktu_tindakan"
                                        name="waktu_daftar_periksa" required">
                                    <label for="waktu_daftar_periksa"> Waktu SOAP : <span class="danger"></span>
                                    </label>
                                </div>

                                <div class="input-field col s12">
                                    <input type="text" class="nama_pasien" id="nama_pasien" name="nama_pasien" required
                                        value="{{ $soap_dokter->nama_pasien }}" readonly>
                                    <label for="nama_pasien"> Nama Pasien : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="text" class="nama_poliklinik" id="nama_poliklinik"
                                        name="nama_poliklinik" required value="{{ $soap_dokter->nama_poliklinik }}"
                                        readonly>
                                    <label for="nama_poliklinik"> Nama poliklinik : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="text" class="nama_dokter" id="nama_dokter" name="nama_dokter" required
                                        value="{{ $soap_dokter->nama_dokter }}" readonly>
                                    <label for="nama_dokter"> Nama Dokter : <span class="danger"></span>
                                    </label>
                                </div>

                                <div class="input-field col s12">
                                    <input type="text" class="anamnesa" id="anamnesa" name="anamnesa" required
                                        height="100px">
                                    <label for="anamnesa"> Anamnesa : <span class="danger"></span>
                                    </label>
                                </div>



                                <hr>
                                <h5>Diagnosa</h5>
                                <div class="dynamic_diagnosa" id="dynamic_diagnosa">

                                    <div class="row">

                                        <div class="col s10">
                                            <div class="input-field col s12">
                                                <select required class="custom-select form-control cariDiagnosa"
                                                    id="diagnosa" name="diagnosa[]">
                                                    <option disabled selected>Pilih Diagnosa</option>


                                                </select>
                                                <label for="diagnosa"> Diagnosa : <span class="danger">*</span>
                                                </label>
                                            </div>
                                        </div>


                                        <button type="button" name="tambah_diagnosa" id="tambah_diagnosa"
                                            class="blue white-text btn">Tambah</button>




                                    </div>




                                </div>
                                <hr>
                                <h5>Tindakan</h5>
                                <div class="dynamic_tindakan" id="dynamic_tindakan">

                                    <div class="row">

                                        <div class="col s8">
                                            <div class="input-field col s12">
                                                <select required class="custom-select form-control cariTindakan"
                                                    id="tindakan" name="tindakan[]">
                                                    <option disabled selected>Pilih Tindakan</option>


                                                </select>
                                                <label for="tindakan"> Tindakan : <span class="danger">*</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="input-field col s2">
                                            <input type="number" class="jumlah_tindakan" id="jumlah_tindakan"
                                                name="jumlah_tindakan[]" required value=1>
                                            <label for="jumlah_tindakan"> Jumlah : <span class="danger"></span>
                                            </label>
                                        </div>

                                        <button type="button" name="tambah_tindakan" id="tambah_tindakan"
                                            class="blue white-text btn">Tambah</button>


                                    </div>




                                </div>
                                <hr>
                                <h5>Obat</h5>
                                <div class="dynamic_obat" id="dynamic_obat">

                                    <div class="row">

                                        <div class="col s8">
                                            <div class="input-field col s12">
                                                <select required class="custom-select form-control cariObat" id="obat"
                                                    name="obat[]">
                                                    <option disabled selected>Pilih Obat</option>


                                                </select>
                                                <label for="obat"> Obat : <span class="danger">*</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="input-field col s2">
                                            <input type="number" class="jumlah_obat" id="jumlah_obat"
                                                name="jumlah_obat[]" required value=1>
                                            <label for="jumlah_obat"> Jumlah : <span class="danger"></span>
                                            </label>
                                        </div>

                                        <button type="button" name="tambah_obat" id="tambah_obat"
                                            class="blue white-text btn">Tambah</button>


                                    </div>




                                </div>

                                <div class="input-field col s12">
                                    <input type="text" class="planning" id="planning" name="planning" required>
                                    <label for="planning"> Plannning : <span class="danger"></span>
                                    </label>
                                </div>

                                <div class="col m6">
                                    <div class="input-field col s12">
                                        <select required class="custom-select form-control" id="keluar" name="keluar">
                                            <option disabled selected>Pilih Status Keluar</option>
                                            <option value="selesai periksa">selesai periksa</option>
                                            <option value="observasi">obervasi</option>

                                        </select>
                                        <label for="sapaan"> Status Keluar : <span class="danger">*</span>
                                        </label>
                                    </div>
                                </div>


                            </form>
                        </div>




                    </div>
                </div>

            </div>
            <div class="row flex-end">


                <button type="submit" class=" waves-effect waves-light btn-large blue m-15"
                    id="btn_submit">Submit</button>


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
<script src="{{ asset('template') }}/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
<script src="{{ asset('template') }}/assets/libs/jquery-validation/dist/jquery.validate.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('template') }}/assets/extra-libs/prism/prism.js"></script>
<script src="{{ asset('template') }}/dist/js/pages/forms/jquery.validate.min.js"></script>
<script>
    $(function () {

        CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        function select2gan() {
            $("select").select2({
                width: '100%',
            });

            $(".cariDiagnosa").select2({
                width: '100%',
                ajax: {
                    url: "{{ route('searchDiagnosa') }}",
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

            $(".cariTindakan").select2({
                width: '100%',
                ajax: {
                    url: "{{ route('searchTindakan') }}",
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

            $(".cariObat").select2({
                width: '100%',
                ajax: {
                    url: "{{ route('searchObat') }}",
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
        }

        select2gan();




        let today = new Date().toISOString().slice(0, 10)
        $("#waktu_tindakan").val(today);
        $(".select2.select2-container.select2-container--default").addClass('m-t-15 m6');
        // $(".select2-selection.select2-selection--single").addClass('m-t-15');


        $(".select-dropdown.dropdown-trigger").remove();
    });

    $(document).ready(function () {
        var postURL = "{{ route('soap_dokter.store') }}";
        var i = 1;


        $('#tambah_diagnosa').click(function () {
            i++;
            // alert("click")

            $('#dynamic_diagnosa').append(
                '<div class="row" id="row_diagnosa' + i +
                '"><div class="col s10"><div class="input-field col s12"><select required class="custom-select form-control cariDiagnosa" id="diagnosa' +
                i +
                '" name="diagnosa[]"><option disabled="disabled" selected="selected">Pilih Diagnosa</option></select></div></div><button type="button" name="hapus" id="' +
                i + '" class="red white-text btn hapus_diagnosa">Hapus</button></div>'
            );

            $(".cariDiagnosa").select2({
                width: '100%',
                ajax: {
                    url: "{{ route('searchDiagnosa') }}",
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

            $(".hapus_diagnosa").click(function (e) {
                var button_id = $(this).attr("id");
                // alert(button_id)
                $('#row_diagnosa' + button_id + '').remove();

            });

        });

        $('#tambah_tindakan').click(function () {
            i++;
            // alert("click")

            $('#dynamic_tindakan').append(
                '<div class="row" id="row_tindakan' + i +
                '"><div class="col s8"><div class="input-field col s12"><select required class="custom-select form-control cariTindakan" id="tindakan' +
                i +
                '" name="tindakan[]"><option disabled="disabled" selected="selected">Pilih Tindakan</option></select></div></div><div class="input-field col s2"><input type="number" class="jumlah_tindakan" id="jumlah_tindakan' +
                i +
                '" name="jumlah_tindakan[]" required value="1"><label for="jumlah_tindakan">Jumlah :<span class="danger"></span></label></div><button type="button" name="hapus" id="' +
                i + '" class="red white-text btn hapus_tindakan">Hapus</button></div>'
            );

            $(".cariTindakan").select2({
                width: '100%',
                ajax: {
                    url: "{{ route('searchTindakan') }}",
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

            $(".hapus_tindakan").click(function (e) {
                var button_id = $(this).attr("id");
                // alert(button_id)
                $('#row_tindakan' + button_id + '').remove();

            });

        });

        $('#tambah_obat').click(function () {
            i++;
            // alert("click")

            $('#dynamic_obat').append(
                '<div class="row" id="row_obat' + i +
                '"><div class="col s8"><div class="input-field col s12"><select required class="custom-select form-control cariObat" id="obat' +
                i +
                '" name="obat[]"><option disabled="disabled" selected="selected">Pilih Obat</option></select></div></div><div class="input-field col s2"><input type="number" class="jumlah_obat" id="jumlah_obat' +
                i +
                '" name="jumlah_obat[]" required value="1"><label for="jumlah_obat">Jumlah :<span class="danger"></span></label></div><button type="button" name="hapus" id="' +
                i + '" class="red white-text btn hapus_obat">Hapus</button></div>'
            );

            $(".cariObat").select2({
                width: '100%',
                ajax: {
                    url: "{{ route('searchObat') }}",
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

            $(".hapus_obat").click(function (e) {
                var button_id = $(this).attr("id");
                // alert(button_id)
                $('#row_obat' + button_id + '').remove();

            });

        });






        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });




        $('#submit').click(function () {
            $.ajax({
                url: postURL,
                method: "POST",
                data: $('#tindakan_form').serialize(),
                type: 'json',
                success: function (data) {
                    if (data.error) {
                        printErrorMsg(data.error);
                    } else {
                        i = 1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();

                    }
                }
            });
        });



    });

    $("#btn_submit").click(function (e) {



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
                $("#tindakan_form")[0].submit();

            }
        }


    });

</script>



<script src="{{ asset('template') }}/assets/libs/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="{{ asset('template') }}/assets/libs/sweetalert2/sweet-alert.init.js"></script>
@endsection

@section('halaman-css')
<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{ asset('template') }}/assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
<link href="{{ asset('template') }}/assets/libs/jquery-steps/steps.css" rel="stylesheet">
<link href="{{ asset('template') }}/assets/extra-libs/prism/prism.css" rel="stylesheet">
<link href="{{ asset('template') }}/assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet"
    type="text/css">
<style>
    .flex-end {

        padding: 10px 0;
        display: flex;
        justify-content: flex-end;
    }

</style>
@endsection
