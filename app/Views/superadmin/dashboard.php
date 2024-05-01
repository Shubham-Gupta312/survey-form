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
                            <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
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
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="<?= base_url('superadmin/dashboard') ?>" aria-expanded="false">
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
                <a href="<?= base_url('superadmin/logout') ?>" class="link" data-toggle="tooltip" title="Logout"><i
                        class="mdi mdi-power"></i></a>
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
            <div class="container-fluid">
                <h2 style="margin-bottom: 15px;">List of Employee's</h2>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dashboardTable" style="width: 1100px;">
                        <thead>
                            <th>Sl. No.</th>
                            <th>Employee Id</th>
                            <th>Name</th>
                            <th>RMH/UHID</th>
                            <th>Mobile Number</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>


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
            var table = $('#dashboardTable').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                order: [[1, 'desc']],
                "fnCreatedRow": function (row, data, index) {
                    var pageInfo = table.page.info();
                    var currentPage = pageInfo.page;
                    var pageLength = pageInfo.length;
                    var rowNumber = index + 1 + (currentPage * pageLength);
                    $('td', row).eq(0).html(rowNumber);
                },
                columnDefs: [
                    { targets: [0, 5], orderable: false }
                ],
                ajax: {
                    url: "<?= base_url('superadmin/fetchData') ?>",
                    type: "GET",
                    error: function (xhr, error, thrown) {
                        // console.log("AJAX error:", xhr, error, thrown);
                    }
                },
                drawCallback: function (settings) {
                    // console.log('Table redrawn:', settings);
                }
            });

            var table = $('#dashboardTable').DataTable();
            $(document).on('click', '#eform', function (e) {
                e.preventDefault();
                var button = $(this);
                var data = table.row(button.closest('tr')).data();
                var eid = data[0];
                // console.log(eid);
                var url = '<?php echo base_url("superadmin/editForm") ?>?i=' + eid;
                window.location.href = url;
            });
        });
    </script>
</body>

</html>