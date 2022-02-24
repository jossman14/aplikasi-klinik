@extends('layout.app')

@section('judul-halaman')
Halaman Tambah Pasien
@endsection

@section('konten')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Title and breadcrumb -->
    <!-- ============================================================== -->
    <div class="page-titles">
        <div class="d-flex align-items-center">
            <h5 class="font-medium m-b-0">Tambah Pasien</h5>
            <div class="custom-breadcrumb ml-auto">
                <a href="#!" class="breadcrumb">Pasien</a>
                <a href="#!" class="breadcrumb">Tambah Pasien</a>
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
                        <h5 class="card-title">Form Pasien Baru</h5>
                        <h6 class="card-subtitle">Isi data form berikut secara berurutan dan sesuai ketentuan</h6>
                        <form action="#" class="validation-wizard wizard-circle m-t-40">
                            <!-- Step 1 -->
                            <h6>Identitas Pasien</h6>
                            <section>
                                <div class="row">
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <select class="custom-select form-control required" id="wlocation2"
                                                name="location">
                                                <option disabled selected>Pilih Sapaan</option>
                                                <option value="Nn.">Nn.</option>
                                                <option value="Tn.">Tn.</option>
                                                <option value="Ny.">Ny.</option>
                                                <option value="An.">An.</option>
                                            </select>
                                            <label for="wlocation2"> Sapaan : <span class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="text" class="required" id="wlastName2" name="lastName">
                                            <label for="wlastName2"> Nama Lengkap : <span class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="email" class="required" id="wemailAddress2"
                                                name="emailAddress">
                                            <label for="wemailAddress2"> Email Address : <span
                                                    class="danger">*</span> </label>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="tel" id="wphoneNumber2">
                                            <label for="wphoneNumber2">Phone Number :</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <select class="custom-select form-control required" id="wlocation2"
                                                name="location">
                                                <option value="">Select City</option>
                                                <option value="India">India</option>
                                                <option value="USA">USA</option>
                                                <option value="Dubai">Dubai</option>
                                            </select>
                                            <label for="wlocation2"> Select City : <span class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input id="date2" type="text" class="validate datepicker">
                                            <label for="date2">Date of Birth :</label>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 2 -->
                            <h6>Identitas Pasien</h6>
                            <section>
                                <div class="row">
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="text" class="required" id="jobTitle2">
                                            <label for="jobTitle2"> Company Name : <span class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input type="text" class="required" id="webUrl3">
                                            <label for="webUrl3"> Company URL : <span class="danger">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col m12">
                                        <div class="input-field col s12">
                                            <input type="text" class="required" id="shortDescription3">
                                            <label for="shortDescription3"> Short Description : <span
                                                    class="danger">*</span> </label>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 3 -->
                            <h6>Identitas Pasien</h6>
                            <section>
                                <div class="row">
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input id="int2" name="shortDescription" type="text">
                                            <label for="int2" class="">Interview For :</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <select id="type5" name="types">
                                                <option value="" disabled selected>Choose Type</option>
                                                <option value="1">Normal</option>
                                                <option value="2">Difficult</option>
                                                <option value="3">Hard</option>
                                            </select>
                                            <label for="type5">Interview Type :</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <select id="typ4" name="city">
                                                <option value="" disabled selected>Select City</option>
                                                <option value="i">India</option>
                                                <option value="u">USA</option>
                                                <option value="d">Dubai</option>
                                            </select>
                                            <label for="typ4">Location :</label>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input id="jobTitle3" type="text" class="validate datepicker">
                                            <label for="jobTitle3">Interview Date :</label>
                                        </div>
                                        <div class="col s12">
                                            <label>Requirements :</label>
                                            <p>
                                                <label>
                                                    <input name="group3" type="radio" />
                                                    <span>Employee</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name="group3" type="radio" />
                                                    <span>Contract</span>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Step 4 -->
                            <h6>Identitas Pasien</h6>
                            <section>
                                <div class="row">
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input id="beh2" type="text">
                                            <label for="beh2" class="">Behaviour :</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <input id="participants2" type="text">
                                            <label for="participants2" class="">Confidance :</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <select id="typ6" name="city">
                                                <option value="" disabled selected>Select Result</option>
                                                <option value="s">Selected</option>
                                                <option value="r">Rejected</option>
                                                <option value="c">Call Second-time</option>
                                            </select>
                                            <label for="typ6">Result :</label>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <div class="input-field col s12">
                                            <input id="decisions7" type="text">
                                            <label for="decisions7" class="">Comments :</label>
                                        </div>
                                        <div class="col s12">
                                            <label>Rate Interviwer :</label>
                                            <p>
                                                <label>
                                                    <input name="group5" type="radio" />
                                                    <span>1 star</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name="group5" type="radio" />
                                                    <span>2 star</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name="group5" type="radio" />
                                                    <span>3 star</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name="group5" type="radio" />
                                                    <span>4 star</span>
                                                </label>
                                            </p>
                                            <p>
                                                <label>
                                                    <input name="group5" type="radio" />
                                                    <span>5 star</span>
                                                </label>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <h5 class="card-title">Validations example</h5>
                        <p><a href="http://jqueryvalidation.org/" target="_blank">jQuery Validation</a> This jQuery plugin makes simple clientside form validation easy, whilst still offering plenty of customization options.</p>
                        <form class="formValidate" id="formValidate" method="get" action="">
                            <div class="success-alert-bar p-15 m-b-20 green white-text">
                                Thanks for submitting the form.
                            </div>
                            <div class="error-alert-bar p-15 m-b-20 red white-text">
                                Please fill out all the required inputs.
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <label for="uname">Username*</label>
                                    <input id="uname" name="uname" type="text" data-error=".errorTxt1">
                                    <div class="errorTxt1"></div>
                                </div>
                                <div class="input-field col s12">
                                    <label for="cemail">E-Mail *</label>
                                    <input id="cemail" type="email" name="cemail" data-error=".errorTxt2">
                                    <div class="errorTxt2"></div>
                                </div>
                                <div class="input-field col s12">
                                    <label for="password">Password *</label>
                                    <input id="password" type="password" name="password" data-error=".errorTxt3">
                                    <div class="errorTxt3"></div>
                                </div>
                                <div class="input-field col s12">
                                    <label for="cpassword">Confirm Password *</label>
                                    <input id="cpassword" type="password" name="cpassword" data-error=".errorTxt4">
                                    <div class="errorTxt4"></div>
                                </div>
                                <div class="input-field col s12">
                                    <label for="curl">URL *</label>
                                    <input id="curl" type="url" name="curl" data-error=".errorTxt5">
                                    <div class="errorTxt5"></div>
                                </div>
                                <div class="col s12">
                                    <div class="input-field">
                                        <select class="error" id="crole" name="crole" data-error=".errorTxt6">
                                            <option value="" disabled selected>Choose your profile</option>
                                            <option value="1">Manager</option>
                                            <option value="2">Developer</option>
                                            <option value="3">Business</option>
                                        </select>
                                        <label>Role *</label>
                                        <div class="errorTxt6"></div>
                                    </div>
                                </div>
                                <div class="input-field col s12">
                                    <textarea id="ccomment" name="ccomment" class="materialize-textarea validate" data-error=".errorTxt7"></textarea>
                                    <label for="ccomment">Your comment *</label>
                                    <div class="errorTxt7"></div>
                                </div>
                                <div class="col s12">
                                    <label for="genter_select">Gender *</label>
                                    <p>
                                        <label>
                                            <input name="cgender" type="radio" id="gender_male" data-error=".errorTxt8" />
                                            <span for="gender_male">Male</span>
                                        </label>
                                    </p>
                                    <p>
                                        <label>
                                            <input name="cgender" type="radio" id="gender_female" value="f" />
                                            <span for="gender_female">Female</span>
                                        </label>
                                    </p>
                                    <div class="input-field">
                                        <div class="errorTxt8"></div>
                                    </div>
                                </div>
                                <div class="col s12">
                                    <label for="tnc_select">T&amp;C *</label>
                                    <p>
                                        <label>
                                            <input type="checkbox" id="cagree" name="cagree" data-error=".errorTxt9" />
                                            <span for="cagree">Please agree to our policy</span>
                                        </label>
                                    </p>
                                    <div class="input-field">
                                        <div class="errorTxt6"></div>
                                    </div>
                                </div>
                                <div class="input-field col s12">
                                    <button class="btn waves-effect waves-light right submit" type="submit" name="action">Submit</button>
                                </div>
                            </div>
                        </form>
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
<script src="{{ asset('template') }}/assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="{{ asset('template') }}/assets/extra-libs/prism/prism.js"></script>
<script src="{{ asset('template') }}/dist/js/pages/forms/jquery.validate.min.js"></script>
<script>
    //Basic Example
    $("#example-basic").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true
    });

    // Basic Example with form
    var form = $("#example-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            confirm: {
                equalTo: "#password"
            }
        }
    });
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            alert("Submitted!");
        }
    });

    // Advance Example

    var form = $("#example-advanced-form").show();

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex) {
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex) {
                return true;
            }
            // Forbid next action on "Warning" step if the user is to young
            if (newIndex === 3 && Number($("#age-2").val()) < 18) {
                return false;
            }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex) {
                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            // Used to skip the "Warning" step if the user is old enough.
            if (currentIndex === 2 && Number($("#age-2").val()) >= 18) {
                form.steps("next");
            }
            // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
            if (currentIndex === 2 && priorIndex === 3) {
                form.steps("previous");
            }
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            alert("Submitted!");
        }
    }).validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            confirm: {
                equalTo: "#password-2"
            }
        }
    });

    // Dynamic Manipulation
    $("#example-manipulation").steps({
        headerTag: "h3",
        bodyTag: "section",
        enableAllSteps: true,
        enablePagination: false
    });

    //Vertical Steps

    $("#example-vertical").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        stepsOrientation: "vertical"
    });

    //Custom design form example
    $(".tab-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onFinished: function (event, currentIndex) {
            swal("Form Submitted!",
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed."
                );

        }
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
                    .remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")),
                form.validate().settings.ignore = ":disabled,:hidden", form.valid())
        },
        onFinishing: function (event, currentIndex) {
            return form.validate().settings.ignore = ":disabled", form.valid()
        },
        onFinished: function (event, currentIndex) {
            swal("Form Submitted!",
                "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed."
                );
        }
    }), $(".validation-wizard").validate({

        ignore: "input[type=hidden]",

        rules: {
            email: {
                email: !0
            }
        },
        errorElement: 'div',
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        invalidHandler: function(e, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
                $('.error-alert-bar').show();
            }
        },
        submitHandler: function() {
            $('.error-alert-bar').hide();
            $('.success-alert-bar').show().delay(5000).fadeOut();
        }
    })

</script>


<script>

$(function() {
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
        errorPlacement: function(error, element) {
            var placement = $(element).data('error');
            if (placement) {
                $(placement).append(error)
            } else {
                error.insertAfter(element);
            }
        },
        invalidHandler: function(e, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
                $('.error-alert-bar').show();
            }
        },
        submi