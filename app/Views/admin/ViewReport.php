<?php
function calculateAge($dob)
{
    $dob = new DateTime($dob);
    $now = new DateTime();
    $age = $now->diff($dob);

    // Format the age
    $formattedAge = $age->y . ' years ' . $age->m . ' months';
    return $formattedAge;
}

$degree = '';
$imgSrc = '';
$kmc = '';
if (isset($hospital[0]['doctorName'])) {
    switch ($hospital[0]['doctorName']) {
        case 'Dr. Mamata Patil':
            $degree = 'MBBS, MPH';
            $kmc = 'KMC No : 50016';
            $imgSrc = 'http://localhost/rm_hospital/public/assets/images/mamata.jpg';
            break;
        case 'Dr. Dharani Kumar K S':
            $degree = 'MBBS, MD, Internal Medicine Consultant Physician';
            $kmc = 'KMC No : 97149';
            $imgSrc = 'http://localhost/rm_hospital/public/assets/images/sign.jpeg';
            break;
        case 'Dr. Thripuramba R':
            $degree = 'MBBS';
            $kmc = 'KMC No : 23963';
            $imgSrc = 'http://localhost/rm_hospital/public/assets/images/thripurmba.jpg';
            break;
        default:
            $imgSrc = '';
            break;
    }
}
?>
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

    <style>
         li a {
            text-decoration: none;
        }

        * {
            margin: 0;
            padding: 0;
        }

        body {
            /* padding: 24px; */
            font-family: "Poppins", sans-serif;
            font-size: 13px;
        }

        .hospital {
            border-bottom: 4px solid #000;
            padding-bottom: 16px;
            margin-bottom: 24px;
        }

        /* .report-box{
            border:5px solid #000;
            padding: 24px;
        } */

        table {
            width: 100%;
            border: 1px solid #000;
            border-collapse: collapse;
        }

        .full-width {
            width: 100%
        }

        .no-padding td {
            padding: 0;
        }

        .no-border,
        td.no-border {
            border: 0px solid #000;
        }

        th {
            font-weight: 600;
        }

        th,
        td {
            padding: 6px;
            vertical-align: top;
            border-bottom: 1px solid #000;
            text-align: left;
        }


        .right-align {
            text-align: right;
        }

        .center-align {
            text-align: center;
        }

        .margin-top-bottom {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .heading {
            text-align: center;
            font-size: 26px;
            font-weight: 600;
            border-bottom: 1px solid #000;
        }

        .report-container {
            max-width: 1024px;
            margin: 0px auto;
            background: #fff;
            padding: 32px;
            border: 1px solid #666;
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
                    <!-- <a class="navbar-brand" href="#"> -->
                    <!-- Logo icon -->
                    <!-- <b class="logo-icon"> -->
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <!-- <img src="../../assets/images/logo-icon-131x128-1.png" alt="homepage" class="dark-logo" /> -->
                    <!-- Light Logo icon -->
                    <!-- <img src="../../assets/images/logo-icon-131x128-1.png" alt="homepage" class="light-logo" /> -->
                    <!-- </b> -->
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    <!-- <span class="logo-text"> -->
                    <!-- dark Logo text -->
                    <!-- <img src="../../assets/images/logo-icon-131x128-1.png" alt="homepage" class="dark-logo" /> -->
                    <!-- Light Logo text -->
                    <!-- <img src="../../assets/images/logo-icon-131x128-1.png" class="light-logo" alt="homepage" /> -->
                    <!-- </span> -->
                    <!-- </a> -->
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
                                <img src="../assets/images/users/user.png" alt="user" width="30"
                                    class="profile-pic rounded-circle" />
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                                <ul class="dropdown-user list-style-none">
                                    <li>
                                        <div class="dw-user-box p-3 d-flex">
                                            <div class="u-img"><img src="../assets/images/users/user.png" alt="user"
                                                    class="rounded" width="80"></div>
                                            <div class="u-text ml-2">
                                                <h4 class="mb-0">
                                                    <?php if (session()->loggedin == 'adminloggedin'): ?>
                                                        <?= session()->username; ?>
                                                    <?php endif ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="user-list"><a class="px-3 py-2"
                                            href="<?= base_url('admin/logout') ?>"><i class="fa fa-power-off"></i>
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
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?= base_url('admin/dashboard') ?>" aria-expanded="false">
                                <i class="mdi mdi-calendar"></i>
                                <span class="hide-menu">Dashboard</span>
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
                    <a href="<?= base_url('admin/logout') ?>" class="link" data-toggle="tooltip" title="Logout"><i
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
            <div class="report-container">
        <div class="center-align hospital">
            <img src="http://localhost/rm_hospital/public/assets/images/RMH.png" style="width: 100%;" />
        </div>

        <div class="center-align">
            <span class="heading">Medical Surveillance Proforma</span>
        </div>
        <br>
        <div class="center-align">
            <h3>Anthem Biosciences Private Limited</h3>
            <address style="font-size:12px">
                #49, F1 & F2, Canara Bank Road, Bommasandra, Industrial Area Phase I, Hosur Road, Bangalore -
                560
                099.
            </address>
        </div>

        <br>
        <input type="hidden" name="id" id="formid">
        <table class="full-width no-border">
            <tr>
                <th class="no-border">
                    RHM/UHID : <?= isset($hospital[0]['uhid']) ? $hospital[0]['uhid'] : '' ?>
                </th>
                <th class="right-align no-border">
                    Date :
                    <?= isset($hospital[0]['updated_at']) ? date('d M Y', strtotime($hospital[0]['updated_at'])) : '' ?>
                </th>
            </tr>
        </table>

        <br>

        <table class="no-border">
            <tr>
                <td width="100" class="no-border">
                    <?php if (isset($hospital[0]['photo']) && !empty($hospital[0]['photo'])): ?>
                        <img src="<?= 'http://localhost/rm_hospital/public/assets/images/uploads/' . $hospital[0]['photo'] ?>"
                            width="150" />
                    <?php else: ?>
                        <img src="<?= 'http://localhost/rm_hospital/public/assets/images/Profile.png' ?>" width="150" />
                    <?php endif; ?>

                </td>
                <td class="no-border">
                    <table>
                        <tr>
                            <th width="90">Name</th>
                            <td>: <?= isset($hospital[0]['name']) ? $hospital[0]['name'] : '' ?></td>
                        </tr>
                        <tr>
                            <th>Gender </th>
                            <td>: <?= isset($hospital[0]['gender']) ? $hospital[0]['gender'] : '' ?></td>
                        </tr>
                        <tr>
                            <th>Date of Birth</th>
                            <td>:
                                <?= isset($hospital[0]['dob']) ? date('d M Y', strtotime($hospital[0]['dob'])) : '' ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td>: <?= isset($hospital[0]['dob']) ? calculateAge($hospital[0]['dob']): '' ?></td>
                        </tr>
                    </table>
                </td>
                <td class="no-border">
                    <table>
                        <tr>
                            <th width="135">Employee ID </th>
                            <td>: <?= isset($hospital[0]['emp_id']) ? $hospital[0]['emp_id'] : '' ?> </td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>: <?= isset($hospital[0]['phone']) ? $hospital[0]['phone'] : '' ?></td>
                        </tr>
                        <tr>
                            <th>Duration of Service </th>
                            <td>:
                                <?= isset($hospital[0]['service_dur']) ? $hospital[0]['service_dur'] . ' years' : '' ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td>: <?= isset($hospital[0]['dept']) ? $hospital[0]['dept'] : '' ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <br>

        <h2>Personal History</h2>
        <table>
            <tr>
                <th width="220">Obstetric / Mentrual History </th>
                <td>: <?= isset($hospital[0]['obstetric']) ? ucwords($hospital[0]['obstetric']) : '' ?></td>
            </tr>
            <tr>
                <th>Presenting Complaints</th>
                <td>: <?= isset($hospital[0]['complaints']) ? ucwords($hospital[0]['complaints']) : '' ?></td>
            </tr>
            <tr>
                <th>Past History</th>
                <td>: <?= isset($hospital[0]['past_history']) ? ucwords($hospital[0]['past_history']) : '' ?>
                </td>
            </tr>
            <tr>
                <th>Family History</th>
                <td>: <?= isset($hospital[0]['fam_history']) ? ucwords($hospital[0]['fam_history']) : '' ?>
                </td>
            </tr>
            <tr>
                <th>Others</th>
                <td>: <?= isset($hospital[0]['other']) ? ucwords($hospital[0]['other']) : '' ?></td>
            </tr>
        </table>

        <br>

        <h2>Health Information</h2>
        <table class="no-border">
            <td class="no-border" width="50%">
                <table>
                    <tr>
                        <th width="100">Height </th>
                        <td>: <?= isset($hospital[0]['height']) ? $hospital[0]['height'] . ' cm' : '' ?></td>
                    </tr>
                    <tr>
                        <th>Weight </th>
                        <td>: <?= isset($hospital[0]['weight']) ? $hospital[0]['weight'] . ' Kg' : '' ?></td>
                    </tr>
                    <tr>
                        <th>Blood Group</th>
                        <td>: <?= isset($hospital[0]['blood']) ? $hospital[0]['blood'] . 've' : '' ?></td>
                    </tr>
                    <tr>
                        <th>Diet</th>
                        <td>: <?= isset($hospital[0]['diet']) ? ucwords($hospital[0]['diet']) : '' ?> </td>
                    </tr>
                </table>
            </td>
            <td class="no-border" width="50%">
                <table>
                    <tr>
                        <th width="100">Smoking</th>
                        <td>: <?= isset($hospital[0]['smoking']) ? ucwords($hospital[0]['smoking']) : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Alcohol </th>
                        <td>: <?= isset($hospital[0]['alcohol']) ? ucwords($hospital[0]['alcohol']) : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Snuff </th>
                        <td>: <?= isset($hospital[0]['snuff']) ? ucwords($hospital[0]['snuff']) : '' ?></td>
                    </tr>
                    <tr>
                        <th>Allergy </th>
                        <td>
                            : <?= isset($hospital[0]['allergy']) ? ucwords($hospital[0]['allergy']) : '' ?>
                            <?php if (!empty($hospital[0]['allergy_name'])): ?>
                                <span>(<?= $hospital[0]['allergy_name'] ?>)</span>
                            <?php endif; ?>

                        </td>
                    </tr>
                </table>
            </td>
        </table>

        <br>

        <h2>Visual Acuity</h2>
        <table>
            <tr>
                <th width="33%">Vision </th>
                <th width="33%">Left</th>
                <th width="33%">Right</th>
            </tr>
            <tr>
                <td>Distance Vision</td>
                <td><?= isset($hospital[0]['d_vision_left']) ? $hospital[0]['d_vision_left'] : '' ?></td>
                <td><?= isset($hospital[0]['d_vision_right']) ? $hospital[0]['d_vision_right'] : '' ?></td>
            </tr>
            <tr>
                <td>Near Vision</td>
                <td><?= isset($hospital[0]['n_vision_left']) ? $hospital[0]['n_vision_left'] : '' ?></td>
                <td><?= isset($hospital[0]['n_vision_right']) ? $hospital[0]['n_vision_right'] : '' ?></td>
            </tr>
            <tr>
                <td>Color Vision</td>
                <td><?= isset($hospital[0]['clr_vision_left']) ? $hospital[0]['clr_vision_left'] : '' ?></td>
                <td><?= isset($hospital[0]['clr_vision_right']) ? $hospital[0]['clr_vision_right'] : '' ?></td>
            </tr>
            <tr>
                <td>Correction</td>
                <td><?= isset($hospital[0]['crrc_vision_left']) ? $hospital[0]['crrc_vision_left'] : '' ?></td>
                <td><?= isset($hospital[0]['crrc_vision_right']) ? $hospital[0]['crrc_vision_right'] : '' ?>
                </td>
            </tr>
            <tr>
                <td>Remarks</td>
                <td colspan="2"><?= isset($hospital[0]['remarks']) ? $hospital[0]['remarks'] : '' ?></td>

            </tr>
        </table>

        <br>

        <h2>Systemic Examination</h2>
        <table>
            <tr>
                <th width="180">Respiratory System </th>
                <td>: <?= isset($hospital[0]['respiratory']) ? ucwords($hospital[0]['respiratory']) : '' ?>
                </td>
            </tr>
            <tr>
                <th>Cardio - Vascular System</th>
                <td>: <?= isset($hospital[0]['cardio']) ? ucwords($hospital[0]['cardio']) : '' ?></td>
            </tr>
            <tr>
                <th>Central Nervous System</th>
                <td>: <?= isset($hospital[0]['nervous']) ? ucwords($hospital[0]['nervous']) : '' ?></td>
            </tr>
            <tr>
                <th>Abdomen</th>
                <td>: <?= isset($hospital[0]['abdomen']) ? ucwords($hospital[0]['abdomen']) : '' ?></td>
            </tr>
            <tr>
                <th>Skin</th>
                <td>: <?= isset($hospital[0]['skin']) ? ucwords($hospital[0]['skin']) : '' ?></td>
            </tr>
            <tr>
                <th>Audiometry</th>
                <td>: <?= !empty($hospital[0]['audiometry']) ? 'Enclosed' : '' ?></td>
            </tr>

            <tr>
                <th>Electrocardiogram -ECG</th>
                <td>: <?= !empty($hospital[0]['ecg']) ? 'Enclosed' : '' ?></td>
            </tr>
            <tr>
                <th>Lung Report</th>
                <td>: <?= !empty($hospital[0]['lung']) ? 'Enclosed' : '' ?></td>
            </tr>
            <tr>
                <th>Lab Report</th>
                <td>: <?= !empty($hospital[0]['lab']) ? 'Enclosed' : '' ?></td>
            </tr>
            <tr>
                <th>Chest X - Ray</th>
                <td>: <?= isset($hospital[0]['chest']) ? ucwords($hospital[0]['chest']) : '' ?></td>
            </tr>
            <tr>
                <th>Thyphoid Vaccine</th>
                <td>: <?= isset($hospital[0]['thyphoid']) ? ucwords($hospital[0]['thyphoid']) : '' ?></td>
            </tr>
        </table>

        <br>

        <h2>Past Medical History</h2>
        <table>
            <tr>
                <th>Diabetes (High / Low blood sugar level) </th>
                <td>: <?= isset($hospital[0]['diabetes']) ? ucwords($hospital[0]['diabetes']) : '' ?></td>
            </tr>
            <tr>
                <th>Hypertension (BP- blood pressure issues) </th>
                <td>: <?= isset($hospital[0]['bp']) ? ucwords($hospital[0]['bp']) : '' ?></td>
            </tr>
            <tr>
                <th>Heart disease</th>
                <td>: <?= isset($hospital[0]['heart_disease']) ? ucwords($hospital[0]['heart_disease']) : '' ?>
                </td>
            </tr>
            <tr>
                <th>Kidney disease. </th>
                <td>:
                    <?= isset($hospital[0]['kidney_disease']) ? ucwords($hospital[0]['kidney_disease']) : '' ?>
                </td>
            </tr>
            <tr>
                <th>COPD / Asthma </th>
                <td>: <?= isset($hospital[0]['asthma']) ? ucwords($hospital[0]['asthma']) : '' ?></td>
            </tr>
            <tr>
                <th>Others </th>
                <td>: <?= isset($hospital[0]['other_disease']) ? ucwords($hospital[0]['other_disease']) : '' ?>
                </td>
            </tr>
        </table>

        <br>
        <h2>Advice Remarks</h2>
        <div>
            <?= isset($hospital[0]['advice']) ? ucwords($hospital[0]['advice']) : '' ?>
        </div>

        <br>

        <div>
            <?php if ($hospital[0]['is_checked'] == '1'): ?>
                <b>Fit to work under specific advice as mentioned above</b>
            <?php endif; ?>
        </div>

        <table class="no-border" style="margin-top: 80px;">
            <tr>
                <td width="300" class="no-border">
                    <div class="">
                        <img id="sign" src="<?= $imgSrc ?>" width="200"> <br>
                        <b
                            id="dr"><?= isset($hospital[0]['doctorName']) ? ucwords($hospital[0]['doctorName']) : '' ?></b>
                        <br>
                        <span id="deg"><?= $degree ?></span> <br>
                        <span id="kmc"><?= $kmc ?></span> <br>
                        Facility Name : Rangadore Memorial Hospital
                    </div>
                    <!-- </td>
                        <td class="no-border" style="vertical-align: bottom;"> -->
                    <img src="http://localhost/rm_hospital/public/assets/images/seal.jpeg" width="150"
                        style="margin-top: 10px;" />
                    <h5>Rangadore Memorial Hospital<br> Bangalore - 560 004</h5>
                </td>
            </tr>
        </table>
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
</body>

</html>