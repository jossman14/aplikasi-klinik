@extends('layout.app')

@section('judul-halaman')
Halaman Tambah Sumber Daya Manusia
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Tambah Sumber Daya Manusia</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Sumber Daya Manusia</a>
                <a href="#!" class="breadcrumb">Tambah Sumber Daya Manusia</a>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Container fluid scss in scafholding.scss -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <div class="row">
            <!-- ============================================================== -->
            <!-- Example -->
            <!-- ============================================================== -->
            <div class="col s12">
                <div class="card">
                    <div class="card-content wizard-content">
                        <h5 class="card-title">Form SDM Baru</h5>
                        <h6 class="card-subtitle">Isi data form berikut secara berurutan dan sesuai ketentuan</h6>
                        <form action="{{ route('sdm.store') }}"
                            class="validation-wizard wizard-circle m-t-40" method="POST" id="sdm_form">
                            @csrf
                            <!-- Step 1 -->
                            <h6>Identitas SDM</h6>
                            <section>
                                <div class="row">
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="text" class="nama" id="nama" name="nama_sdm">
                                            <label for="nama"> Nama Lengkap : <span class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="text" class="nik" id="nik" name="nik">
                                            <label for="nik"> NIK : <span class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input id="tgl_lahir" type="text" class="validate datepicker"
                                                name="tgl_lahir">
                                                <input type="hidden" name="tgl_lahir" id="tgl_lahir_real"
                                                value="{{ old('tgl_lahir')}}">
                                            <label for="tgl_lahir">Tanggal Lahir :</label>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="text" class="umur" id="umur" name="umur" readonly value="0">
                                            <label for="umur"> Umur : (Otomatis)<span class="danger"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">


                                    <div class="col m6">
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

                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <select required class="custom-select form-control" id="agama_id" name="agama_id">
                                                <option disabled selected>Pilih Agama</option>
                                                @foreach($agama as $item)

                                                    <option value="{{ $item->agamaId }}">{{ $item->agama }}</option>
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
                                            <select required class="custom-select form-control" id="jobdesk"
                                                name="jobdesk">
                                                <option disabled selected>Pilih Jobdesk</option>
                                                @foreach($jabatan as $item)

                                                    <option value="{{ $item->id }}">{{ $item->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="sapaan"> Jobdesk : <span class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col m6">
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
                                </div>



                                <div class="row">


                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="text" class="nomor_hp" id="nomor_hp"
                                                name="nomor_hp">
                                            <label for="nomor_hp"> Nomor HP : <span class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>

                                  <div class="col m6">
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

                                </div>

                                <hr>




                            </section>
                            <!-- Step 2 -->
                            <h6>Alamat</h6>
                            <section>
                                <div class="row">
                                    <div class="col s12">
                                        <div class="input-field col s12">
                                            <input type="text" class="alamat_sdm" id="alamat_sdm"
                                                name="alamat_sdm">
                                            <label for="alamat_sdm"> Alamat Lengkap : <span class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">



                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <select required class="custom-select form-control cariDesa"
                                                id="desa_sdm_id" name="desa_sdm_id">
                                                <option disabled selected>Pilih Desa Tetap</option>


                                            </select>
                                            <label for="desa_sdm_id"> Desa Tetap : <span class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>


                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <select required class="custom-select form-control cariKecamatan"
                                                id="kecamatan_sdm_id" name="kecamatan_sdm_id">
                                                <option disabled selected>Pilih Kecamatan Tetap</option>


                                            </select>
                                            <label for="kecamatan_sdm_id"> Kecamatan Tetap : <span
                                                    class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">


                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <select required class="custom-select form-control cariKota"
                                                id="kabupaten_sdm_id" name="kabupaten_sdm_id">
                                                <option disabled selected>Pilih Kabupaten Tetap</option>


                                            </select>
                                            <label for="kabupaten_sdm_id"> Kabupaten Tetap : <span
                                                    class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <select required class="custom-select form-control cariProvinsi"
                                                id="provinsi_sdm_id" name="provinsi_sdm_id">
                                                <option disabled selected>Pilih Provinsi Tetap</option>


                                            </select>
                                            <label for="provinsi_sdm_id"> Provinsi Tetap : <span
                                                    class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>



                            </section>
                            {{-- <button type="submit" class="waves-effect waves-light btn blue">Submit</button> --}}
                            {{-- {!! Form::submit("submit") !!} --}}

                        </form>
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
<script src="{{ asset('template') }}/assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
<script src="{{ asset('template') }}/assets/libs/jquery-validation/dist/jquery.validate.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{ asset('template') }}/assets/extra-libs/prism/prism.js"></script>
<script src="{{ asset('template') }}/dist/js/pages/forms/jquery.validate.min.js"></script>
<script>
    //select2
    $(function () {

        $("select").select2({
            width: '100%',
        });

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


        $("button[name='alamat_sama']").click(function (e) {

            $("input[name='alamat_sementara']").val($("input[name='alamat_sdm']").val());
            $("input[name='alamat_keluarga']").val($("input[name='alamat_sdm']").val());

            $("input[name='alamat_sementara']").addClass("active");
            $("input[name='alamat_keluarga']").addClass("active");




            $("select[name='desa_smt_id']").empty().append($('<option>', {
                value: $("select[name='desa_sdm_id']").val(),
                text: $("select[name='desa_sdm_id'] :selected").text()

            }));
            $("select[name='desa_klg_id']").empty().append($('<option>', {
                value: $("select[name='desa_sdm_id']").val(),
                text: $("select[name='desa_sdm_id'] :selected").text()

            }));

            $("select[name='kecamatan_smt_id']").empty().append($('<option>', {
                value: $("select[name='kecamatan_sdm_id']").val(),
                text: $("select[name='kecamatan_sdm_id'] :selected").text()

            }));
            $("select[name='kecamatan_klg_id']").empty().append($('<option>', {
                value: $("select[name='kecamatan_sdm_id']").val(),
                text: $("select[name='kecamatan_sdm_id'] :selected").text()

            }));

            $("select[name='kabupaten_smt_id']").empty().append($('<option>', {
                value: $("select[name='kabupaten_sdm_id']").val(),
                text: $("select[name='kabupaten_sdm_id'] :selected").text()

            }));
            $("select[name='kabupaten_klg_id']").empty().append($('<option>', {
                value: $("select[name='kabupaten_sdm_id']").val(),
                text: $("select[name='kabupaten_sdm_id'] :selected").text()

            }));

            $("select[name='provinsi_smt_id']").empty().append($('<option>', {
                value: $("select[name='provinsi_sdm_id']").val(),
                text: $("select[name='provinsi_sdm_id'] :selected").text()

            }));

            $("select[name='provinsi_klg_id']").empty().append($('<option>', {
                value: $("select[name='provinsi_sdm_id']").val(),
                text: $("select[name='provinsi_sdm_id'] :selected").text()

            }));






        });

    });




    var form = $(".validation-wizard").show();

    $(".validation-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (
                currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error")
                    .remove()),
                form.validate().settings.ignore = ":disabled,:hidden", form.valid())
        },
        onFinishing: function (event, currentIndex) {
            return form.validate().settings.ignore = ":disabled", form.valid()
        },
        onFinished: function (event, currentIndex) {
            // swal("Form Berhasil disi!",
            //     "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed."
            // );




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
                $("#sdm_form")[0].submit();


            }
        }



        }
    }), $(".validation-wizard").validate({

        ignore: "input[type=hidden]",


        rules: {

            nomor_bpjs: {
                required: true,
            },
            nomor_hp_keluarga: {
                required: true,
            },
            nomor_hp: {
                required: true,
            },
            jobdesk: {
                required: true,
            },

            gol_dar_id: {
                required: true,
            },

            agama: {
                required: true,
            },
            jenis_kelamin: {
                required: true,
            },
            tgl_lahir: {
                required: true,
            },
            tempat_lahir: {
                required: true,
            },
            nik: {
                required: true,
            },
            nama_keluarga: {
                required: true,
            },
            sapaan: {
                required: true,
            },
            nama: {
                required: true,
            },
            alamat_sdm: {
                required: true,
            },
            desa_sdm_id: {
                required: true,
            },
            kecamatan_sdm_id: {
                required: true,
            },
            kabupaten_sdm_id: {
                required: true,
            },
            provinsi_sdm_id: {
                required: true,
            },
            alamat_sementara: {
                required: true,
            },
            desa_smt_id: {
                required: true,
            },
            kecamatan_smt_id: {
                required: true,
            },
            kabupaten_smt_id: {
                required: true,
            },
            provinsi_smt_id: {
                required: true,
            },
            alamat_keluarga: {
                required: true,
            },
            desa_klg_id: {
                required: true,
            },
            kecamatan_klg_id: {
                required: true,
            },
            kabupaten_klg_id: {
                required: true,
            },
            provinsi_klg_id: {
                required: true,
            },
        },
        messages: {
            sapaan: {
                required: "Silahkan pilih sapaan sdm",
            },
            nama: {
                required: "Silahkan isi nama sdm",
            },
            alamat_sdm: {
                required: "Silahkan isi alamat tetap sdm",
            },
            desa_sdm_id: {
                required: "Silahkan pilih desa tetap sdm",
            },
            kecamatan_sdm_id: {
                required: "Silahkan pilih kecamatan tetap sdm",
            },
            kabupaten_sdm_id: {
                required: "Silahkan pilih kabupaten tetap sdm",
            },
            provinsi_sdm_id: {
                required: "Silahkan pilih provinsi tetap sdm",
            },
            alamat_sementara: {
                required: "Silahkan isi alamat sementara sdm",
            },
            desa_smt_id: {
                required: "Silahkan pilih desa sementara sdm",
            },
            kecamatan_smt_id: {
                required: "Silahkan pilih kecamatan sementara sdm",
            },
            kabupaten_smt_id: {
                required: "Silahkan pilih kabupaten sementara sdm",
            },
            provinsi_smt_id: {
                required: "Silahkan pilih provinsi sementara sdm",
            },
            alamat_keluarga: {
                required: "Silahkan isi alamat keluarga sdm",
            },
            desa_klg_id: {
                required: "Silahkan pilih desa keluarga sdm",
            },
            kecamatan_klg_id: {
                required: "Silahkan pilih kecamatan keluarga sdm",
            },
            kabupaten_klg_id: {
                required: "Silahkan pilih kabupaten keluarga sdm",
            },
            provinsi_klg_id: {
                required: "Silahkan pilih provinsi keluarga sdm",
            },

            nomor_bpjs: {
                required: "Silahkan isi nomor BPJS sdm",
            },
            nomor_hp_keluarga: {
                required: "Silahkan isi nomor telepon keluarga sdm",
            },
            nomor_hp: {
                required: "Silahkan isi nomor telepon sdm",
            },
            jobdesk: {
                required: "Silahkan isi jobdesk sdm",
            },

            gol_dar_id: {
                required: "Silahkan pilih golongan darah sdm",
            },

            agama: {
                required: "Silahkan pilih agama sdm",
            },
            jenis_kelamin: {
                required: "Silahkan pilih jenis kelamin sdm",
            },
            tgl_lahir: {
                required: "Silahkan isi tanggal lahir sdm",
            },
            tempat_lahir: {
                required: "Silahkan pilih tempat lahir sdm",
            },
            nik: {
                required: "Silahkan isi NIK sdm",
            },
            nama_keluarga: {
                required: "Silahkan isi nama keluarga sdm",
            },

        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            var placement = $(element).data('error');

            error.insertAfter(element);

        },
        invalidHandler: function (e, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
                $('.error-alert-bar').show();
            }
        },
        submitHandler: function () {
            $('.error-alert-bar').hide();
            $('.success-alert-bar').show().delay(5000).fadeOut();
        }
    })

    $(function () {



        const d = new Date();
        let year = d.getFullYear();
        // tahun = [];

        // for (let index = 0; index < 100; index++) {
        //     tahun.push(year-index)

        // }




        function getAge(dateString) {
            var now = new Date();
            var today = new Date(now.getYear(), now.getMonth(), now.getDate());

            var yearNow = now.getYear();
            var monthNow = now.getMonth();
            var dateNow = now.getDate();

            var dob = new Date(dateString.substring(6, 10),
                dateString.substring(0, 2) - 1,
                dateString.substring(3, 5)
            );

            var yearDob = dob.getYear();
            var monthDob = dob.getMonth();
            var dateDob = dob.getDate();
            var age = {};
            var ageString = "";
            var yearString = "";
            var monthString = "";
            var dayString = "";


            yearAge = yearNow - yearDob;

            if (monthNow >= monthDob)
                var monthAge = monthNow - monthDob;
            else {
                yearAge--;
                var monthAge = 12 + monthNow - monthDob;
            }

            if (dateNow >= dateDob)
                var dateAge = dateNow - dateDob;
            else {
                monthAge--;
                var dateAge = 31 + dateNow - dateDob;

                if (monthAge < 0) {
                    monthAge = 11;
                    yearAge--;
                }
            }

            age = {
                years: yearAge,
                months: monthAge,
                days: dateAge
            };

            if (age.years > 1) yearString = " tahun";
            else yearString = " tahun";
            if (age.months > 1) monthString = " bulan";
            else monthString = " bulan";
            if (age.days > 1) dayString = " hari";
            else dayString = " hari";


            if ((age.years > 0) && (age.months > 0) && (age.days > 0))
                ageString = age.years + yearString + ", " + age.months + monthString + ", and " + age.days +
                dayString + " old.";
            else if ((age.years == 0) && (age.months == 0) && (age.days > 0))
                ageString = "Only " + age.days + dayString + " old!";
            else if ((age.years > 0) && (age.months == 0) && (age.days == 0))
                ageString = age.years + yearString + " old. Happy Birthday!!";
            else if ((age.years > 0) && (age.months > 0) && (age.days == 0))
                ageString = age.years + yearString + " and " + age.months + monthString + " old.";
            else if ((age.years == 0) && (age.months > 0) && (age.days > 0))
                ageString = age.months + monthString + " and " + age.days + dayString + " old.";
            else if ((age.years > 0) && (age.months == 0) && (age.days > 0))
                ageString = age.years + yearString + " and " + age.days + dayString + " old.";
            else if ((age.years == 0) && (age.months > 0) && (age.days == 0))
                ageString = age.months + monthString + " old.";
            else ageString = "Oops! Could not calculate age!";

            return ageString;
        }

        $("#tgl_lahir").change(function (e) {
            $("tgl_lahir_real").val($("#tgl_lahir").val());

        });


        $('.datepicker').datepicker({
            yearRange: 30,
            maxDate: d,
            format: 'yyyy-m-d',
            onClose: function (e) {
                console.log("hehehe")
                // console.log(e)
                var createdDate = new Date($("#tgl_lahir").val());
                // var date1 = crea
                var date = createdDate.toLocaleString("id-ID", {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                $("#tgl_lahir_real").val($("#tgl_lahir").val());

                year = new Date().getFullYear();
                $("#tgl_lahir").val(date)
                $("#umur").val(year - createdDate.getFullYear());
                $("label[for='umur']").addClass("active");


            }


        });





    });

</script>


<script>
    $(function () {
        $("#formValidate").validate({
            rules: {
                uname: {
                    required: true,
                    minlength: 5
                },
                cemail: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                cpassword: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                curl: {
                    required: true,
                    url: true
                },
                crole: "required",
                ccomment: {
                    required: true,
                    minlength: 15
                },
                cgender: "required",
                cagree: "required",
            },
            //For custom messages
            messages: {
                uname: {
                    required: "Enter a username",
                    minlength: "Enter at least 5 characters"
                },
                curl: "Enter your website",
            },
            errorElement: 'div',
            errorPlacement: function (error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            },
            invalidHandler: function (e, validator) {
                var errors = validator.numberOfInvalids();
                if (errors) {
                    $('.error-alert-bar').show();
                }
            },
            submitHandler: function () {
                $('.error-alert-bar').hide();
                $('.success-alert-bar').show().delay(5000).fadeOut();
            }
        });
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
@endsection
