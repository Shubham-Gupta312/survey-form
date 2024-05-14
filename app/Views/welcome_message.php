<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rangadore Memorial Hospital</title>
    <link href="assets/css/style.css" rel="stylesheet" />

    <style>
        .help-block {
            color: rgba(var(--bs-danger-rgb));
        }
    </style>

</head>

<body>

    <!-- ======= PAGE HEADER ======= -->
    <header class="page-header">
        <a href="#" class="page-header__hospital">
            <img src="assets/images/logo-icon-131x128-1.png" alt="Rangadore Memorial Hospital"
                class="page-header__logo">
            <h2 class="page-header__name">Rangadore Memorial Hospital</h2>
        </a>
        <div class="page-header__contact-info">
            <address class="page-header__address">
                1st Cross road,
                Shankarapuram,<br class="d-none d-md-block">
                Basavanagudi,
                Bengaluru - 560 004.
            </address>
        </div>
    </header> <!-- End Header -->

    <div class="container">
        <main class="page-body">
            <div class="text-center">
                <h2 class="main-heading">Employee Health Checkup Form</h2>
            </div>

            <form class="checkup-form" id="checkup-form">
                <!-- ======= Personal History Section======= -->
                <div class="checkup-form__section">
                    <h4 class="sub-heading">Personal History</h4>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
                        <div class="col form-group">
                            <label class="form-label">Employee ID </label><span class="required">*</span>
                            <input type="text" class="form-control onlyalphanum" id="emp_id" name="emp_id"
                                placeholder="Enter your Employee Id">
                            <div class="invalid-feedback text-danger" id="emp_id_msg">
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Full Name </label><span class="required">*</span>
                            <input type="text" class="form-control onlychars" id="name" name="name"
                                placeholder="Enter your Full Name">
                            <div class="invalid-feedback text-danger" id="name_msg">
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Gender <span class="required">*</span></label>
                            <select class="form-select" id="gender" name="gender">
                                <option value="">-- Select --</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="prefer not to say">Prefer not to say</option>
                                <option value="other">Other (please specify)</option>
                            </select>

                            <div class="invalid-feedback text-danger" id="gender_msg">
                            </div>
                            <input type="text" class="form-control" id="other_gender" name="other_gender"
                                placeholder="Enter your Gender" style="display: none;">
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Date of Birth <span class="required">*</span></label>
                            <div class="input-group">
                                <input class="form-control border-end-0" type="date" id="dob" max="" name="dob"
                                    placeholder="Select Date" required="">
                                <div class="invalid-feedback text-danger" id="dob_msg">
                                </div>
                                <!-- <span class="input-group-text">
                                    <span class="material-symbols-outlined">calendar_today</span>
                                </span> -->
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Age</label>
                            <input type="text" class="form-control onlyalphanum" id="age" name="age"
                                placeholder="0 years 0 months" disabled readonly>
                            <div class="invalid-feedback text-danger" id="age_msg">
                            </div>
                            <div id="ageError" class="text-danger" style="display: none;">Age must be at least 15 years.
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Emergency Contact Number <span class="required">*</span></label>
                            <input type="tel" class="form-control onlynum" maxlength="10" id="phone" name="phone"
                                placeholder="Enter Your Contact Number">
                            <div class="invalid-feedback text-danger" id="phone_msg">
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Duration of Service <span class="required">*</span></label>
                            <input type="text" class="form-control onlynum" id="service" name="service"
                                placeholder="Enter your Service Duration">
                            <div class="invalid-feedback text-danger" id="service_msg">
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Department <span class="required">*</span></label>
                            <input type="text" class="form-control onlychars" id="dept" name="dept"
                                placeholder="Enter Your Department Name">
                            <div class="invalid-feedback text-danger" id="dept_msg">
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="pb-3">
                        <div class="custom-upload form-group">
                            <input type="file" id="upload-img" name="upload-img" class="inputfile"
                                accept=".jpg, .png, .jpeg">
                            <label for="upload-img">
                                <div class="d-grid">
                                    <span class="btn btn-outline-primary btn-sm">Upload Photo</span>
                                </div>
                            </label>
                            <div class="invalid-feedback text-danger" id="upload-img_msg">
                            </div>
                            <div class="form-text">Less than or equal to 1Mb with white background</div>
                        </div>
                    </div>
                </div> <!-- End -->

                <!-- ======= Health Information Section======= -->
                <div class="checkup-form__section">
                    <h4 class="sub-heading">Health Information </h4>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
                        <div class="col form-group">
                            <label class="form-label">Height <span class="required">*</span></label>
                            <div class="input-group">
                                <input class="form-control onlynum" type="text" id="height" name="height"
                                    placeholder="Enter in cm">
                                <span class="input-group-text">cm</span>
                                <div class="invalid-feedback text-danger" id="height_msg">
                                </div>
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Weight <span class="required">*</span></label>
                            <div class="input-group">
                                <input class="form-control onlynum" type="text" name="weight" id="weight"
                                    placeholder="Enter in kg">
                                <span class="input-group-text">kg</span>
                                <div class="invalid-feedback text-danger" id="weight_msg">
                                </div>
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Blood Group <span class="required">*</span></label>
                            <select class="form-select" id="blood_group" name="blood_group">
                                <option value="">-- Select --</option>
                                <option value="A+">A+ve</option>
                                <option value="A-">A-ve</option>
                                <option value="B+">B+ve</option>
                                <option value="B-">B-ve</option>
                                <option value="AB+">AB+ve</option>
                                <option value="AB-">AB-ve</option>
                                <option value="O+">O+ve</option>
                                <option value="O-">O-ve</option>
                            </select>
                            <div class="invalid-feedback text-danger" id="blood_group_msg">
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Diet <span class="required">*</span></label>
                            <select class="form-select" name="diet" id="diet">
                                <option value="">-- Select --</option>
                                <option value="vegetarian">Vegetarian</option>
                                <option value="Non-vegetarian">Non-vegetarian</option>
                                <option value="mixed">Mixed</option>
                                <option value="diet_other">Other (please specify) </option>
                            </select>
                            <div class="invalid-feedback text-danger" id="diet_msg">
                            </div>
                            <input type="text" class="form-control spcchr" name="diet_name" id="diet_name"
                                placeholder="Enter Diet" style="display: none;">
                            <div class="invalid-feedback text-danger" id="diet_name_msg">
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Smoking <span class="required">*</span></label> <br>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="smoke" id="smoke-yes" value="yes">
                                <label class="form-check-label" for="smoke-yes">Yes</label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="smoke" id="smoke-no" value="no">
                                <label class="form-check-label" for="smoke-no">No</label>
                            </div>
                            <div class="invalid-feedback text-danger" id="smoke_msg">
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Alcohol <span class="required">*</span></label> <br>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="alcohol" id="alcohol-yes"
                                    value="yes">
                                <label class="form-check-label" for="alcohol-yes">Yes</label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="alcohol" id="alcohol-no" value="no">
                                <label class="form-check-label" for="alcohol-no">No</label>
                            </div>
                            <div class="invalid-feedback text-danger" id="alcohol_msg">
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Snuff <span class="required">*</span></label> <br>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="snuff" id="snuff-yes" value="yes">
                                <label class="form-check-label" for="snuff-yes">Yes</label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="snuff" id="snuff-no" value="no">
                                <label class="form-check-label" for="snuff-no">No</label>
                            </div>
                            <div class="invalid-feedback text-danger" id="snuff_msg">
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Allergy <span class="required">*</span></label> <br>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="allergy" id="allergy-yes"
                                    value="yes">
                                <label class="form-check-label" for="snuff-yes">Yes</label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="allergy" id="allergy-no" value="no">
                                <label class="form-check-label" for="snuff-no">No</label>
                            </div>
                            <div class="invalid-feedback text-danger" id="allergy_msg">
                            </div>
                            <br>

                            <!-- <input type="text" class="form-control" placeholder="Enter allergies, if any"> -->
                        </div>

                    </div>

                    <!-- Form Row -->
                    <div class="row checkup-form__row">
                        <div class="col form-group">
                            <textarea class="form-control spcchr" placeholder="Please specify allergy"
                                name="allergy_name" id="allergy_name" style="display: none;"></textarea>
                            <div class="invalid-feedback text-danger" id="allergy_name_msg">
                            </div>
                        </div>
                    </div>
                </div><!-- End Health Info -->

                <!-- ======= Disease Section======= -->
                <div class="checkup-form__section">
                    <h4 class="sub-heading">Past Medical History </h4>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
                        <div class="col form-group">
                            <label class="form-label">Diabetes <span class="normal">(High / Low blood sugar
                                    level)</span> <span class="required">*</span></label> <br>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="diabetes" id="diabetes-yes"
                                    value="yes">
                                <label class="form-check-label" for="diabetes-yes">Yes</label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="diabetes" id="diabetes-no"
                                    value="no">
                                <label class="form-check-label" for="diabetes-no">No</label>
                            </div>
                            <div class="invalid-feedback text-danger" id="diabetes_msg">
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Hypertension <span class="normal">(BP- blood pressure
                                    issues)</span> <span class="required">*</span></label> <br>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="bp" id="bp-yes" value="yes">
                                <label class="form-check-label" for="bp-yes">Yes</label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="bp" id="bp-no" value="no">
                                <label class="form-check-label" for="bp-no">No</label>
                            </div>
                            <div class="invalid-feedback text-danger" id="bp_msg">
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Heart disease <span class="required">*</span></label> <br>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="heart" id="heart-yes" value="yes">
                                <label class="form-check-label" for="heart-yes">Yes</label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="heart" id="heart-no" value="no">
                                <label class="form-check-label" for="heart-no">No</label>
                            </div>
                            <div class="invalid-feedback text-danger" id="heart_msg">
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Kidney disease. <span class="required">*</span></label> <br>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="kidney" id="kidney-yes" value="yes">
                                <label class="form-check-label" for="kidney-yes">Yes</label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="kidney" id="kidney-no" value="no">
                                <label class="form-check-label" for="kidney-no">No</label>
                            </div>
                            <div class="invalid-feedback text-danger" id="kidney_msg">
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">COPD / Asthma<span class="required">*</span></label> <br>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="asthma" id="asthma-yes" value="yes">
                                <label class="form-check-label" for="asthma-yes">Yes</label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="asthma" id="asthma-no" value="no">
                                <label class="form-check-label" for="asthma-no">No</label>
                            </div>
                            <div class="invalid-feedback text-danger" id="asthma_msg">
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label">Others<span class="required">*</span></label> <br>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="otherdisease" id="otherdisease-yes"
                                    value="yes">
                                <label class="form-check-label" for="otherdisease-yes">Yes</label>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="radio" name="otherdisease" id="otherdisease-no"
                                    value="no">
                                <label class="form-check-label" for="otherdisease-no">No</label>
                            </div>
                            <div class="invalid-feedback text-danger" id="other_msg">
                            </div>
                        </div>
                    </div>
                    <!-- Form Row -->
                    <div class="row checkup-form__row">
                        <div class="col form-group">
                            <textarea class="form-control spcchr" placeholder="Others , please specify"
                                id="other_diseasename" name="other_diseasename" style="display: none;"></textarea>
                        </div>
                        <div class="invalid-feedback text-danger" id="other_diseasename_msg">
                        </div>
                    </div>
                </div> <!-- End Disease -->


                <!-- Form Row -->
                <div class="checkup-form__row">
                    <div class="col form-text">
                        <strong>Instructions to be followed for health check up:</strong>
                        <ul>
                            <li>For blood tests, refrain from eating or drinking anything (except water) for 10 or more
                                hours before the scheduled test. </li>
                            <li>Do not smoke during the fasting period.</li>
                            <li>Please abstain from consuming alcohol for 48 hours  before the scheduled test.</li>
                        </ul>
                        <div class="text-danger mb-3">
                            Following these instructions will help ensure accurate and reliable test results.
                        </div>
                    </div>
                    <div class="col form-group">
                        <div class="d-grid">
                            <button type="submit" name="submit" id="submit"
                                class="btn btn-lg btn-primary">Submit</button>
                        </div>
                        <div class="text-center  mt-5">
                            <strong>Thank you for your cooperation.</strong>
                        </div>
                        <div class="text-center  mt-5" id="exist">
                            <strong>Record Already Exist!</strong>
                        </div>
                    </div>
                </div>

            </form>
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"
        integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/js/bootstrapValidator.min.js"></script>
    <script>
        $(document).ready(function () {

            $('body').on('keyup', ".onlychars", function (event) {
                this.value = this.value.replace(/[^[A-Za-z ]]*/gi, '');
            });
            $('body').on('keyup', ".onlynum", function (event) {
                this.value = this.value.replace(/[^[0-9]]*/gi, '');
            });
            $('body').on('keyup', ".onlyalphanum", function (event) {
                this.value = this.value.replace(/[^[A-Za-z0-9]]*/gi, '');
            });
            $('body').on('keyup', ".spcchr", function (event) {
                this.value = this.value.replace(/[^[A-Za-z0-9,.()]]*/gi, '');
            });

            var yesterday = new Date();
            yesterday.setDate(yesterday.getDate() - 1);
            var maxDate = yesterday.toISOString().split('T')[0];
            $('#dob').attr('max', maxDate);

            $('#dob').change(function () {
                var dob = new Date($(this).val());
                var today = new Date();

                var ageYears = today.getFullYear() - dob.getFullYear();
                var ageMonths = today.getMonth() - dob.getMonth();

                if (ageMonths < 0 || (ageMonths === 0 && today.getDate() < dob.getDate())) {
                    ageYears--;
                    ageMonths += 12;
                }

                var ageString = ageYears + ' years ' + ageMonths + ' months';
                $('#age').val(ageString);

                if (ageYears < 15) {
                    $('#ageError').show();
                } else {
                    $('#ageError').hide();
                }
            });


            $('input[name="otherdisease"]').change(function () {
                // console.log($(this).val());
                if ($(this).val() === 'yes') {
                    $('#other_diseasename').show();
                } else {
                    $('#other_diseasename').hide();
                }
            });

            $('input[name="allergy"]').change(function () {
                // console.log($(this).val());
                if ($(this).val() === 'yes') {
                    $('#allergy_name').show();
                } else {
                    $('#allergy_name').hide();
                }
            });

            $('#gender').change(function () {
                if ($(this).val() === 'other') {
                    $('#other_gender').show().css('margin-top', '8px');
                } else {
                    $('#other_gender').hide();
                }
            });
            $('#diet').change(function () {
                if ($(this).val() === 'diet_other') {
                    $('#diet_name').show().css('margin-top', '8px');
                } else {
                    $('#diet_name').hide();
                }
            });

            jQuery(document).ready(function (e) {
                $('#checkup-form').bootstrapValidator({
                    fields: {
                        'name': {
                            validators: {
                                notEmpty: {
                                    message: "Please enter Name"
                                },
                            }
                        },
                        'emp_id': {
                            validators: {
                                notEmpty: {
                                    message: "Please enter Employee Id"
                                },
                                remote: {
                                    message: 'Employee Id is Existing!',
                                    url: '<?= base_url('validateEmpId'); ?>'
                                },
                            }
                        },
                        'gender': {
                            validators: {
                                notEmpty: {
                                    message: "Please Select Gender"
                                },
                            }
                        },
                        'dob': {
                            validators: {
                                notEmpty: {
                                    message: "Please Select Date of Birth"
                                },
                            }
                        },
                        'phone': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter 10 digit Phone Number"
                                },
                            }
                        },
                        'service': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter Duration of Service"
                                },
                            }
                        },
                        'dept': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter Department Name"
                                },
                            }
                        },
                        'upload-img': {
                            validators: {
                                file: {
                                    extension: 'jpeg,jpg,png',
                                    type: 'image/jpeg,image/png',
                                    maxSize: 10 * 1024 * 1024,
                                    message: 'The selected file is not valid or exceeds 10 MB in size',
                                },
                            }
                        },
                        'height': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter Your Height in cm"
                                },
                            }
                        },
                        'weight': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter Your Weight"
                                },
                            }
                        },
                        'blood_group': {
                            validators: {
                                notEmpty: {
                                    message: "Please Select your Blood Group"
                                },
                            }
                        },
                        'diet': {
                            validators: {
                                notEmpty: {
                                    message: "Please Select your Diet"
                                },
                            }
                        },
                        'smoke': {
                            validators: {
                                notEmpty: {
                                    message: "Please Choose Smoking Field"
                                },
                            }
                        },
                        'alcohol': {
                            validators: {
                                notEmpty: {
                                    message: "Please Choose Alcohol Field"
                                },
                            }
                        },
                        'snuff': {
                            validators: {
                                notEmpty: {
                                    message: "Please Choose Snuff Field"
                                },
                            }
                        },
                        'allergy': {
                            validators: {
                                notEmpty: {
                                    message: "Please Choose Allergy Field"
                                },
                            }
                        },
                        'diabetes': {
                            validators: {
                                notEmpty: {
                                    message: "Please Choose Diabetes Field"
                                },
                            }
                        },
                        'bp': {
                            validators: {
                                notEmpty: {
                                    message: "Please Choose Hypertension (BP- blood pressure issues) Field"
                                },
                            }
                        },
                        'heart': {
                            validators: {
                                notEmpty: {
                                    message: "Please Choose Heart Disease Field"
                                },
                            }
                        },
                        'kidney': {
                            validators: {
                                notEmpty: {
                                    message: "Please Choose Kidney Disease Field"
                                },
                            }
                        },
                        'asthma': {
                            validators: {
                                notEmpty: {
                                    message: "Please Choose Asthma Disease Field"
                                },
                            }
                        },
                        'otherdisease': {
                            validators: {
                                notEmpty: {
                                    message: "Please Choose Other Disease Field"
                                },
                            }
                        },


                    },
                }).on('success.form.bv', function (e) {
                    e.preventDefault();
                    var $form = $(e.target);
                    var bv = $form.data('bootstrapValidator');
                    var formData = new FormData($form[0]);
                    // console.log(formData);
                    $.ajax({
                        url: "<?= base_url('form') ?>",
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            // console.log(response);
                            if (response.status == 'false'){
                                $.notify(response.message, "error");
                            }
                            if (response.status == 'error') {
                                let error = response.errors;
                                for (const key in error) {
                                    document.getElementById(key).classList.add('is-invalid');
                                    document.getElementById(key + '_msg').innerHTML = error[key];
                                }
                            } else {
                                $form[0].reset();
                                $.notify(response.message, "success");
                            }
                            // $('input').removeClass('is-invalid');
                            // if (response.status === 'success') {
                            //     console.log('okay');
                            //     // table.ajax.reload(null, false);
                            //     // $.notify(response.message, "success");
                            // } else {
                            //     // console.log(key, ' error msg ', error)
                            //     // let error = response.errors;
                            //     for (const key in error) {
                            //         // document.getElementById(key).classList.add('is-invalid');
                            //         // document.getElementById(key + '_msg').innerHTML = error[key];
                            //         console.log(key, ' error ')
                            //     }
                            //     // $.notify(response.message, "error");
                            // }
                        },
                        error: function (xhr, status, error) {
                            // Handle error
                            console.error(error);
                        }
                    });
                });
            });

        });
    </script>
</body>

</html>