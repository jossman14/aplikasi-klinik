@extends('layout.app')

@section('judul-halaman')
Halaman Ubah Data Soap Perawat
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Ubah Data Soap Perawat</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Soap Perawat</a>
                <a href="#!" class="breadcrumb">Ubah Data Soap Perawat</a>
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
                            <h5 class="card-title">Form Ubah Soap Perawat</h5>

                            <form action="{{ route('soap_perawat.update', $soap_perawat->id) }}"
                                class="validation-wizard wizard-circle m-t-40" method="POST" id="tindakan_form">
                                @csrf
                                @method("PUT")

                                <input type="hidden" name="id_daftar" value="{{$soap_perawat->id}}">
                                <input type="hidden" name="id_pasien" value="{{$soap_perawat->id_pasien}}">
                                <div class="input-field col s12">
                                    <input type="date" class="waktu_daftar_periksa" id="waktu_tindakan" name="waktu_daftar_periksa" required value="{{$soap_perawat->waktu_daftar_periksa}}">
                                    <label for="waktu_daftar_periksa"> Waktu SOAP : <span class="danger"></span>
                                    </label>
                                </div>

                                <div class="input-field col s12">
                                    <input type="text" class="nama_pasien" id="nama_pasien" name="nama_pasien"
                                        required value="{{$soap_perawat->nama_pasien}}" readonly>
                                    <label for="nama_pasien"> Nama Pasien : <span class="danger"></span>
                                    </label>
                                </div>

                                <div class="input-field col s12">
                                    <input type="text" class="anamnesa" id="anamnesa" name="anamnesa"
                                        required height="100px" value="{{$soap_perawat->anamnesa}}" >
                                    <label for="anamnesa"> Anamnesa : <span class="danger"></span>
                                    </label>
                                </div>

                                <div class="input-field col s12">
                                    <input type="number" class="systolic" id="systolic" name="systolic" required value="{{$soap_perawat->systolic}}">
                                    <label for="systolic"> Tekanan Systolic : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="number" class="diastolic" id="diastolic" name="diastolic" required value="{{$soap_perawat->diastolic}}">
                                    <label for="diastolic"> Tekanan Diastolic : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="number" class="nadi" id="nadi" name="nadi"
                                        required  value="{{$soap_perawat->nadi}}">
                                    <label for="nadi"> Nadi : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="number" class="suhu" id="suhu" name="suhu"
                                        required  value="{{$soap_perawat->suhu}}">
                                    <label for="suhu"> Suhu : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="number" class="pernafasan" id="pernafasan" name="pernafasan"
                                        required  value="{{$soap_perawat->pernafasan}}">
                                    <label for="pernafasan"> Pernafasan : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="number" class="tinggi" id="tinggi" name="tinggi"
                                        required  value="{{$soap_perawat->tinggi}}">
                                    <label for="tinggi"> Tinggi : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="number" class="berat" id="berat" name="berat"
                                        required  value="{{$soap_perawat->berat}}">
                                    <label for="berat"> Berat : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="number" class="lila" id="lila" name="lila"
                                        required  value="{{$soap_perawat->lila}}">
                                    <label for="lila"> Lila : <span class="danger"></span>
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
