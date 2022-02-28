@extends('layout.app')

@section('judul-halaman')
Halaman Ubah Data Sapaan
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Ubah Data Sapaan</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Sapaan</a>
                <a href="#!" class="breadcrumb">Ubah Data Sapaan</a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="card">

            <div class="row">
                <!-- ============================================================== -->
                <!-- Example -->
                <!-- ============================================================== -->
                <div class="col s12">
                    <div>
                        <div class="card-content">
                            <h5 class="card-title">Form Ubah Data Sapaan</h5>


                            <form action="{{ route('sapaan.update',  $sapaan->id) }}"
                                class="validation-wizard wizard-circle m-t-40" method="POST" id="sapaan_form">
                                @csrf
                                @method('PUT')


                                <div class="input-field col s12">
                                    <input type="text" class="nama" id="nama" name="sapaan"  value="{{ old('sapaan', $sapaan->sapaan) }}" required>
                                    <label for="sapaan"> Sapaan : <span class="danger"></span>
                                    </label>
                                </div>

                            </form>
                        </div>




                    </div>
                </div>

            </div>
            <div class="row flex-end">


                <button type="submit" class=" waves-effect waves-light btn-large blue m-15" id="btn_submit">Submit</button>


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

<script>
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
                $("#sapaan_form")[0].submit();

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
