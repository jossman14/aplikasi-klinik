@extends('layout.app')

@section('judul-halaman')
Halaman Ubah Data Tindakan
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Ubah Data Tindakan</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Tindakan</a>
                <a href="#!" class="breadcrumb">Ubah Data Tindakan</a>
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
                            <h5 class="card-title">Form Tindakan Baru</h5>

                            <form action="{{ route('tindakan.update', $tindakan->id) }}"
                                class="validation-wizard wizard-circle m-t-40" method="POST" id="tindakan_form">
                                @csrf
                                @method("PUT")

                                <div class="input-field col s12">
                                    <input type="text" class="nama" id="nama" name="nama" required value="{{ old('nama', $tindakan->nama) }}">
                                    <label for="nama"> Nama : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="col s12 m6">
                                    <div class="input-field s12">
                                        <select required class="custom-select form-control" id="jenis_tindakan"
                                            name="jenis_tindakan">
                                            <option disabled selected>Pilih Jenis Tindakan</option>
                                            @foreach($jenis_tindakan as $item)

                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $tindakan->jenis_tindakan ? "selected" : "" }}>
                                                    {{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                        <label for="tindakan"> Jenis Tindakan: <span class="danger">*</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="input-field col s12">
                                    <input type="number" class="jasa_dokter" id="jasa_dokter" name="jasa_dokter"
                                        required value="{{ old('jasa_dokter', $tindakan->jasa_dokter) }}">
                                    <label for="jasa_dokter"> Jasa Dokter : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="number" class="jasa_perawat" id="jasa_perawat" name="jasa_perawat"
                                        required value="{{ old('jasa_perawat', $tindakan->jasa_perawat) }}">
                                    <label for="jasa_perawat"> Jasa Perawat : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="number" class="jasa_klinik" id="jasa_klinik" name="jasa_klinik"
                                        required value="{{ old('jasa_klinik', $tindakan->jasa_klinik) }}">
                                    <label for="jasa_klinik"> Jasa Klinik : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="number" class="alat" id="alat" name="alat" required value="{{ old('alat', $tindakan->alat) }}">
                                    <label for="alat"> Alat : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="number" class="bahan" id="bahan" name="bahan" required value="{{ old('bahan', $tindakan->bahan) }}">
                                    <label for="bahan"> Bahan : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="number" class="lainnya" id="lainnya" name="lainnya" required value="{{ old('lainnya', $tindakan->lainnya) }}">
                                    <label for="lainnya"> Lainnya : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="number" class="harga_total active" id="harga_total" name="harga_total"
                                        required  value="{{ old('harga_total', $tindakan->harga_total) }}">
                                    <label for="harga_total"> Harga Total : <span class="danger"></span>
                                    </label>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(function () {

        $("input").change(function (e) {

            $("#harga_total").val(

                parseInt($("#jasa_dokter").val()) +
                parseInt($("#jasa_perawat").val()) +
                parseInt($("#jasa_klinik").val()) +
                parseInt($("#alat").val()) +
                parseInt($("#bahan").val()) +
                parseInt($("#lainnya").val()))




        });



        $("select").select2({
            width: '100%',
        });
        let today = new Date().toISOString().slice(0, 10)
        $("#waktu_tindakan").val(today);
        $(".select2.select2-container.select2-container--default").addClass('m-t-15 m6');
        // $(".select2-selection.select2-selection--single").addClass('m-t-15');


        $(".select-dropdown.dropdown-trigger").remove();
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
