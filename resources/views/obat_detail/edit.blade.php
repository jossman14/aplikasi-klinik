@extends('layout.app')

@section('judul-halaman')
Halaman Ubah Obat Detail
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Ubah Obat Detail</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Obat Detail</a>
                <a href="#!" class="breadcrumb">Ubah Obat Detail</a>
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
                        <h5 class="card-title">Form Obat Detail</h5>
                        <h6 class="card-subtitle">Ubah data form berikut secara berurutan dan sesuai ketentuan</h6>
                        <form action="{{ route('obat_detail.update', $singleObatDetail->id) }}"
                            class="validation-wizard wizard-circle m-t-40" method="POST" id="obat_detail_form">
                            @csrf
                            @method('PUT')

                            <!-- Step 1 -->
                            <h6>Identitas Obat Detail</h6>
                            <section>
                                <div class="row">
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="text" class="nama" id="nama" name="nama" value="{{ old('nama', $singleObatDetail->nama) }}">
                                            <label for="nama"> Nama Obat : <span class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <select required class="custom-select form-control" id="satuan"
                                                name="satuan">
                                                <option disabled selected>Pilih Satuan Obat</option>
                                                @foreach($satuan_obat as $item)

                                                <option value="{{ $item->id }}"
                                                    {{ $singleObatDetail->satuan == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            <label for="sapaan"> Satuan Obat : <span class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <select required class="custom-select form-control" id="jenis_obat"
                                                name="jenis_obat">
                                                <option disabled selected>Pilih Jenis Obat</option>
                                                @foreach($jenis_obat as $item)

                                                <option value="{{ $item->id }}"
                                                    {{ $singleObatDetail->jenis_obat == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            <label for="sapaan"> Jenis Obat : <span class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="number" class="min_stock" id="min_stock" name="min_stock" value="{{ old('min_stock', $singleObatDetail->min_stock) }}">
                                            <label for="min_stock"> Stok Minimal : <span class="danger"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">

                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="number" class="max_stock" id="max_stock" name="max_stock" value="{{ old('max_stock', $singleObatDetail->max_stock) }}">
                                            <label for="max_stock"> Stok Maksimal : <span class="danger"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="number" class="stock" id="stock" name="stock" value="{{ old('stock', $singleObatDetail->stock) }}">
                                            <label for="stock"> Jumlah Stok : <span class="danger"></span>
                                            </label>
                                        </div>
                                    </div>


                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="date" class="tgl_beli" id="tgl_beli" name="tgl_beli" value="{{ old('tgl_beli', $singleObatDetail->tgl_beli) }}">
                                            <label for="tgl_beli"> Tanggal Beli : <span class="danger"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="date" class="expire" id="expire" name="expire" value="{{ old('expire', $singleObatDetail->expire) }}">
                                            <label for="expire"> Tanggal Kadaluarsa : <span class="danger"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>



                            </section>
                            <!-- Step 2 -->
                            <h6>Detail Obat</h6>
                            <section>

                                <div class="row">

                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="text" class="batch" id="batch" name="batch" value="{{ old('batch', $singleObatDetail->batch) }}">
                                            <label for="batch"> Nomor Batch : <span class="danger"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <select required class="custom-select form-control" id="penyedia_obat"
                                                name="penyedia_obat">
                                                <option disabled selected>Pilih Penyedia Obat</option>
                                                @foreach($penyedia_obat as $item)

                                                <option value="{{ $item->id }}"
                                                    {{ $singleObatDetail->penyedia_obat == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            <label for="sapaan"> Penyedia Obat : <span class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>



                                </div>
                                <div class="row">


                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="number" class="harga_beli" id="harga_beli" name="harga_beli" value="{{ old('harga_beli', $singleObatDetail->harga_beli) }}">
                                            <label for="harga_beli"> Harga Beli : <span class="danger"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="number" class="harga_jual" id="harga_jual" name="harga_jual" value="{{ old('harga_jual', $singleObatDetail->harga_jual) }}">
                                            <label for="harga_jual"> Harga Jual : <span class="danger"></span>
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

        let tgl_beli = new Date("{{$singleObatDetail->tgl_beli}}")
        let expire = new Date("{{$singleObatDetail->expire}}")

        tgl_beli_new = [
            tgl_beli.getFullYear(),
        ('0' + (tgl_beli.getMonth() + 1)).slice(-2),
        ('0' + tgl_beli.getDate()).slice(-2)
        ].join('-');

        expire_new = [
            expire.getFullYear(),
        ('0' + (expire.getMonth() + 1)).slice(-2),
        ('0' + expire.getDate()).slice(-2)
        ].join('-');

        console.log(tgl_beli_new)

        $("#tgl_beli").val(tgl_beli_new);
        $("#expire").val(expire_new);

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

            $("input[name='alamat_sementara']").val($("input[name='alamat_obat_detail']").val());
            $("input[name='alamat_keluarga']").val($("input[name='alamat_obat_detail']").val());

            $("input[name='alamat_sementara']").addClass("active");
            $("input[name='alamat_keluarga']").addClass("active");




            $("select[name='desa_smt_id']").empty().append($('<option>', {
                value: $("select[name='desa_obat_detail_id']").val(),
                text: $("select[name='desa_obat_detail_id'] :selected").text()

            }));
            $("select[name='desa_klg_id']").empty().append($('<option>', {
                value: $("select[name='desa_obat_detail_id']").val(),
                text: $("select[name='desa_obat_detail_id'] :selected").text()

            }));

            $("select[name='kecamatan_smt_id']").empty().append($('<option>', {
                value: $("select[name='kecamatan_obat_detail_id']").val(),
                text: $("select[name='kecamatan_obat_detail_id'] :selected").text()

            }));
            $("select[name='kecamatan_klg_id']").empty().append($('<option>', {
                value: $("select[name='kecamatan_obat_detail_id']").val(),
                text: $("select[name='kecamatan_obat_detail_id'] :selected").text()

            }));

            $("select[name='kabupaten_smt_id']").empty().append($('<option>', {
                value: $("select[name='kabupaten_obat_detail_id']").val(),
                text: $("select[name='kabupaten_obat_detail_id'] :selected").text()

            }));
            $("select[name='kabupaten_klg_id']").empty().append($('<option>', {
                value: $("select[name='kabupaten_obat_detail_id']").val(),
                text: $("select[name='kabupaten_obat_detail_id'] :selected").text()

            }));

            $("select[name='provinsi_smt_id']").empty().append($('<option>', {
                value: $("select[name='provinsi_obat_detail_id']").val(),
                text: $("select[name='provinsi_obat_detail_id'] :selected").text()

            }));

            $("select[name='provinsi_klg_id']").empty().append($('<option>', {
                value: $("select[name='provinsi_obat_detail_id']").val(),
                text: $("select[name='provinsi_obat_detail_id'] :selected").text()

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
                $("#obat_detail_form")[0].submit();


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
            satuan: {
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
            alamat_obat_detail: {
                required: true,
            },
            desa_obat_detail_id: {
                required: true,
            },
            kecamatan_obat_detail_id: {
                required: true,
            },
            kabupaten_obat_detail_id: {
                required: true,
            },
            provinsi_obat_detail_id: {
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
                required: "Silahkan pilih sapaan obat_detail",
            },
            nama: {
                required: "Silahkan isi nama obat_detail",
            },
            alamat_obat_detail: {
                required: "Silahkan isi alamat tetap obat_detail",
            },
            desa_obat_detail_id: {
                required: "Silahkan pilih desa tetap obat_detail",
            },
            kecamatan_obat_detail_id: {
                required: "Silahkan pilih kecamatan tetap obat_detail",
            },
            kabupaten_obat_detail_id: {
                required: "Silahkan pilih kabupaten tetap obat_detail",
            },
            provinsi_obat_detail_id: {
                required: "Silahkan pilih provinsi tetap obat_detail",
            },
            alamat_sementara: {
                required: "Silahkan isi alamat sementara obat_detail",
            },
            desa_smt_id: {
                required: "Silahkan pilih desa sementara obat_detail",
            },
            kecamatan_smt_id: {
                required: "Silahkan pilih kecamatan sementara obat_detail",
            },
            kabupaten_smt_id: {
                required: "Silahkan pilih kabupaten sementara obat_detail",
            },
            provinsi_smt_id: {
                required: "Silahkan pilih provinsi sementara obat_detail",
            },
            alamat_keluarga: {
                required: "Silahkan isi alamat keluarga obat_detail",
            },
            desa_klg_id: {
                required: "Silahkan pilih desa keluarga obat_detail",
            },
            kecamatan_klg_id: {
                required: "Silahkan pilih kecamatan keluarga obat_detail",
            },
            kabupaten_klg_id: {
                required: "Silahkan pilih kabupaten keluarga obat_detail",
            },
            provinsi_klg_id: {
                required: "Silahkan pilih provinsi keluarga obat_detail",
            },

            nomor_bpjs: {
                required: "Silahkan isi nomor BPJS obat_detail",
            },
            nomor_hp_keluarga: {
                required: "Silahkan isi nomor telepon keluarga obat_detail",
            },
            nomor_hp: {
                required: "Silahkan isi nomor telepon obat_detail",
            },
            jobdesk: {
                required: "Silahkan isi jobdesk obat_detail",
            },

            gol_dar_id: {
                required: "Silahkan pilih golongan darah obat_detail",
            },

            agama: {
                required: "Silahkan pilih agama obat_detail",
            },
            satuan: {
                required: "Silahkan pilih jenis kelamin obat_detail",
            },
            tgl_lahir: {
                required: "Silahkan isi tanggal lahir obat_detail",
            },
            tempat_lahir: {
                required: "Silahkan pilih tempat lahir obat_detail",
            },
            nik: {
                required: "Silahkan isi NIK obat_detail",
            },
            nama_keluarga: {
                required: "Silahkan isi nama keluarga obat_detail",
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
