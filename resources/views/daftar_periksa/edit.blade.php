@extends('layout.app')

@section('judul-halaman')
Halaman Tambah Data Daftar Periksa
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Tambah Data Daftar Periksa</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Daftar Periksa</a>
                <a href="#!" class="breadcrumb">Tambah Data Daftar Periksa</a>
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
                        {{-- {{dd($daftar_periksa   )}} --}}
                        <div class="card-content">
                            <h5 class="card-title">Form Daftar Periksa Baru</h5>

                            <form action="{{ route('daftar_periksa.update', $daftar_periksa->id) }}"
                                class="validation-wizard wizard-circle m-t-40" method="POST" id="daftar_periksa_form">
                                @csrf
                                @method("PUT")


                                <div class="input-field col s12">
                                    <input type="text" class="no_antrian" id="no_antrian" name="no_antrian" value={{old("no_antrian", $daftar_periksa->no_antrian)}} required>
                                    <label for="no_antrian"> No Antrian : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="date" class="waktu_daftar_periksa" id="waktu_daftar_periksa" name="waktu_daftar_periksa" value={{old("waktu_daftar_periksa", $daftar_periksa->waktu_daftar_periksa)}} required>
                                    <label for="waktu_daftar_periksa"> Waktu Daftar Periksa : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="text" class="norm_fake" id="norm_fake" name="norm_fake" required value="{{$daftar_periksa->norm}}" disabled>
                                    <input type="text" class="norm" id="norm" name="norm" required value="{{$daftar_periksa->norm}}"  hidden>
                                    <label for="norm"> NO. RM : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="text" class="nik" id="nik" name="nik" required value="{{$daftar_periksa->nik}}" disabled>
                                    <label for="nik"> NIK : <span class="danger"></span>
                                    </label>
                                </div>
                                <div class="input-field col s12">
                                    <input type="text" class="id_pasien" id="id_pasien" value="{{$daftar_periksa->nama_pasien}}" name="id_pasien_fake" required disabled >
                                    <input type="text" class="id_pasien" id="id_pasien" value="{{$daftar_periksa->id_pasien}}" name="id_pasien" hidden >
                                    <label for="id_pasien"> Nama Pasien : <span class="danger"></span>
                                    </label>
                                </div>


                          <div class="row">
                            <div class="col s12 m6">
                                <div class="input-field s12">
                                    <select required class="custom-select form-control" id="id_poli"
                                        name="id_poli">
                                        <option disabled selected>Pilih Poliklinik</option>
                                        @foreach($poli as $item)

                                            <option value="{{ $item->id }}"  {{$item->id == 1 ? "selected" : ""}}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    <label for="daftar_periksa"> Poliklinik: <span class="danger">*</span>
                                    </label>
                                </div>
                             </div>

                          <div class="row">
                            <div class="col s12 m6">
                                <div class="input-field s12">
                                    <select required class="custom-select form-control" id="id_dokter"
                                        name="id_dokter">
                                        <option disabled selected>Pilih Dokter</option>
                                        @foreach($dokter as $item)

                                            <option value={{ $item->sdm_id }} {{$item->sdm_id == $daftar_periksa->id_dokter ? "selected" : ""}}>
                                                {{ $item->nama_sdm }}</option>
                                        @endforeach
                                    </select>
                                    <label for="daftar_periksa"> Dokter: <span class="danger">*</span>
                                    </label>
                                </div>
                             </div>






                                <div class="input-field col s12">
                                    <input type="text" class="cara_bayar" value={{old("cara_bayar", $daftar_periksa->cara_bayar)}} id="cara_bayar" name="cara_bayar" required>
                                    <label for="cara_bayar"  > Cara Bayar : <span class="danger"></span>
                                    </label>
                                </div>

                                <div class="input-field col s12">
                                    <input type="text" class="rujukan" id="rujukan" name="rujukan" required value={{old("rujukan", $daftar_periksa->rujukan)}}>
                                    <label for="rujukan"> Rujukan : <span class="danger"></span>
                                    </label>
                                </div>

                                <div class="input-field col s12">
                                    <input type="text" class="penanggungjawab" id="penanggungjawab" name="penanggungjawab" required value={{old("penanggungjawab", $daftar_periksa->penanggungjawab)}}>
                                    <label for="penanggungjawab"> Penanggungjawab : <span class="danger"></span>
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
        $("#waktu_daftar_periksa").val(today);
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
                $("#daftar_periksa_form")[0].submit();

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
