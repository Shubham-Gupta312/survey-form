<!DOCTYPE html>
<html dir="ltr" lang="en">

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
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../../dist/js/pages/chartist/chartist-init.css" rel="stylesheet">
    <link href="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="../assets/libs/c3/c3.min.css" rel="stylesheet">
    <!-- Vector CSS -->
    <link href="../assets/libs/jvectormap/jquery-jvectormap.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link href="../../assets/css/style.css" rel="stylesheet" />
    <style>
        li a {
            text-decoration: none;
        }

        .help-block {
            color: rgba(var(--bs-danger-rgb));
        }

        .form-check-input[type="radio"] {
            visibility: hidden;
        }

        .custom-class [type=radio]:checked:disabled+label:before {
            border-right: 2px solid green !important;
            ;
            border-bottom: 2px solid green !important;
            ;
        }

        .form-check-input[type="checkbox"] {
            visibility: hidden;
        }

        .custom-class [type=checkbox]:checked:disabled+label:before {
            border-right: 2px solid green !important;
            ;
            border-bottom: 2px solid green !important;
            ;
        }

        .custom-class .form-check-input[disabled]~.form-check-label,
        .form-check-input:disabled~.form-check-label {
            opacity: 1 !important;
        }
    </style>
</head>

<body>
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
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="#">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="../../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="../../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto float-left">
                        <!-- This is  -->
                        <li class="nav-item"> <a
                                class="nav-link sidebartoggler d-none d-md-block waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="../../assets/images/users/user.png" alt="user" width="30"
                                    class="profile-pic rounded-circle" />
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                                <ul class="dropdown-user list-style-none">
                                    <li>
                                        <div class="dw-user-box p-3 d-flex">
                                            <div class="u-img"><img src="../../assets/images/users/user.png" alt="user"
                                                    class="rounded" width="80"></div>
                                            <div class="u-text ml-2">
                                                <h4 class="mb-0">
                                                    <?php if (session()->loggedin == 'loggedin'): ?>
                                                        <?= session()->username; ?>
                                                    <?php endif ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="user-list"><a class="px-3 py-2"
                                            href="<?= base_url('superadmin/logout') ?>"><i class="fa fa-power-off"></i>
                                            Logout</a></li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->

                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?= base_url('superadmin/dashboard') ?>" aria-expanded="false">
                                <i class="mdi mdi-calendar"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?= base_url('superadmin/newMemberDashboard') ?>" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                <span class="hide-menu">New Registration</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <div class="sidebar-footer">
                <!-- item-->
                <!-- <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a> -->
                <!-- item-->
                <!-- <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a> -->
                <!-- item-->
                <div class="container" style="text-align: center; margin: 10px auto;">
                    <a href="<?= base_url('superadmin/logout') ?>" class="link" data-toggle="tooltip" title="Logout"><i
                            class="mdi mdi-power" style="font-size: 20px;"></i>
                    </a>
                </div>
            </div>
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <header class="page-header">
                <a href="#" class="page-header__hospital">
                    <img src="../../assets/images/logo-icon-131x128-1.png" alt="Rangadore Memorial Hospital"
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
                        <a href="<?= base_url('superadmin/dashboard') ?>"><button class="btn btn-outline-primary"> <i
                                    class="fas fa-arrow-alt-circle-left"></i> Back</button></a>
                        <h2 class="main-heading">Employee Health Checkup Form</h2>
                    </div>

                    <form class="checkup-form" id="Reportform">
                        <!-- ======= Personal History Section======= -->
                        <div class="checkup-form__section">
                            <h4 class="sub-heading">Personal History</h4>
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
                                <div class="col form-group">
                                    <input type="hidden" name="id" id="formEid">
                                    <label class="form-label">RMH/UHID
                                        <!-- <span class="required">*</span> -->
                                    </label>
                                    <input type="text" class="form-control onlyalphanum" name="uhid" id="uhid"
                                        placeholder="RMH/UHID">
                                    <div class="invalid-feedback text-danger" id="uhid_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Employee ID <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="empid" id="empid"
                                        placeholder="Employee Id" readonly>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Full Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Full Name" readonly>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Gender <span class="required">*</span></label>
                                    <select class="form-select" name="gender" id="gender" disabled>
                                        <option value="">-- Select --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Prefer not to say">Prefer not to say</option>
                                        <option value="Other">Other (please specify)</option>
                                    </select>
                                    <!-- <input type="text" class="form-control" placeholder="Enter Genter"> -->
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Date of Birth <span class="required">*</span></label>
                                    <div class="input-group">
                                        <input class="form-control border-end-0 pe-0" type="date"
                                            placeholder="Select Date" required="" name="dob" id="dob" readonly>
                                        <!-- <span class="input-group-text">
                                            <span class="material-symbols-outlined">calendar_today</span>
                                        </span> -->
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Age</label>
                                    <input type="text" class="form-control" name="age" id="age"
                                        placeholder="0 years 0 months" disabled readonly>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Emergency Contact Number <span
                                            class="required">*</span></label>
                                    <input type="tel" class="form-control" placeholder="Contact Number" maxlength="10"
                                        name="phone" id="phone" readonly>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Duration of Service <span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control" placeholder="Duration of Service"
                                        name="service_dur" id="service_dur" readonly>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Department <span class="required">*</span></label>
                                    <input type="text" class="form-control" placeholder="Department" name="dept"
                                        id="dept" readonly>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Obstetric / Mentrual History <span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control onlyalphanum"
                                        placeholder="Obstetric / Mentrual History" name="mentrual" id="mentrual">
                                    <div class="invalid-feedback text-danger" id="mentrual_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Presenting Complaints<span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control onlyalphanum"
                                        placeholder="Presenting Complaints" id="pr_comp" name="pr_comp">
                                    <div class="invalid-feedback text-danger" id="pr_comp_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Past History<span class="required">*</span></label>
                                    <input type="text" class="form-control onlyalphanum" placeholder="Past History"
                                        name="past" id="past">
                                    <div class="invalid-feedback text-danger" id="past_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Family History<span class="required">*</span></label>
                                    <input type="text" class="form-control onlyalphanum" placeholder="Family History"
                                        name="fam_his" id="fam_his">
                                    <div class="invalid-feedback text-danger" id="fam_his_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Others</label>
                                    <input type="text" class="form-control onlyalphanum" placeholder="Others"
                                        name="other" id="other">
                                </div>
                            </div>
                            <hr />
                            <div class="pb-3 form-group">
                                <div class="d-flex align-items-center">
                                    <div class="me-4">
                                        <img src="" class="uploaded_photo" alt="Employee Name" name="photo" id="photo"
                                            style="height: 150px; width: 150px;" />
                                    </div>
                                    <div class="custom-upload form-group">
                                        <input type="file" class="inputfile" id="profileimage" name="profileimage"
                                            accept=".jpg, .png, .jpeg">
                                        <label for="profileimage">
                                            <div class="d-grid">
                                                <span class="btn btn-outline-primary btn-sm">Change Photo</span>
                                            </div>
                                        </label>
                                        <div class="form-text">Less than or equal to 2Mb with white background</div>
                                    </div>

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
                                        <input class="form-control" type="text" placeholder="Enter in cm" id="height"
                                            name="height">
                                        <span class="input-group-text">cm</span>
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Weight <span class="required">*</span></label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" placeholder="Enter in kg" name="weight"
                                            id="weight">
                                        <span class="input-group-text">kg</span>
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Blood Group <span class="required">*</span></label>
                                    <select class="form-select" name="blood_group" id="blood_group" disabled>
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
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Diet <span class="required">*</span></label>
                                    <select class="form-select" id="diet" name="diet" disabled>
                                        <option value="">-- Select --</option>
                                        <option value="vegetarian">Vegetarian</option>
                                        <option value="Non-vegetarian">Non-vegetarian</option>
                                        <option value="mixed">Mixed</option>
                                        <option value="other">Other (please specify) </option>
                                    </select>
                                    <!-- <input type="text" class="form-control" placeholder="Enter Diet"> -->
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Smoking <span class="required">*</span></label> <br>
                                    <input type="text" id="somking_d" name="somking_d" class="form-control" disabled>
                                    <!-- <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="smoke" id="smoke-yes"
                                            value="yes" disabled>
                                        <label class="form-check-label" for="smoke-yes">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="smoke" id="smoke-no"
                                            value="no" disabled>
                                        <label class="form-check-label" for="smoke-no">No</label>
                                    </div> -->
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Alcohol <span class="required">*</span></label> <br>
                                    <input type="text" name="alcohol_d" id="alcohol_d" class="form-control" disabled>
                                    <!-- <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="alcohol" id="alcohol-yes"
                                            value="yes" disabled>
                                        <label class="form-check-label" for="alcohol-yes">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="alcohol" id="alcohol-no"
                                            value="no" disabled>
                                        <label class="form-check-label" for="alcohol-no">No</label>
                                    </div> -->
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Snuff <span class="required">*</span></label> <br>
                                    <input type="text" name="snuff_d" id="snuff_d" class="form-control" disabled>
                                    <!-- <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="snuff" id="snuff-yes"
                                            value="yes" disabled>
                                        <label class="form-check-label" for="snuff-yes">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="snuff" id="snuff-no"
                                            value="no" disabled>
                                        <label class="form-check-label" for="snuff-no">No</label>
                                    </div> -->
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Allergy <span class="required">*</span></label> <br>
                                    <input type="text" name="allergy_d" id="allergy_d" class="form-control" disabled>
                                    <!-- <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="allergy" id="allergy-yes"
                                            value="yes" disabled>
                                        <label class="form-check-label" for="snuff-yes">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="allergy" id="allergy-no"
                                            value="yes" disabled>
                                        <label class="form-check-label" for="snuff-no">No</label>
                                    </div> <br> -->

                                    <!-- <input type="text" class="form-control" placeholder="Enter allergies, if any"> -->
                                </div>

                            </div>

                            <!-- Form Row -->
                            <div class="row checkup-form__row">
                                <div class="col form-group">
                                    <textarea class="form-control" placeholder="Please specify allergy"
                                        name="allergy_name" id="allergy_name" readonly></textarea>
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
                                <div class="col form-group">
                                    <label class="form-label">Defects / Disability <span
                                            class="required">*</span></label>
                                    <input class="form-control onlyalphanum" type="text"
                                        placeholder="Defects / Disability" name="defect" id="defect">
                                    <div class="invalid-feedback text-danger" id="defect_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Pulse Rate<span class="required">*</span></label>
                                    <input class="form-control onlyalphanum" type="text" placeholder="Pulse Rate"
                                        name="pulse" id="pulse">
                                    <div class="invalid-feedback text-danger" id="pulse_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">BP<span class="required">*</span></label>
                                    <input class="form-control onlyalphanum" type="text" placeholder="BP" name="bp_rprt"
                                        id="bp_rprt">
                                    <div class="invalid-feedback text-danger" id="bp_rprt_msg">
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Health Info -->

                        <!-- ======= Visual Acuity Information Section======= -->
                        <div class="checkup-form__section">
                            <h4 class="sub-heading">Visual Acuity</h4>

                            <div class="row row-cols-3">
                                <div class="col form-group">
                                    <label class="form-label"> Vision</label>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label"> Left</label>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label"> Right</label>
                                </div>
                            </div>
                            <div class="row row-cols-3">
                                <div class="col form-group">
                                    <label class="form-label"> Distance Vision<span class="required">*</span></label>
                                </div>
                                <div class="col form-group">
                                    <input class="form-control anum" type="text" placeholder="Left" name="d_left"
                                        id="d_left">
                                    <div class="invalid-feedback text-danger" id="d_left_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <input class="form-control anum" type="text" placeholder="Right" name="d_right"
                                        id="d_right">
                                    <div class="invalid-feedback text-danger" id="d_right_msg">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-3">
                                <div class="col form-group">
                                    <label class="form-label"> Near Vision<span class="required">*</span></label>
                                </div>
                                <div class="col form-group">
                                    <input class="form-control anum" type="text" placeholder="Left" name="n_left"
                                        id="n_left">
                                    <div class="invalid-feedback text-danger" id="n_left_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <input class="form-control anum" type="text" placeholder="Right" name="n_right"
                                        id="n_right">
                                    <div class="invalid-feedback text-danger" id="n_right_msg">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-3">
                                <div class="col form-group">
                                    <label class="form-label"> Color Vision<span class="required">*</span></label>
                                </div>
                                <div class="col form-group">
                                    <input class="form-control anum" type="text" placeholder="Left" name="c_left"
                                        id="c_left">
                                    <div class="invalid-feedback text-danger" id="c_left_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <input class="form-control anum" type="text" placeholder="Right" name="c_right"
                                        id="c_right">
                                    <div class="invalid-feedback text-danger" id="c_right_msg">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-cols-3">
                                <div class="col form-group">
                                    <label class="form-label">Correction<span class="required">*</span></label>
                                </div>
                                <div class="col form-group">
                                    <input class="form-control anum" type="text" placeholder="Left" name="cr_left"
                                        id="cr_left">
                                    <div class="invalid-feedback text-danger" id="cr_left_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <input class="form-control anum" type="text" placeholder="Right" name="cr_right"
                                        id="cr_right">
                                    <div class="invalid-feedback text-danger" id="cr_right_msg">
                                    </div>
                                </div>
                            </div>
                            <div class="pb-4 form-group">
                                <h4 class="sub-heading">Remarks</h4>
                                <textarea class="form-control spc_chr" name="remarks" id="remarks"
                                    placeholder="Remarks"></textarea>
                                <div class="invalid-feedback text-danger" id="remarks_msg">
                                </div>
                            </div>
                        </div>

                        <!-- ======= Health Information Section======= -->
                        <div class="checkup-form__section">
                            <h4 class="sub-heading">Systemic Examination</h4>
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
                                <div class="col form-group">
                                    <label class="form-label">Respiratory System
                                        <span class="required">*</span>
                                    </label>
                                    <input class="form-control" type="text" placeholder="Respiratory System"
                                        name="respiratory" id="respiratory">
                                    <div class="invalid-feedback text-danger" id="respiratory_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Cardio - Vascular System
                                        <span class="required">*</span>
                                    </label>
                                    <input class="form-control" type="text" placeholder="Cardio - Vascular System"
                                        name="cardio" id="cardio">
                                    <div class="invalid-feedback text-danger" id="cardio_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Central Nervous System<span
                                            class="required">*</span></label>
                                    <input class="form-control" type="text" placeholder="Central Nervous System"
                                        name="nervous" id="nervous">
                                    <div class="invalid-feedback text-danger" id="nervous_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Abdomen<span class="required">*</span></label>
                                    <input class="form-control" type="text" placeholder="Abdomen" name="abdomen"
                                        id="abdomen">
                                    <div class="invalid-feedback text-danger" id="abdomen_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Skin<span class="required">*</span></label>
                                    <input class="form-control" type="text" placeholder="Skin" name="skin" id="skin">
                                    <div class="invalid-feedback text-danger" id="skin_msg">
                                    </div>
                                </div>

                                <div class="col form-group">
                                    <label class="form-label">Chest X - Ray<span class="required">*</span></label>
                                    <input class="form-control" type="text" placeholder="Chest X - Ray" name="xray"
                                        id="xray">
                                    <div class="invalid-feedback text-danger" id="xray_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Thyphoid Vaccine<span class="required">*</span></label>
                                    <input class="form-control" type="text" placeholder="Thyphoid Vaccine"
                                        name="thyphoid" id="thyphoid">
                                    <div class="invalid-feedback text-danger" id="thyphoid_msg">
                                    </div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Audiometry
                                        <!-- <span class="required">*</span> -->
                                    </label>
                                    <br>
                                    <div class="custom-upload">
                                        <input type="file" class="inputfile" name="audiometry" id="audiometry"
                                            accept=".pdf">
                                        <div class="invalid-feedback text-danger" id="audiometry_msg">
                                        </div>
                                        <label for="audiometry" id="audiometry_label">
                                            <div class="d-grid">
                                                <span class="btn btn-outline-primary btn-sm">Upload PDF</span>
                                            </div>
                                        </label>
                                        <a id="view_pdf" class="btn btn-outline-primary btn-sm" style="display:none;"
                                            target="_blank">View PDF</a>
                                    </div><br>
                                    <small id="adm_nm">No PDF selected</small>
                                    <div class="form-text" id="adm">Less than or equal to 1Mb</div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Electrocardiogram -ECG
                                        <!-- <span class="required">*</span> -->
                                    </label>
                                    <br>
                                    <div class="custom-upload">
                                        <input type="file" class="inputfile" name="ecg" id="ecg" accept=".pdf">
                                        <div class="invalid-feedback text-danger" id="ecg_msg">
                                        </div>
                                        <label for="ecg" id="ecg_label">
                                            <div class="d-grid">
                                                <span class="btn btn-outline-primary btn-sm">Upload PDF</span>
                                            </div>
                                        </label>
                                        <a id="eview_pdf" class="btn btn-outline-primary btn-sm" style="display:none;"
                                            target="_blank">View PDF</a>
                                    </div><br>
                                    <small id="ecg_nm">No PDF selected</small>
                                    <div class="form-text" id="ecgd">Less than or equal to 1Mb</div>
                                </div>

                                <div class="col form-group">
                                    <label class="form-label">Lung Function Test
                                        <!-- <span class="required">*</span> -->
                                    </label>
                                    <br>
                                    <div class="custom-upload">
                                        <input type="file" class="inputfile" name="upload-lungpdf" id="upload-lungpdf"
                                            accept=".pdf">
                                        <div class="invalid-feedback text-danger" id="upload-lungpdf_msg">
                                        </div>
                                        <label for="upload-lungpdf" id="lng_label">
                                            <div class="d-grid">
                                                <span class="btn btn-outline-primary btn-sm">Upload PDF</span>
                                            </div>
                                        </label>
                                        <a id="lview_pdf" class="btn btn-outline-primary btn-sm" style="display:none;"
                                            target="_blank">View PDF</a>
                                    </div><br>
                                    <small id="lpdf_nm">No PDF selected</small>
                                    <div class="form-text" id="ltxt">Less than or equal to 1Mb</div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Lab Investigation
                                        <!-- <span class="required">*</span> -->
                                    </label>
                                    <br>
                                    <div class="custom-upload">
                                        <input type="file" class="inputfile" id="upload-labpdf" name="upload-labpdf"
                                            accept=".pdf">
                                        <div class="invalid-feedback text-danger" id="upload-labpdf_msg">
                                        </div>
                                        <label for="upload-labpdf" id="lb_label">
                                            <div class="d-grid">
                                                <span class="btn btn-outline-primary btn-sm">Upload PDF</span>
                                            </div>
                                        </label>
                                        <a id="lbview_pdf" class="btn btn-outline-primary btn-sm" style="display:none;"
                                            target="_blank">View PDF</a>
                                    </div><br>
                                    <small id="lbpdf_nm">No PDF selected</small>
                                    <div class="form-text" id="lbtxt">Less than or equal to 1Mb</div>
                                </div>
                                <!-- 4 more lab pdf -->
                                <div class="col form-group">
                                    <label class="form-label">Lab Investigation 1
                                        <!-- <span class="required">*</span> -->
                                    </label>
                                    <br>
                                    <div class="custom-upload">
                                        <input type="file" class="inputfile" id="upload-labpdf1" name="upload-labpdf1"
                                            accept=".pdf">
                                        <div class="invalid-feedback text-danger" id="upload-labpdf1_msg">
                                        </div>
                                        <label for="upload-labpdf1" id="lb1">
                                            <div class="d-grid">
                                                <span class="btn btn-outline-primary btn-sm">Upload PDF</span>
                                            </div>
                                        </label>
                                        <a id="lb1view_pdf" class="btn btn-outline-primary btn-sm" style="display:none;"
                                            target="_blank">View PDF</a>
                                    </div><br>
                                    <small id="lbpdf1_nm">No PDF selected</small>

                                    <div class="form-text" id="lb1txt">Less than or equal to 1Mb</div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Lab Investigation 2
                                        <!-- <span class="required">*</span> -->
                                    </label>
                                    <br>
                                    <div class="custom-upload">
                                        <input type="file" class="inputfile" id="upload-labpdf2" name="upload-labpdf2"
                                            accept=".pdf">
                                        <div class="invalid-feedback text-danger" id="upload-labpdf2_msg">
                                        </div>
                                        <label for="upload-labpdf2" id="lb2">
                                            <div class="d-grid">
                                                <span class="btn btn-outline-primary btn-sm">Upload PDF</span>
                                            </div>
                                        </label>
                                        <a id="lb2view_pdf" class="btn btn-outline-primary btn-sm" style="display:none;"
                                            target="_blank">View PDF</a>
                                    </div><br>
                                    <small id="lbpdf2_nm">No PDF selected</small>

                                    <div class="form-text" id="lb2txt">Less than or equal to 1Mb</div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Lab Investigation 3
                                        <!-- <span class="required">*</span> -->
                                    </label>
                                    <br>
                                    <div class="custom-upload">
                                        <input type="file" class="inputfile" id="upload-labpdf3" name="upload-labpdf3"
                                            accept=".pdf">
                                        <div class="invalid-feedback text-danger" id="upload-labpdf3_msg">
                                        </div>
                                        <label for="upload-labpdf3" id="lb3">
                                            <div class="d-grid">
                                                <span class="btn btn-outline-primary btn-sm">Upload PDF</span>
                                            </div>
                                        </label>
                                        <a id="lb3view_pdf" class="btn btn-outline-primary btn-sm" style="display:none;"
                                            target="_blank">View PDF</a>
                                    </div><br>
                                    <small id="lbpdf3_nm">No PDF selected</small>

                                    <div class="form-text" id="lb3txt">Less than or equal to 1Mb</div>
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Lab Investigation 4
                                        <!-- <span class="required">*</span> -->
                                    </label>
                                    <br>
                                    <div class="custom-upload">
                                        <input type="file" class="inputfile" id="upload-labpdf4" name="upload-labpdf4"
                                            accept=".pdf">
                                        <div class="invalid-feedback text-danger" id="upload-labpdf4_msg">
                                        </div>
                                        <label for="upload-labpdf4" id="lb4">
                                            <div class="d-grid">
                                                <span class="btn btn-outline-primary btn-sm">Upload PDF</span>
                                            </div>
                                        </label>
                                        <a id="lb4view_pdf" class="btn btn-outline-primary btn-sm" style="display:none;"
                                            target="_blank">View PDF</a>
                                    </div><br>
                                    <small id="lbpdf4_nm">No PDF selected</small>

                                    <div class="form-text" id="lb4txt">Less than or equal to 1Mb</div>
                                </div>

                            </div>

                        </div>

                        <!-- ======= Disease Section======= -->
                        <div class="checkup-form__section">
                            <h4 class="sub-heading">Past Medical History </h4>
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3">
                                <div class="col form-group">
                                    <label class="form-label">Diabetes <span class="normal">(High / Low blood sugar
                                            level)</span> <span class="required">*</span></label> <br>
                                    <input type="text" id="diabetes_d" class="form-control" name="diabetes_d" disabled>
                                    <!-- <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="diabetes" id="diabetes-yes"
                                            value="yes" disabled>
                                        <label class="form-check-label" for="diabetes-yes">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="diabetes" id="diabetes-no"
                                            value="no" disabled>
                                        <label class="form-check-label" for="diabetes-no">No</label>
                                    </div> -->
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Hypertension <span class="normal">(BP- blood pressure
                                            issues)</span> <span class="required">*</span></label> <br>
                                    <input type="text" id="bp_d" name="bp_d" class="form-control" disabled>
                                    <!-- <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="bp" id="bp-yes" value="yes"
                                            disabled>
                                        <label class="form-check-label" for="bp-yes">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="bp" id="bp-no" value="no"
                                            disabled>
                                        <label class="form-check-label" for="bp-no">No</label>
                                    </div> -->
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Heart disease <span class="required">*</span></label> <br>
                                    <input type="text" name="heart_d" id="heart_d" class="form-control" disabled>
                                    <!-- <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="heart" id="heart-yes"
                                            value="yes" disabled>
                                        <label class="form-check-label" for="heart-yes">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="heart" id="heart-no"
                                            value="no" disabled>
                                        <label class="form-check-label" for="heart-no">No</label>
                                    </div> -->
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Kidney disease. <span class="required">*</span></label>
                                    <br>
                                    <input type="text" id="kidney_d" name="kidney_d" class="form-control" disabled>
                                    <!-- <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="kidney" id="kidney-yes"
                                            value="yes" disabled>
                                        <label class="form-check-label" for="kidney-yes">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="kidney" id="kidney-no"
                                            value="no" disabled>
                                        <label class="form-check-label" for="kidney-no">No</label>
                                    </div> -->
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">COPD / Asthma<span class="required">*</span></label> <br>
                                    <input type="text" name="asthama_d" id="asthama_d" class="form-control" disabled>
                                    <!-- <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="asthma" id="asthma-yes"
                                            value="yes" disabled>
                                        <label class="form-check-label" for="asthma-yes">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="asthma" id="asthma-no"
                                            value="no" disabled>
                                        <label class="form-check-label" for="asthma-no">No</label>
                                    </div> -->
                                </div>
                                <div class="col form-group">
                                    <label class="form-label">Others<span class="required">*</span></label> <br>
                                    <input type="text" name="other_d" id="other_d" class="form-control" disabled>
                                    <!-- <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="otherdisease"
                                            id="otherdisease-yes" value="yes" disabled>
                                        <label class="form-check-label" for="otherdisease-yes">Yes</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="otherdisease"
                                            id="otherdisease-no" value="no" disabled>
                                        <label class="form-check-label" for="otherdisease-no">No</label>
                                    </div> -->
                                </div>
                            </div>
                            <!-- Form Row -->
                            <div class="row checkup-form__row">
                                <div class="col form-group">
                                    <textarea class="form-control" id="other_disease" name="other_disease"
                                        placeholder="Others , please specify" readonly></textarea>
                                </div>
                            </div>
                        </div> <!-- End Disease -->

                        <!-- ======= Health Information Section======= -->
                        <div class="checkup-form__section pb-4 form-group">
                            <h4 class="sub-heading">Advice Remarks</h4>
                            <textarea class="form-control" name="advice" id="advice"
                                placeholder="Advice Remarks"></textarea>
                            <div class="invalid-feedback text-danger" id="advice_msg">
                            </div>
                        </div>
                        <!-- Form Row -->
                        <div class="checkup-form__row custom-class">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="fittowork"
                                    name="fittowork">
                                <label class="form-check-label" for="fittowork">
                                    Fit to work under specific advice as mentioned above
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input form-control" type="radio" value="Dr. Dharani Kumar K S"
                                    id="dctrName1" name="dctrName">
                                <label class="form-check-label" for="dctrName1">
                                    Dr. Dharani Kumar K S
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input form-control" type="radio" value="Dr. Mamata Patil"
                                    id="dctrName2" name="dctrName">
                                <label class="form-check-label" for="dctrName2">
                                    Dr. Mamata Patil
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input form-control" type="radio" value="Dr. Thripuramba R"
                                    id="dctrName3" name="dctrName">
                                <label class="form-check-label" for="dctrName3">
                                    Dr. Thripuramba R
                                </label>
                            </div>
                            <div class="invalid-feedback text-danger" id="dctrName_msg">
                            </div>
                        </div>
                        <div class="checkup-form__row custom-class">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="workfit"
                                    name="workfit">
                                <label class="form-check-label" for="workfit">
                                    Fit to work
                                </label>
                            </div>
                        </div>

                        <!-- Form Row -->
                        <div class="checkup-form__row">
                            <div class="col form-text">
                                <strong>Instructions to be followed for health check up:</strong>
                                <ul>
                                    <li>For blood tests, refrain from eating or drinking anything (except water) for 10
                                        or more hours before the scheduled test. </li>
                                    <li>Do not smoke during the fasting period.</li>
                                    <li>Please abstain from consuming alcohol for 48 hours  before the scheduled test.
                                    </li>
                                </ul>
                                <div class="text-danger mb-3">
                                    Following these instructions will help ensure accurate and reliable test results.
                                </div>
                            </div>
                            <div class="col form-group">
                                <div class="d-grid">
                                    <button type="submit" id="submit" name="submit"
                                        class="btn btn-lg btn-primary">Submit</button>
                                </div>
                                <div class="text-center  mt-5" id="scsmsg">
                                    <strong>Thank you for your cooperation.</strong>
                                </div>
                            </div>
                        </div>

                    </form>
                </main>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © All rights reserved by Rangadore Memorial Hospital
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../assets/js/bootstrapValidator.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- Notify -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"
        integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="../../dist/js/app.min.js"></script>
    <script src="../../dist/js/app.init.js"></script>
    <script src="../../dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- chartist chart -->
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/libs/d3/dist/d3.min.js"></script>
    <script src="../assets/libs/c3/c3.min.js"></script>
    <!-- Vector map JavaScript -->
    <script src="../assets/libs/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-us-aea-en.js"></script>
    <!-- Chart JS -->
    <script src="../../dist/js/pages/dashboards/dashboard2.js"></script>
    <script>
        $(document).ready(function () {
            $('body').on('keyup', ".onlyalphanum", function (event) {
                this.value = this.value.replace(/[^[A-Za-z0-9 ]]*/gi, '');
            });
            $('body').on('keyup', ".anum", function (event) {
                this.value = this.value.replace(/[^a-zA-z-:,0-9\/]/g, '');
            });
            $('body').on('keyup', ".spc_chr", function (event) {
                this.value = this.value.replace(/[^a-zA-z.,0-9 \/]/g, '');
            });

            $(document).on("change", "#upload-lungpdf", function () {
                if ($(this).val()) {
                    $("#lpdf_nm").html($(this).val().split('\\').pop());
                } else {
                    $("#lpdf_nm").html("No PDF selected");
                }
            });

            $(document).on("change", "#upload-labpdf", function () {
                if ($(this).val()) {
                    $("#lbpdf_nm").html($(this).val().split('\\').pop());
                } else {
                    $("#lbpdf_nm").html("No PDF selected");
                }
            });
            $(document).on("change", "#upload-labpdf1", function () {
                if ($(this).val()) {
                    $("#lbpdf1_nm").html($(this).val().split('\\').pop());
                } else {
                    $("#lbpdf1_nm").html("No PDF selected");
                }
            });
            $(document).on("change", "#upload-labpdf2", function () {
                if ($(this).val()) {
                    $("#lbpdf2_nm").html($(this).val().split('\\').pop());
                } else {
                    $("#lbpdf2_nm").html("No PDF selected");
                }
            });
            $(document).on("change", "#upload-labpdf3", function () {
                if ($(this).val()) {
                    $("#lbpdf3_nm").html($(this).val().split('\\').pop());
                } else {
                    $("#lbpdf3_nm").html("No PDF selected");
                }
            });
            $(document).on("change", "#upload-labpdf4", function () {
                if ($(this).val()) {
                    $("#lbpdf4_nm").html($(this).val().split('\\').pop());
                } else {
                    $("#lbpdf4_nm").html("No PDF selected");
                }
            });

            $(document).on("change", "#audiometry", function () {
                if ($(this).val()) {
                    $("#adm_nm").html($(this).val().split('\\').pop());
                } else {
                    $("#adm_nm").html("No PDF selected");
                }
            });

            $(document).on("change", "#ecg", function () {
                if ($(this).val()) {
                    $("#ecg_nm").html($(this).val().split('\\').pop());
                } else {
                    $("#ecg_nm").html("No PDF selected");
                }
            });

            var urlParams = new URLSearchParams(window.location.search);
            var eid = urlParams.get('i');
            $('#formEid').val(eid);

            $.ajax({
                method: "GET",
                url: "<?= base_url('superadmin/edata') ?>",
                data: {
                    'id': eid
                },
                success: function (response) {
                    // console.log(response);
                    $('#name').val(response.message.name);
                    $('#empid').val(response.message.emp_id);
                    $('#gender').val(response.message.gender);
                    $('#dob').val(response.message.dob);
                    $('#phone').val(response.message.phone);
                    $('#service_dur').val(response.message.service_dur);
                    $('#dept').val(response.message.dept);
                    $('#height').val(response.message.height);
                    $('#weight').val(response.message.weight);
                    $('#blood_group').val(response.message.blood);
                    $('#diet').val(response.message.diet);
                    $('#uhid').val(response.message.uhid ? response.message.uhid : '');
                    $('#mentrual').val(response.message.obstetric ? response.message.obstetric : '');
                    $('#pr_comp').val(response.message.complaints ? response.message.complaints : '');
                    $('#past').val(response.message.past_history ? response.message.past_history : '');
                    $('#fam_his').val(response.message.fam_history ? response.message.fam_history : '');
                    $('#other').val(response.message.other ? response.message.other : '');
                    $('#defect').val(response.message.disability ? response.message.disability : 'NIL');
                    $('#pulse').val(response.message.pulse ? response.message.pulse : '');
                    $('#bp_rprt').val(response.message.bp_rprt ? response.message.bp_rprt : '');
                    $('#d_left').val(response.message.d_vision_left ? response.message.d_vision_left : '6/6');
                    $('#d_right').val(response.message.d_vision_right ? response.message.d_vision_right : '6/6');
                    $('#n_left').val(response.message.n_vision_left ? response.message.n_vision_left : 'N6');
                    $('#n_right').val(response.message.n_vision_right ? response.message.n_vision_right : 'N6');
                    $('#c_left').val(response.message.clr_vision_left ? response.message.clr_vision_left : 'Normal');
                    $('#c_right').val(response.message.clr_vision_right ? response.message.clr_vision_right : 'Normal');
                    $('#cr_left').val(response.message.crrc_vision_left ? response.message.crrc_vision_left : 'NIL');
                    $('#cr_right').val(response.message.crrc_vision_right ? response.message.crrc_vision_right : 'NIL');
                    $('#respiratory').val(response.message.respiratory ? response.message.respiratory : 'B/L Normal vascular breath sounds, No added Sounds');
                    $('#cardio').val(response.message.cardio ? response.message.cardio : 'S1 S2 heard,  No murmurs');
                    $('#nervous').val(response.message.nervous ? response.message.nervous : 'No focal Neurological deficit');
                    $('#abdomen').val(response.message.abdomen ? response.message.abdomen : 'Soft, non-tender, bowel sounds present');
                    $('#skin').val(response.message.skin ? response.message.skin : 'Normal');
                    $('#xray').val(response.message.chest ? response.message.chest : '');
                    $('#thyphoid').val(response.message.thyphoid ? response.message.thyphoid : '');
                    $('#advice').val(response.message.advice ? response.message.advice : '');
                    $('#somking_d').val(response.message.smoking ? response.message.smoking : '');
                    $('#alcohol_d').val(response.message.alcohol ? response.message.alcohol : '');
                    $('#snuff_d').val(response.message.snuff ? response.message.snuff : '');
                    $('#allergy_d').val(response.message.allergy ? response.message.allergy : '');
                    $('#diabetes_d').val(response.message.diabetes ? response.message.diabetes : '');
                    $('#bp_d').val(response.message.bp ? response.message.bp : '');
                    $('#heart_d').val(response.message.heart_disease ? response.message.heart_disease : '');
                    $('#kidney_d').val(response.message.kidney_disease ? response.message.kidney_disease : '');
                    $('#asthama_d').val(response.message.asthma ? response.message.asthma : '');
                    $('#other_d').val(response.message.other_disease ? response.message.other_disease : '');

                    if (response.message.lung) {
                        var dt = response.message.lung;
                        var msg = "<?= base_url() ?>" + dt;

                        // $('#upload-lungpdf').hide();
                        // $('#lng_label').hide();

                        $('#lview_pdf').attr('href', msg).show();
                        $('#lpdf_nm').hide();
                        $('#ltxt').hide();
                    }


                    if (response.message.lab) {
                        var dt = response.message.lab;
                        var msg = "http://localhost/rm_hospital/" + dt;
                        // $('#upload-labpdf').hide();
                        // $('#lb_label').hide();

                        $('#lbview_pdf').attr('href', msg).show();
                        $('#lbpdf_nm').hide();
                        $('#lbtxt').hide();
                    }

                    if (response.message.lab1) {
                        var dt = response.message.lab1;
                        var msg = "http://localhost/rm_hospital/" + dt;
                        // $('#upload-labpdf1').hide();
                        // $('#lb1').hide();

                        $('#lb1view_pdf').attr('href', msg).show();
                        $('#lbpdf1_nm').hide();
                        $('#lb1txt').hide();
                    }

                    if (response.message.lab2) {
                        var dt = response.message.lab2;
                        var msg = "http://localhost/rm_hospital/" + dt;
                        // $('#upload-labpdf2').hide();
                        // $('#lb2').hide();

                        $('#lb2view_pdf').attr('href', msg).show();
                        $('#lbpdf2_nm').hide();
                        $('#lb2txt').hide();
                    }

                    if (response.message.lab3) {
                        var dt = response.message.lab3;
                        var msg = "http://localhost/rm_hospital/" + dt;
                        // $('#upload-labpdf3').hide();
                        // $('#lb3').hide();

                        $('#lb3view_pdf').attr('href', msg).show();
                        $('#lbpdf3_nm').hide();
                        $('#lb3txt').hide();
                    }

                    if (response.message.lab4) {
                        var dt = response.message.lab4;
                        var msg = "http://localhost/rm_hospital/" + dt;
                        // $('#upload-labpdf4').hide();
                        // $('#lb4').hide();

                        $('#lb4view_pdf').attr('href', msg).show();
                        $('#lbpdf4_nm').hide();
                        $('#lb4txt').hide();
                    }

                    if (response.message.audiometry) {
                        var dt = response.message.audiometry;
                        var msg = "http://localhost/rm_hospital/" + dt;

                        // $('#audiometry').hide();
                        // $('#audiometry_label').hide();

                        $('#view_pdf').attr('href', msg).show();
                        $('#adm_nm').hide();
                        $('#adm').hide();
                    }

                    if (response.message.ecg) {
                        var dt = response.message.ecg;
                        var msg = "http://localhost/rm_hospital/" + dt;

                        // $('#ecg').hide();
                        // $('#ecg_label').hide();

                        $('#eview_pdf').attr('href', msg).show();
                        $('#ecg_nm').hide();
                        $('#ecgd').hide();
                    }

                    if (response.message.photo) {
                        var imagePath = "http://localhost/rm_hospital/" + response.message.photo;
                        $('#photo').attr('src', imagePath);
                        $('#profileimage').prop('disabled', true);
                    } else {
                        $('#photo').attr('src', '');
                        $('#profileimage').prop('disabled', false);
                    }

                    if (response.message.is_checked === '1') {
                        $('#fittowork').prop('checked', true).prop('disabled', true);
                    }
                    if (response.message.workfit_checked === '1') {
                        $('#workfit').prop('checked', true).prop('disabled', true);
                    }

                    var allergy_name = response.message.allergy_name;
                    $('#allergy_name').val(allergy_name);

                    var other_diseasename = response.message.other_diseasename;
                    $('#other_disease').val(other_diseasename)


                    var doctorName = response.message.doctorName;
                    $('input[name="dctrName"][value="' + doctorName + '"]').prop('checked', true);

                    var dob = new Date(response.message.dob);
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
                }
            });



            jQuery(document).ready(function (e) {
                $('#Reportform').bootstrapValidator({
                    fields: {
                        'uhid': {
                            validators: {
                                // notEmpty: {
                                //     message: "Please enter RMH/UHID"
                                // },
                                remote: {
                                    message: 'UHID already exist!',
                                    url: "<?= base_url('superadmin/validate_UHID') ?>",
                                    data: function (validator) {
                                        return {
                                            uhid: validator.getFieldElements('uhid').val(),
                                            id: $('#formEid').val()
                                        };
                                    },
                                    delay: 2000,
                                    type: 'GET'
                                },
                            }
                        },
                        'height': {
                            validators: {
                                notEmpty: {
                                    message: "Please enter Height"
                                },
                            }
                        },
                        'weight': {
                            validators: {
                                notEmpty: {
                                    message: "Please enter Weight"
                                },
                            }
                        },
                        // 'mentrual': {
                        //     validators: {
                        //         notEmpty: {
                        //             message: "Please enter Obstetric / Mentrual History"
                        //         },
                        //     }
                        // },
                        'pr_comp': {
                            validators: {
                                notEmpty: {
                                    message: "Please enter Presenting Complaints"
                                },
                            }
                        },
                        'past': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter Past History"
                                },
                            }
                        },
                        'fam_his': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter Family History"
                                },
                            }
                        },
                        'defect': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter Defects / Disability "
                                },
                            }
                        },
                        'profileimage': {
                            validators: {
                                file: {
                                    extension: 'jpeg,jpg,png',
                                    type: 'image/jpeg,image/png',
                                    maxSize: 10 * 1024 * 1024,
                                    message: 'The selected file is not valid or exceeds 10 MB in size',
                                },
                            }
                        },
                        'pulse': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter Pulse Rate"
                                },
                            }
                        },
                        'bp_rprt': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter BP"
                                },
                            }
                        },
                        // 'd_left': {
                        //     validators: {
                        //         notEmpty: {
                        //             message: "Please Enter Distance Vision Left Eye"
                        //         },
                        //     }
                        // },
                        // 'd_right': {
                        //     validators: {
                        //         notEmpty: {
                        //             message: "Please Enter Distance Vision Right Eye"
                        //         },
                        //     }
                        // },
                        // 'n_left': {
                        //     validators: {
                        //         notEmpty: {
                        //             message: "Please Enter Near Vision Left Eye"
                        //         },
                        //     }
                        // },
                        // 'n_right': {
                        //     validators: {
                        //         notEmpty: {
                        //             message: "Please Enter Near Vision Right Eye"
                        //         },
                        //     }
                        // },
                        // 'c_left': {
                        //     validators: {
                        //         notEmpty: {
                        //             message: "Please Enter Color Vision Left Eye"
                        //         },
                        //     }
                        // },
                        // 'c_right': {
                        //     validators: {
                        //         notEmpty: {
                        //             message: "Please Enter Color Vision Right Eye"
                        //         },
                        //     }
                        // },
                        // 'cr_left': {
                        //     validators: {
                        //         notEmpty: {
                        //             message: "Please Enter Correction Left Eye"
                        //         },
                        //     }
                        // },
                        // 'cr_right': {
                        //     validators: {
                        //         notEmpty: {
                        //             message: "Please Enter Correction Right Eye"
                        //         },
                        //     }
                        // },
                        'respiratory': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter Respiratory System Report"
                                },
                            }
                        },
                        'cardio': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter Cardio - Vascular System Report"
                                },
                            }
                        },
                        'nervous': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter Central Nervous System Report"
                                },
                            }
                        },
                        'abdomen': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter Abdomen Report"
                                },
                            }
                        },
                        'skin': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter Skin Report"
                                },
                            }
                        },
                        'audiometry': {
                            validators: {
                                file: {
                                    extension: 'pdf',
                                    type: 'application/pdf',
                                    maxSize: 2 * 1024 * 1024,
                                    message: 'The selected file is not a valid PDF or exceeds 2 MB in size',
                                },
                            }
                        },
                        'ecg': {
                            validators: {
                                file: {
                                    extension: 'pdf',
                                    type: 'application/pdf',
                                    maxSize: 2 * 1024 * 1024,
                                    message: 'The selected file is not a valid PDF or exceeds 2 MB in size',
                                },
                            }
                        },
                        'xray': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter Chest X - Ray Report"
                                },
                            }
                        },
                        'thyphoid': {
                            validators: {
                                notEmpty: {
                                    message: "Please Enter Thyphoid Vaccine"
                                },
                            }
                        },
                        'upload-lungpdf': {
                            validators: {
                                // notEmpty: {
                                //     message: "Please choose a PDF file"
                                // },
                                file: {
                                    extension: 'pdf',
                                    type: 'application/pdf',
                                    maxSize: 2 * 1024 * 1024,
                                    message: 'The selected file is not a valid PDF or exceeds 2 MB in size',
                                },
                            }
                        },
                        'upload-labpdf': {
                            validators: {
                                // notEmpty: {
                                //     message: "Please choose a PDF file"
                                // },
                                file: {
                                    extension: 'pdf',
                                    type: 'application/pdf',
                                    maxSize: 2 * 1024 * 1024,
                                    message: 'The selected file is not a valid PDF or exceeds 2 MB in size',
                                },
                            }
                        },
                        'advice': {
                            validators: {
                                notEmpty: {
                                    message: 'PLease Enter Advice Remarks'
                                }
                            }
                        },
                        // 'dctrName': {
                        //     validators: {
                        //         notEmpty: {
                        //             message: 'Please Select a Doctor'
                        //         }
                        //     }
                        // },
                    },
                }).on('success.form.bv', function (e) {
                    e.preventDefault();
                    var $form = $(e.target);
                    var bv = $form.data('bootstrapValidator');
                    var fittoworkChecked = $('#fittowork').is(':checked');
                    var workfit = $('#workfit').is(':checked');
                    var workfitValue = workfit ? '1' : '0';
                    var fittoworkValue = fittoworkChecked ? '1' : '0';
                    var formData = new FormData($form[0]);
                    formData.append('workfit', workfitValue);
                    formData.append('fittowork', fittoworkValue);
                    // console.log(formData);
                    $.ajax({
                        url: "<?= base_url('superadmin/editformdata') ?>",
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            // console.log(response);
                            if (response.status == 'error') {
                                let error = response.errors;
                                for (const key in error) {
                                    document.getElementById(key).classList.add('is-invalid');
                                    document.getElementById(key + '_msg').innerHTML = error[key];
                                }
                            } else {
                                // $.notify(response.message, "success");
                                $('#scsmsg').show().css('color', 'green');
                                setTimeout(function () {
                                    window.location.href = "<?= base_url('superadmin/dashboard') ?>";
                                }, 5000);
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