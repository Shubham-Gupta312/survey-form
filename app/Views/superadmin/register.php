<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Rangadore Memorial Hospital</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monsteradmin/" />
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <style>
        .help-block {
            color: #c44747;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
            style="background:url(../assets/images/background/login-register.jpg) no-repeat center center; background-size: cover;">
            <div class="auth-box p-4 bg-white rounded">
                <div>
                    <div class="logo">
                        <h3 class="box-title mb-3">Sign Up</h3>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal mt-3 form-material" id="SuperAdminRegisterForm">
                                <div class="form-group mb-3">
                                    <div class="col-xs-12">
                                        <input class="form-control onlyalphanum" type="text" required="" name="username"
                                            id="username" placeholder="Username">
                                        <div class="invalid-feedback text-danger" id="username_msg"></div>
                                    </div>
                                </div>
                                <div class="form-group mb-3 ">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" required="" name="password"
                                            id="password" placeholder="Password">
                                        <div class="invalid-feedback text-danger" id="password_msg"></div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" required="" name="cpassword"
                                            name="cpassword" placeholder="Confirm Password">
                                        <div class="invalid-feedback text-danger" id="cpassword_msg"></div>
                                    </div>
                                </div>
                                <div class="form-group text-center mb-3">
                                    <div class="col-xs-12">
                                        <button
                                            class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                            name="submit" id="submit" type="submit">Sign Up</button>
                                    </div>
                                </div>
                                <div class="form-group mb-0 mt-2 ">
                                    <div class="col-sm-12 text-center ">
                                        Already have an account? <a href="<?= base_url('superadmin/login') ?>"
                                            class="text-info ml-1 ">Sign In</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <!-- <script src="../assets/libs/jquery/dist/jquery.min.js "></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../assets/js/bootstrapValidator.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- Notify -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"
        integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $('[data-toggle="tooltip "]').tooltip();
        $(".preloader ").fadeOut();
    </script>
    <script>
        $(document).ready(function () {
            $('body').on('keyup', ".onlyalphanum", function (event) {
                this.value = this.value.replace(/[^[A-Za-z0-9]]*/gi, '');
            });

            jQuery(document).ready(function (e) {
                $('#SuperAdminRegisterForm').bootstrapValidator({
                    fields: {
                        'username': {
                            validators: {
                                notEmpty: {
                                    message: "Please enter UserName"
                                },
                            }
                        },
                        'password': {
                            validators: {
                                notEmpty: {
                                    message: "Please enter password."
                                },
                                regexp: {
                                    regexp: /^[a-zA-Z0-9!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]*$/,
                                    message: 'Password can only contain alphabets, numbers, and special characters.'
                                },
                                stringLength: {
                                    min: 6,
                                    message: 'Password must be at least 6 characters long'
                                }
                            }
                        },
                        'cpassword': {
                            validators: {
                                notEmpty: {
                                    message: "Please confirm password."
                                },
                                identical: {
                                    field: 'password',
                                    message: 'The password and its confirm are not the same'
                                }
                            }
                        },
                    },
                }).on('success.form.bv', function (e) {
                    e.preventDefault();
                    var $form = $(e.target);
                    var bv = $form.data('bootstrapValidator');
                    // var formData = new FormData($form[0]);
                    var formData = $form.serialize();
                    // console.log(formData);
                    $.ajax({
                        url: "<?= base_url('superadmin/register') ?>",
                        type: 'POST',
                        data: formData,
                        success: function (response) {
                            console.log(response);
                            if (response.status == 'error') {
                                let error = response.errors;
                                for (const key in error) {
                                    document.getElementById(key).classList.add('is-invalid');
                                    document.getElementById(key + '_msg').innerHTML = error[key];
                                }
                            } else {
                                $form[0].reset();
                                $.notify(response.message, "success");
                                setTimeout(function () {
                                    window.location.href = "<?= base_url('superadmin/login') ?>";
                                }, 300);
                            }
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